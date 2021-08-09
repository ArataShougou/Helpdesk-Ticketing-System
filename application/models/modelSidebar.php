<?php  
class modelSidebar extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	public function ListTicket()
	{
		$query = "SELECT COUNT(id_tiket) AS jml_list_ticket FROM ticket WHERE id_status<='11' OR id_status>='3'";
		$row = $this->db->query($query)->row();
		$data = $row->jml_list_ticket;
		return $data;
	}


	public function ApproveTicket()
	{
		$query = "SELECT COUNT(id_tiket) AS jml_approve_ticket FROM ticket WHERE id_status = 1";
		$row = $this->db->query($query)->row();
		$data = $row->jml_approve_ticket;
		return $data;
	}
	public function AssignmentTicket()
	{
		$query = "SELECT COUNT(id_tiket) AS jml_assigment_ticket FROM ticket WHERE id_status = 3 OR id_status= 4";
		$row = $this->db->query($query)->row();
		$data = $row->jml_assigment_ticket;
		return $data;
	}

	public function AssignmentTicketTeknisi($data){
		$query = "SELECT COUNT(id_tiket) AS jml_Assignment_ticket_teknisi FROM ticket WHERE teknisi ='$data'";
			$row = $this->db->query($query)->row();
		$data = $row->jml_Assignment_ticket_teknisi;
		return $data;
	}

	public function MyTicket($user)
	{
		$query = "SELECT COUNT(id_tiket) AS jml_my_ticket FROM ticket WHERE pelapor = '$user' ";
		$row = $this->db->query($query)->row();
		$data = $row->jml_my_ticket;
		return $data;
	}
}
?>