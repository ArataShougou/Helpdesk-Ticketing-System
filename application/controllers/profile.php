<?php
class profile extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('modelSidebar');
		$this->load->model('modelProfile');
		if(!$this->session->userdata('user'))
		{
			$this->session->set_flashdata("msg", "<div class='alert alert-info'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Session berakhir silahkan login terlebih dahulu.</div>");
			redirect(base_url('index.php/login'));
		}
	}


	function index(){

		$user = trim($this->session->userdata('user'));	

		$data['header'] = "header/header";
		$data['navbar'] = "navbar/navbar";
		$data['sidebar'] = "sidebar/sidebar";
		$data['body'] = "body/Profile";

		$data["jml_list_ticket"] = $this->modelSidebar->ListTicket();
		$data["jml_approval_ticket"] = $this->modelSidebar->ApproveTicket();
		$data["jml_assigment_ticket"] = $this->modelSidebar->AssignmentTicket();
		$data['profile'] = $this->modelProfile->getProfile($user);
		if($this->session->userdata('level')=="PELANGGAN"){
			$data["jml_my_ticket"] = $this->modelSidebar->MyTicket($user);
		}
		
		$this->load->view('template',$data);
	}

	function update(){
		$data['nama'] = $this->input->post('nama');
		$data['tgllahir'] = $this->input->post('tgllahir');
		$data['alamat'] = $this->input->post('alamat');
		$data['jk'] = $this->input->post('jk');
		$data['notelp'] = $this->input->post('notelp');
		$this->modelProfile->update($data);
	}
}
?>
