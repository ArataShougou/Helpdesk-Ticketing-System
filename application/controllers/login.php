<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('modelLogin');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$user = trim($this->input->post('username'));
		$pass = md5(trim($this->input->post('password')));
		if ($this->modelLogin->ceklogin($user, $pass)) {
			$data = $this->modelLogin->getlevel($user, $pass);
			$this->session->set_userdata($data);
			redirect(base_url('index.php/home/'));
		}else{
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert' align='center'>username / Password salah </div>");
			redirect(base_url('index.php/login/'));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('index.php/login/'));
	}

}
