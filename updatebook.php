<?php
require_once 'inc/init.inc.php';
if (isset($_REQUEST['Submit'])) {
try
{   
	 //assign form inputs
	$BookID = $_POST['BookID'];
	$Category = $_POST['Category'];
	$Synopsis = $_POST['Synopsis'];
	$Price = $_POST['Price'];
   
   $book->updatebook($BookID, $Category, $Synopsis, $Price);
    $result =$book->allbook();
    $count=count($result);
    if ($count>0)
    {
     $edit = true;
     displaybook($result, $edit);
    }
     else exit ("<br>There are no car to view!");
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
$BookID = $_GET['bookid'];

 try
 {
   $book = $book->onebook($BookID);
    $BookID = $book['BookID'];
    $Category = $book['Category'];
    $Title = $book['Title'];
    $Author = $book['Author'];
    $Publisher = $book['Publisher'];
	$Synopsis = $book['Synopsis'];
	$PageNum = $book['PageNum'];
	$PubDate = $book['PubDate'];
	$ReleaseDate = $book['ReleaseDate'];
	$Price = $book['Price'];
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
    <fieldset><legend>Update a Book Record</legend>
       <div class ="form-group">
       <label for="BookID" class="col-sm-2 control-label">BookID</label>
       <div class="col-sm-10">
        <input type="text" name="BookID" id="BookID"  class="form-control"  maxlength="9"  disabled value = "<?php echo $BookID ?>">
       </div>
     </div>
	 
	 	 <div class ="form-group">
       <label for="Category" class="col-sm-2 control-label">Category</label>
       <div class="col-sm-10">
        <input type="text" name="Category" id="Category"   class="form-control"  value = "<?php echo $Category; ?>">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="Title" class="col-sm-2 control-label">Title</label>
       <div class="col-sm-10">
        <input type="text" name="Title" id="Title"  class="form-control"    readonly value = "<?php echo $Title; ?>">
       </div>
     </div>
	 

	 <div class ="form-group">
       <label for="Author" class="col-sm-2 control-label">Author</label>
       <div class="col-sm-10">
        <input type="text" name="Author" id="Author"   class="form-control"   readonly value = "<?php echo $Author; ?>">
       </div>
     </div>
	 
	 
	     <div class ="form-group">
          <label for="pub" class="col-sm-2 control-label">Publisher</label>
          <div class="col-sm-10">
          <select name = "pub" id="pub" disabled = "disabled"class="form-control" >

        <?php
        foreach($publisher as $publisher)
        {
          if ($pub==$publisher)
          {
           echo"<option selected = 'selected' value ='$pub'>" . "$pub</option>\n";
          }
           else {
             echo"<option value = '$publisher'>$publisher</option>\n";
          }
        }
        ?>
        </select>
        </div></div>
	 
	 <div class ="form-group">
       <label for="Synopsis" class="col-sm-2 control-label">Synopsis</label>
       <div class="col-sm-10">
        <input type="text" name="Synopsis" id="Synopsis" class="form-control" value = "<?php echo $Synopsis; ?>">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="PageNum" class="col-sm-2 control-label">PageNum</label>
       <div class="col-sm-10">
        <input type="text" name="PageNum" id="PageNum"  class="form-control" readonly value = "<?php echo $PageNum;?>">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="PubDate" class="col-sm-2 control-label">PubDate</label>
       <div class="col-sm-10">
        <input type="text" name="PubDate" id="PubDate" class="form-control"  readonly value = "<?php echo $PubDate; ?>">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="ReleaseDate" class="col-sm-2 control-label">ReleaseDate</label>
       <div class="col-sm-10">
        <input type="text" name="ReleaseDate" id="ReleaseDate"   class="form-control" readonly value = "<?php echo $ReleaseDate; ?>">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="Price" class="col-sm-2 control-label">Price</label></td>
       <div class="col-sm-10">
         <input type="text" name="Price" id="Price" class="form-control"   maxlength ="5" value = "<?php echo $Price; ?>">
       </div></div>
	   
     
	 
<div class="buttonarea">
    		<input type="submit" value="Update Book  Record" name = "Submit" onclick="return confirm('Are you sure to delete this recor?')">
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