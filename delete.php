<?php 
//include the database connectivity setting
include ("inc/dbconn.php");

$id = $_GET['G_ID'];
$qr = mysqli_query($mysqli, "DELETE FROM PEGAWAI WHERE G_ID = $id");

header("Location:pegawai.php")
snfksakhgchgckhchgds
?>