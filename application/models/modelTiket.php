<?php 
/**
 * 
 */
class modelTiket extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getMyTiket($user){
	$this->db->select('*');
		$this->db->from('ticket a');
		$this->db->join('kategori b','b.id_kategori=a.id_kategori','left');
		$this->db->join('prioritas c','c.id_prioritas=a.id_prioritas','left');		
		$this->db->join('status d','d.id_status=a.id_status','left');
		$this->db->join('teknisi e','e.id_teknisi=a.id_teknisi','left');		
		$this->db->where('a.pelapor',$user);
		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}

	public function dropdown_kategori()
	{
		$sql = "SELECT * FROM kategori ORDER BY nama_kategori";
		$query = $this->db->query($sql);
		
		$value[''] = '-- PILIH --';
		foreach ($query->result() as $row){
			$value[$row->id_kategori] = $row->nama_kategori;
		}
		return $value;
	}

	public function dropdown_kondisi()
	{
		$sql = "SELECT * FROM kondisi ORDER BY nama_kondisi";
		$query = $this->db->query($sql);
		
		$value[''] = '-- PILIH --';
		foreach ($query->result() as $row){
			$value[$row->id_kondisi] = $row->nama_kondisi."  -  (TARGET PROSES ".$row->waktu_respon." "."HARI)";
		}
		return $value;
	}


	   function GetDataTracking($data){
		$this->db->select('*');
	    $this->db->from('tracking a'); 
	    $this->db->join('ticket b', 'b.id_tiket=a.id_tiket', 'left');
        $this->db->where('a.id_tiket', $data);

         $query = $this->db->get();
         $row = $query->result_array();
        return $row;
    }


    public function savetracking($tracking){
		$this->db->trans_start();
		$this->db->insert('tracking', $tracking);
		$this->db->trans_complete();

	}
}
?>