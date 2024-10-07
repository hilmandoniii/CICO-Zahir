<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUser extends CI_Model 
{

	public function create($data = null)
    {
        $this->db->insert('user', $data);
    }

	public function cekData($where)
    {
        return $this->db->get_where('user', $where);
    }

    public function cekUserAccess($where = null)
    {
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where($where);
        return $this->db->get();
    }

}

/* End of file Petugas_m.php */
/* Location: ./application/models/Petugas_m.php */