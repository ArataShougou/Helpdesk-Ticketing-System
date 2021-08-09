<?php
class AssignmentTiket extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('modelAssignment');
		$this->load->model('modelSidebar');
		$this->load->model('modelNewTiket');
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
		$data['body'] = "body/AssignmentTiket";
		$data['tabel'] = $this->modelAssignment->getDataAssignment();
		$userTeknisi = $this->session->userdata('user');

		$data["jml_list_ticket"] = $this->modelSidebar->ListTicket();
		$data["jml_approval_ticket"] = $this->modelSidebar->ApproveTicket();
		$data["jml_assigment_ticket"] = $this->modelSidebar->AssignmentTicket();
		$data['id_prioritas'] = "";
		$data['dd_teknisi'] = $this->modelAssignment->getTeknisi();


		$this->load->view('template',$data);
	}

	function getDataprioritas(){
		$a = $this->model_app->dropdown_prioritas();
		echo json_encode($a);
	}


	function getDataticket(){
		$id= $_REQUEST["id"];
		$a = $this->modelAssignment->getDataById($id);
		echo json_encode($a);
	}


	function getDataprogress(){
		$id = $_REQUEST['id'];
		$data['progress'] = $this->modelAssignment->getProgress($id);
		echo json_encode($data['progress']);
	}

	public function MyAssignment()
	{
		$data['header'] = "header/header";
		$data['navbar'] = "navbar/navbar";
		$data['sidebar'] = "sidebar/sidebar";
		$data['body'] = "body/MyAssignment";
		$userTeknisi = $this->session->userdata('user');
		$data['tabel'] = $this->modelAssignment->getMyAssignment($userTeknisi);
		$data["jml_list_ticket"] = $this->modelSidebar->ListTicket();
		$data["jml_approval_ticket"] = $this->modelSidebar->ApproveTicket();
		$data["jml_Assignment_ticket_teknisi"] = $this->modelSidebar->AssignmentTicketTeknisi($userTeknisi);
		$data['id_prioritas'] = "";
		$data["dd_status"] = $this->modelAssignment->getStatus(5);

		$this->load->view('template',$data);
	}
	
	function getDataById(){
		$id = $this->input->get("id");
		$data = $this->modelAssignment->getTiketById($id);
		foreach($data as $row){
			if($row["Estimasi"]=="0"){
				$row["Estimasi"]="-";
			}
			echo "	<label class='list-group-item active' id='id_tiket' data-info='".$row["id_tiket"]."'><i class='fas fa-ticket-alt'></i>&nbsp;".$row["id_tiket"]."</label>
			<li class='list-group-item'><label class='col-sm-3'>Tanggal Tiket</label>: ".$row["tgl_tiket"]."</li>
			<li class='list-group-item'><label class='col-sm-3'>Pelapor</label>: ".$row["pelapor"]."</li>
			<li class='list-group-item'><label class='col-sm-3''>Subjek</label>: ".$row["subjek"]."</li>
			<li class='list-group-item'><label class='col-sm-3'>Deskripsi</label>: ".$row["desc"]."</li>
			<li class='list-group-item'><label class='col-sm-3'>Prioritas</label>: ".$row["prioritas"]."</li>
			<li class='list-group-item' id='idstatus' data-info='".$row["id_status"]."'><label class='col-sm-3'>Status</label>: ".$row["nm_status"]."</li>
			<li class='list-group-item'><label class='col-sm-3'>Estimasi </label>: ".$row["Estimasi"]." Hari</li>";
			if($row["feedback"]!=null){
				echo "<li class='list-group-item''><label class='col-sm-3'>Feedback</label>: ".$row["feedback"]."</li>";
			}
			echo "
			<label class='list-group-item active'><i class='fas fa-user-cog'></i>&nbsp;Diproses Oleh </label>
			<li class='list-group-item'><label class='col-sm-3'>Nama Teknisi</label>: ".$row["Nama"]."</li>
			<li class='list-group-item'><label class='col-sm-3'>Proses</label>: ".$row["progress"]."%</li>";
		}
		if ($row['id_status']!='4') {
			echo "<script>$(document).ready(function(){
				$('#accbtn').html('');
			})</script>";
		}
	}

	function getHistory(){
		$id = $this->input->get("id");
		$data = $this->modelAssignment->getTracking($id);
		echo "<label class='list-group-item active'><i class='fas fa-history'></i>&nbsp;Riwayat Tiket</label>";
		echo "<ul class='list-group' style='height:200px;overflow: hidden;overflow-y:scroll;'>";
		foreach($data as $row){
			echo "	<li class='list-group-item'>
			<span>".$row["tgltrack"]."</span>
			<span>".$row["nm_status"]."</span>
			</li>";
		}
		echo "</ul>";
	}

	function setTeknisi(){
		$data['id_tiket'] = $this->input->post("id");
		$data['id_status'] = "5";
		$data['teknisi'] = $this->input->post("teknisi");

		$tracking['id_tiket'] = $this->input->post('id');
		$tracking['tgltrack'] = date("Y-m-d  H:i:s"); 
		$tracking['id_status'] = "5";
		$tracking['oleh'] = $this->session->userdata('user');
		$this->modelAssignment->insertTeknisi($data,$tracking);
	}

	function updateTeknisi(){
		$data['id_tiket'] = $this->input->post("id");
		$data['teknisi'] = $this->input->post("teknisi");
		$this->modelAssignment->updateTeknisi($data);
	}

	function UpdateStByTeknisi(){
		$data['id_tiket'] = $this->input->post("id");
		$data['id_status'] = $this->input->post("st");
		$data['Estimasi'] = $this->input->post("est");


		$tracking['id_tiket'] = $this->input->post('id');
		$tracking['tgltrack'] = date("Y-m-d  H:i:s"); 
		$tracking['id_status'] = $this->input->post("st");
		$tracking['oleh'] = $this->session->userdata('user');
		switch ($this->input->post("st")) {
			case '6':
			$data['progress'] = 18;
			break;
			case '7':
			$data['progress'] = 36;
			break;
			case '8':
			$data['progress'] = 54;
			break;
			case '9':
			$data['progress'] = 72;
			break;
			case '10':
			$data['progress'] = 90;
			break;
			case '11':
			$data['progress'] = 100;
			break;
			default:
			$data['progress'] = 0;
			break;
		}
		$this->modelAssignment->UpdateStFromTeknisi($data,$tracking);
	}

	function getProgress(){
		$id = $this->input->get("id");
		$data = $this->modelAssignment->getProgress($id);
		foreach($data as $row){
			echo "<div class='progress-bar progress-bar-success progress-bar-striped active' role='progressbar' aria-valuenow='".$row['progress']."' aria-valuemin='0' aria-valuemax='100' style='width: ".$row['progress']."%'>
			<span>".$row['progress']." % Complete (Progress)</span>
			</div>";
		}
	}

	function getStatus(){
		$data = $this->modelAssignment->getStatus(6);
		foreach ($data as $tow) {
			echo "<option value='".$row['id_status']."'>".$row['nama_status']."</option>";
		}
	}

	function getPesan(){
		$id = $this->input->get("id");
		$data = $this->modelAssignment->getPesanLog($id);
		foreach ($data as $row) {
			if($row['Sender']!=$this->session->userdata('user')){
				echo "<li class='list-group-item' style='text-align:right;'><span>".$row['Sender']."&nbsp;<i class='fas fa-user'></i></span><br>".$row['Pesan']."&nbsp;<i class='far fa-envelope'></i><br><small>".$row['Tanggal']."</small>&nbsp;<i class='fas fa-calendar-day'></i></li>";
			}else{
				echo "<li class='list-group-item'><span><i class='fas fa-user'></i>&nbsp;".$row['Sender']."</span><br><i class='far fa-envelope'>&nbsp;</i>".$row['Pesan']."<br><i class='fas fa-calendar-day'></i>&nbsp;<small>".$row['Tanggal']."</small></li>";
			}
		}
	}

	function submit_message(){
		$pesan['id_tiket'] = trim($this->input->post('id'));
		$pesan['Tanggal'] = date("Y-m-d  H:i:s");
		$pesan['Pesan'] = trim($this->input->post('pesan'));
		$pesan['Sender'] = $this->session->userdata('user');

		$this->modelAssignment->addPesan($pesan);

	}
}
?>
