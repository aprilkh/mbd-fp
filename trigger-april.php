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
    

    <!-- tampilan index -->
    <div class="col-md-9" name="maincontent" id="maincontent">
        <div id="exercise" name="exercise" class="panel panel-info">
        <div class="panel-heading"><h5>Rent Sport Equipment Database</h5></div>
            <div class="panel-body">
                <h2>Trigger</h2>
                <h3>Mencatat setiap ada update jumlah stok pada tabel alat OR</h3>
    
            <form class="form-inline" role="form" name="" action="" method="GET">
              <div class="form-group">
                <input class="form-control" name="a_id" type="text" placeholder="ID ALat OR(Ex: A01)">
                <input class="btn btn-embosed btn-primary" type="submit" value="Search">
              </div>
            </form>
    <?php
      include 'log.php';
      $query = "SELECT * FROM log_snack ORDER BY id_snack ASC";
      $result = mysqli_query($link, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($conn));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
       // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($data = mysqli_fetch_assoc($result))
      {
        // mencetak / menampilkan data
        echo "<tr>";
        echo "<td>$data[id_snack]</td>"; //menampilkan data nama
        echo "<td>$data[nama_snack]</td>"; //menampilkan data fakultas
        echo "<td>$data[harga_persnack]</td>"; //menampilkan data jurusan
        echo "<td>$data[deskripsi_snack]</td>";
        echo "<td>$data[tgl_perubahan]</td>";
        echo "<td>$data[status]</td>"; //menampilkan data nama
        echo "</tr>";
      }
      ?>
<html>
<head>	
	<title>Edit User Data</title>
</head>
 
<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="update" method="post" action="trigger-april.php">
		<table border="0">
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="name" value=<?php echo $a_nama;?>></td>
			</tr>
			<tr> 
				<td>Merk</td>
				<td><input type="text" name="merk" value=<?php echo $a_merk;?>></td>
			</tr>
			<tr> 
				<td>Harga Sewa</td>
				<td><input type="text" name="harga sewa" value=<?php echo $a_hargasewa;?>></td>
			</tr>
			<tr> 
				<td>Stok</td>
				<td><input type="text" name="stok" value=<?php echo $a_stok;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="a_id" value=<?php echo $_GET['a_id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
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