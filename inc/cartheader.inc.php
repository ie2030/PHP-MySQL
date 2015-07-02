<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shopping Cart</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/mycss.css" rel="stylesheet" >
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<body>
<header class="navbar  navbar-banner" role="banner">
<div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse"
        data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
 <nav class="collapse navbar-collapse" role="navigation">
 <form class="navbar-form navbar-right" action ="index1.php" method="post" role="search">
         <div class="form-group">
           <input type="text" class="form-control" id = "title" name = "title" placeholder="Search by Title">
         </div>
         <button type="submit" class="btn btn-default" name = "Find">Search</button>
      </form>
  <ul class="nav navbar-nav navbar-right">
 </ul>
  </nav>
  </div>
</header>
<div id = "outer">
<div class = "container">
<div class="row">
</body>