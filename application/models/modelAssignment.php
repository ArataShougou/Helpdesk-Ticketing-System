<?php  
/**
 * 
 */
class modelAssignment extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getDataAssignment(){
	$this->db->select('*');
    $this->db->from('ticket a'); 
    $this->db->join('masalah b', 'b.id_masalah=a.id_masalah', 'left');
    $this->db->join('prioritas c', 'c.id_prioritas=a.id_prioritas', 'left');
    $this->db->join('status d','d.id_status=a.id_status','left');
    $this->db->where('a.id_status',3);
    $this->db->or_where('a.id_status',4);
	$this->db->order_by("a.id_prioritas", "asc");
	$query = $this->db->get();
	$row = $query->result_array();
	return $row;
	}

	// ambil data teknisi sesuai id_teknisi
	function getMyAssignment($data){
		$this->db->select('*');
		$this->db->from('ticket a'); 
	    $this->db->join('masalah b', 'b.id_masalah=a.id_masalah', 'left');
	    $this->db->join('prioritas c', 'c.id_prioritas=a.id_prioritas', 'left');
	    $this->db->join('status d','d.id_status=a.id_status','left');
		$this->db->where('a.teknisi',$data);
		$this->db->order_by("a.id_prioritas", "asc");
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}

	function getDataById($data){
		$this->tabel = "ticket";
		$this->db->select('*');
		$this->db->from($this->tabel);
		$this->db->where('id_tiket',$data);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}

	function getTeknisi(){
		$this->db->select('*');
		$this->db->from('akun a');
		$this->db->join('profile b','b.username=a.username','left');
		$this->db->where('level','TEKNISI');
		$query = $this->db->get();
		
		$value[' '] = '-- PILIH --';
		foreach ($query->result() as $row){
			$value[$row->Username] = $row->Nama;
		}
		return $value;
	}


	function getStatus($id){
		$sql = "SELECT * FROM status WHERE id_status > $id";
		$query = $this->db->query($sql);
		
		$value[''] = '-- PILIH --';
		foreach ($query->result() as $row){
			$value[$row->id_status] = $row->nm_status;
		}
		return $value;
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

	function getProgress($id){
		$this->db->select('progress');
		$this->db->from('ticket');
		$this->db->where('id_tiket',$id);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}

	function insertTeknisi($data,$tracking){
		$this->db->trans_start();
		$this->db->insert('tracking',$tracking);
		$this->db->trans_complete();
		$this->db->trans_start();
		$this->db->where('id_tiket', $data['id_tiket']);
		$this->db->update('ticket',$data);
		$this->db->trans_complete();
	}

	function updateTeknisi($data){
		$this->db->trans_start();
		$this->db->where('id_tiket', $data['id_tiket']);
		$this->db->update('ticket',$data);
		$this->db->trans_complete();
	}

	function UpdateStFromTeknisi($data,$tracking){
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