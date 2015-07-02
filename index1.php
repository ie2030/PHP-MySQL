<?php
session_start();
require_once "inc/cartheader.inc.php";
require_once "inc/db.inc.php";
require_once "inc/functions.inc.php";

 if ((isset($_REQUEST['command'])) && (isset( $_REQUEST['productid']))) {
   if($_REQUEST['command']=='add'){
        $pid=$_REQUEST['productid'];
        addtocart($pid,1);
        header("location:shoppingcart.php");
        exit();
  }
 }
?>
<form name="products" id = "products">
 <input type="hidden" name="productid" id ="productid" >
 <input type="hidden" name="command" id ="command" >
</form>
<aside class="col-md-2 startup">
<img src="images/book12.png" alt ="">
<img src="images/book13.png" alt ="">
<img src="images/book11.png" alt ="">
</aside>
<section class="col-md-8">

<h1>Books for Sale<input type="button" value="View Shopping Cart" class='btn btn-success' id = "view" onclick="window.location='shoppingcart.php'" >
</h1>
<br>
<table>
<?php
$sel = "SELECT* FROM book";
$fin=" group by Title order by BookID";

if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
    $list="";
    $max=count($_SESSION['cart']);
    for($i=0;$i<$max;$i++){
    $pid=$_SESSION['cart'][$i]['productid'];
    $list.=$pid;
    if ($i!=$max-1){
       $list.=",";
    }
    }
	}

 if (isset($_POST['Find'])) {
     $title= $_POST['title'];
     $where .= " and Title like :title";
     }
$sql=$sel.$fin;
$stmt = $dbh->prepare($sql);
if (isset($_POST['Find'])) {
 $Title="%".$Title."%";
 $stmt->bindParam(':Title', $Title, PDO::PARAM_STR);
}
$stmt->execute();
$count= $stmt->rowCount();
if ($count==0) {
        exit("<tr><td>There are no books to view!</td></tr>");
}
        while ($row = $stmt->fetch(PDO::FETCH_OBJ)){
         ?>
         <tr>
         <td><b><?php echo $row->Title;?></b><br>
         <?php echo $row->Author;?><br>
         <?php echo $row->Publisher;?><br>
         Price:<span class = "price">$<?php echo $row->Price?></span><br>
        
         <br>
         <input type="button" value="Add to Cart" class='btn btn-primary' id ="<?php echo $row->BookID?>" >
         </td>
         </tr>
         <?php
         }
        ?>
</table>
</section>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $(':button:not("#view")').click(function() {
        pid = $(this).attr('id');
        $('#productid').val(pid);
        $('#command').val('add');
        $('#products').submit();
  });
});
</script>
</html>