<?php
require_once 'inc/ord.inc.php';


$edit=$_GET['edit'];
$result =$order->allorders();
$count=count($result);
if ($count>0)
 {
  displayorders($result, $edit);
  }
  else exit ("<br>There are no orders to view!");


require_once 'inc/footer.inc.php';

?>


</body>
</html>