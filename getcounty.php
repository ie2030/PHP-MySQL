<?php
 $county=$_REQUEST["choice"];
 require_once 'inc/db.inc.php';
 $sql="SELECT county FROM county WHERE county = :county";
 $stmt = $dbh->prepare($sql);
 $stmt->bindValue(':county', $county, PDO::PARAM_STR);
  $stmt->execute();
 $count= $stmt->rowCount();
 if ($count==0) {
  exit("There are no counties to view!");
 }
 $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
 foreach($result as $row) {
     $county = $row['county'];
     echo "<option value = '$county'>" . $county. "</option>";
 }
?>