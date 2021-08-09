<?php
class ApprovalTiket extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('modelApproval');
		$this->load->model('modelSidebar');
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
		$data['body'] = "body/ApprovalTiket";
		$data["jml_list_ticket"] = $this->modelSidebar->ListTicket();
		$data["jml_approval_ticket"] = $this->modelSidebar->ApproveTicket();
		$data["jml_assigment_ticket"] = $this->modelSidebar->AssignmentTicket();
		$data['tabel'] = $this->modelApproval->getDataApproval();
		$this->load->view('template',$data);
	}

	function Approve(){
		$data['id_tiket'] = $this->input->post('id');
		$data['id_status'] = $this->input->post('data');

		$tracking['id_tiket'] = $this->input->post('id');
		$tracking['tgltrack'] = date("Y-m-d  H:i:s"); 
		$tracking['id_status'] = $this->input->post('data');
		$tracking['oleh'] = $this->session->userdata('user');			
		$this->modelApproval->UpdateStatus($tracking,$data);

		$data['id_status'] = 4;
		$tracking['tgltrack'] = date("Y-m-d  H:i:s"); 
		$tracking['id_status'] = 4;			
		$this->modelApproval->UpdateStatus($tracking,$data);
	}

	function getDataById(){
		$id = $this->input->get("id");
		$data = $this->modelApproval->getTiketById($id);
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
	}

	function getHistory(){
		$id = $this->input->get("id");
		$data = $this->modelApproval->getTracking($id);
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

	function getPesan(){
		$id = $this->input->get("id");
		$data = $this->modelApproval->getPesanLog($id);
		$user = $this->session->userdata('user');
		foreach ($data as $row) {
			if($row['Sender']!=$user){
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

		$this->modelApproval->addPesan($pesan);

	}
}
?>