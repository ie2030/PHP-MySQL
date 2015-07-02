<?php
require 'inc/cust.inc.php';
?>

<script type = "text/javascript">
$(document).ready(function() {
 $('#Email').blur(function() {
     newemail=($(this).val());
     var search = { email:newemail};

     $.ajax({
         type:'POST',
         url:'getuser.php',
         data: search,
         error:processError,
         success: processData
     });
  });
});


function processError(textStatus, xhr) {
    alert("An error occurred: " + xhr.status + " - " + xhr.textStatus);
}
function processData(user) {
      if(user=="False")
      {
          if (! $('#fail').length) {
             $('#Email').after('<p id="fail">This email address has already been chosen - Please enter again</p>');
           }
          $("#Email").css('background-color','#799');
          $("#Email").focus();

      }
      else {
          if ($('#fail').length) {
              $('#fail').remove();
          }
          $("#Email").css('background-color','white');
      }
}
</script>

<?php
if (isset($_REQUEST['Submit'])) {
 $CustomerID=$rand;
 $Name=$_POST['Name'];
 $Surname=$_POST['Surname'];
 $Email=$_POST['Email'];
 $Phone=$_POST['Phone'];
 $AddressLine=$_POST['AddressLine'];
 $City=$_POST['City'];
 $County=$_POST['County'];
 $LastVisit=$_POST['LastVisit'];

$customer->addcustomer($CustomerID, $Name, $Surname, $Email, $Phone, $AddressLine, $City, $County, $LastVisit);
try {
 $result =$customer->allcustomer();
 $count=count($result);
 if ($count>0)
 {

  $edit=false;
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
else{
 ?>




<script type = "text/javascript">
$(document).ready(function(){
$("#county").change(function() {
    var data = { choice:$("#county").val()};
  $("#county").load('getcounty.php',data);
});
});
</script>
<?php
try {
    $sql = "SELECT distinct county FROM county order by county";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $count= $stmt->rowCount();
  if ($count==0) {
      exit("There are no County  available!");
    }
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
  echo $e->getMessage();
}
?>


	<form action=""  class="form-horizontal" method="POST">
	<fieldset>
    <legend>Please Complete the Details</legend>
     
      <div class ="form-group">
       <label for="CustomerID" class="col-sm-2 control-label">CustomerID</label>
       <div class="col-sm-10">
        <input type="text" name="CustomerID" id="CustomerID"  maxlength="3" class="form-control"  title="Please enter a CustomerID  with First Letter capitalised">
       </div>
     </div>
   
	 
     <div class ="form-group">
       <label for="Name" class="col-sm-2 control-label">Name</label>
       <div class="col-sm-10">
        <input type="text" name="Name" id="Name"  maxlength="20" class="form-control" autofocus required pattern = "[A-Z][a-z]+?" title="Please enter a First name  with First Letter capitalised">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="Surname" class="col-sm-2 control-label">Surname</label>
       <div class="col-sm-10">
        <input type="text" name="Surname" id="LastName"  maxlength="20" class="form-control" autofocus required pattern = "[A-Z][a-z]+?" title="Please enter a Last name  with First Letter capitalised">
       </div>
     </div>
	 
     
	 
	   <div class ="form-group">
       <label for="Email" class="col-sm-2 control-label">Email Address</label></td>
       <div class="col-sm-10">
         <input type="email" name="Email" id="Email"  maxlength ="40"  class="form-control" required
     pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$"  title="Please enter valid the Customer Email Address">
       </div>
     </div>

     <div class ="form-group">
       <label for="Phone" class="col-sm-2 control-label">Phone Number</label></td>
       <div class="col-sm-10">
         <input type="text" name="Phone" id="Phone"  maxlength ="20"  class="form-control" required autofocus pattern="\d{10,15}" title="Please enter the Customer Phone Number">
       </div>
     </div>

<div class ="form-group">
       <label for="AddressLine" class="col-sm-2 control-label">Address Line</label>
       <div class="col-sm-10">
        <input type="text" name="AddressLine" id="AddressLine"   maxlength="20" class="form-control" required title="Please enter the Customer Address">
       </div>
     </div>

<div class ="form-group">
       <label for="City" class="col-sm-2 control-label">City</label>
       <div class="col-sm-10">
        <input type="text" name="City" id="City"  maxlength="20" class="form-control" autofocus required pattern = "[A-Z][a-z]+?" title="Please enter a City  with First Letter capitalised">
       </div>
     </div>

	
    <div class ="form-group">
       <label for="County" class="col-sm-2 control-label">County</label>
       <div class="col-sm-10">
        <select name="County" id = "County" class="form-control">
         <option selected value = "">Select County</option>
                 <?php
                 foreach ($result as $row)
                  {
                  $county=$row['county'];
                  echo "<option value='$county'>$county</option>\n";
                 }
                 ?>
             </select>
          </div>
          </div>

  

<div class ="form-group">
      <label for="LastVisit" class=" col-sm-2 control-label">Last Visit</label>
      <div class="col-sm-10">
       <div class="input-group date" id='LastVisit' name="LastVisit" data-date-format="yyyy-mm-dd" >
        <input class="form-control" type="text" name="LastVisit" value="<?php echo $LastVisit; ?>">
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
      </div>
       </div>
    </div>

 <div class="buttonarea">
        <input type="submit" value="Update Order Record" name = "Submit">
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