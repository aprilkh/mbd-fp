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
    
    <!-- tampilan view -->
    <div class="col-md-9" name="maincontent" id="maincontent">
        <div id="exercise" name="exercise" class="panel panel-info">
        <div class="panel-heading"><h5>Rent Sport Equipment Database</h5></div>
            <div class="panel-body">
            <!-- ***********Edit your content STARTS from here******** -->
                <h2>Trigger</h2>
                <h3>Mencatat setiap ada instansi baru</h3>

             <form action="trigger-rizvi.php" method="post" name="">
              <table width="80%" border="0">
               <tr> 
                <td>Nama Instansi</td>
                <td><input type="text" name="i_nama"></td>
               </tr>
               <tr> 
                <td>Alamat</td>
                <td><input type="text" name="i_alamat"></td>
               </tr>
               <tr> 
                <td>No. Telp</td>
                <td><input type="number" name="i_notelp"></td>
               </tr>
               <tr> 
                <td></td>
                <td><input type="submit" name="submit" value="Add"></td>
               </tr>
              </table>
             </form>
             

 <?php
 
 if(isset($_POST['submit'])) {
  $i_nama = $_POST['i_nama'];
  $i_alamat = $_POST['i_alamat'];
  $i_notelp = $_POST['i_notelp'];
  
  // include database connection file
  include_once("inc/dbconn.php");
    
  // Insert user data into table
  $qr = mysqli_query($sqlconnect, "INSERT INTO instansi(i_nama,i_alamat,i_notelp) VALUES('$i_nama','$i_alamat','$i_notelp')");
  
  // Show message when user added
  echo "User added successfully. <a href='instansi.php'>View Users</a>";
 }
                 while($data = mysqli_fetch_array($qr)){
                    echo '
                    <tr> 
                        <td> '.$data['i_id'].' </td>
                        <td> '.$data['i_nama'].' </td>
                        <td> '.$data['i_alamat'].' </td>
                        <td> '.$data['i_notelp'].' </td>

                    </tr>';
                }
 
 ?>
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