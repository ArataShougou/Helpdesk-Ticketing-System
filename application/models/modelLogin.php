<?php
/**
 * 
 */
class modelLogin extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function ceklogin($usermail,$pass){
		$query = $this->db->query("SELECT level, username FROM akun WHERE (BINARY username = '$usermail' OR email = '$usermail') AND BINARY password = '$pass'");
		if($query->num_rows() == 0 ){
			return false;
		}else{
			return true;
		}
	}
	function getlevel($user, $pass){
		$this->db->select('a.level , a.username , b.nama');
		$this->db->from('akun a');
		$this->db->join('profile b', 'b.username=a.username', 'left');
		$this->db->where('a.username',$user,TRUE);
		$this->db->or_where('a.email',$user,TRUE);
		$this->db->where('a.password',$pass,TRUE);
		$query = $this->db->get();
		if($query->result()){
			foreach ($query->result_array() as $row)
			{
				$data = array('level'=>$row['level'],'user'=>$row['username'],'nama'=>$row['nama']);
			}

			return $data;
		}else{
			echo "gagal";
		}
	}
}
?>