<?php
require 'inc/orddet.inc.php';
if (isset($_REQUEST['Submit'])) { 
try
{   

  $OrderID=$_POST['OrderID'];
  $BookID=$_POST['BookID'];
  $Quantity=$_POST['Quantity'];

  $ordersdetails->updatedetails($OrderID, $BookID, $Quantity);
  $result =$ordersdetails->allorders();
  $count=count($result);
  if ($count>0)
    {
     $edit=true;
     displayordersdet($result, $edit);
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
 else {

 $OrderID = $_GET['orderid'];
 
 try
 {
 
  $order = $ordersdetails->onedetrec($OrderID, $BookID, $Quantity);
  $OrderID = $orderdetails['OrderID'];
  $BookID = $orderdetails['BookID'];
  $Quantity=$orderdetails['Quantity'];

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
<form action = "" method = "post" id = "orderdetentry" class="form-horizontal">
   <fieldset>
        <legend>Update an Order Record</legend>
    

     <div class ="form-group">
         <label for="OrderID" class="col-sm-2 control-label">Order ID</label>
         <div class="col-sm-10">
         <input type="text" name="OrderID" id="OrderID" class="form-control" maxlength="20"   readonly value = "<?php echo $OrderID ?>">
        </div></div>
  
    <div class ="form-group">
         <label for="BookID" class="col-sm-2 control-label">Book ID</label>
         <div class="col-sm-10">
         <input type="text" name="BookID" id="BookID" class="form-control"   maxlength="20" readonly value = "<?php echo $BookID ?>">
        </div></div>
   
   
  <div class ="form-group">
          <label for="Quantity" class="col-sm-2 control-label">Quantity</label>
          <div class="col-sm-10">
          <input type="text" name="Quantity" id="Quantity"   class="form-control"  maxlength="20"   value = "<?php echo $Quantity ?>">
       </div>
     </div>

  
         <div class="buttonarea">
        <input type="submit" value="Update Details  Record" name = "Submit" onclick="return confirm('Are you sure to update this record?')">
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