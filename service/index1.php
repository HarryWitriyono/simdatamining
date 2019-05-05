<?php 
if (isset($_GET)) {
	@$token=$_GET['t'];
	if ($token != '68e226e94491dcf388957274f4af719caab5dd8b') { //sha1('simdatamining')
		echo '[{"errorid":"001","message":"Ilegal Use API"}]';
		exit();
	} else {
	  @$action=$_GET['a']; //take the action 1st that app want 
	  include ("koneksi.php");
	  if (empty($action)) {
		echo '[{"errorid":"002","message":"Ilegal Use API, missing action type !"}]';
		exit();
	  }
	  if ($action=='login') {
		@$username=$_GET['u'];
	    @$password=$_GET['p'];
		$sql="select * from pengguna where Username = '".$username."' and Password='".$password."'";
		$qcek=mysqli_query($koneksi,$sql);
		$rcek=mysqli_fetch_array($qcek);
		if (empty($rcek)) {
			echo '[{"errorid":"003","message":"Wrong username or password !"}]';
			exit();
		} else {
			echo '[{"errorid":"004","message":"Welcome to Simdatamining C.45"}]';
		}
		mysqli_close($koneksi);
		exit();
	  } // end if action login
	  if ($action=='ir') {
		  @$namaresponden=$_GET['namaresponden'];
		  $sql = "insert into responden (namaresponden) values ('".$namaresponden."')";
		  $q=mysqli_query($koneksi,$sql);
		  if ($q) {
			  echo '[{"errorid":"005","message":"Respoden has saved !"}]';
		  } else {
			  echo '[{"errorid":"006","message":"Respoden has not saved !"}]';
		  }
	  } // end if action inputresponden
	  if ($action=='kr') {
		  @$namaresponden=$_GET['nr'];
		  
	  } // end if action koreksiresponden
    } // end if cek token false or true
}