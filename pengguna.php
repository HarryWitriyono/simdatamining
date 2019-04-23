<!DOCTYPE html>
<html>
 <head>
  <title>Manajemen Tabel Pengguna</title>
  <link rel="stylesheet" href="style.css">
 </head>
 <body>
 
  <div class="box">
   <h2>Input Pengguna Baru</h2>
    <form method="post" name="formlogin">
	 <div class="inputBox">
	  <input type="text" required="" name="Username" autocomplete="off">
	  <label>Username</label>
	 </div>
	 <div class="inputBox">
	  <input type="password" required="" name="Password">
	  <label>Password</label>
	 </div>
	 <div class="selectBox">
	  
	  <select name="level">
	    <option value="0" selected>Operator</option>
		<option value="1">Admin</option>
	  </select>
	  <label>Level Pengelola</label>
	 </div>
	 <input type="submit" value="Submit" name="bSubmit">&nbsp;
	 <input type="submit" value="Hapus" name="bHapus" onclick="return confirm('Yakin mau dihapus ?');">&nbsp;
	 <button name="bCari" class="tombol" >Cari</button>
	</form>
  </div>
 </body>
</html>
<?php if (isset($_POST['bSubmit'])) {
  $Username=$_POST['Username'];
  $Password=$_POST['Password'];
  if ((empty($Username)) OR (empty($Password))) exit;
  $koneksi=mysqli_connect("localhost","root","","dmc45");
  $sql="insert into pengguna (Username,Password) values('".$_POST['Username']."','".$_POST['Password']."');";
  $q=mysqli_query($koneksi,$sql);
  if ($q) {
    echo '
   <div class="boxerror">
    <h2>Penyimpaman Rekord</h2>
	<div class="message">
	 Rekord sudah tersimpan !
	</div>
   </div>
   ';
  } else {
    echo '
   <div class="boxerror">
    <h2>Penyimpaman Rekord</h2>
	<div class="message">
	 Rekord belum tersimpan !
	</div>
   </div>
   ';
  }	  
} // end if bSubmit
if (isset($_POST['bHapus'])) {
	echo "Proses Hapussss";
} //end if bHapus
if (isset($_POST['bCari'])) {
	echo "Proses Cari";
} //end if bHapus
?>