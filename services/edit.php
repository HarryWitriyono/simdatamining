<?php
	include "koneksi.php";
	
	$Username 	= $_POST['Username'];
	
	class emp{}
	
	if (empty($Username)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Error Mengambil Data"; 
		die(json_encode($response));
	} else {
		$query 	= mysql_query("SELECT * FROM pengguna WHERE Username='".$Username."'");
		$row 	= mysql_fetch_array($query);
		
		if (!empty($row)) {
			$response = new emp();
			$response->success = 1;
			$response->Username = $row["Username"];
			$response->Password = $row["Password"];
			$response->level = $row["level"];
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error Mengambil Data";
			die(json_encode($response)); 
		}	
	}
?>