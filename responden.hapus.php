<?php if (!isset($_SESSION)) session_start();
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
 <head><title>Hapus Rekord Tabel Responden</title><link rel="stylesheet" href="style.css"></head>
 <body><div class="box"><h2>Hapus Responden</h2>
 <form name="fresponden" method="post" action=""><div class="inputBox">
 <input type="text" name="namaresponden" value="<?php echo $rcari['namaresponden'];?>">
 <label>Nama Responden </label>
 </div>
 <input type="hidden" name="idresponden" value="<?php echo $rcari['idresponden'];?>">
 <input type="submit" value="Hapus Rekord" name="bhapus">
 <input type="submit" value="Batal Hapus" name="bbatal">
 </form>
 </div>
 <?php if (isset($_POST['bhapus'])) {
	 $idresponden=$_POST['idresponden'];
	 $sqlhapus="delete from  responden  where idresponden='".$idresponden."';";
	 $qhapus=mysqli_query($kon,$sqlhapus);
	 if ($qhapus) {
		 echo "<script>alert('Rekord sudah dihapus !');window.location.href='responden.php';</script>";
	 } else {
		 echo "<script>alert('Rekord belum terhapus !');window.location.href='responden.php';</script>";
	 }
 }
 if (isset($_POST['bbatal'])) {
	 echo "<script>window.location.href='responden.php';</script>";
 }
 mysqli_close($kon);
 ?>