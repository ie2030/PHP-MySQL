<?php
require_once 'inc/init.inc.php';


if (isset($_REQUEST['Submit'])) {

 $BookID=$_POST['BookID'];
 $Category=$_POST['Category'];
 $Title=$_POST['Title'];
 $Author=$_POST['Author'];
 $Publisher=$_POST['Publisher'];
 $Synopsis=$_POST['Synopsis'];
 $PageNum=$_POST['PageNum'];
 $PubDate=$_POST['PubDate'];
 $ReleaseDate=$_POST['ReleaseDate'];
 $Price=$_POST['Price'];

$book->addbook($BookID, $Category, $Title, $Author, $Publisher, $Synopsis, $PageNum, $PubDate, $ReleaseDate, $Price);
try {
 $result =$book->allbook();
 $count=count($result);
 if ($count>0)
 {
   $edit=false;
   displaybook($result, $edit);
 }
   else exit ("<br>There are no books to view!");
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
$("#publisher").change(function() {
    var data = { choice:$("#publisher").val()};
	$("#publisher").load('getpublisher.php',data);
});
});
</script>
<?php
try {
    $sql = "SELECT distinct publisher FROM publishers order by publisher";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $count= $stmt->rowCount();
	if ($count==0) {
			exit("There are no Publisher  available!");
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
       <label for="BookID" class="col-sm-2 control-label">BookID</label>
       <div class="col-sm-10">
        <input type="text" name="BookID" id="BookID"  maxlength="5" class="form-control" required  pattern="[0-9]{3}" title="Please enter BOOK ID">
       </div>
     </div>
	 
	 	 <div class ="form-group">
       <label for="Category" class="col-sm-2 control-label">Category</label>
       <div class="col-sm-10">
        <input type="text" name="Category" id="Category"  maxlength="3" class="form-control" required  pattern="[0-9]{3}" title="Please enter Category">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="Title" class="col-sm-2 control-label">Title</label>
       <div class="col-sm-10">
        <input type="text" name="Title" id="Title"  maxlength="15" class="form-control"   required placeholder="Enter a Title" title="Please enter Title">
       </div>
     </div>
	 

	 <div class ="form-group">
       <label for="Author" class="col-sm-2 control-label">Author</label>
       <div class="col-sm-10">
        <input type="text" name="Author" id="Author"  maxlength="15" class="form-control"  required placeholder = "Enter a Author" title="Please enter Author">
       </div>
     </div>
	 
	 
	 <div class ="form-group">
       <label for="Publisher" class="col-sm-2 control-label">Publisher</label>
       <div class="col-sm-10">
        <select name="Publisher" id = "Publisher" class="form-control">
	       <option selected value = "">Select Publisher</option>
	 		           <?php
	 		           foreach ($result as $row)
	 		            {
	 		            $publisher=$row['publisher'];
	 		            echo "<option value='$publisher'>$publisher</option>\n";
	 		           }
	 		           ?>
					   </select>
					</div>
					</div>
	 
	 
	 <div class ="form-group">
       <label for="Synopsis" class="col-sm-2 control-label">Synopsis</label>
       <div class="col-sm-10">
        <input type="text" name="Synopsis" id="Synopsis"  maxlength="100" class="form-control" required  pattern="[A-Za-z]{6,}" title="Please enter Synopsis">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="PageNum" class="col-sm-2 control-label">PageNum</label>
       <div class="col-sm-10">
        <input type="text" name="PageNum" id="PageNum"  maxlength="15" class="form-control" required  pattern="[0-9]{2,3}{1,2}[0-9]" title="Please enter PageNum">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="PubDate" class="col-sm-2 control-label">PubDate</label>
       <div class="col-sm-10">
        <input type="text" name="PubDate" id="PubDate"  maxlength="15" class="form-control"  title="Please enter PubDate">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="ReleaseDate" class="col-sm-2 control-label">ReleaseDate</label>
       <div class="col-sm-10">
        <input type="text" name="ReleaseDate" id="ReleaseDate"  maxlength="15" class="form-control"
 title="Please enter ReleaseDate">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="Price" class="col-sm-2 control-label">Price</label></td>
       <div class="col-sm-10">
         <input type="text" name="Price" id="Price"  maxlength ="4"  class="form-control"  title="Please enter the book's daily price">
       </div>
     </div>
	 
<div class = "form-group">
 <div class="col-sm-10 col-sm-offset-2">
       <input type="submit" class="btn btn-primary"value="Insert Book Record" name = "Submit">
       <input type="reset" class="btn btn-primary"value="Clear the Info" >
	 </div>
	 </div>
    </fieldset>
    </form>
<?php
}
?>
</section>
</div>
</div>

</body>
</html>