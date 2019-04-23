<?php if (!isset($_SESSION)) session_start();
unset($_SESSION['_user']);
echo "<script>window.location.href='login.php';</script>";
?>