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
                <h2>Join</h2>
                <h3>Menampilkan  alat yang belum pernah di sewa</h3>

            <table class="table table-bordered"> 
            <tr>
                <td>ID Alat</td>
                <td>Nama Alat</td>
                <td>Merk</td>
            </tr>
            <?php
                include 'inc/dbconn.php';
                $query = "SELECT a.a_id, a.a_nama, a.a_merk
                        FROM alat_or a
                        LEFT JOIN penyewaan s ON s.a_id = a.a_id
                        WHERE s.s_id IS NULL
                        ORDER BY s.s_id ";
                $qr=mysqli_query($sqlconnect,$query);

                while($data = mysqli_fetch_array($qr)){
                    echo '
                    <tr>
                        <td> '.$data['a_id'].' </td>
                        <td> '.$data['a_nama'].' </td>
                        <td> '.$data['a_merk'].' </td>
                    </tr>';
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