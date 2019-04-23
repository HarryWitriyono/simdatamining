<?php if (!isset($_SESSION)) session_start();
if ((!isset($_SESSION['_user'])) && (empty($_SESSION['_user']))) {
  echo "<script>window.location.href='login.php';</script>";
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>&#128332 Aplikasi Data Mining dengan Algoritma C.45</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="biasa">
<div id="menupengguna" alt="Logout"><a href="logout.php" alt"Logout">&#10687;</a></div>
<div id="header">Aplikasi Data Mining dengan Algoritma C.45</div>
<div id="navbar">
  <a href="index.php">Beranda &#127968;</a>
  <div id="dropdown">
    <div id="dropbtn">Tabel &#9196;</div>
    <div id="dropdown-content">
      <a href="kriteria.php" target="frameUtama">&#128199 Tabel Kriteria </a>
      <a href="subkriteria.php" target="frameUtama">&#128196 Tabel Sub Kriteria </a>
	  <a href="responden.php" target="frameUtama">&#128188 Tabel Responden </a>
	  <a href="pengguna.php" target="frameUtama">&#128188 Tabel Pengguna </a>
    </div>
  </div> 
  <div id="dropdown">
    <div id="dropbtn">Perhitungan C.45 &#9196;</div>
    <div id="dropdown-content">
      <a href="training.php" target="frameUtama">&#128187 Training</a>
	  <a href="hasilperhitungan.php" target="frameUtama">&#128186 Hasil Perhitungan</a>
    </div>
  </div>
  <a href="biodata.html"  target="frameUtama">Tentang Aku &#129333</a>
</div> <!-- end of div navbar -->
<div id="content">
<iframe src="beranda.html" width="100%" height="470px" name="frameUtama" frameborder="0"></iframe>
</div>
<div id="footer">(C)2019 by Harry Witriyono, M.Kom</div>

</body>
</html>