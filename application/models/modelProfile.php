<?php  
class modelProfile extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getProfile($user){
		$this->db->select('*');
		$this->db->from('profile');
		$this->db->where('username', $user);

		$query = $this->db->get();
		$row = $query->result_array();
		return $row;
	}

	function update($data)
	{
		var_dump($data);
		$user = $this->session->userdata('user');
		$this->db->trans_start();
		$query = $this->db->query("UPDATE PROFILE SET Nama='".$data['nama']."', Tgllahir='".$data['tgllahir']."', Alamat='".$data['alamat']."', JenisKelamin='".$data['jk']."', NoTelp='".$data['notelp']."' WHERE Username='$user'");
		$this->db->trans_complete();
		return $this->db->trans_status();
	}
}
?>