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


    //
    public function getKategoriTransfer($codeUser) 
    {
        $this->db->select('codeKat');
        $this->db->from('kategori');
        $this->db->where('namaKat', 'transfer');
        $this->db->where('codeUser', $codeUser);
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan data kategori "transfer" jika ada
    }


    private function generateKodeKategori($codeUser)
    {
        // Hitung jumlah kategori yang sudah ada untuk codeUser ini
        $this->db->where('codeUser', $codeUser);
        $totalKat = $this->db->count_all_results('kategori');

        // Tambahkan 1 untuk mendapatkan nomor kategori baru
        $newNumber = $totalKat + 1;

        // Format codeKat baru
        return 'KA' . str_pad($newNumber, 2, '0', STR_PAD_LEFT) . '-' . $codeUser;
    }

    public function insertKategoriTransfer($codeUser) 
    {
        $newCodeKat = $this->generateKodeKategori($codeUser);
        $data = [
            'codeKat' => $newCodeKat,
            'namaKat' => 'Transfer',
            'codeUser' => $codeUser,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('kategori', $data);
        return $newCodeKat; // Mengembalikan codeKat baru untuk kategori "transfer"
    }





}