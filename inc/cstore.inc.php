<?php

function displaycustomer($result, $edit) {
 echo '<div class="table-responsive">';
 echo '<table class="table table-striped table-hover table-bordered table-condensed">
 <thead><tr>
 <th>CustomerID</th>
 <th>Name</th>
 <th>Surname</th>
 <th>Email</th>
 <th>Phone</th>
 <th>AddressLine</th>
 <th>City</th>
 <th>County</th>
 <th>LastVisit</th>
 </tr></thead>';
  foreach ($result as $row) {
	 echo "<tr><td>".$row['CustomerID']."</td>";
	$customerid=$row['CustomerID'];
	
	 echo "<td>".$row['Name']."</td>";
     echo "<td>".$row['Surname']."</td>";
     echo "<td>".$row['Email']."</td>";
     echo "<td>".$row['Phone']."</td>";
	 echo "<td>".$row['AddressLine']."</td>";
	 echo "<td>".$row['City']."</td>";
	 echo "<td>".$row['County']."</td>";
	 echo "<td>".$row['LastVisit']."</td>";
	 
     
	  if ($edit) {
		echo '<td class="nocol">' . "<a href='updatecust.php?customerid=$customerid' class='btn btn-primary'>Update</a>" . '</td>';
	
		echo '<td class="nocol">' . "<a href='delcust.php?customerid=$customerid' class='btn btn-primary'>Delete</a>". '</td>';
		}
	  }

     echo"</tr>";
   }
  echo '</table>';




?>