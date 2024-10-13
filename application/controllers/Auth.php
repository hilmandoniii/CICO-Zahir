<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser');
        
        //var_dump($this->ModelBooking->kodeotomatis('pinjam'));;
    }



	// public function index()
	// {
	// 	$this->load->view('Auth/Login');
	// }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('admin');
        }
        //jika statusnya sudah login, maka tidak bisa mengakses halaman login alias dikembalikan ke tampilan user
        // if ($this->session->userdata('email')) {
        //     redirect('admin');
        // }

        // $this->form_validation->set_rules('email', 'Alamat Email',
        // 'required|trim|valid_email', [
        // 'required' => 'Email Harus diisi!!',
        // 'valid_email' => 'Email Tidak Benar!!'
        // ]);

        $this->form_validation->set_rules('username', 'Username',
        'required|trim', [
        'required' => 'Username Harus diisi'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Harus diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Halaman Login';
            $data['user'] = '';
            //kata 'login' merupakan nilai dari variabel judul dalam array $data dikirimkan ke view aute_header
            
            $this->load->view('Auth/Login',$data);
            
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = htmlspecialchars($this->input->post('username',TRUE));
        $password = htmlspecialchars($this->input->post('password',TRUE));

        $user = $this->ModelUser->cekData(['username' => $username])->row_array();

        if ($user == TRUE) {
            // jika akun petugas == TRUE
            // cek password

            if (password_verify($password, $user['password'])) {
                // jika password benar
                // maka buat session userdata
                $session = [
                    'username'      => $user['username'],
                ];

                $this->session->set_userdata($session);
                $this->session->set_flashdata('pesan','<div class="alert alert-primary alert-message" role="alert">
                    Login berhasil!
                    </div>');
                redirect('Admin');

            } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
                    redirect('Auth');
            }

        } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Username atau Password Salah</div>');
                redirect('Auth');
        }
    }

	public function register()
	{

        if ($this->session->userdata('username')) {
            redirect('admin');
        }

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Belum diis!!'
        ]);

        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username Belum diisi!!'
        ]);
        //membuat rule untuk inputan email agar tidak boleh kosong, tidak ada spasi, format email harus valid
        //dan email belum pernah dipakai sama user lain dengan membuat pesan error dengan bahasa sendiri 
        //yaitu jika format email tidak benar maka pesannya 'Email Tidak Benar!!'. jika email belum diisi,
        //maka pesannya adalah 'Email Belum diisi', dan jika email yang diinput sudah dipakai user lain,
        //maka pesannya 'Email Sudah dipakai'
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[user.email]', [
            'valid_email' => 'Email Tidak Benar!!',
            'required' => 'Email Belum diisi!!',
            'is_unique' => 'Email Sudah Terdaftar!'
        ]);
        //membuat rule untuk inputan password agar tidak boleh kosong, tidak ada spasi, tidak boleh kurang dari
        //dari 3 digit, dan password harus sama dengan repeat password dengan membuat pesan error dengan  
        //bahasa sendiri yaitu jika password dan repeat password tidak diinput sama, maka pesannya
        //'Password Tidak Sama'. jika password diisi kurang dari 3 digit, maka pesannya adalah 
        //'Password Terlalu Pendek'.
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
        	'required' => 'Password Belum diis!!',
            'matches' => 'Password Tidak Sama!!',
            'min_length' => 'Password Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]', [
        	'required' => 'Konfirmasi Password Belum diis!!',
            'matches' => 'Konfirmasi Password Tidak Sesuai!!'
        ]);
        //jika jida disubmit kemudian validasi form diatas tidak berjalan, maka akan tetap berada di
        //tampilan registrasi. tapi jika disubmit kemudian validasi form diatas berjalan, maka data yang 
        //diinput akan disimpan ke dalam tabel user
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Registrasi Member';
            
            $this->load->view('Auth/Register',$data);
            
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->ModelUser->create($data); //menggunakan model

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun anda sudah dibuat</div>');
            redirect('Auth');
        }
		
	}

    public function logout()
    {
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
        redirect('Auth');
    }

    public function blocked()
    {
        $data['judul'] = 'Bloked';
        $this->load->view('blocked',$data);
    }
}
