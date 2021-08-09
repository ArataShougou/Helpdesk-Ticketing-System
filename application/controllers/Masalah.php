<?php
class Masalah extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('modelAssignment');
		$this->load->model('modelSidebar');
		$this->load->model('modelTiket');
		$this->load->model('modelMasalah');
		if(!$this->session->userdata('user'))
		{
			$this->session->set_flashdata("msg", "<div class='alert alert-info'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Session berakhir silahkan login terlebih dahulu.</div>");
			redirect(base_url('index.php/login'));
		}

	}


	public function index(){

		$data['header'] = "header/header";
		$data['navbar'] = "navbar/navbar";
		$data['sidebar'] = "sidebar/sidebar";
		$data['body'] = "body/Masalah";
		$data['tabel'] = $this->modelAssignment->getDataAssignment();
		$userTeknisi = $this->session->userdata('user');

		$data["jml_list_ticket"] = $this->modelSidebar->ListTicket();
		$data["jml_approval_ticket"] = $this->modelSidebar->ApproveTicket();
		$data["jml_assigment_ticket"] = $this->modelSidebar->AssignmentTicket();
		$data["Masalah_list"] = $this->modelMasalah->getMasalah();

		$this->load->view('template',$data);
	}

	function addNew(){
		$data = $this->input->post('data');
		$poin = $this->input->post('point');
		if($this->modelMasalah->addMasalah($data,$poin)){
			$info['status'] = success;
			return $info;
		}
	}

	function hapus(){
		$id = $this->input->post('id');
		$this->modelMasalah->delete($id);
	}

	function ubah(){
		$id = $this->input->post('id');
		$name = $this->input->post('nama');
		$poin = $this->input->post('point');
		$this->modelMasalah->update($id,$name,$poin);
	}
}
?>
