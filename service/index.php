<?php
require_once("operasidb.php"); //ambil file class operasidb.php
function adakahParameternya($parameter){
	$ada=true;
	$paremeteryghilang="";
	foreach($parameter as $param){
     if(!isset($_POST[$param]) || strlen($_POST[$param])<=0){
       $ada = false;
	   $paremeteryghilang = $paremeteryghilang . ", " . $param;
	 }
	}
	if(!$ada){
		$response = array();
		$response['error'] = true;
		$response['message'] = 'Parameter: ' .substr($paremeteryghilang, 1, strlen($paremeteryghilang)) . ' tidak ada!';
		//displaying error
		echo json_encode($response);
		//stopping further execution
		die();
		exit();
	}
}//end function adakahParameternya
$response = array();
if(isset($_GET['apicall'])){
	switch($_GET['apicall']){
		case 'tambahPengguna':
		 adakahParameternya(array('username','password','level'));
		 $db = new operasidb();
		 $result = $db->tambahPengguna(
		                $_POST['username'],
						$_POST['password'],
						$_POST['level']);
		 if ($result){
			 //record is created means there is no error
			 $response['error'] = false;
			 //in message we have a success message
			 $response['message'] = 'Record pengguna baru telah disimpan !';
			 //and we are getting all the heroes from the database in the response
			 $response['pengguna'] = $db->bacaPengguna($_POST['username'],$_POST['password']);
		 } else {
			 //if record is not added that means there is an error
			 $response['error'] = true;
			 //and we have the error message
			 $response['message'] = 'Record pengguna baru tidak dapat disimpa !';
		 };
		 break;
		case 'bacaPengguna':
		 adakahParameternya(array('username','password'));
		 $db = new operasidb();
		 $result = $db->bacaPengguna($_POST['username'],$_POST['password']);
		 if (empty($result)) {
			 $response['error'] = true;
			 $response['message'] = 'Record pengguna tidak ada !';
		 } else {
			 $response['error'] = false;
			 $response['message'] = 'Record pengguna ditemukan !';
			 $response['pengguna'] = $db->bacaPengguna($_POST['username'],$_POST['password']);			 
		 }; // end if empty
		 break;
		case 'koreksiPengguna': 
		 adakahParameternya(array('username','password','level'));
		 $db = new operasidb();
		 $result = $db->koreksiPengguna(
		                $_POST['username'],
						$_POST['password'],
						$_POST['level']);
		 if ($result){
			 $response['error'] = false;
			 $response['message'] = 'Record pengguna telah diperbaiki !';
			 $response['pengguna'] = $db->bacaPengguna($_POST['username'],$_POST['password']);
		 } else {
			 $response['error'] = true;
			 $response['message'] = 'Record pengguna tidak dapat diperbaiki !';
		 };
		 break;
		case 'hapusPengguna':
		 adakahParameternya(array('username'));
		 $db = new operasidb();
		 $result = $db->hapusPengguna($_POST['username']);
		 if ($result){
			 $response['error'] = false;
			 $response['message'] = 'Record pengguna telah dihapus !';
		 } else {
			 $response['error'] = true;
			 $response['message'] = 'Record pengguna tidak dapat dihapus !';
		 };
		 break;
    }//end switch apicall
} else { //if it is not api call
         //pushing appropriate values to response array
  $response['error'] = true;
  $response['message'] = 'Invalid API Call';
} //end if isset apicall
  //displaying the response in json structure
echo json_encode($response);
?>