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
		<div class="panel-heading"></div>
			<div class="panel-body">
			<!-- ***********Edit your content STARTS from here******** -->
			
				Advance Staff Search <br>
				<form role="form" name="" action="" method="GET">
					<div class="form-group">
					  <input class="form-control" name="staffname" type="text" placeholder="Staff name...">
					  Choose Division 
					  <select class="form-control" name="workdept">
						<option value="B01">Cashier</option>
						<option value="C01">Cleaning Service</option>
						<option value="D01">Employee</option>
						<option value="E11">Security</option>
					  </select>
					  <input class="btn btn-embosed btn-primary" type="submit" value="Search">
					</div>
				</form>
				<hr>
				
				
				<?php
				//check staff name input by the user if null
				if(!isset($_GET['staffname'])){
					echo "Search result here will be displayed here<br>";
					//exit();
				}
				else{//if there's user search - then perform db search
				//Create SQL query
					$staffname=$_GET['staffname'];
					$workdept=$_GET['workdept'];
					$query="select EMPNO, FIRSTNAME, LASTNAME, WORKDEPT, PHONENO
					from employee where (FIRSTNAME like '%$staffname%' or LASTNAME like '%staffname%') 
					AND workdept='$workdept'";
					//Execute the query
					$qr=mysqli_query($db,$query);
					if($qr==false){
						echo ("Query cannot be executed!<br>");
						echo ("SQL Error : ".mysqli_error($db));
					}
					
					//Check the record effected, if no records,
					//display a message

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
						$urlview="view-staff.php?id=$id";
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
