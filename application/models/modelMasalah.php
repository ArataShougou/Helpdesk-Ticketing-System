<?php 
/**
 * 
 */
class modelMasalah extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getMasalah(){
		$query = $this->db->query("SELECT * FROM Masalah ORDER BY id_masalah");
		$row = $query->result_array();
		return $row;
	}

	public function addMasalah($data,$poin){
		$this->db->trans_start();
		$query = $this->db->query("INSERT INTO Masalah(Masalah, Point) VALUES('$data','$poin')");
		$this->db->trans_complete();
		return $this->db->trans_status();
	}

	public function delete($data){
		$this->db->trans_start();
		$query = $this->db->query("DELETE FROM Masalah WHERE id_Masalah = '$data'");
		$this->db->trans_complete();
		return $this->db->trans_status();
	}

	public function update($id,$data,$poin){
		$this->db->trans_start();
		$query = $this->db->query("UPDATE Masalah SET Masalah='$data', Point='$poin' WHERE id_masalah = '$id'");
		$this->db->trans_complete();
		return $this->db->trans_status();
	}
}
 ?>