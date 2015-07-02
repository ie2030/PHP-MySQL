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
<br>
<div class="row">

<section class="col-xs-3">

 <img src="images/book3.png" alt = "book3" class="img-circle img-responsive"> 
  
</section>

<section class="col-xs-3">

 <img src="images/book4.png" alt = "book4" class="img-circle img-responsive"> 
  
</section>

<section class="col-xs-3">

 <img src="images/book5.png" alt = "book5" class="img-circle img-responsive"> 
  
</section>

<section class="col-xs-3">

 <img src="images/book6.png" alt = "book6" class="img-circle img-responsive">
 
</section>

</div>
<div class="row">
<div class="col-md-4 startup">
<img src="images/book7.png" alt ="book7" class="img-circle img-responsive">

</div>
<div class="col-md-3 startup">
<?php $action=false;?>



<ul>
<a class="start" href="book.php?edit=<?php echo $action; ?>">Books</a><br>
<a class="start" href="customer.php?edit=<?php echo $action; ?>">Customers</a><br>
<a class="start" href="order.php?edit=<?php echo $action; ?>">Orders</a><br>
<a class="start" href="orderdet.php?edit=<?php echo $action; ?>">Orders Details</a><br>
<a class="start" href="SearchBook.php?edit=<?php echo $action; ?>">Search</a><br>
<a class="start" href="index1.php?edit=<?php echo $action; ?>">Buy Books</a><br>
</ul>

</div>
<div class="col-md-4 startup">
<img src="images/book8.png" alt ="book8" class="img-circle img-responsive">
</div>
</div>
<br>
<div class="row">

<section class="col-xs-3">

 <img src="images/book9.png" alt = "book9" class="img-circle img-responsive"> 
  
</section>

<section class="col-xs-3">

 <img src="images/book10.png" alt = "book10" class="img-circle img-responsive"> 
  
</section>

<section class="col-xs-3">

 <img src="images/book14.png" alt = "book11" class="img-circle img-responsive"> 
  
</section>
<section class="col-xs-3">

 <img src="images/book15.png" alt = "book12" class="img-circle img-responsive"> 
  
</section>
<section class="col-xs-3">

 <img src="images/book16.png" alt = "book13" class="img-circle img-responsive"> 
  
</section>




</div>

</div>