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
		<div class="panel-heading"><h5>Peminjaman Alat Olahraga</h5></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->
			
				
				<?php
				
				//display a message
				if(mysqli_num_rows($qr)==0)
				{
					echo ("Sorry, seems that no record found by the keyword $staffname...<br>");
				}//end no record
				else
				{//there is/are record(s)
				?>
					<h5>Search result for the staff "<?php echo $staffname; ?>"</h5><br>
					<table width="90%" class="table table-hover">
						<thead>
							<tr >
								<th>Employee no.</th>
								<th>Firstname</th>
								<th>Lastname</th>
								<th>Department</th>
								<th>Phone</th>
							</tr>
						</thead>
				<?php
					while ($rekod=mysqli_fetch_array($qr)){//redo to other records
				?>
					<tr>
						<td>
						<?php
						$id=$rekod['EMPNO'];
						echo $id;
						$urlview="viewstaff.php?id=$id";
						?>
						<a href="<?php echo $urlview?>" class="btn" title="View complete staff info" 
						data-toggle="tooltip" > 
							<span class="fui-window"></span></a>
						
						</td>
						<td><?php echo $rekod['FIRSTNAME']?></td>
						<td><?php echo $rekod['LASTNAME']?></td>
						<td><?php echo $rekod['WORKDEPT']?></td>
						<td><?php echo $rekod['PHONENO']?></td>
					</tr>
				<?php
					}//end of records
				?>
				</table>
				<?php
				}//end if there are records
			}//end db search
			?>
			
			<!-- ***********Edit your content ENDS here******** -->	
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
