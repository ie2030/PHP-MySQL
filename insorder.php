<?php
require_once 'inc/orderins.inc.php';

if (isset($_REQUEST['Submit'])) {
 
 $CustomerID=$_POST['CustomerID'];
 $OrderDate=$_POST['OrderDate'];
 $Status=$_POST['Status'];


$order->addord($CustomerID, $OrderDate, $Status);
try {
 $result =$order->allorders();
 $count=count($result);
 if ($count>0)
 {

  $edit=false;
  displayorders($result, $edit);
  }
  else exit ("<br>There are no orders to view!");
 }
 catch (PDOException $e)
 {
  echo '<br>PDO Exception Caught.';
  echo 'Error with the database: <br>';
  echo 'SQL Query: ', $sql;
  echo 'Error: ' . $e->getMessage().'</p>';
 }
}
else{
   $result = $customer->allcustomer();
  
?>
	<form action="" class="form-horizontal" method="POST">
   <fieldset>
    <legend>Please Complete the Details</legend>
	
	
     <div class ="form-group">
       <label for="CustomerID" class="col-sm-2 control-label">Customer Name</label>
       <div class="col-sm-10">
        <select name="CustomerID" id = "CustomerID" class="form-control" required>
        <option selected value = "">Select One</option>
		             <?php
		             foreach ($result as $row)
		             {
		             $CustomerID=$row['CustomerID'];
		             $Name=$row['Name'];
					 $Surame=$row['Surname'];
		             echo "<option value='$CustomerID'>$Name $Surame</option>\n";
		             }
            ?>
         </select>
       </div>
       </div>
	 
	 
	 
	 	 
  <div class ="form-group">
	   	 <label for="OrderDate" class=" col-sm-2 control-label">Order Date</label>
	   	 <div class="col-sm-10">
	   		  <div class="input-group date" id='OrderDate' name="OrderDate" data-date-format="yyyy-mm-dd" >
	   		   <input class="form-control" type="text" name="OrderDate" value="<?php echo date("Y-m-d"); ?>" required>
	   		   <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
	   	      </div>
	     </div>
	   </div>


	   
       <div class ="form-group">
          <label for="Status" class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
          <input type="text" name="Status" id="Status"   class="form-control"   value = "<?php echo $Status; ?>">
       </div>
     </div>

	
	 

 <div class="buttonarea">
        <input type="submit" value="Update Order Record" name = "Submit">
		 <input type="reset" value="Clear the Info" name = "Clear Info" >
        <input type="button" value="Cancel" onclick="history.back();" >
       </div>
    </fieldset>
</form>
</section>
</div>
</div>

<?php
}
?>

<script type="text/javascript">
  $(document).ready(function() {
      $('#OrderDate').datepicker({
        startDate: '-1m',
          endDate: '+0d'
      })
  });
  </script>
  


</body>
</html>