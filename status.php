<?php
session_start();
include "config.php";
$userid = $_SESSION['EMPLOYEEID'];
$id = $_POST["IDnotif"];
$pesan = mysql_query("update notifikasi set STATUS='1' WHERE  NOTIFIKASIID='$id'");
?>
