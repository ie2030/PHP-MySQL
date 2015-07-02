<?php
 $publishers=$_REQUEST["choice"];
 require_once 'inc/db.inc.php';
 $sql="SELECT publisher FROM publishers WHERE publisher = :publisher";
 $stmt = $dbh->prepare($sql);
 $stmt->bindValue(':publisher', $publishers, PDO::PARAM_STR);
  $stmt->execute();
 $count= $stmt->rowCount();
 if ($count==0) {
  exit("There are no publisher to view!");
 }
 $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
 foreach($result as $row) {
     $publisher = $row['publisher'];
     echo "<option value = '$publisher'>" . $publisher. "</option>";
 }
?>