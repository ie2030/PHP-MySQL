<?php require 'inc/access.inc.php';
if (loggedIn())
{   header('Location:menu.php');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Site Administration Area</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/mycss2.css" rel="stylesheet" >
<link href='css/bootstrap-datetimepicker.min.css' rel="stylesheet">

<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datetimepicker.js"></script>


<body>
<div class = "container">
<div class="row">
<header class="col-md-12">
<h1 class="text-center">Book Shop Database Access</h1>
</header>
</div>
<div class="row">
<div class="col-md-4 startup">
<img src="images/book1.png" alt ="">
</div>
<div class="col-md-4 startup">
<?php $action=false;?>
<a class="start"   data-toggle="modal" href="#login">Book Shop</a>
</div>


<div class="col-md-4 startup">
<img src="images/book2.png" alt ="">
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="login"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Online Bookshop Database Access</h4>
      </div>
      <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="post" class = "form-horizontal">
      <div class="modal-body">
	  	<div class = "form-group">
	  		<label for = "uname" class = "col-lg-2 control-label">Username:</label>
	  		<div class = "col-lg-10">
	  			<input type = "text" class = "form-control" id = "uname" name = "uname" autofocus>
	         </div>
	      </div>
	  	<div class = "form-group">
	  		<label for = "password1" class = "col-lg-2 control-label">Password:</label>
	  		<div class = "col-lg-10">
	  			<input type = "password" class = "form-control" id = "password1" name = "password1">
	         </div>
	      </div>
	  	<div class = "modal-footer">
	  		<a class = "btn btn-default" data-dismiss = "modal" >Close</a>
	  		<button class = "btn btn-primary" type = "submit">Login</button>
	     </div>
	     </form>
	  </div>
	  </div>
</div>
</div>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datetimepicker.js"></script>
</body></html>


