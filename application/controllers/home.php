<?php
/**
 * 
 */
class home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('modelSidebar');
		$this->load->model('modelDashboard');
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
		$data['body'] = "body/dashboard";
		
		$user= trim($this->session->userdata('nama'));
		$level = $this->session->userdata('level');
		if($level === "USER"){
			$data["jml_my_ticket"] = $this->modelSidebar->MyTicket($user);
			$data["jml_list_ticket"] = $this->modelSidebar->ListTicket();
			$data["jml_approval_ticket"] = $this->modelSidebar->ApproveTicket();
			$data["jml_assigment_ticket"] = $this->modelSidebar->AssignmentTicket();
			$data["jml_tiket_user"] = $this->modelDashboard->totalTiket($user);
			$data["jml_tiket_diproses"] = $this->modelDashboard->totalTiketDiproses($user);
			$data["jml_tiket_selesai"] = $this->modelDashboard->totalTiketSelesai($user);
			$data["jml_tiket_ditolak"] = $this->modelDashboard->totalTiketDitolak($user);
			$data["jml_feedback_positiv"]= $this->modelDashboard->feedbackPositive($user);
			$data["jml_feedback_negativ"]= $this->modelDashboard->feedbackNegative($user);
		}else if($level === "ADMIN"){
			$data["jml_my_ticket"] = $this->modelSidebar->MyTicket($user);
			$data["jml_list_ticket"] = $this->modelSidebar->ListTicket();
			$data["jml_approval_ticket"] = $this->modelSidebar->ApproveTicket();
			$data["jml_assigment_ticket"] = $this->modelSidebar->AssignmentTicket();
			$data["jml_tiket_admin"] = $this->modelDashboard->totalTiketAdmin();
			$data["jml_user"] = $this->modelDashboard->totalPengguna();
			$data["jml_teknisi"] = $this->modelDashboard->totalTeknisi();
			$data["jml_presentase_tiket_selesai"] = $this->modelDashboard->presentaseTiketSelesai();
			$data["jml_presentase_tiket_proses"] = $this->modelDashboard->presentaseTiketProses();
			$data["jml_presentase_tiket_approval"] = $this->modelDashboard->presentaseTiketApproval();
			$data["jml_presentase_tiket_ditolak"] = $this->modelDashboard->presentaseTiketDitolak();
		}else if($level === "TEKNISI"){
			$userTeknisi = $this->session->userdata('user');
			$data["jml_tugas_teknisi"] = $this->modelDashboard->totalTugasTeknisi($user);
			$data["jml_tugas_selesai_teknisi"] = $this->modelDashboard->totalTugasSelesaiTeknisi($user);
			$data["jml_tugas_diproses_teknisi"] = $this->modelDashboard->totalTugasDiprosesTeknisi($user);
			$data["jml_Assignment_ticket_teknisi"] = $this->modelSidebar->AssignmentTicketTeknisi($userTeknisi);
		}

		$data["jml_feedback_positiv_All"]= $this->modelDashboard->feedbackPositiveAll();
		$data["jml_feedback_negativ_All"]= $this->modelDashboard->feedbackNegativeAll();

		$this->load->view('template',$data);
	}
}

?>