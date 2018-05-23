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

				<form role="form" name="" action="" method="GET">
					<div class="form-group">
					  ID Peminjam<input class="form-control" name="id" type="text" maxlength="3" 
					  placeholder ="ID Peminjam(Example M01)" required >
					  ID Instansi<input class="form-control" name="i_id" type="text" maxlength="3" 
					  placeholder ="ID Instansi(Example I01)" required >
					  Nama<input class="form-control" name="nama" type="text" required>
					  Jenis Kelamin<input class="form-control" name="jk" type="text" required>
					  Alamat<input class="form-control" name="alamat" type="text" required>
					  No. Hp<input class="form-control" name="nohp" type="text" maxlength="12" required>
					  Email<input class="form-control" name="email" type="text" required>
					  <br>
					  <input class="btn btn-embosed btn-primary" type="submit" value="Simpan" >
					</div>
				</form>

				<?php
				include ("inc/dbconn.php");
				//check staff name input by the user if null
				if(!isset($_GET['id'])){
					
				}
				else{//if there's user search - then perform db search
				//Create SQL query
					$id=$_GET['id'];
					$i_id=$_GET['i_id'];
					$nama=$_GET['nama'];
					$alamat=$_GET['alamat'];
					$nohp=$_GET['nohp'];
					$email=$_GET['email'];
					$jk=$_GET['jk'];

					//Execute the query
					$qr=mysqli_query($db,"INSERT INTO peminjam(id,i_id, nama, alamat, nohp, email,jk) 
					values ('$id','$i_id',$nama','$alamat','$nohp', '$email', '$jk')");
					if($qr==false){
						echo ("Query cannot be executed!<br>");
						echo ("SQL Error : ".mysqli_error($db));
					}
					else{//insert successfull
						echo "The new data has been saved...<br>";
						echo "<a href='depan.php?staffname=$firstname'>View $firstname $lastname</a>";
					}
				}
				?>

			
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