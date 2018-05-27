<?php session_start();
if(!isset($_SESSION['user'])) {
header('location:login1.php'); }
else { $user = $_SESSION['user']; }
include("inc/dbconn.php");
$query = mysql_query("SELECT * FROM pegawai WHERE g_nama = '$user' and g_id = '$pass'");
$hasil = mysql_fetch_array($query);
?>