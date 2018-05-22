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
		<div class="panel-heading"><h5>Rent Sport Equipment Database</h5></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->
				Tabel Pegawai<br>
		
			<table class="table table-bordered" style="margin-top:10px;"> 
				<tr >
			      <td>G_ID</td>
			      <td>NAMA</td>
			      <td>ALAMAT</td>
			      <td>NOHP</td>
			      <td>TGL MASUK</td>
			      <td>BAGIAN</td>
			      <td>JENIS KELAMIN</td>
			    </tr>
				 <?php
				      include 'inc/dbconn.php';
<<<<<<< Updated upstream
				      $query = "SELECT * FROM pegawai ORDER BY g_id ASC";
				      $qr=mysqli_query($db,$query);
=======
				      $query = "SELECT * FROM pegawai ORDER BY G_ID ASC";
				      $qr=mysqli_query($sqlconnect,$query);
>>>>>>> Stashed changes
				      //mengecek apakah ada error ketika menjalankan query
				      if($qr==false){
						echo ("Query cannot be executed!<br>");
						echo ("SQL Error : ".mysqli_error($sqlconnect));
						}

				      //buat perulangan untuk element tabel dari data mahasiswa
				       // hasil query akan disimpan dalam variabel $data dalam bentuk array
				      // kemudian dicetak dengan perulangan while
				      while($data = mysqli_fetch_array($qr))
				      {
				        // mencetak / menampilkan data
				        echo "<tr>";
				        echo "<td>$data[g_id]</td>"; //menampilkan data id
				        echo "<td>$data[g_nama]</td>"; 
				        echo "<td>$data[g_alamat]</td>";
				        echo "<td>$data[g_nohp]</td>"; 
				        echo "<td>$data[g_tglmasuk]</td>"; 
				        echo "<td>$data[g_bagian]</td>";
				        echo "<td>$data[g_jk]</td>";
				        // membuat link untuk mengedit dan menghapus data
				        echo "<td><a href='edit.php?id=$data[g_id]'>Edit</a>";
						echo "<td><a href='delete.php?id=$data[g_id]'>Delete</a>";

				        echo "</tr>";
				      }
				      ?>
				    </table>

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