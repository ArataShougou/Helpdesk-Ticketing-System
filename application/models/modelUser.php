<?php  
/**
 * 
 */
class modelUser extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getUser(){
	$this->db->select('*');
    $this->db->from('akun');

	$query = $this->db->get();
	$row = $query->result_array();
	return $row;
	}

	function adduser($data1,$data2,$data3,$data4)
	{
		$tanggal = date("Y-m-d  H:i:s");
		$this->db->trans_start();
		$query1 = $this->db->query("INSERT INTO AKUN(Username,Password,Email,Level) VALUES('$data1','$data2','$data3','$data4')");
		$query2 = $this->db->query("INSERT INTO PROFILE(Username,Nama,TglBuat) VALUES('$data1','$data1','$tanggal')");
		$this->db->trans_complete();
		return $this->db->trans_status();
	}

	function delete($data)
	{
		$this->db->trans_start();
		$query1 = $this->db->query("DELETE FROM AKUN WHERE username = '$data'");
		$query2 = $this->db->query("DELETE FROM PROFILE WHERE username = '$data'");
		$this->db->trans_complete();
		return $this->db->trans_status();
	}

	function update($user,$level)
	{
		$this->db->trans_start();
		$query = $this->db->query("UPDATE AKUN SET level='$level' WHERE username = '$user'");
		$this->db->trans_complete();
		return $this->db->trans_status();
	}
}
?>