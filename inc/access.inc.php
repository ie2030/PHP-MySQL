<?php
require 'db.inc.php';
session_start();

// Process login attempt
if (isset($_POST['uname'])) {


     $password = SHA1($_POST['password1']);
     $sql = "select * from users where username = :username and pass
	 = :password";
     $stmt = $dbh->prepare($sql);
     $stmt->bindParam(':username', $_POST['uname'], PDO::PARAM_STR);
     $stmt->bindParam(':password', $password, PDO::PARAM_STR);
     $stmt->execute();
     $count= $stmt->rowCount();

     if ($count==1)
     {
   	   $_SESSION['authorized'] = TRUE;
     }
}


//Determines whether user is logged in
function loggedIn()
{
  return isset($_SESSION['authorized']);
}


// Process logout
if (isset($_REQUEST['logout'])) {
  unset($_SESSION['authorized']);
}
?>
