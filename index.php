<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Employee Account</title>
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link href="//fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet" type="text/css">
<link href="/content/css/account.css?7" rel="stylesheet" type="text/css">
</head>
<body><div class="container push-top">
<div class="row">
<div class="col-md-4 col-md-offset-4 push-top">
<div class="area">
<h3><i class="ion-cloud"></i> Login<b>Area</b></h3>
<hr />
<!-- 
<?php
	// include ('login.php');?> -->

<form method="post" action="login.php">
<div class="form-group">
<label for="user">Username</label>
<input class="form-control" name="username" id="user" type="text" required/>
</div>
<div class="form-group">
<label for="pass">Password </label>
<input class="form-control" name="password" id="pass" type="password"required />
</div>
<hr>
<div class="form-group">
<input class="pull-left btn btn-default" type="submit" value="Login" />
<div class="clearfix"></div>
</div>
</form>

</div>
</div>
</div>
</div>
</body>
</html>