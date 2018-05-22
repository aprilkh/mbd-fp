<?php 
//include the database connectivity setting
include_once ("inc/dbconn.php");

$id = $_GET['G_ID'];
$query = mysqli_query($db, "DELETE FROM pegawai WHERE G_ID = $id");

header("Location:pegawai.php");
?>