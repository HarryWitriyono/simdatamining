<?php if (!isset($_SESSION)) session_start();
if ((!isset($_SESSION['_user'])) && (empty($_SESSION['_user']))) {
  echo "<script>window.location.href='login.php';</script>";
  exit();
}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Manajemen Tabel Responden</title>
  <link rel="stylesheet" href="style.css">
 </head>
 <body>
 <div class="box">
  <h2>Manajemen Tabel Responden</h2>
  <form name="fresponden" method="post" action="">
  <div class="inputBox">
   <input type="text" name="namaresponden"><label>Nama Responden </label>
 </div>
 <input type="submit" value="Simpan" name="bsimpan">
 <input type="submit" value="Cari" name="bcari">
 </form>
 </div>
 <?php $kon=mysqli_connect("localhost","root","","dmc45");
 if (isset($_POST['bsimpan'])) {
	 $namaresponden = $_POST['namaresponden'];
	 $sqlinsert="insert into responden (namaresponden) values ('".$namaresponden."');";
	 $qinsert=mysqli_query($kon,$sqlinsert);
	 if ($qinsert) {
		 echo "<script>alert('Rekord sudah tersimpan !');window.location.href='responden.php';</script>";
	 } else {
		 echo "<script>alert('Rekord belum tersimpan !');window.location.href='responden.php';</script>";
	 }
 }
 if (isset($_POST['bcari'])) {
	 $namaresponden = $_POST['namaresponden'];
	 $sqlcari="select * from responden where namaresponden like '%".$namaresponden."%';";
	 $qcari=mysqli_query($kon,$sqlcari);
	 $rcari=mysqli_fetch_array($qcari);
	 if (empty($rcari)) {
		 echo "<script>alert('Rekord tidak ditemukan !');</script>";
	 } else { 
	   echo "<table align=center><tr><td>Nama Responden</td><td>Koreksi</td><td>Hapus</td></tr>";
	   do {
	   echo "<tr><td>".$rcari['namaresponden']."</td><td><a href='responden.koreksi.php?idresponden=".$rcari['idresponden']."' alt=Koreksi rekord><img src=images/b_edit.png ></a></td><td><a href='responden.hapus.php?idresponden=".$rcari['idresponden']."' alt=Hapus Rekord><img src=images/b_drop.png ></a>
	   </td></tr>";
	   } while ($rcari=mysqli_fetch_array($qcari));
	   echo "</table>";
	 
	 }
 }
 mysqli_close($kon);
 ?>
 </body>
</html>