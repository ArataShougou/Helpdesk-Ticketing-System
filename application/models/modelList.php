<?php  
/**
 * 
 */
class modelList extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getListTiket(){
		$this->db->select('*');
		$this->db->from('ticket a');
		$this->db->join('masalah b','b.id_masalah=a.id_masalah','left');
		$this->db->join('prioritas c','c.id_prioritas=a.id_prioritas','left');	
		$this->db->join('status d','d.id_status=a.id_status','left');
		$this->db->join('profile e','e.Username=a.teknisi','left');
		$this->db->where('a.id_status >', 2);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}
	function getMyTiket($user){
		$this->db->select('*');
		$this->db->from('ticket a');
		$this->db->join('masalah b','b.id_masalah=a.id_masalah','left');
		$this->db->join('prioritas c','c.id_prioritas=a.id_prioritas','left');	
		$this->db->join('status d','d.id_status=a.id_status','left');
		$this->db->join('profile e','e.Username=a.teknisi','left');
		
		$this->db->where('a.pelapor',$user);
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
		$this->db->join('profile e','e.Username=a.teknisi','left');		
		$this->db->where('a.id_tiket',$id);
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

	function updateTeknisi($data){
		$this->db->trans_start();
		$this->db->where('id_tiket', $data['id_tiket']);
		$this->db->update('ticket',$data);
		$this->db->trans_complete();
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

	function updateFeedback($id,$feed){
		$this->db->trans_start();
		$query = $this->db->query("UPDATE TICKET SET feedback ='$feed' WHERE id_tiket='$id'");
		$this->db->trans_complete();
	}
}
?>