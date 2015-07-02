<?php
function displayordersdet($result, $edit) {

 echo '<div class="table-responsive">';
 echo '<table class="table table-striped table-hover table-bordered table-condensed">
 <thead>
 <tr>
 <th>Order ID</th>
 <th>Book ID</th>
 <th>Quatntity</th>
</tr>
</thead>';
   
   foreach ($result as $row){
		echo "<tr><td>".$row['OrderID']."</td>";
		$orderid=$row['OrderID'];
		echo "<td>".$row['BookID']."</td>";
		echo "<td>".$row['Quantity']."</td>";
    
	 if ($edit) {
	 	
		echo '<td class="nocol">' . "<a href='updateorderdet.php?orderid=$orderid',  class='btn btn-primary'>Update</a>" . '</td>';
		
		}
	 
   
     echo"</tr>";
   }
  echo '</table>';

}

?>		
		

	


