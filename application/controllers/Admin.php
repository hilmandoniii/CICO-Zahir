<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		is_logged_in();
		$this->load->model(['ModelUser']);
		
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

	public function akun()
	{

		$data['judul'] = 'Akun';
		$data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('Admin/_part/head', $data);
        $this->load->view('Admin/_part/topbar', $data);
        $this->load->view('Admin/_part/sidebar', $data);
        $this->load->view('Admin/akun', $data);
        $this->load->view('Admin/_part/footer', $data);
		
	}

	public function transaksi()
	{
		$this->load->view('Admin/_part/head');
        $this->load->view('Admin/_part/topbar');
        $this->load->view('Admin/_part/sidebar');
        $this->load->view('Admin/transaksi');
        $this->load->view('Admin/_part/footer');
	}
}
