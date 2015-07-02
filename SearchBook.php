
<?php

require 'inc/search.inc.php';
if (isset($_REQUEST['Submit'])) {


try {
  $Title= $_POST['Title'];
  $result = $book->findbook($Title);

  $count=count($result);
  if ($count>0)
  {
    $edit=true;
    displaybook($result, $edit);
  }
  else exit ("<br>There are no books to view!");
}

catch(PDOException $e) {
 echo '<br>Problem with the Selecting from the book table - ';
 echo $e->getMessage();
 exit;
}
}
else {
?>
<form action="" method="post" id = "form">
 <label for="Title">Search Book by  Title: <input type="text" id = "Title" name="Title"  autofocus required></label><br>
 <input type="submit" name = "Submit">
</form>
<?php
}

?>
</body>
</html>
