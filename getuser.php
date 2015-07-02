<?php
 require_once 'inc/db.inc.php';
 $email=$_REQUEST["email"];
 $sql="SELECT * FROM customer WHERE Email = :Email";
 $stmt = $dbh->prepare($sql);
 $stmt->bindValue(':Email', $email, PDO::PARAM_STR);
 $stmt->execute();
 $count= $stmt->rowCount();
 if ($count>0) {
   echo('False');
 }  else {
   echo('True');
 }
?>