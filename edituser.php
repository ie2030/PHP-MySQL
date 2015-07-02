<?php require 'inc/secure.inc.php';
require 'inc/cust.inc.php';

if (isset($_REQUEST['Submit'])) {
try
{
    $sql="select * from users where   pass = SHA1(:pass)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':pass', $_POST['pass'],PDO::PARAM_STR);
	$stmt->execute();
	$count= $stmt->rowCount();
	if ($count==0) {
       exit("Error ..updating record"); }
    else {
    $sql2 = "UPDATE users SET pass = SHA1(:pass) WHERE username= :user";
    $stmt = $dbh->prepare($sql2);
    $stmt->bindValue(':pass', $_POST['newpass'],PDO::PARAM_STR);
    $stmt->bindValue(':user', $_POST['usname'],PDO::PARAM_STR);
	$stmt->execute();
    exit("User account successfully updated");
    }
}
catch (PDOException $e)
{
   echo '<p id="PDOError">PDO Exception Caught.';
   echo 'Error with the database: <br>';
   echo 'SQL Query: ', $sql;
   echo 'Error: ' . $e->getMessage().'</p>';

}
}


else {

$sql = "SELECT * FROM users";
$stmt = $dbh->prepare($sql);
$stmt->execute();

$count= $stmt->rowCount();
if ($count==0) {
		exit("There are no users!");
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$uname = $row['username'];

?>
<h2>Update User Password</h2>
</p>
<form action = "" method = "post" id = "edituser" class="form-horizontal">
    <fieldset>
    <div class ="form-group">
      <label for="uname" class="col-sm-2 control-label">Username</label>
       <div class="col-sm-10">
       <input type="text" name="usname" id = "usname" readonly value = "<?php echo $uname; ?>">
      </div></div>
     <div class ="form-group">
      <label for="pass" class="col-sm-2 control-label">Password</label>
       <div class="col-sm-10">
       <input type="password" name="pass" id = "pass" required autofocus pattern ="\S{6,}">
      </div></div>
     <div class ="form-group">
		   <label for="newpass" class="col-sm-2 control-label">New Password</label>
       <div class="col-sm-10">
		    <input type="password" id="newpass" name="newpass" required pattern ="\S{6,}">
		</div></div>
     <div class ="form-group">
		   <label for="confirmpass" class="col-sm-2 control-label">New Password</label>
       <div class="col-sm-10">
		    <input type="password" id="confirmpass" name="confirmpass" required pattern ="\S{6,}" >
		</div></div>

         <div class ="fieldarea">
        </div>
	<div class="buttonarea">
    		<input type="submit" value="Update User Record" name = "Submit" id = "Submit">
    		<input type="reset" value="Clear the Info">
	</div>
    </fieldset>
</form>
<?php
 }
?>
</section>
</div>
</body>
<script>
$(document).ready(function(){

$('#edituser').submit(function(evt) {
 var password = $('#newpass').val();
 var passwordConfirm = $('#confirmpass').val();
 if (password && passwordConfirm)
 {
   if ( password === passwordConfirm ) {
     if ($('#fail').length) {
       $('#fail').remove();
     }
     $("#confirmpass").css('background-color','white');
   }
   else {
     if (!$('#fail').length) {
       $('#confirmpass').after("<p id='fail'>The two passwords do not match</p>");
     }
     evt.preventDefault();
     $("#confirmpass").css('background-color','#799');
     $("#confirmpass").focus();
   }
 }
});
});
</script>
</html>