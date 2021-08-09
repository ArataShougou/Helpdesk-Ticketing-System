<?php  
/**
 * 
 */
class modelKategori extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getKategori(){
		$query = $this->db->query("SELECT * FROM KATEGORI ORDER BY id_kategori");
		$row = $query->result_array();
		return $row;
	}

	public function addKategori($data)
	{
		$this->db->trans_start();
		$query = $this->db->query("INSERT INTO KATEGORI(nama_kategori) VALUES('$data')");
		$this->db->trans_complete();
		return $this->db->trans_status();
	}

	public function delete($data)
	{
		$this->db->trans_start();
		$query = $this->db->query("DELETE FROM KATEGORI WHERE id_kategori = '$data'");
		$this->db->trans_complete();
		return $this->db->trans_status();
	}

	public function update($id,$data)
	{
		$this->db->trans_start();
		$query = $this->db->query("UPDATE KATEGORI SET nama_kategori='$data' WHERE id_kategori = '$id'");
		$this->db->trans_complete();
		return $this->db->trans_status();
	}
}
?>