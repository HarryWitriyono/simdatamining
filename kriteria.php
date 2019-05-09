<!DOCTYPE html>
<html>
<head><title>Manejemen Tabel Kriteria</title>
</head>
<body>
<form name="frmkriteria" method="post" action="">
Nama kriteria :<br>
<input type="text" name="txtKriteria">
<input type="submit" value="Simpan" name="bSimpan">
<input type="submit" value="Cari" name="bCari">
</form>
</body>
</html>
<?php 
if (isset($_POST['bSimpan'])){
	$NamaKriteria=$_POST['txtKriteria'];
	$sql="insert into kriteria (NamaKriteria)
	      values ('".$NamaKriteria."');";
	$koneksi=mysqli_connect("localhost","root","","sampelc45");	
	$q=mysqli_query($koneksi,$sql);
	if ($q) {
		echo "<script>alert('Rekord sudah disimpan');</script>";
	} else {
		echo "<script>alert('Rekord tidak  tersimpan');</script>";
	}
}
?>