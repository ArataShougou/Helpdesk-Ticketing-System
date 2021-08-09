<?php
class Kategori extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('modelAssignment');
		$this->load->model('modelSidebar');
		$this->load->model('modelTiket');
		$this->load->model('modelKategori');
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
		$data['body'] = "body/Kategori";
		$data['tabel'] = $this->modelAssignment->getDataAssignment();
		$userTeknisi = $this->session->userdata('user');

		$data["jml_list_ticket"] = $this->modelSidebar->ListTicket();
		$data["jml_approval_ticket"] = $this->modelSidebar->ApproveTicket();
		$data["jml_assigment_ticket"] = $this->modelSidebar->AssignmentTicket();
		$data["kategori_list"] = $this->modelKategori->getKategori();

		$this->load->view('template',$data);
	}

	function addNew(){
		$data = $this->input->post('data');
		if($this->modelKategori->addKategori($data)){
			$info['status'] = success;
			return $info;
		}
	}

	function hapus(){
		$id = $this->input->post('id');
		$this->modelKategori->delete($id);
	}

	function ubah(){
		$id = $this->input->post('id');
		$name = $this->input->post('nama');
		$this->modelKategori->update($id,$name);
	}
}
?>
