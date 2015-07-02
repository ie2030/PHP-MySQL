<?php
function displayorders($result, $edit) {

 echo '<div class="table-responsive">';
 echo '<table class="table table-striped table-hover table-bordered table-condensed"><thead><tr><th>OrderID</th><th>CustomerID</th><th>OrderDate</th><th>Status</th>
</tr></thead>';
   foreach ($result as $row){
	echo "<tr><td>".$row['OrderID']."</td>";
	$orderid=$row['OrderID'];
	echo "<td>".$row['CustomerID']."</td>";
	echo "<td>".$row['OrderDate']."</td>";
	echo "<td>".$row['Status']."</td>";
	
    
	 if ($edit) {
		echo '<td class="nocol">' . "<a href='updateord.php?orderid=$orderid' class='btn btn-primary'>Update</a>" . '</td>';
		
		echo '<td class="nocol">' . "<a href='delorder.php?orderid=$orderid' class='btn btn-primary'>Delete</a>". '</td>';
		}
	 

     echo"</tr>";
   }
  echo '</table>';
}


?>

