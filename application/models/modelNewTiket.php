<?php  
/**
 * 
 */
class modelNewTiket extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

	}

	function getNewId()
	{
		$query = $this->db->query("select max(id_tiket) as max_code FROM ticket");

		$row = $query->row_array();

		$max_id = $row['max_code'];
		$max_fix = (int) substr($max_id, 9, 4);

		$max_nik = $max_fix + 1;

		$tanggal = $time = date("d");
		$bulan = $time = date("m");
		$tahun = $time = date("Y");

		$kode = "T".$tahun.$bulan.$tanggal.sprintf("%04s", $max_nik);
		return $kode;
	}


	public function getPointmasalah($id){
		$query = $this->db->query("SELECT Point FROM Masalah WHERE id_masalah='$id'");
		$row = $query->result_array();
		return $row;
	}

	function dropdown_prioritas()
	{
		$sql = "SELECT * FROM prioritas ORDER BY id_prioritas";
		$query = $this->db->query($sql);
		
		$value[''] = '-- PILIH --';
		foreach ($query->result() as $row){
			$value[$row->id_prioritas] = $row->prioritas."  -  (TARGET PROSES ".$row->Waktu_respond." "."HARI)";
		}
		return $value;
	}

	function dropdown_masalah()
	{
		$sql = "SELECT * FROM masalah ORDER BY id_masalah";
		$query = $this->db->query($sql);
		
		$value[''] = '-- PILIH --';
		foreach ($query->result() as $row){
			$value[$row->id_masalah] = $row->Masalah;
		}
		return $value;
	}

	function insertTiket($data,$tracking){
		$this->db->trans_start();
		$this->db->insert('ticket', $data);
		$this->db->insert('tracking', $tracking);
		$this->db->trans_complete();
	}
}
?>