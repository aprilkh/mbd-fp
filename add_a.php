<?php 
//include the database connectivity setting
include ('inc/dbconn.php');
if (isset($_POST['input'])) {
	$m_id = $_POST['m_id'];
	$i_id = $_POST['i_id'];
	$m_nama = $_POST['m_nama'];
	$m_alamat = $_POST['m_alamat'];
	$m_nohp = $_POST['m_nohp'];
	$m_email = $_POST['m_email'];
	$m_jk = $_POST['m_jk'];
 
	$query = "INSERT INTO peminjam (`m_id`, `i_id`, `m_nama`, `m_alamat`, `m_nohp`, `m_email`, `m_jk`) VALUES ('$m_id', '$i_id','$m_nama', '$m_alamat', '$m_nohp', '$m_email', '$m_jk')";

	$qr=mysqli_query($sqlconnect,$query);
	if(!$result){
	      die ("Query gagal dijalankan: ".mysqli_errno($link).
	           " - ".mysqli_error($link));
	  }
  }
header("Location: add.php?add=success");
?>