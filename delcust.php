<?php
require_once 'inc/cust.inc.php';

if (isset($_REQUEST['Submit'])) {
try
{   


    $CustomerID=$_POST['CustomerID'];
    $customer->deleterecord($CustomerID);
    $result =$customer->allcustomer();
    $count=count($result);
    if ($count>0)
    {
     $edit=true;
     displaycustomer($result, $edit);
    }
     else exit ("<br>There are no customers to view!");
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

$CustomerID = $_GET['customerid'];


 try
 {
    $customer = $customer->onecustomer($CustomerID);
    $CustomerID= $customer['CustomerID'];
    $Name = $customer['Name'];
    $Surname = $customer['Surname'];
    $Email=$customer['Email'];
    $Phone=$customer['Phone'];
    $AddressLine=$customer['AddressLine'];
    $City=$customer['City'];
    $County=$customer['County'];
    $LastVisit=$customer['LastVisit'];
  
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



<form action = "" method = "post" id = "bookentry" class="form-horizontal">
    <fieldset><legend>Delete a Customer Record</legend>
       <div class ="form-group">
       <label for="CustomerID" class="col-sm-2 control-label">Customer ID</label>
       <div class="col-sm-10">
        <input type="text" name="CustomerID" id="CustomerID"  class="form-control"  maxlength="20" readonly value = "<?php echo $CustomerID ?>">
       </div>
     </div>
   
     <div class ="form-group">
       <label for="Name" class="col-sm-2 control-label">Name</label>
       <div class="col-sm-10">
        <input type="text" name="Name" id="Name"   class="form-control"  value = "<?php echo $Name; ?>">
       </div>
     </div>
   
   <div class ="form-group">
       <label for="Surname" class="col-sm-2 control-label">Surname</label>
       <div class="col-sm-10">
        <input type="text" name="Surname" id="Surname"  class="form-control"    readonly value = "<?php echo $Surname; ?>">
       </div>
     </div>
   

   <div class ="form-group">
       <label for="Email" class="col-sm-2 control-label">Email</label>
       <div class="col-sm-10">
        <input type="text" name="Email" id="Email"   class="form-control"   readonly value = "<?php echo $Email; ?>">
       </div>
     </div>
   
   
       <div class ="form-group">
          <label for="Phone" class="col-sm-2 control-label">Phone</label>
          <div class="col-sm-10">
          <input type="text" name="Phone" id="Phone"   class="form-control"   readonly value = "<?php echo $Phone; ?>">
       </div>
     </div>
   
   <div class ="form-group">
       <label for="AddressLine" class="col-sm-2 control-label">AddressLine</label>
       <div class="col-sm-10">
        <input type="text" name="AddressLine" id="AddressLine" class="form-control" readonly value = "<?php echo $AddressLine; ?>">
       </div>
     </div>
   
   <div class ="form-group">
       <label for="City" class="col-sm-2 control-label">City</label>
       <div class="col-sm-10">
        <input type="text" name="City" id="City"  class="form-control" readonly value = "<?php echo $City;?>">
       </div>
     </div>
   
   <div class ="form-group">
       <label for="County" class="col-sm-2 control-label">County</label>
       <div class="col-sm-10">
        <input type="text" name="County" id="County" class="form-control"  readonly value = "<?php echo $County; ?>">
       </div>
     </div>
   
   <div class ="form-group">
       <label for="LastVisit" class="col-sm-2 control-label">Last Visit </label>
       <div class="col-sm-10">
        <input type="text" name="LastVisit" id="LastVisit"   class="form-control" readonly value = "<?php echo $LastVisit; ?>">
       </div>
     </div>
   
   <div class ="form-group">
       <label for="Price" class="col-sm-2 control-label">Price</label></td>
       <div class="col-sm-10">
         <input type="text" name="Price" id="Price" class="form-control"  readonly value = "<?php echo $Price; ?>">
       </div></div>
     
     
   
<div class="buttonarea">
        <input type="submit" value="Delete Customer  Record" name = "Submit" onclick="return confirm('Are you sure to delete this record?')">
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