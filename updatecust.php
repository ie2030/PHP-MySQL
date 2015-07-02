<?php
require 'inc/cust.inc.php';


if (isset($_REQUEST['Submit'])) { 
try
{   

	$CustomerID=$_POST['CustomerID'];
  
	$Email=$_POST['Email'];
	$County=$_POST['Phone'];
	$Town=$_POST['AddressLine'];
	$Phone=$_POST['City'];
	$Email=$_POST['County'];

    $customer->updaterecord($CustomerID, $Email, $Phone, $AddressLine, $City, $County);
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

<form action = "" method = "post" id = "customerentry" class="form-horizontal">
    <fieldset><legend>Update a Customer Record</legend>
        <div class ="form-group">
		
         <label for="CustomerID" class="col-sm-2 control-label">Customer ID</label>
         <div class="col-sm-10">
         <input type="text" name="CustomerID" id="CustomerID" class="form-control"  maxlength="9" disabled value = "<?php echo $CustomerID ?>">
        </div></div>
		
        <div class ="form-group">
          <label for="FirstName" class="col-sm-2 control-label">First Name</label>
          <div class="col-sm-10">
         <input type="text" name="FirstName" id="FirstName" class="form-control" value = "<?php echo $Name; ?>">
        </div></div>
		
		<div class ="form-group">
          <label for="LastName" class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-10">
         <input type="text" name="LastName" id="LastName" class="form-control" readonly value = "<?php echo $Surname; ?>">
        </div></div>
		
		<div class ="form-group">
          <label for="DOB" class="col-sm-2 control-label">Date of Birth</label>
          <div class="col-sm-10">
         <input type="date" name="DOB" id="DOB" class="form-control"   value = "<?php echo $Email; ?>">
        </div></div>
		
		<div class ="form-group">
          <label for="Street" class="col-sm-2 control-label">Street</label>
          <div class="col-sm-10">
         <input type="text" name="Street" id="Street" class="form-control"    value = "<?php echo $Phone; ?>">
        </div></div>

        <div class ="form-group">
          <label for="AddressLine" class="col-sm-2 control-label">Address Line</label>
          <div class="col-sm-10">
         <input type="text" name="AddressLine" id="AddressLine" class="form-control"    value = "<?php echo $AddressLine; ?>">
        </div></div>
    
    <div class ="form-group">
          <label for="City" class="col-sm-2 control-label">City</label>
          <div class="col-sm-10">
         <input type="text" name="City" id="City" class="form-control"    value = "<?php echo $City; ?>">
        </div></div>
    
		
		  <div class ="form-group">
	        <label for="county" class="col-sm-2 control-label">County</label>
	        <div class="col-sm-10">
	         <select name="county" id = "county" class="form-control">
	 	       
	 		           <?php 
	 		           foreach ($county as $cc) {
					     $thec=$cc['county'];
	 		            if ($County==$thec)
          {
           echo"<option selected = 'selected' value ='$County'>" . "$County</option>\n";
          }
           else {
             echo"<option value = '$thec'>$thec</option>\n";
          }
		  }
	 		           ?>
	         </select>
	        </div>
	      </div> 
    <div class ="form-group">
     <label for="town" class="col-sm-2 control-label">Town</label>
       <div class="col-sm-10">
	     <select id="town" name = "town" class="form-control" >
		 		 	
				
         </select>
       </div>
     </div>
		 
		
<div class ="form-group">
      <label for="LastVisit" class=" col-sm-2 control-label">Last Visit</label>
      <div class="col-sm-10">
       <div class="input-group date" id='LastVisit' name="LastVisit" data-date-format="yyyy-mm-dd" >
        <input class="form-control" type="text" name="LastVisit" value="<?php echo $LastVisit ?>">
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      </div>
       </div>
    </div>

	 <div class="buttonarea">
        <input type="submit" value="Update Customer Record" name = "Submit">
        <input type="button" value="Cancel" onclick="history.back();" >
       </div>
    </fieldset>
</form>
<?php
}?>
</section>
</div>



<script type="text/javascript">
  $(document).ready(function() {
      $('#LastVisit').datepicker({
        startDate: '-1m',
          endDate: '+0d'
      })
  });
  </script>
</body>
</html>