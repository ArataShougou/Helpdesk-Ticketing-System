<?php

	class modelDashboard extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}


	function totalTiket($user){

		$query = "SELECT COUNT(a.id_tiket) AS jml_tiket_user FROM ticket a 
		LEFT JOIN profile b on b.Nama = a.pelapor WHERE b.Nama ='$user'";
		$row = $this->db->query($query)->row();
		$data = $row->jml_tiket_user;
		return $data;
	}

	function totalTiketDiproses($user){

		$query = "SELECT COUNT(a.id_tiket) AS jml_tiket_diproses FROM ticket a 
		LEFT JOIN profile b on b.Nama = a.pelapor WHERE b.Nama ='$user' AND a.id_status > 3 AND a.id_status < 11";
		$row = $this->db->query($query)->row();
		$data = $row->jml_tiket_diproses;
		return $data;
	}

	function totalTiketSelesai($user){

		$query = "SELECT COUNT(a.id_tiket) AS jml_tiket_selesai FROM ticket a 
		LEFT JOIN profile b on b.Nama = a.pelapor WHERE b.Nama ='$user' AND a.id_status=11";
		$row = $this->db->query($query)->row();
		$data = $row->jml_tiket_selesai;
		return $data;
	}

		function totalTiketDitolak($user){

		$query = "SELECT COUNT(a.id_tiket) AS jml_tiket_ditolak FROM ticket a 
		LEFT JOIN profile b on b.Nama = a.pelapor WHERE b.Nama ='$user' AND a.id_status=2";
		$row = $this->db->query($query)->row();
		$data = $row->jml_tiket_ditolak;
		return $data;
	}


	function feedbackPositive($user){
		$query = "SELECT COUNT(a.feedback) AS jml_feedback FROM ticket a LEFT JOIN profile b on b.Nama = a.pelapor WHERE b.Nama = '$user' AND feedback IS NOT NULL";
		$row_feedback = $this->db->query($query)->row();

		$sql_feedback_positiv = "SELECT COUNT(feedback) AS jml_feedback_positiv FROM ticket WHERE feedback ='POSITIF'";
		$row_feedback_positiv = $this->db->query($sql_feedback_positiv)->row();

		if($row_feedback_positiv->jml_feedback_positiv == 0)
		{
		$data = 0;
		}
		else
		{
			if($row_feedback->jml_feedback == 0 ){
				$data = 0 * 100;
			}else{
		$data = ($row_feedback_positiv->jml_feedback_positiv / $row_feedback->jml_feedback )* 100;	
		}	
	}

		return $data;
	}


	function feedbackNegative($user){
		$query = "SELECT COUNT(a.feedback) AS jml_feedback FROM ticket a LEFT JOIN profile b on b.Nama = a.pelapor WHERE b.Nama = '$user' AND feedback IS NOT NULL";
		$row_feedback = $this->db->query($query)->row();

		$sql_feedback_negativ = "SELECT COUNT(feedback) AS jml_feedback_negativ FROM ticket WHERE feedback ='NEGATIF'";
		$row_feedback_negativ = $this->db->query($sql_feedback_negativ)->row();

		if($row_feedback_negativ->jml_feedback_negativ == 0)
		{
		$data = 0;
		}
		else
		{
			if($row_feedback->jml_feedback == 0 ){
				$data = 0 * 100;
			}else{
		$data = ($row_feedback_negativ->jml_feedback_negativ / $row_feedback->jml_feedback )* 100;	
		}	
	}

		return $data;
	}


	function feedbackPositiveAll(){
		$query = "SELECT COUNT(feedback) AS jml_feedback FROM ticket WHERE feedback IS NOT NULL";
		$row_feedback = $this->db->query($query)->row();

		$sql_feedback_positiv = "SELECT COUNT(feedback) AS jml_feedback_positiv_All FROM ticket WHERE feedback ='POSITIF'";
		$row_feedback_positiv = $this->db->query($sql_feedback_positiv)->row();

		if($row_feedback_positiv->jml_feedback_positiv_All == 0)
		{
		$data = 0;
		}
		else
		{
		$data = ($row_feedback_positiv->jml_feedback_positiv_All / $row_feedback->jml_feedback )* 100;	
		}	

		return $data;
	}


	function feedbackNegativeAll(){
		$query = "SELECT COUNT(feedback) AS jml_feedback FROM ticket WHERE  feedback IS NOT NULL";
		$row_feedback = $this->db->query($query)->row();

		$sql_feedback_negativ = "SELECT COUNT(feedback) AS jml_feedback_negativ_All FROM ticket WHERE feedback ='NEGATIF'";
		$row_feedback_negativ = $this->db->query($sql_feedback_negativ)->row();

		if($row_feedback_negativ->jml_feedback_negativ_All == 0)
		{
		$data = 0;
		}
		else
		{
		$data = ($row_feedback_negativ->jml_feedback_negativ_All / $row_feedback->jml_feedback )* 100;	
		}	

		return $data;
	}


	function totalTiketAdmin(){
		$query = "SELECT COUNT(id_tiket) AS jml_tiket_admin FROM ticket WHERE id_status<='11' OR id_status>='3' ";
		$row = $this->db->query($query)->row();
		$data = $row->jml_tiket_admin;
		return $data;
	}

	function totalPengguna(){
		$query = "SELECT COUNT(Username) AS jml_user FROM akun ";
		$row = $this->db->query($query)->row();
		$data = $row->jml_user;
		return $data;
	}

	function totalTeknisi(){
		$query = "SELECT COUNT(Username) AS jml_teknisi FROM akun WHERE LEVEL ='TEKNISI'";
		$row = $this->db->query($query)->row();
		$data = $row->jml_teknisi;
		return $data;
	}


	function presentaseTiketSelesai(){
		$sql_ticket_solved = "SELECT COUNT(id_tiket) AS jml_tiket_selesai FROM ticket where id_status = 11";
		$row_ticket_solved = $this->db->query($sql_ticket_solved)->row();

		$sql_jml_tiket = "SELECT COUNT(id_tiket) AS jml_tiket FROM ticket ";
		$row_jml_tiket = $this->db->query($sql_jml_tiket)->row();

		if($row_ticket_solved->jml_tiket_selesai == 0)
		{
		$data = 0;
		}
		else
		{
		$data = ($row_ticket_solved->jml_tiket_selesai / $row_jml_tiket->jml_tiket )* 100;	
		}	

		return $data;
	}


	function presentaseTiketProses(){
		$sql_ticket_proccess = "SELECT COUNT(id_tiket) AS jml_tiket_proses FROM ticket where id_status > 3 AND id_status < 11";
		$row_ticket_proccess = $this->db->query($sql_ticket_proccess)->row();

		$sql_jml_tiket = "SELECT COUNT(id_tiket) AS jml_tiket FROM ticket ";
		$row_jml_tiket = $this->db->query($sql_jml_tiket)->row();

		if($row_ticket_proccess->jml_tiket_proses == 0)
		{
		$data = 0;
		}
		else
		{
		$data = ($row_ticket_proccess->jml_tiket_proses / $row_jml_tiket->jml_tiket )* 100;	
		}	

		return $data;
	}

	function presentaseTiketApproval(){
		$sql_ticket_approval = "SELECT COUNT(id_tiket) AS jml_tiket_approval FROM ticket where id_status=1";
		$row_ticket_approval = $this->db->query($sql_ticket_approval)->row();

		$sql_jml_tiket = "SELECT COUNT(id_tiket) AS jml_tiket FROM ticket ";
		$row_jml_tiket = $this->db->query($sql_jml_tiket)->row();

		if($row_ticket_approval->jml_tiket_approval == 0)
		{
		$data = 0;
		}
		else
		{
		$data = ($row_ticket_approval->jml_tiket_approval / $row_jml_tiket->jml_tiket )* 100;	
		}	

		return $data;
	}


	function presentaseTiketDitolak(){
		$sql_ticket_ditolak = "SELECT COUNT(id_tiket) AS jml_tiket_ditolak FROM ticket where id_status=2";
		$row_ticket_ditolak = $this->db->query($sql_ticket_ditolak)->row();

		$sql_jml_tiket = "SELECT COUNT(id_tiket) AS jml_tiket FROM ticket ";
		$row_jml_tiket = $this->db->query($sql_jml_tiket)->row();

		if($row_ticket_ditolak->jml_tiket_ditolak == 0)
		{
		$data = 0;
		}
		else
		{
		$data = ($row_ticket_ditolak->jml_tiket_ditolak / $row_jml_tiket->jml_tiket )* 100;	
		}	

		return $data;
	}


	function totalTugasTeknisi($data){
		$query = "SELECT COUNT(id_tiket) AS jml_tugas_teknisi FROM ticket WHERE teknisi ='$data'";
			$row = $this->db->query($query)->row();
		$data = $row->jml_tugas_teknisi;
		return $data;
	}


	function totalTugasDiprosesTeknisi($data){
		$query = "SELECT COUNT(id_tiket) AS jml_tugas_diproses_teknisi FROM ticket WHERE teknisi ='$data' AND id_status > 3 AND id_status < 11";
			$row = $this->db->query($query)->row();
		$data = $row->jml_tugas_diproses_teknisi;
		return $data;
	}


	function totalTugasSelesaiTeknisi($data){
		$query = "SELECT COUNT(id_tiket) AS jml_tugas_selesai_teknisi FROM ticket WHERE teknisi ='$data' AND id_status=11";
			$row = $this->db->query($query)->row();
		$data = $row->jml_tugas_selesai_teknisi;
		return $data;
	}



}

?>