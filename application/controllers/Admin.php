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
		$data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['akuns'] = $this->ModelAkun->getAkun()->result_array();

        $this->form_validation->set_rules('nama', 'Nama Akun', 'required', [
            'required' => 'Nama Akun Belum diis!!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin/_part/head', $data);
            $this->load->view('Admin/_part/topbar', $data);
            $this->load->view('Admin/_part/sidebar', $data);
            $this->load->view('Admin/akun', $data);
            $this->load->view('Admin/_part/footer', $data);
        } else {

            $kodeAkunBaru = $this->generateKodeAkun();

            $data = [
                'kodeAkun' => $kodeAkunBaru,
                'tipeAkun' => $this->input->post('tipeAkun', true),
                'namaAkun' => $this->input->post('nama', true),
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

    // CRUD Kategori
    public function kategori()
    {
        $data['judul'] = 'Akun';
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->ModelAkun->getKategori()->result_array();

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

            $kodeBaru = $this->generateKodeKategori();

            $data = [
                'codeKat' => $kodeBaru,
                'namaKat' => $this->input->post('namaKat', true),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->ModelAkun->insertKategori($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Kategori berhasil ditambahkan.</div>');
            redirect('Admin/kategori');

        }
        
    }

    private function generateKodeKategori()
    {
        $this->db->select('codeKat');
        $this->db->order_by('codeKat', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('kategori');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            $lastCode = $row->codeKat;
            $number = (int) substr($lastCode, 3) + 1;
            $newCode = 'KAT' . sprintf('%03d', $number);
        } else {
            $newCode = 'KAT001';
        }

        return $newCode;
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
		$data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['transaksi'] = $this->ModelTransaksi->getTransaksiWithDetails(); // Mengambil data dengan detail kategori dan akun
        $data['akuns'] = $this->ModelAkun->getAkun()->result_array(); 
        $data['kategori'] = $this->ModelAkun->getKategori()->result_array(); 

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
            $nomerTransaksi = $this->ModelTransaksi->generateNomorTransaksi();

            $data = [
                'nomorTransaksi' => $nomerTransaksi,
                'tglTransaksi' => $this->input->post('tglTransaksi', true),
                'codeKat' => $this->input->post('codeKat', true),
                'kodeAkun' => $this->input->post('kodeAkun', true),
                'tipeTransaksi' => $this->input->post('tipeTransaksi', true),
                'nominal' => $this->input->post('nominal', true),
                'keterangan' => $this->input->post('keterangan', true)
            ];

            $this->ModelTransaksi->insertTransaksi($data);
            $this->session->set_flashdata('success', 'Transaksi berhasil ditambahkan.');
            redirect('Admin/transaksi');
        }
	}

    // private function generateNomorTransaksi()
    // {
    //     $this->db->select('nomerTransaksi');
    //     $this->db->order_by('nomerTransaksi', 'DESC');
    //     $this->db->limit(1);
    //     $query = $this->db->get('transaksi');

    //     if ($query->num_rows() > 0) {
    //         $row = $query->row();
    //         $lastCode = $row->nomerTransaksi;
    //         $number = (int) substr($lastCode, 2) + 1;
    //         $newCode = 'TR' . sprintf('%04d', $number);
    //     } else {
    //         $newCode = 'TR0001';
    //     }

    //     return $newCode;
    // }

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


    private function generateKodeAkun()
    {
        // Ambil kodeAkun terakhir dari database
        $lastKodeAkun = $this->ModelAkun->getLastKodeAkun();

        if ($lastKodeAkun) {
            // Ambil bagian numerik dari kode
            $number = (int) substr($lastKodeAkun, 2);

            // Tambahkan 1
            $number++;
        } else {
            $number = 1; // Jika tidak ada data, mulai dari 1
        }

        // Format kembali menjadi kode baru
        return 'CA' . str_pad($number, 6, '0', STR_PAD_LEFT);
    }



}
