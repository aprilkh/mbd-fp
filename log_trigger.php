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
    

    <!-- tampilan TRIGGER -->
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
            </form><br>
<form name="update" method="post" action="trigger-april.php">
		<table border="0">
			<!-- <tr> 
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
			<tr>  -->
				<td>Stok</td>
				<td><input type="text" name="stok" value=<?php echo $a_stok;?>></td>
			</tr>
			<!-- <tr> 
				<td>Tanggal Perubahan</td>
				<td><input type="text" name="stok" value=<?php echo $tanggal_perubahan;?>></td>
			</tr>
			<tr> 
				<td>Status</td>
				<td><input type="text" name="stok" value=<?php echo $status;?>></td>
			</tr>
			<tr> -->
				<td><input type="hidden" name="a_id" value=<?php echo $_GET['a_id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
<?php
// include database connection file
include_once("inc/dbconn.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	// $a_id = $_POST['a_id'];
 //    $a_nama = $_POST['a_nama'];
 //    $a_merk = $_POST['a_merk'];
 //    $a_hargasewa = $_POST['a_hargasewa'];
    $a_stok = $_POST['a_stok'];
    $tanggal_perubahan = $_POST['tanggal_perubahan'];
    $status = $_POST['status'];
		
	// update user data
	$qr = mysqli_query($sqlconnect, "UPDATE trigger_april SET a_nama='$a_nama',a_merk='$a_merk',a_hargasewa='$a_hargasewa',a_stok='$a_stok',tanggal_perubahan='$tanggal_perubahan',status='$status' WHERE a_id=$a_id");
	
	// Redirect to homepage to display updated user in list
	header("Location: trigger-april.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$a_id = $_POST['a_id'];
 
// Fetech user data based on id
$qr = mysqli_query($sqlconnect, "SELECT * FROM trigger_april");

while($data = mysqli_fetch_array($qr))
{
	$a_id = $data['a_id'];
	$a_nama = $data['a_nama'];
	$a_merk = $data['a_merk'];
	$a_hargasewa = $data['a_hargasewa'];
	$a_stok = $data['a_stok'];
	$tanggal_perubahan = $data['tanggal_perubahan'];
	$status = $data['status'];
}
?>
   <!-- <?php
    include 'inc/dbconn.php';
    if(!isset($_GET['a_id'])){
          
          //exit();
        }else{//if there's user search - then perform db search
        //Create SQL query
          $a_id = $_GET['a_id'];
          $a_nama = $_GET['a_nama'];
          $a_merk = $_GET['a_merk'];
          $a_hargasewa = $_GET['a_hargasewa'];
          $a_stok = $_GET['a_stok'];
          // $tanggal_perubahan = $_GET['tanggal_perubahan'];
          // $status = $_GET['status'];

          $query = "SELECT * FROM trigger_april WHERE a_id = '$a_id'";
          //Execute the query
          $qr=mysqli_query($sqlconnect,$query);
          if($qr==false){
            echo ("Query cannot be executed!<br>");
            echo ("SQL Error : ".mysqli_error($sqlconnect));
          }
          if(mysqli_num_rows($qr)==0)
          {
          echo ("Sorry, seems that no record found by the keyword $g_id...<br>");
          }
          else
          {//there is/are record(s)
          ?>
            <h5>Search result for the  "<?php echo $a_id; ?>"</h5><br>

            <table class="table table-bordered"> 
            <tr>
                <td>A_ID</td>
			    <td>NAMA</td>
			    <td>MERK</td>
			    <td>HARGASEWA</td>
		        <td>STOK</td>
		        <td>tgl_perubahan</td>
       			<td>status</td>
 	        </tr>

            <?php
                include 'inc/dbconn.php';
                
                while($data = mysqli_fetch_assoc($qr)){
                    echo '
                    <tr>
                        <td> '.$data['a_id'].' </td>
                        <td> '.$data['a_nama'].' </td>
                        <td> '.$data['a_merk'].' </td>
                        <td> '.$data['a_hargasewa'].' </td>
                        <td> '.$data['a_stok'].' </td>
                        <td> '.$data['tanggal_perubahan'].' </td>
                        <td> '.$data['status'].' </td>
                    </tr>';
                }
            ?>
            <?php
          }//end of records
        ?>
        </table>
        <?php
        }//end if there are records
      //end db search
      ?> -->
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