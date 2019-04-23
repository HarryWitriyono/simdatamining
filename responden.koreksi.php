<?php 
 if (!isset($_SESSION)) session_start();
 if ((!isset($_SESSION['_user'])) && (empty($_SESSION['_user']))) {
  echo "<script>window.location.href='login.php';</script>";
  exit();
}
 $kon=mysqli_connect("localhost","root","","dmc45");
 $idresponden=$_GET['idresponden'];
 $sqlcari="select * from responden where idresponden='".$idresponden."'";
 $qcari=mysqli_query($kon,$sqlcari);
 $rcari=mysqli_fetch_array($qcari);
?>
<!DOCTYPE html>
<html>
 <head><title>Koreksi Tabel Responden</title><link rel="stylesheet" href="style.css"></head>
 <body><div class="box"><h2>Koreksi Responden</h2>
 <form name="fresponden" method="post" action="">
 <div class="inputBox"><input type="text" name="namaresponden" value="<?php echo $rcari['namaresponden'];?>"><label>Nama Responden </label>
 </div>
 <input type="hidden" name="idresponden" value="<?php echo $rcari['idresponden'];?>">
 <input type="submit" value="Simpan Hasil Koreksi" name="bsimpan">
 </form>
 </div>
 <?php if (isset($_POST['bsimpan'])) {
	 $idresponden=$_POST['idresponden'];
	 $namaresponden=$_POST['namaresponden'];
	 $sqlkoreksi="update responden set namaresponden='".$namaresponden."' where idresponden='".$idresponden."';";
	 $qkoreksi=mysqli_query($kon,$sqlkoreksi);
	 if ($qkoreksi) {
		 echo "<script>alert('Rekord sudah tersimpan !');window.location.href='responden.php';</script>";
	 } else {
		 echo "<script>alert('Rekord belum tersimpan !');window.location.href='responden.php';</script>";
	 }
 }
 mysqli_close($kon);
 ?>