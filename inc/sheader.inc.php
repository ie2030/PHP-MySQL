<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site Admininstration Area</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="css/mycss2.css" rel="stylesheet" >

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datetimepicker.js"></script>
    
</head>
<body>
<div class = "container">
<div class="row">
<header class="col-md-12">
<h1>Online Bookshop Database Access</h1>
</header>
</div>
<div class="row">

<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
   </button>
</div>

  <!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse">
<ul class="nav navbar-nav">


<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Book Retrieval<b class="caret"></b></a>
<ul class="dropdown-menu">
<?php $action=false;?>
<li><a href="book.php?edit=<?php echo $action; ?>" >All Books</a></li>
<li><a href="SearchBook.php">Search by Title</a></li></ul></li>
</ul></div>
</nav>
</div>

<div class="row">
<section class="col-md-12">