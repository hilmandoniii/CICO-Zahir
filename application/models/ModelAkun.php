<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAKun extends CI_Model 
{

    // Akun

	public function insert($data)
    {
        $this->db->insert('akun', $data);
    }

    // public function getAkun()
    // {
    //     return $this->db->get('akun');
    // }

    public function getAkun($codeUser = null)
    {
        if ($codeUser) {
            $this->db->where('codeUser', $codeUser); // Filter akun berdasarkan codeUser
        }
        return $this->db->get('akun'); // Nama tabel adalah 'akun'
    }

    public function getLastKodeAkun()
    {
        // Ambil kodeAkun terakhir dari database
        $this->db->select('kodeAkun');
        $this->db->from('akun');
        $this->db->order_by('kodeAkun', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->kodeAkun;
        } else {
            return null; // Jika tidak ada, kembalikan null
        }
    }

    public function getAkunByKode($kodeAkun)
    {
        return $this->db->get_where('akun', ['kodeAkun' => $kodeAkun]);
    }

    public function update($kodeAkun, $data)
    {
        $this->db->where('kodeAkun', $kodeAkun);
        $this->db->update('akun', $data);
    }

    // Kategori
    public function insertKategori($data)
    {
        $this->db->insert('kategori', $data);
    }

    // public function getKategori()
    // {
    //     return $this->db->get('kategori');
    // }

    public function getKategori($codeUser = null)
    {
        if ($codeUser) {
            $this->db->where('codeUser', $codeUser); // Filter akun berdasarkan codeUser
        }
        return $this->db->get('kategori'); // Nama tabel adalah 'akun'
    }

    public function getKatByCode($codeKat)
    {
        return $this->db->get_where('kategori', ['codeKat' => $codeKat]);
    }

    public function updateKategori($codeKat, $data)
    {
        $this->db->where('codeKat', $codeKat);
        $this->db->update('kategori', $data);
    }


    //saldoakun
    public function getSaldoAkun($kodeAkun)
    {
        $this->db->select('saldoAkun');
        $this->db->where('kodeAkun', $kodeAkun);
        $result = $this->db->get('akun')->row_array();
        return $result['saldoAkun'] ?? 0;
    }

    public function updateSaldoAkun($kodeAkun, $newSaldo)
    {
        $this->db->set('saldoAkun', $newSaldo);
        $this->db->where('kodeAkun', $kodeAkun);
        $this->db->update('akun');
    }





}