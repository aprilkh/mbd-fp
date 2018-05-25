<?php 
//include the database connectivity setting
include ("inc/dbconn.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Penyewaan Alat Olahraga</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Loading Flat UI Pro -->
    <link href="css/flat-ui-pro.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/favicon.png">
  
</head>
<body>

<?php 
//include the navigation bar
include ("inc/navbar.php");?>

<div class="container">
	<br>
	<br>
  <div class="row">
    
    <div class="col-md-9" name="maincontent" id="maincontent">
		<div id="exercise" name="exercise" class="panel panel-info">
		<div class="panel-heading"><h5>Add</h5></div>
			<div class="panel-body">

				<form role="form" name="" action="add_a.php" method="POST">
					<div class="form-group">
					  ID Peminjam<input class="form-control" name="m_id" type="text" maxlength="3" 
					  placeholder ="ID Peminjam(Example M01)" required  >
					  ID Instansi<input class="form-control" name="i_id" type="text" maxlength="3" 
					  placeholder ="ID Instansi(Example I01)" required >
					  Nama<input class="form-control" name="m_nama" type="text"required >
					  Jenis Kelamin<input class="form-control" name="m_jk" type="text"required >
					  Alamat<input class="form-control" name="m_alamat" type="text" required >
					  No. Hp<input class="form-control" name="m_nohp" type="text" maxlength="12" required>
					  Email<input class="form-control" name="m_email" type="text"required >
					  <br>
					  <input class="btn btn-embosed btn-primary" type="submit" value="Simpan" >
					</div>
				</form>

				
			</div> <!--body panel main -->
		</div><!--toc -->
    </div><!-- end main content --> 
	
   <div class="col-md-3">
		<?php 
		//include the sidebar menu
		include ("inc/sidebar-menu.php");?>
    </div><!-- end main menu -->
  </div>
</div><!-- end container -->


<?php 
//include the footer
include ("inc/footer.php");?>

</body>
</html>