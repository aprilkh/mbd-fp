<?php
// include database connection file
include_once("inc/dbconn.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$a_id = $_POST['a_id'];
	$a_nama=$_POST['a_nama'];
	$a_merk=$_POST['a_merk'];
	$a_hargasewa=$_POST['a_hargasewa'];
	$a_stok=$_POST['a_stok'];
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE alat_or SET a_nama='$a_nama',a_merk='$a_merk',a_hargasewa='$a_hargasewa',a_stok='$a_stok' WHERE a_id=$a_id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$a_id = $_GET['a_id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM alat_or WHERE a_id=$a_id");
 
while($user_data = mysqli_fetch_array($result))
{
	$a_nama = $user_data['a_nama'];
	$a_merk = $user_data['email'];
	$mobile = $user_data['mobile'];
}
?>
<html>
<head>	
	<title>Edit User Data</title>
</head>
 
<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value=<?php echo $name;?>></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value=<?php echo $email;?>></td>
			</tr>
			<tr> 
				<td>Mobile</td>
				<td><input type="text" name="mobile" value=<?php echo $mobile;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>