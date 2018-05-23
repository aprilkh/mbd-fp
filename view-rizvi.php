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
    <section id="intro" class="intro">
            <div class="slogan">
                <h2>View</h2>
                <h3>Menampilkan alat yang paling banyak rusak</h3>
            </div>
        <div class="transparan1">
            <table class="table table-bordered"> 
            <tr>
                <td>Nama Alat</td>
                <td>Jumlah Rusak</td>
                <td>Total Denda</td>
            </tr>
            <?php
                include 'inc/dbconn.php';
                $query = "SELECT * FROM view_rizvi";
                $qr=mysqli_query($sqlconnect,$query);

                while($data = mysqli_fetch_array($qr)){
                    echo '
                    <tr>
                        <td> '.$data['a_nama'].' </td>
                        <td> '.$data['d_jumlahrusak'].' </td>
                        <td> '.$data['d_totalharga'].' </td>
                    </tr>';
                }
            ?>
        </table>

        </div>
    </section>
    


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script> 
    <script src="js/jquery.scrollTo.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>