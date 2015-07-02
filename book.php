<?php

require 'inc/init.inc.php';
if (isset($_GET['edit'])){
$edit=$_GET['edit'];
} else $edit=false;
$result =$book->allbook();
$count=count($result);
if ($count>0)
 {
  displaybook($result, $edit);
  }
  else exit ("<br>There are no book to view!");


require_once 'inc/footer.inc.php';

?>


</body>
</html>


