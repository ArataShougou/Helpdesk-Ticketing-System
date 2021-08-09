<?php
class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('modelSidebar');
		$this->load->model('modelTiket');
		$this->load->model('modelUser');
		if(!$this->session->userdata('user'))
		{
			$this->session->set_flashdata("msg", "<div class='alert alert-info'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Session berakhir silahkan login terlebih dahulu.</div>");
			redirect(base_url('index.php/login'));
		}

	}


	function index(){

		$data['header'] = "header/header";
		$data['navbar'] = "navbar/navbar";
		$data['sidebar'] = "sidebar/sidebar";
		$data['body'] = "body/User";
		$userTeknisi = $this->session->userdata('user');

		$data["jml_list_ticket"] = $this->modelSidebar->ListTicket();
		$data["jml_approval_ticket"] = $this->modelSidebar->ApproveTicket();
		$data["jml_assigment_ticket"] = $this->modelSidebar->AssignmentTicket();
		$data["user_list"] = $this->modelUser->getUser();

		$this->load->view('template',$data);
	}

	function addNew(){
		$user = $this->input->post('user');
		$pass = md5($this->input->post('pass'));
		$email = $this->input->post('email');
		$lvl  = $this->input->post('level');
		if($this->modelUser->adduser($user,$pass,$email,$lvl)){
			$info['status'] = success;
			return $info;
		}
	}

	function hapus()
	{
		$user = $this->input->post('id');
		$this->modelUser->delete($user);
	}

	function ubah(){
		$user = $this->input->post('user');
		$level = $this->input->post('level');
		$this->modelUser->update($user,$level);
	}


}
?>
