<!DOCTYPE html>
<html lang="en">
<head>
  <title>Penyewaan Alat Olahraga</title>
  <h3 align="center">Penyewaan Alat Olahraga</h3>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Loading Flat UI Pro -->
    <link href="css/flat-ui-pro.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.png">
  
</head>
<body>
< <?php
include ('inc/dbconn.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['g_nama'])){
        // removes backslashes
	$g_nama = stripslashes($_REQUEST['g_nama']);
        //escapes special characters in a string
	$g_nama = mysqli_real_escape_string($sqlconnect,$g_nama);
	$g_id = stripslashes($_REQUEST['g_id']);
	$g_id = mysqli_real_escape_string($sqlconnect,$g_id);
	//Checking is user existing in the database or not
    $query = "SELECT * FROM pegawai WHERE g_nama='$g_nama' and g_id='$g_id'";
	$result = mysqli_query($sqlconnect,$query) or die(mysqli_error($sqlconnect));
	$rows = mysqli_num_rows($result);

	if($_POST["remember_me"]=='1' || $_POST["remember_me"]=='on')
	     {
	        $hour = time() + 3600 * 24 * 30;
	        setcookie('g_nama', $login, $hour);
	       	setcookie('g_id', $g_id, $hour);
	     }

        if($rows==1){
	    $_SESSION['g_nama'] = $g_nama;
            // Redirect user to index.php
	    header("Location: depan.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?> >

<div class="form" align="center">
	
<h4>Log In</h1><br><br><br><br></h4>

<form action="" method="post" name="login">
<input class="form-control " type="text" align="center" name="g_nama" placeholder="Username" required /><br>
<input class="form-control" type="text" align="center" name="g_id" placeholder="Password" required /><br><br>
<!--  <p class="remember_me">
      <label>
        <input type="checkbox" name="remember_me" id="remember_me">
        Remember me 
      </label>
    </p> -->
<input name="submit" type="submit" value="Login" />
</form>

</div>
<?php } ?>
<script>
                function myFunction() {
                    document.getElementById("myDropdown").classList.toggle("show");
                }

                // Close the dropdown if the user clicks outside of it
                window.onclick = function(event) {
                  if (!event.target.matches('.dropbtn')) {

                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                      var openDropdown = dropdowns[i];
                      if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                      }
                    }
                  }
                }
                </script>
                <?php 
//include the footer
include ("inc/footer.php");?>
</body>
</html>