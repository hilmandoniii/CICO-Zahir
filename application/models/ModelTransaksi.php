<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTransaksi extends CI_Model 
{

    public function insertTransaksi($data)
    {
        $this->db->insert('transaksi', $data);
    }

	// public function getTransaksiWithDetails()
    // {
    //     $this->db->select('transaksi.*, kategori.namaKat, akun.namaAkun, akun.tipeAkun');
    //     $this->db->from('transaksi');
    //     $this->db->join('kategori', 'transaksi.codeKat = kategori.codeKat');
    //     $this->db->join('akun', 'transaksi.kodeAkun = akun.kodeAkun');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

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



}

/* End of file Petugas_m.php */
/* Location: ./application/models/Petugas_m.php */