<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('Admin/_part/head');
        $this->load->view('Admin/_part/topbar');
        $this->load->view('Admin/_part/sidebar');
        $this->load->view('Admin/dashboard');
        $this->load->view('Admin/_part/footer');
	}

	public function akun()
	{
		$this->load->view('Admin/_part/head');
        $this->load->view('Admin/_part/topbar');
        $this->load->view('Admin/_part/sidebar');
        $this->load->view('Admin/akun');
        $this->load->view('Admin/_part/footer');
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
