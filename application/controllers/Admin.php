<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		$this->load->model(['ModelUser','ModelAkun','ModelTransaksi']);
		
	}

	public function index()
	{
		$data['judul'] = 'Dashboard';
		$data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('Admin/_part/head', $data);
        $this->load->view('Admin/_part/topbar', $data);
        $this->load->view('Admin/_part/sidebar', $data);
        $this->load->view('Admin/dashboard', $data);
        $this->load->view('Admin/_part/footer', $data);
	}


    // CRUD AKUN
	public function akun()
	{

		$data['judul'] = 'Akun';
        $codeUser = $this->session->userdata('codeUser');
		$data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        // $data['akuns'] = $this->ModelAkun->getAkun()->result_array();
        $data['akuns'] = $this->ModelAkun->getAkun($codeUser)->result_array();

        $this->form_validation->set_rules('nama', 'Nama Akun', 'required', [
            'required' => 'Nama Akun Belum diisi!!'
        ]);

        $this->form_validation->set_rules('saldo', 'Saldo', 'required|numeric',[
            'required' => 'Nominal Belum diisi',
            'numeric' => 'Nominal Harus Angka'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/_part/head', $data);
            $this->load->view('Admin/_part/topbar', $data);
            $this->load->view('Admin/_part/sidebar', $data);
            $this->load->view('Admin/akun', $data);
            $this->load->view('Admin/_part/footer', $data);
        } else {

            $kodeAkunBaru = $this->generateKodeAkun($codeUser);

            $data = [
                'kodeAkun' => $kodeAkunBaru,
                'codeUser' => $codeUser,
                'tipeAkun' => $this->input->post('tipeAkun', true),
                'namaAkun' => $this->input->post('nama', true),
                'saldoAkun' => $this->input->post('saldo', true),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->ModelAkun->insert($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Akun berhasil ditambahkan.</div>');
            redirect('Admin/akun');
        }

	}

    public function editAkun($kodeAkun)
    {
        $data['judul'] = 'Edit Akun';
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['akun'] = $this->ModelAkun->getAkunByKode($kodeAkun)->row_array();

        $this->form_validation->set_rules('nama', 'Nama Akun', 'required', [
            'required' => 'Nama Akun belum diisi!!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/_part/head', $data);
            $this->load->view('Admin/_part/topbar', $data);
            $this->load->view('Admin/_part/sidebar', $data);
            $this->load->view('Admin/editakun', $data); // Buat view baru untuk edit akun
            $this->load->view('Admin/_part/footer', $data);
        } else {
            $dataUpdate = [
                'tipeAkun' => $this->input->post('tipeAkun', true),
                'namaAkun' => $this->input->post('nama', true)
            ];

            $this->ModelAkun->update($kodeAkun, $dataUpdate);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Akun berhasil diubah.</div>');
            redirect('Admin/akun');
        }

    }

    public function hapusAkun($kodeAkun)
    {
        // Ambil data akun berdasarkan kodeAkun
        $akun = $this->ModelAkun->getAkunByKode($kodeAkun)->row_array();

        // Jika akun ditemukan
        if ($akun) {
            // Hapus data akun dari database
            $this->db->where('kodeAkun', $kodeAkun);
            $this->db->delete('akun');

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Akun berhasil dihapus.</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Akun tidak ditemukan.</div>');
        }

        // Redirect ke halaman daftar akun
        redirect('Admin/akun');
    }

    private function generateKodeAkun($codeUser)
    {
        // Hitung jumlah akun yang sudah ada untuk codeUser ini
        $this->db->where('codeUser', $codeUser);
        $totalAkun = $this->db->count_all_results('akun');

        // Tambahkan 1 untuk mendapatkan nomor akun baru
        $newNumber = $totalAkun + 1;

        // Format kodeAkun baru
        return 'CA' . str_pad($newNumber, 2, '0', STR_PAD_LEFT) . '-' . $codeUser;
    }

    // CRUD Kategori
    public function kategori()
    {
        $data['judul'] = 'Akun';
        $codeUser = $this->session->userdata('codeUser');
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        // $data['akuns'] = $this->ModelAkun->getAkun()->result_array();
        $data['kategori'] = $this->ModelAkun->getKategori($codeUser)->result_array();
       

        $this->form_validation->set_rules('namaKat', 'Nama Kategori', 'required', [
            'required' => 'Nama Kategori Belum diis!!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/_part/head', $data);
            $this->load->view('Admin/_part/topbar', $data);
            $this->load->view('Admin/_part/sidebar', $data);
            $this->load->view('Admin/kategori', $data);
            $this->load->view('Admin/_part/footer', $data);
        } else {

            $kodeBaru = $this->generateKodeKategori($codeUser);

            $data = [
                'codeKat' => $kodeBaru,
                'codeUser' => $codeUser,
                'namaKat' => $this->input->post('namaKat', true),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->ModelAkun->insertKategori($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Kategori berhasil ditambahkan.</div>');
            redirect('Admin/kategori');

        }
        
    }

    private function generateKodeKategori($codeUser)
    {

        // Hitung jumlah akun yang sudah ada untuk codeUser ini
        $this->db->where('codeUser', $codeUser);
        $totalKat = $this->db->count_all_results('kategori');

        // Tambahkan 1 untuk mendapatkan nomor akun baru
        $newNumber = $totalKat + 1;

        // Format kodeAkun baru
        return 'KA' . str_pad($newNumber, 2, '0', STR_PAD_LEFT) . '-' . $codeUser;
        
    }

    public function hapusKategori($codeKat)
    {
        // Ambil data akun berdasarkan kodeAkun
        $kat = $this->ModelAkun->getKatByCode($codeKat)->row_array();

        // Jika akun ditemukan
        if ($kat) {
            // Hapus data akun dari database
            $this->db->where('codeKat', $codeKat);
            $this->db->delete('kategori');

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Kategori berhasil dihapus.</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Kategori tidak ditemukan.</div>');
        }

        // Redirect ke halaman daftar akun
        redirect('Admin/kategori');
    }

    public function editKategori($codeKat)
    {
        $data['judul'] = 'Edit Akun';
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->ModelAkun->getKatByCode($codeKat)->row_array();

        $this->form_validation->set_rules('namaKat', 'Nama Kategori', 'required', [
            'required' => 'Nama Kategori Belum diis!!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/_part/head', $data);
            $this->load->view('Admin/_part/topbar', $data);
            $this->load->view('Admin/_part/sidebar', $data);
            $this->load->view('Admin/editkategori', $data); // Buat view baru untuk edit akun
            $this->load->view('Admin/_part/footer', $data);
        } else {
            $dataUpdate = [
                'namaKat' => $this->input->post('namaKat', true)
            ];

            $this->ModelAkun->updateKategori($codeKat, $dataUpdate);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Kategori berhasil diubah.</div>');
            redirect('Admin/kategori');
        }

    }

    // CRUD Transaksi
	public function transaksi()
	{
		$data['judul'] = 'Transaksi';
        $codeUser = $this->session->userdata('codeUser');
		$data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['transaksi'] = $this->ModelTransaksi->getTransaksiWithDetails($codeUser); // Mengambil data dengan detail kategori dan akun
        $data['akuns'] = $this->ModelAkun->getAkun($codeUser)->result_array(); 
        $data['kategori'] = $this->ModelAkun->getKategori($codeUser)->result_array();        

        // $nomorTransaksi = $this->input->get('nomorTransaksi');
        // if ($nomorTransaksi) {
        //     $data['detailTransaksi'] = $this->ModelTransaksi->getDetailTransaksi($nomorTransaksi);
        // }

        $this->form_validation->set_rules('kodeAkun', 'Akun', 'required');
        $this->form_validation->set_rules('codeKat', 'Kategori', 'required');
        $this->form_validation->set_rules('tipeTransaksi', 'Tipe Transaksi', 'required');
        $this->form_validation->set_rules('tglTransaksi', 'Tanggal Transaksi', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/_part/head', $data);
            $this->load->view('Admin/_part/topbar', $data);
            $this->load->view('Admin/_part/sidebar', $data);
            $this->load->view('Admin/transaksi', $data);
            $this->load->view('Admin/_part/footer', $data);
        } else {
            $nomerTransaksi = $this->generateNomorTransaksi($codeUser);
            $kodeAkun = $this->input->post('kodeAkun', true);
            $tipeTransaksi = $this->input->post('tipeTransaksi', true);
            $nominal = $this->input->post('nominal', true);

            // Ambil saldoAkun saat ini
            $currentSaldo = $this->ModelAkun->getSaldoAkun($kodeAkun);

            if ($tipeTransaksi === 'Pemasukan') {
                // Jika transaksi adalah pemasukan, tambahkan nominal ke saldoAkun
                $newSaldo = $currentSaldo + $nominal;
                $this->ModelAkun->updateSaldoAkun($kodeAkun, $newSaldo);
            } elseif ($tipeTransaksi === 'Pengeluaran') {
                // Jika transaksi adalah pengeluaran, cek apakah saldo mencukupi
                if ($currentSaldo < $nominal) {
                    // Jika saldo tidak mencukupi, tampilkan notifikasi dan batal simpan transaksi
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Saldo tidak mencukupi.</div>');
                    redirect('Admin/transaksi');
                    return;
                } else {
                    // Jika saldo mencukupi, kurangi saldoAkun
                    $newSaldo = $currentSaldo - $nominal;
                    $this->ModelAkun->updateSaldoAkun($kodeAkun, $newSaldo);
                }
            }

            // Simpan data transaksi
            $data = [
                'nomorTransaksi' => $nomerTransaksi,
                'codeUser' => $codeUser,
                'tglTransaksi' => $this->input->post('tglTransaksi', true) . ' ' . date('H:i:s'),
                'codeKat' => $this->input->post('codeKat', true),
                'kodeAkun' => $kodeAkun,
                'tipeTransaksi' => $tipeTransaksi,
                'nominal' => $nominal,
                'keterangan' => $this->input->post('keterangan', true)
            ];

            $this->ModelTransaksi->insertTransaksi($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Transaki berhasil ditambahkan.</div>');
            redirect('Admin/transaksi');
        }
	}

    public function hapusTransaksi($nomorTransaksi)
    {
        // Panggil metode deleteTransaksi dari model
        $hapus = $this->ModelTransaksi->deleteTransaksi($nomorTransaksi);

        if ($hapus) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Transaksi berhasil dihapus.</div>');
            // $this->session->set_flashdata('success', 'Transaksi berhasil dihapus.');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Transaksi gagal dihapus</div>');
        }

        // Redirect ke halaman transaksi setelah menghapus data
        redirect('Admin/transaksi');
    }

    public function detailTransaksi($nomorTransaksi)
    {
        $data['judul'] = 'Detail Transaksi';
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['transaksi'] = $this->ModelTransaksi->getDetailTransaksi($nomorTransaksi);

        $this->load->view('Admin/_part/head', $data);
        $this->load->view('Admin/_part/topbar', $data);
        $this->load->view('Admin/_part/sidebar', $data);
        $this->load->view('Admin/detailTransaksi', $data);
        $this->load->view('Admin/_part/footer', $data);
    }

    private function generateNomorTransaksi($codeUser)
    {
        // Hitung jumlah transaksi yang sudah ada untuk codeUser ini
        $this->db->where('codeUser', $codeUser);
        $totalTransaksi = $this->db->count_all_results('transaksi');

        // Tambahkan 1 untuk mendapatkan nomor transaksi baru
        $newNumber = $totalTransaksi + 1;

        // Format nomorTransaksi baru
        return 'TR' . str_pad($newNumber, 4, '0', STR_PAD_LEFT) . '-' . $codeUser;
    }

   


    // Function Transfer
    public function transfer()
    {
        $data['judul'] = 'Transfer Antar Akun';
        $codeUser = $this->session->userdata('codeUser');
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['akuns'] = $this->ModelAkun->getAkun($codeUser)->result_array();

        $data['transfers'] = $this->ModelTransaksi->getTransferData($codeUser);

        $this->form_validation->set_rules('sumberAkun', 'Sumber Akun', 'required');
        $this->form_validation->set_rules('tujuanAkun', 'Tujuan Akun', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/_part/head', $data);
            $this->load->view('Admin/_part/topbar', $data);
            $this->load->view('Admin/_part/sidebar', $data);
            $this->load->view('Admin/transfer', $data);
            $this->load->view('Admin/_part/footer', $data);
        } else {
            $idTransfer = $this->generateIdTransfer($codeUser);
            $sumberAkun = $this->input->post('sumberAkun', true);
            $tujuanAkun = $this->input->post('tujuanAkun', true);
            $nominal = $this->input->post('nominal', true);

            // Ambil saldo saat ini dari sumberAkun dan tujuanAkun
            $currentSaldoSumber = $this->ModelAkun->getSaldoAkun($sumberAkun);
            $currentSaldoTujuan = $this->ModelAkun->getSaldoAkun($tujuanAkun);

            // Cek apakah saldo sumberAkun mencukupi untuk transfer
            if ($currentSaldoSumber < $nominal) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Saldo sumber akun tidak mencukupi.</div>');
                redirect('Admin/transfer');
                return;
            }

            // Jika saldo mencukupi, lakukan transfer
            $newSaldoSumber = $currentSaldoSumber - $nominal;
            $newSaldoTujuan = $currentSaldoTujuan + $nominal;

            // Update saldo sumberAkun dan tujuanAkun
            $this->ModelAkun->updateSaldoAkun($sumberAkun, $newSaldoSumber);
            $this->ModelAkun->updateSaldoAkun($tujuanAkun, $newSaldoTujuan);

            // Simpan data transfer
            $dataTransfer = [
                'idTransfer' => $idTransfer,
                'codeUser' => $codeUser,
                'sumberAkun' => $sumberAkun,
                'tujuanAkun' => $tujuanAkun,
                'nominal' => $nominal,
                'keterangan' => $this->input->post('keterangan', true),
                'tglTransfer' => date('Y-m-d H:i:s')
            ];

            $this->ModelTransaksi->insertTransfer($dataTransfer);


            // Cek apakah kategori "transfer" sudah ada
            $kategoriTransfer = $this->ModelAkun->getKategoriTransfer($codeUser);
            if (!$kategoriTransfer) {
                // Jika belum ada, tambahkan kategori "transfer"
                $kategoriTransfer['codeKat'] = $this->ModelAkun->insertKategoriTransfer($codeUser);
            }

            // Simpan data transaksi pengeluaran untuk sumberAkun
            $dataTransaksiPengeluaran = [
                'nomorTransaksi' => $this->generateNomorTransaksi($codeUser),
                'codeUser' => $codeUser,
                'tglTransaksi' => date('Y-m-d H:i:s'),
                'codeKat' => $kategoriTransfer['codeKat'],
                'kodeAkun' => $sumberAkun,
                'tipeTransaksi' => 'Pengeluaran',
                'nominal' => $nominal,
                'keterangan' => 'Transfer ke akun ' . $tujuanAkun . ' - ' . $keterangan
            ];
            $this->ModelTransaksi->insertTransaksi($dataTransaksiPengeluaran);

            // Simpan data transaksi pemasukan untuk tujuanAkun
            $dataTransaksiPemasukan = [
                'nomorTransaksi' => $this->generateNomorTransaksi($codeUser),
                'codeUser' => $codeUser,
                'tglTransaksi' => date('Y-m-d H:i:s'),
                'codeKat' => $kategoriTransfer['codeKat'],
                'kodeAkun' => $tujuanAkun,
                'tipeTransaksi' => 'Pemasukan',
                'nominal' => $nominal,
                'keterangan' => 'Transfer dari akun ' . $sumberAkun . ' - ' . $keterangan
            ];
            $this->ModelTransaksi->insertTransaksi($dataTransaksiPemasukan);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Transfer berhasil dilakukan.</div>');
            redirect('Admin/transfer');
        }

        
    }

    private function generateIdTransfer($codeUser)
    {
        // Hitung jumlah transfer yang sudah ada untuk codeUser ini
        $this->db->where('codeUser', $codeUser);
        $totalTransfer = $this->db->count_all_results('transfer');

        // Tambahkan 1 untuk mendapatkan nomor transfer baru
        $newNumber = $totalTransfer + 1;

        // Format idTransfer baru
        return 'TF' . str_pad($newNumber, 4, '0', STR_PAD_LEFT) . '-' . $codeUser;
    }

    // Laporan Transaksi
    public function laporanTransaksi()
    {
        $data['judul'] = 'Laporan Transaksi';
        $codeUser = $this->session->userdata('codeUser');
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['laporanTransaksi'] = $this->ModelTransaksi->getLaporan($codeUser); // Mengambil data dengan detail kategori dan akun

        $this->load->view('Admin/_part/head', $data);
        $this->load->view('Admin/_part/topbar', $data);
        $this->load->view('Admin/_part/sidebar', $data);
        $this->load->view('Admin/laporan-transaksi', $data);
        $this->load->view('Admin/_part/footer', $data);
    }

    // Laporan Saldo
    public function laporanSaldo()
    {
        $data['judul'] = 'Laporan Saldo';
        $codeUser = $this->session->userdata('codeUser');
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();

        $tanggalAwal = $this->input->get('tanggal_awal');
        $tanggalAkhir = $this->input->get('tanggal_akhir');
        $tipeAkun = $this->input->get('tipe_akun');
        $data['laporanSaldo'] = $this->ModelTransaksi->getLaporanSaldo($codeUser, $tanggalAwal, $tanggalAkhir, $tipeAkun); // Mengambil data dengan detail kategori dan akun

        $data['tipeAkunList'] = $this->ModelTransaksi->getTipeAkunByUser($codeUser);

        $totalPemasukan = 0;
        $totalPengeluaran = 0;

        // Hitung total pemasukan dan pengeluaran
        if (!empty($data['laporanSaldo'])) {
            foreach ($data['laporanSaldo'] as $lt) {
                if ($lt['tipeTransaksi'] == 'Pemasukan') {
                    $totalPemasukan += $lt['nominal'];
                } elseif ($lt['tipeTransaksi'] == 'Pengeluaran') {
                    $totalPengeluaran += $lt['nominal'];
                }
            }
        }

        $data['totalPemasukan'] = $totalPemasukan;
        $data['totalPengeluaran'] = $totalPengeluaran;

        $this->load->view('Admin/_part/head', $data);
        $this->load->view('Admin/_part/topbar', $data);
        $this->load->view('Admin/_part/sidebar', $data);
        $this->load->view('Admin/laporan-saldo', $data);
        $this->load->view('Admin/_part/footer', $data);
    }

	public function kelolaProfil()
	{
		$data['judul'] = 'Kelola Profile';
		$data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('Admin/_part/head', $data);
        $this->load->view('Admin/_part/topbar', $data);
        $this->load->view('Admin/_part/sidebar', $data);
        $this->load->view('Admin/profil', $data);
        $this->load->view('Admin/_part/footer');
	}

    public function kelolaProfile()
    {
        $data['judul'] = 'Kelola Profile';
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak Boleh Kosong'
        ]);

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username Belum diisi!!'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/_part/head', $data);
            $this->load->view('Admin/_part/topbar', $data);
            $this->load->view('Admin/_part/sidebar', $data);
            $this->load->view('Admin/profil', $data);
            $this->load->view('Admin/_part/footer', $data);
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            $usernameBaru = $this->input->post('username', true);
            $usernameLama = $data['user']['username'];

            //jika ada gambar yang akan diuploads
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '3000';
                // $config['max_width'] = '1024';
                // $config['max_height'] = '1000';
                $config['file_name'] = 'pro' . time();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['user']['image'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                } else {
                }
            }

            $this->db->set('nama', $nama);
            $this->db->set('email', $email);
            $this->db->set('username', $usernameBaru);
            $this->db->where('username', $usernameLama);
            $this->db->update('user');

            // Perbarui session dengan username baru
            $this->session->set_userdata('username', $usernameBaru);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
            redirect('Admin/kelolaProfile');
        }    
    }

	public function gantiPassword()
	{
		$data['judul'] = 'Ganti Password';
		$data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('current_password', 'Password Sekarang', 'trim|required', [
            'required' => 'Password lama belum diisi'
        ]);

        $this->form_validation->set_rules('new_password', 'Password Baru', 'trim|required|min_length[6]|max_length[15]|matches[confirm_password]', [
            'required' => 'Password Belum diisi!!',
            'min_length' => 'Password Min 6 angka',
            'matches' => 'Password tidak sesuai'
        ]);
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password Baru', 'trim|required|min_length[6]|max_length[15]|matches[new_password]', [
            'required' => 'Password Belum diisi!!',
            'min_length' => 'Password Min 6 angka',
            'matches' => 'Password tidak sesuai'

        ]);

        if ($this->form_validation->run() == FALSE) :
           	$this->load->view('Admin/_part/head', $data);
	        $this->load->view('Admin/_part/topbar', $data);
	        $this->load->view('Admin/_part/sidebar', $data);
	        $this->load->view('Admin/gantipassword', $data);
	        $this->load->view('Admin/_part/footer');
        else :
            $passwordSekarang = htmlspecialchars($this->input->post('current_password', true));
            $passwordBaru = htmlspecialchars($this->input->post('new_password', true));

            $this->change_password($passwordSekarang, $passwordBaru);
        endif;
		
	}

	private function change_password($passwordSekarang, $passwordBaru)
    {

        $user = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();

        if ($user == TRUE) :

            if (password_verify($passwordSekarang, $user['password'])) :

                $params = [
                    'password' => password_hash($passwordBaru, PASSWORD_DEFAULT),
                ];

                $resp = $this->db->update('user', $params, ['id' => $user['id']]);
                if ($resp) :
                    $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-message" role="alert">
                        Ganti password berhasil!
                        </div>');

                    redirect('Admin/gantiPassword');
                else :
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">
                        Ganti password gagal!
                        </div>');

                    redirect('Admin/gantiPassword');
                endif;

            else :
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">
                    Password lama salah!
                    </div>');

                redirect('Admin/gantiPassword');
            endif;

        else :
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">
                Password lama salah!
                </div>');

            redirect('Admin/gantiPassword');
        endif;
    }

    public function tambahAkun()
    {
        $data['judul'] = 'Tambah Akun';
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();

    }


    // private function generateKodeAkun()
    // {
    //     // Ambil kodeAkun terakhir dari database
    //     $lastKodeAkun = $this->ModelAkun->getLastKodeAkun();

    //     if ($lastKodeAkun) {
    //         // Ambil bagian numerik dari kode
    //         $number = (int) substr($lastKodeAkun, 2);

    //         // Tambahkan 1
    //         $number++;
    //     } else {
    //         $number = 1; // Jika tidak ada data, mulai dari 1
    //     }

    //     // Format kembali menjadi kode baru
    //     return 'CA' . str_pad($number, 6, '0', STR_PAD_LEFT);
    // }



}
