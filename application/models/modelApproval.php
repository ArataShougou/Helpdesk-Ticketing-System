<?php
/**
 * 
 */
class modelApproval extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getDataApproval(){
		$this->db->select('*');
		$this->db->from('ticket a');
		$this->db->join('status b','b.id_status=a.id_status','left');
		$this->db->join('prioritas c','c.id_prioritas=a.id_prioritas','left');
		$this->db->where('b.id_status',1);
		$this->db->order_by("a.id_prioritas", "asc");
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}

	function getTiketByID($id){
		$this->db->select('*');
		$this->db->from('ticket a');
		$this->db->join('masalah b','b.id_masalah=a.id_masalah','left');
		$this->db->join('prioritas c','c.id_prioritas=a.id_prioritas','left');	
		$this->db->join('status d','d.id_status=a.id_status','left');
		$this->db->join('profile e','e.username=a.teknisi','left');			
		$this->db->where('a.id_tiket',$id);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}

	function getTracking($id){
		$this->db->select('*');
		$this->db->from('tracking a');
		$this->db->join('status b','b.id_status=a.id_status','left');
		$this->db->where('a.id_tiket',$id);
		$this->db->order_by('a.id_tracking', 'asc');
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;

	}

	function UpdateStatus($tracking,$data){
		$this->db->trans_start();
		$this->db->insert('tracking',$tracking);
		$this->db->trans_complete();
		$this->db->trans_start();
		$this->db->where('id_tiket', $data['id_tiket']);
		$this->db->update('ticket',$data);
		$this->db->trans_complete();
	}
	
	function addPesan($data){
		$this->db->trans_start();
		$this->db->insert('pesanlog', $data);
		$this->db->trans_complete();
	}
	function getPesanLog($id){
		$this->db->select('*');
		$this->db->from('pesanlog');
		$this->db->where('id_tiket', $id);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
}
?>