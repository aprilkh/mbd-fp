<?php
session_start();

include 'inc/dbconn.php';

if(isset($_POST['user'])){
   $user = $_POST['user'];
   $pass = $_POST['pass'];

	$qr = mysqli_query($sqlconnect, "SELECT * FROM pegawai WHERE g_nama='$user' and g_id='$pass'") or die("error");
	$data = $qr->fetch_assoc();
	$user = $data['user'];
	$pass = $data['pass'];

	if(mysqli_num_rows($qr)>0)
	{
		$_SESSION['user'] = $name;
		$_SESSION['pass'] = $pass;
		header("location : index.php");
	}
	else{    
    //redirect atau dikembalikan ke halaman beranda
    echo "<script>
    alert('Invalid username or password');
    window.location.assign('depan.php');
    </script>";
	}
}
else {
	header("location: depan.php");
}

?>