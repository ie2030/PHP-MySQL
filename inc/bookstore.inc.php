<?php
function displaybook($result, $edit) {

 echo '<div class="table-responsive">';
 echo '<table class="table table-striped table-hover table-bordered table-condensed"><thead><tr><th>BookID</th><th>Category</th><th>Title</th><th>Author</th>
 <th>Publisher</th><th>Synopsis</th><th>PageNum</th><th>PubDate</th>,<th>ReleaseDate</th>,<th>Price</th></tr></thead>';
   foreach ($result as $row){
	   
	echo "<tr><td>".$row['BookID']."</td>";
	$bookid=$row['BookID'];
	
	echo "<td>".$row['Category']."</td>";
	echo "<td>".$row['Title']."</td>";
	echo "<td>".$row['Author']."</td>";
	echo "<td>".$row['Publisher']."</td>";
	echo "<td>".$row['Synopsis']."</td>";
	echo "<td>".$row['PageNum']."</td>";
	echo "<td>".$row['PubDate']."</td>";
	echo "<td>".$row['ReleaseDate']."</td>";
	echo "<td>".$row['Price']."</td>";
    
	 if ($edit) {
		echo '<td class="nocol">' . "<a href='updatebook.php?bookid=$bookid' class='btn btn-primary'>Update</a>" . '</td>';
		
		echo '<td class="nocol">' . "<a href='deletebook.php?bookid=$bookid' class='btn btn-primary'>Delete</a>". '</td>';
		}
	 

     echo"</tr>";
   }
  echo '</table>';
}


?>