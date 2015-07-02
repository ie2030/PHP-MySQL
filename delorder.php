<?php 
require 'inc/ord.inc.php';

if (isset($_REQUEST['Submit'])) {
try
{
    $OrderID=$_POST['OrderID'];;
	
    $order->deleterecord($OrderID);
    $result =$order->allorders();
    $count=count($result);
    if ($count>0)
    {
     $edit=true;
     displayorders($result, $edit);
    }
    else {
 	$result =$order->allorders();
 	$count=count($result);
 	if ($count>0)
 	 {
 	  $edit=true;
 	  displayorders($result, $edit);
 	  }
 	  else exit ("<br>There are no orders to view!");
}
}
catch (PDOException $e)
{
   echo '<br>PDO Exception Caught.';
   echo 'Error with the database: <br>';
   echo 'SQL Query: ', $sql;
   echo 'Error: ' . $e->getMessage().'</p>';
}
}
else {
$OrderID = $_GET['orderid'];

try
{
    $order = $order->onerecord($OrderID);
    $OrderID=$order['OrderID'];
    $CustomerID=$order['CustomerID'];
    $OrderDate=$order['OrderDate'];
	$Status=$order['Status'];
	
}
catch (PDOException $e)
{
   echo '<br>PDO Exception Caught.';
   echo 'Error with the database: <br>';
   echo 'SQL Query: ', $sql;
   echo 'Error: ' . $e->getMessage().'</p>';
}
?>
</p>
  <form action="" class="form-horizontal" method="POST">
   <fieldset>
    <legend>Delete an Order Record</legend>
    

     <div class ="form-group">
         <label for="OrderID" class="col-sm-2 control-label">Order ID</label>
         <div class="col-sm-10">
         <input type="text" name="OrderID" id="OrderID" class="form-control"  readonly  value = "<?php echo $OrderID ?>">
        </div></div>
  
    <div class ="form-group">
         <label for="CustomerID" class="col-sm-2 control-label">Customer ID</label>
         <div class="col-sm-10">
         <input type="text" name="CustomerID" id="CustomerID" class="form-control"   readonly value = "<?php echo $CustomerID ?>">
        </div></div>
   
   
   
     
   <div class ="form-group">
          <label for="OrderDate" class="col-sm-2 control-label">Order Date</label></td>
          <div class="col-sm-10">
          <input type="text" name="OrderDate" id="OrderDate" class="form-control"  readonly value = "<?php  echo $OrderDate ?>" >
        </div></div>


     
       <div class ="form-group">
          <label for="Status" class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
          <input type="text" name="Status" id="Status"   class="form-control"  readonly value =   "<?php echo $Status  ?>">
       </div>
     </div>

  
   
 <div class="buttonarea">
        <input type="submit" value="Delete Order Record" name = "Submit">
        <input type="button" value="Cancel" onclick="history.back();" >
       </div>
    </fieldset>
</form>
<?php
}?>
</section>
</div>
</body>
</html>