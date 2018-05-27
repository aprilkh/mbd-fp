<?php session_start();
include ("inc/dbconn.php");
$user = $_POST['user'];
$pass = $_POST['pass'];
$qr = mysql_query($sqlconnect,"SELECT * FROM pegawai WHERE g_nama = '$user' and g_id = 'pass'");
$jumlah = mysql_num_rows($sqlconnect, $qr);
$hasil = mysql_fetch_array($sqlconnect,$qr);
if($jumlah == 0) {
echo "Username Belum Terdaftar!";
echo "<a href='login1.php'>? Back</a>";
} else {
$_SESSION['user'] = $hasil['user'];
header('location:index1.php');
}

?>

<!-- // if(isset($_POST['user'])){
//    $user = $_POST['user'];
//    $pass = $_POST['pass'];

// 	$qr = mysqli_query($sqlconnect, "SELECT * FROM pegawai WHERE g_nama='$user' and g_id='$pass'") or die("error");
// 	$rows = $qr->fetch_assoc();
// 	$nama = $rows['user'];
// 	$passw = $rows['pass'];

// 	if(mysqli_num_rows($qr)>0)
// 	{
// 		$_SESSION['user'] = $nama;
// 		$_SESSION['pass'] = $passw;
// 		header("location : depan.php");
// 	}
// 	else {

// 		echo "<script> alert('Invalid username or password');
// 		window.location.assign('depan.php');
// 		</script>";
// 	}
// }
// else
{
	header("location: depan.php");
	
} -->
<!-- ?> -->