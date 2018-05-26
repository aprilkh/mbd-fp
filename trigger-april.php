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
            
    <?php
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

          $query = "SELECT * FROM alat_or WHERE a_id = '$a_id'";
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
                      
                    </tr>';
                }
            ?>
            <?php
          }//end of records
        ?>
        </table>
        <a href="log_trigger.php"> <button class="btn btn-danger btn-block login" type="submit">UPDATE STOK</button></a>
        <?php
        }//end if there are records
      //end db search
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