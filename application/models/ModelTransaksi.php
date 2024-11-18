<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTransaksi extends CI_Model 
{

    //transaksi
    public function insertTransaksi($data)
    {
        $this->db->insert('transaksi', $data);
    }

    public function getTransaksiWithDetails($codeUser)
    {
        $this->db->select('transaksi.*, kategori.namaKat, akun.namaAkun, akun.tipeAkun');
        $this->db->from('transaksi');
        $this->db->join('kategori', 'transaksi.codeKat = kategori.codeKat');
        $this->db->join('akun', 'transaksi.kodeAkun = akun.kodeAkun');
        $this->db->where('akun.codeUser', $codeUser);
        $query = $this->db->get();
        
        return $query->result_array(); // Mengembalikan hasil sebagai array
    }

    public function getTransactionsByType($codeUser, $type)
    {
        $this->db->select('transaksi.*, kategori.namaKat, akun.namaAkun, akun.tipeAkun');
        $this->db->from('transaksi');
        $this->db->join('kategori', 'transaksi.codeKat = kategori.codeKat');
        $this->db->join('akun', 'transaksi.kodeAkun = akun.kodeAkun');
        $this->db->where('akun.codeUser', $codeUser);
        $this->db->where('transaksi.tipeTransaksi', $type);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function generateNomorTransaksi()
    {
        $this->db->select('RIGHT(nomorTransaksi, 4) as nomor', FALSE);
        $this->db->order_by('nomorTransaksi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('transaksi');

        if ($query->num_rows() != 0) {
            $data = $query->row();
            $nomor = intval($data->nomor) + 1;
        } else {
            $nomor = 1;
        }

        $nomorTransaksi = 'TR' . str_pad($nomor, 4, '0', STR_PAD_LEFT);
        return $nomorTransaksi;
    }

    public function deleteTransaksi($nomorTransaksi)
    {
        $this->db->where('nomorTransaksi', $nomorTransaksi);
        return $this->db->delete('transaksi');
    }

    public function getDetailTransaksi($nomorTransaksi)
    {
        $this->db->select('transaksi.*, akun.namaAkun, akun.tipeAkun, kategori.namaKat');
        $this->db->from('transaksi');
        $this->db->join('akun', 'transaksi.kodeAkun = akun.kodeAkun');
        $this->db->join('kategori', 'transaksi.codeKat = kategori.codeKat');
        $this->db->where('transaksi.nomorTransaksi', $nomorTransaksi);
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan satu baris data
    }

    public function getLaporan($codeUser)
    {
        $this->db->select('transaksi.*, kategori.namaKat, akun.namaAkun, akun.tipeAkun, user.username, user.nama');
        $this->db->from('transaksi');
        $this->db->join('kategori', 'transaksi.codeKat = kategori.codeKat');
        $this->db->join('akun', 'transaksi.kodeAkun = akun.kodeAkun');
        $this->db->join('user', 'akun.codeUser = user.codeUser'); // Menghubungkan tabel user melalui codeUser
        $this->db->where('akun.codeUser', $codeUser);
        $query = $this->db->get();

        return $query->result_array(); // Mengembalikan hasil sebagai array
    }

    public function getLaporanSaldo($codeUser, $tanggalAwal = null, $tanggalAkhir = null, $tipeAkun = null)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('akun', 'transaksi.kodeAkun = akun.kodeAkun');
        $this->db->join('kategori', 'transaksi.codeKat = kategori.codeKat');
        $this->db->where('transaksi.codeUser', $codeUser);

        // Tambahkan filter tanggal jika diisi
        if (!empty($tanggalAwal) && !empty($tanggalAkhir)) {
            $this->db->where('tglTransaksi >=', $tanggalAwal);
            $this->db->where('tglTransaksi <=', $tanggalAkhir);
        }

        // Tambahkan filter tipe akun jika diisi
        if (!empty($tipeAkun)) {
            $this->db->where('akun.tipeAkun', $tipeAkun);
        }

        return $this->db->get()->result_array();
    }

    // Ambil tipeAkun berdasarkan codeUser yang login
    public function getTipeAkunByUser($codeUser)
    {
        $this->db->select('tipeAkun');
        $this->db->from('akun');
        $this->db->where('codeUser', $codeUser);
        $this->db->group_by('tipeAkun');
        return $this->db->get()->result_array();
    }

    // kalkulasi saldo akun berdasarkan tipeAkun
    public function getTotalSaldoByTipeAkun($codeUser, $tipeAkun = null)
    {
        $this->db->select_sum('saldoAkun');
        $this->db->from('akun');
        $this->db->where('codeUser', $codeUser);
        if ($tipeAkun) {
            $this->db->where('tipeAkun', $tipeAkun);
        }
        $query = $this->db->get();
        return $query->row()->saldoAkun ?: 0;
    }

    // kalkulasi pemasukan & pengeluaran berdasarkan tipeAkun
    public function getTransactionsByTypeAccount($codeUser, $tipeTransaksi, $tipeAkun = null)
    {
        $this->db->select_sum('nominal');
        $this->db->from('transaksi');
        $this->db->join('akun', 'transaksi.kodeAkun = akun.kodeAkun');
        $this->db->where('akun.codeUser', $codeUser);
        $this->db->where('transaksi.tipeTransaksi', $tipeTransaksi);
        if ($tipeAkun) {
            $this->db->where('akun.tipeAkun', $tipeAkun);
        }
        $query = $this->db->get();
        return $query->row()->nominal ?: 0;
    }



    //tansfer
    public function insertTransfer($dataTransfer)
    {
        $this->db->insert('transfer', $dataTransfer);
    }

    public function getTransferData($codeUser)
    {
        // Mengambil data transfer dengan join tabel akun untuk sumber dan tujuan
        $this->db->select('transfer.idTransfer, transfer.sumberAkun, transfer.tujuanAkun, transfer.nominal, transfer.tglTransfer, transfer.keterangan, akun_sumber.namaAkun as namaAkunSumber, akun_sumber.tipeAkun as tipeAkunSumber, akun_tujuan.namaAkun as namaAkunTujuan, akun_tujuan.tipeAkun as tipeAkunTujuan');
        $this->db->from('transfer');
        $this->db->join('akun as akun_sumber', 'akun_sumber.kodeAkun = transfer.sumberAkun', 'left');
        $this->db->join('akun as akun_tujuan', 'akun_tujuan.kodeAkun = transfer.tujuanAkun', 'left');
        $this->db->where('transfer.codeUser', $codeUser); // Filter berdasarkan user
        $this->db->order_by('transfer.tglTransfer', 'DESC'); // Mengurutkan berdasarkan tanggal transfer

        return $this->db->get()->result_array();
    }

    //ambil kalkulasi nominal pemasukan dan pengeluaran
    public function get_total_by_type($tipeTransaksi)
    {
        $this->db->select_sum('nominal');
        $this->db->where('tipeTransaksi', $tipeTransaksi);
        $query = $this->db->get('transaksi');
        return $query->row()->nominal ?: 0; // Jika hasil null, kembalikan 0
    }

    //ambil kalkulasi totalsaldo
    public function get_total_saldo()
    {
        $this->db->select_sum('saldoAkun');
        $query = $this->db->get('akun');
        return $query->row()->saldoAkun ?: 0; // Jika hasil null, kembalikan 0
    }



}

/* End of file Petugas_m.php */
/* Location: ./application/models/Petugas_m.php */