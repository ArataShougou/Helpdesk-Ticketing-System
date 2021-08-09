<?php  
/**
 * 
 */
class ListTiket extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelList');
		$this->load->model('modelSidebar');
		$this->load->library('pdf');
		if(!$this->session->userdata('user'))
		{
			$this->session->set_flashdata("msg", "<div class='alert alert-info'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Session berakhir silahkan login terlebih dahulu.</div>");
			redirect(base_url('index.php/login'));
		}
	}

	function AllTiket(){

		$data['header'] = "header/header";
		$data['navbar'] = "navbar/navbar";
		$data['sidebar'] = "sidebar/sidebar";
		$data['body'] = "body/ListTiket";

		$data["jml_list_ticket"] = $this->modelSidebar->ListTicket();
		$data["jml_approval_ticket"] = $this->modelSidebar->ApproveTicket();
		$data["jml_assigment_ticket"] = $this->modelSidebar->AssignmentTicket();
		$data['dd_teknisi'] = $this->modelList->getTeknisi();

		$data['tabel'] = $this->modelList->getListTiket();
		// $data['dd_teknisi'] = $this->modelList->getTeknisi();
		$this->load->view('template',$data);
	}

	function MyTiket(){
		$data['header'] = "header/header";
		$data['navbar'] = "navbar/navbar";
		$data['sidebar'] = "sidebar/sidebar";
		$data['body'] = "body/ListTiket";

		$user= trim($this->session->userdata('nama'));
		$data["jml_my_ticket"] = $this->modelSidebar->MyTicket($user);
		$data['tabel'] = $this->modelList->getMyTiket($user);
		$this->load->view('template',$data);
	}

	function printListTiket(){
		$user = $this->session->userdata('user');
		$pdf = new FPDF();
		//membuat halaman baru
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(200,7,'DAFTAR TIKET',0,1,'C');
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,6,'NO',1,0,'C');
		$pdf->Cell(30,6,'ID TIKET',1,0,'C');
		$pdf->Cell(25,6,'PELAPOR',1,0,'C');
		$pdf->Cell(40,6,'MASALAH',1,0,'C');
		$pdf->Cell(30,6,'SUBJEK',1,0,'C');
		$pdf->Cell(30,6,'SLA',1,0,'C');
		$pdf->Cell(30,6,'NAMA TEKNISI',1,1,'C');
		$pdf->SetFont('Arial','',10);
		if($this->session->userdata('level')=="ADMIN"){
			$dataListTiket = $this->modelList->getListTiket();
		}else{
			$dataListTiket = $this->modelList->getMyTiket($user);
		}
		
		$no = 1;
		foreach ($dataListTiket as $row) 
		{
			$pdf->Cell(10,6,$no,1,0,'C');
			$pdf->Cell(30,6,$row["id_tiket"],1,0,'C');
			$pdf->Cell(25,6,$row["pelapor"],1,0,'C');
			$pdf->Cell(40,6,$row["Masalah"],1,0,'C');
			$pdf->Cell(30,6,$row["subjek"],1,0,'C');
			$pdf->Cell(30,6,$row["prioritas"],1,0,'C');
			$pdf->Cell(30,6,$row["Nama"],1,1,'C');
			$no++;	
		}
		if($this->session->userdata('level')=="ADMIN"){
			$pdf->Output('D','ListTiket.pdf');
		}else{
			$pdf->Output('D','MyTiket.pdf');
		}
		

	}

	function getDataById(){
		$id = $this->input->get("id");
		$data = $this->modelList->getTiketById($id);
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
		if ($row['id_status']!='11') {
			echo "<script>$(document).ready(function(){
				$('#feedbackbtn').html('');
			})</script>";
		}
	}
	function getHistory(){
		$id = $this->input->get("id");
		$data = $this->modelList->getTracking($id);
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
		$data = $this->modelList->getPesanLog($id);
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

		$this->modelList->addPesan($pesan);

	}

	function Feedback(){
		$id = $this->input->post('id');
		$feed = $this->input->post('feed');
		$this->modelList->updateFeedback($id,$feed);
	}

}
?>