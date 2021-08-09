<?php  
/**
 * 
 */
class NewTiket extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelSidebar');
		$this->load->model('modelNewTiket');
		if(!$this->session->userdata('user'))
		{
			$this->session->set_flashdata("msg", "<div class='alert alert-info'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Session berakhir silahkan login terlebih dahulu.</div>");
			redirect(base_url('index.php/login'));
		}
	}

	function index()
	{
		$data['header'] = "header/header";
		$data['navbar'] = "navbar/navbar";
		$data['sidebar'] = "sidebar/sidebar";
		$data['body'] = "body/FormTiket";

		$user= trim($this->session->userdata('nama'));
		$data["jml_my_ticket"] = $this->modelSidebar->MyTicket($user);
		// $data['dd_prioritas'] = $this->modelNewTiket->dropdown_prioritas();
		$data['dd_masalah'] = $this->modelNewTiket->dropdown_masalah();
		$this->load->view('template',$data);
	}

	function forwardChain($data1,$poinPemakaian){
		$x = $this->modelNewTiket->getPointmasalah($data1);
		foreach ($x as $row ) {
			$poinMasalah = $row["Point"];
		}
		$bobot = ($poinMasalah + $poinPemakaian) / 2;
		if($bobot > 4 && $bobot <= 5) {
			return 1;
		}else if($bobot > 3 && $bobot <= 4){
			return 2;
		}else if($bobot > 2 && $bobot <= 3){
			return 3;
		}else if($bobot > 0 && $bobot <= 2){
			return 4;
		}
	}

	function save(){
		$id_tiket = $this->modelNewTiket->getNewId();
		$tanggal = date("Y-m-d  H:i:s");
		$user= trim($this->session->userdata('user'));
		$penggunaan = trim($this->input->post('tktPenggunaan'));
		$data['id_tiket'] = $id_tiket;
		$data['pelapor'] = trim($this->input->post('reprt'));
		$data['id_masalah'] = trim($this->input->post('id_masalah'));
		$data['id_prioritas'] = $this->forwardChain($data['id_masalah'],$penggunaan);
		$data['subjek'] = trim($this->input->post('subjek'));
		$data['desc'] = trim($this->input->post('desc'));
		$data['progress'] = 0;
		$data['id_status'] = 1;
		$data['tgl_tiket'] = $tanggal;

		$tracking['id_tiket'] = $id_tiket;
		$tracking['tgltrack'] = $tanggal;
		$tracking['id_status'] = 1;
		$tracking['oleh'] = $user;

		$this->modelNewTiket->insertTiket($data, $tracking);

	}
}
?>