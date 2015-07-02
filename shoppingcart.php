<?php
session_start();

require_once "inc/cartheader.inc.php";
require_once "inc/db.inc.php";
require_once "inc/functions.inc.php";

if ((isset($_REQUEST['command'])) && (isset( $_REQUEST['pid']))) {

 if($_REQUEST['command']=='delete' ){
        remove_product($_REQUEST['pid']); //call to function.inc.php
        $x=get_order_total($dbh);
        if ($x==0) {unset($_SESSION['cart']);}
 }
 else if($_REQUEST['command']=='clear'){
         unset($_SESSION['cart']);
 }
 else if($_REQUEST['command']=='update'){
    $max=count($_SESSION['cart']);
    for($i=0;$i<$max;$i++){
   $pid=$_SESSION['cart'][$i]['productid'];
   $q=intval($_REQUEST['product'.$pid]);
  /* if($q>0 && $q<=999){
        $numcopies=get_numcopies($dbh,$pid);
        if ($q>$numcopies) {
           $msg='Quantity chosen is greater than Number of Book Copies at this time';
           do_alert($msg);
        }
        else {
    $_SESSION['cart'][$i]['qty']=$q;
    }
   }
   else{
    $msg='Some products not updated!, quantity must be a number between 1 and 999';
     do_alert($msg);
  }*/
   }
 }
}
?>
<form name="cart" id = "cart" method="post">
<input type="hidden" name="pid"  id = "pid">
<input type="hidden" name="command" id = "command">
<div>
<h1>Your Shopping Cart</h1>
<aside class="col-md-4">
<input type="button" value="Continue Shopping" class='btn btn-success' onclick="window.location='index1.php'" >
</aside>
<section class="col-md-11">
<table>
<?php
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
    echo '<tr><th>BookID</th>  <th>Title</th> <th>Price</th> <th>Qty</th> <th>Amount</th> <th>Options</th></tr>';
    $max=count($_SESSION['cart']);
    for($i=0;$i<$max;$i++){
  $pid=$_SESSION['cart'][$i]['productid'];
  $q=$_SESSION['cart'][$i]['qty'];
  $pname = get_product_name($dbh,$pid); //call to function.inc.php
  if($q==0) continue;// go to next record
?>
   <tr><td><?php echo $pid?></td><td><?php echo $pname?></td>
   <td>$ <?php echo get_price($dbh,$pid) //call to function.inc.php ?>
   </td>
   <td><input type="text" name="product<?php echo $pid?>" value="<?php echo $q?>" maxlength="3" size="2" /></td>
   <td>$<?php echo get_price($dbh,$pid)*$q //call to function.inc.php ?>
   </td>
   <td><a href="javascript:del(<?php echo $pid?>)">Remove</a></td></tr>
   <?php
    }
   ?>
  <tr><td><b>Order Total: $<?php echo get_order_total($dbh) //call to function.inc.php ?>
  </b></td>
  <td colspan="5" class = "diffcell"><input type="button" value="Clear Cart" id = "clear">
  <input type="button" value="Update Cart" id = "update"></td>
  </tr>
  <?php
 }
else{
 echo "<tr><th>There are no items in your shopping cart!</th></tr>";
}
?>
</table>
</div>
</form>
<script type="text/javascript">

$(document).ready(function(){
  $(':button#clear').click(function() {
     if(confirm('This will empty your shopping cart, continue?')){
    $('#command').val('clear');
    $('#cart').submit();
     }
  });


  $(':button#update').click(function() {
      $('#command').val('update');
      $('#cart').submit();
  });
});

function del(pid){
  if(confirm('Do you really mean to delete this item')){
       $('#pid').val(pid);
       $('#command').val('delete');
       $('#cart').submit();
  }
}
</script>

</body>
</html>