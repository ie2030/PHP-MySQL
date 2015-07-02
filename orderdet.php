<?php
require_once 'inc/orddet.inc.php';
if (isset($_GET['edit'])){
$edit=$_GET['edit'];} 
else $edit=false;
$result =$ordersdetails->allorders();
$count=count($result);
if ($count>0)
{
displayordersdet($result, $edit);
}
else exit ("<br>There are no details to view!");
require_once 'inc/footer.inc.php';

?>


</body>
</html>