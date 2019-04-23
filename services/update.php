<?php
	include "koneksi.php";
	
	$Username 	= $_POST['Username'];
	$Password 	= $_POST['Password'];
	$level = $_POST['level'];
	
	class emp{}
	
	if (empty($Username) || empty($Password) || empty($level)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Kolom isian tidak boleh kosong"; 
		die(json_encode($response));
	} else {
		$query = mysql_query("UPDATE pengguna SET Password='".$Password."', level='".$level."' WHERE Username='".$Username."'");
		
		if ($query) {
			$response = new emp();
			$response->success = 1;
			$response->message = "Data berhasil di update";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error update Data";
			die(json_encode($response)); 
		}	
	}
?>