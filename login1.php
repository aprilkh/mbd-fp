<?php session_start();
if(isset($_SESSION['user'])) {
header('location:index1.php'); }
include("inc/dbconn.php");
?>
<center>
<form action="login.php" method="post">
<h1>Masuk</h1>
<table>
<tbody>
<tr>
<td>Username</td>
<td>: <input name="user" type="text" /></td>
</tr>
<tr>
<td>Password</td>
<td>: <input name="pass" type="password" /></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" value="Login" /> <input type="reset" value="Batal" /></td>
</tr>
<tr>
<td colspan="2" align="center">Belum Punya akun ? <a href="daftar.php"><b>Daftar</b></a></td>
</tr>
</tbody>
</table>
</form>
</center>