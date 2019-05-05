<?php
class operasidb {
	private $koneksi;
	function __construct() 
	{
		require_once dirname(__FILE__)."/koneksi.php";
		$db = new koneksidb();
		$this->koneksi = $db->connect();
	} // end if function __construct
	function tambahPengguna($username,$password,$level) {
		$kodesql = $this->koneksi->prepare("insert into pengguna (username,password,level) values (?,?,?)");
		$kodesql->bind_param("ssi",$username,$password,$level);
        if ($kodesql->execute()) {
			return true;
		} else {
			return false;
		} //end if execute tambahPengguna
	} //end if function tambahPengguna
	function bacaPengguna($usernamedicari,$passwordnya){
		$kodesql=$this->koneksi->prepare("select * from pengguna where username=? and password = ?");
		$kodesql->bind_param("ss",$usernamedicari,$passwordnya);
		$kodesql->execute();
		$kodesql->bind_result($username,$password,$level);
		$pengguna=array();
		while($kodesql->fetch()) {
			$rekordpengguna=array();
			$rekordpengguna['username']=$username;
			$rekordpengguna['password']=$password;
			$rekordpengguna['level']=$level;
			array_push($pengguna,$rekordpengguna);
		} //end while
		return $pengguna;
	} //end function bacaPengguna
	function koreksiPengguna($username,$password,$level) {
		$kodesql=$this->koneksi->prepare("update pengguna set password = ?, level = ? where username = ?");
		$kodesql->bind_param("sis",$password,$level,$username);
		if ($kodesql->execute()) {
			return true;
		} else {
			return false;
		} //end if execute koreksiPengguna
	} //end if function koreksiPengguna
	function hapusPengguna($usernamedihapus){
		$kodesql=$this->koneksi->prepare("delete from pengguna where username=?");
		$kodesql->bind_param("s",$usernamedihapus);
		if ($kodesql->execute()) {
			return true;
		} else {
			return false;
		} //end if execute
	} //end function hapusPengguna
} //end of class operasidb
?>