<?php if (!isset($_SESSION)) session_start();
if (isset($_POST['bSubmit'])) {
 $koneksi=mysqli_connect("localhost","root","","dmc45");
 $sqlcek="select * from pengguna where Username='".$_POST['Username']."' and Password='".$_POST['Password']."';";
 $q=mysqli_query($koneksi,$sqlcek);
 $r=mysqli_fetch_array($q);
 if (!empty($r)) {
   $_SESSION['_user'] = $_POST['Username'];
   echo "<script>window.location.href='index.php';</script>";
  } else {
   //echo "<script>window.alert('Maaf anda tidak diijinkan menggunakan aplikasi ini !');</script>";
   echo '
   <div class="boxerror">
    <h2>Error Login</h2>
	<div class="message">
	 Maaf anda tidak diijinkan menggunakan aplikasi ini !
	</div>
   </div>
   ';
 };
};
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Sistem Informasi Data Mining C.45</title>
  <link rel="stylesheet" href="style.css">
 </head>
 <body class="login">
 
  <div class="box">
   <h2>Login Form</h2>
    <form method="post" name="formlogin">
	 <div class="inputBox">
	  <input type="text" required="" name="Username" autocomplete="off">
	  <label>Username</label>
	 </div>
	 <div class="inputBox">
	  <input type="password" required="" name="Password">
	  <label>Password</label>
	 </div>
	 <input type="submit" value="Submit" name="bSubmit">
	</form>
  </div>
 </body>
</html>