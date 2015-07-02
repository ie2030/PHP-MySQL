<?php

 require_once 'books.inc.php';




	function get_product_name($dbh,$pid){
	   $books 		= new Book($dbh);
	   $book = $books->onebook($pid);
	   return $book->Title;
	}

	function get_price($dbh,$pid){
	   $books 		= new Book($dbh);
	   $book = $books->onebook($pid);
	   return $book->Price;
	}


	function remove_product($pid){
//	    $pid=intval($pid);
	    $max=count($_SESSION['cart']);
	    for($i=0;$i<$max;$i++){
		if($pid==$_SESSION['cart'][$i]['productid']){
			unset($_SESSION['cart'][$i]);
			break;
		}
	    }
		    $_SESSION['cart']=array_values($_SESSION['cart']);
	}

	function get_order_total($dbh){
	     $max=count($_SESSION['cart']);
	     $sum=0;
                   for($i=0;$i<$max;$i++){
		$pid=$_SESSION['cart'][$i]['productid'];
		$q=$_SESSION['cart'][$i]['qty'];
		$price=get_price($dbh,$pid);
		$sum+=$price*$q;
	     }
	     return $sum;
	}

	function addtocart($pid,$q){
	    if($q<1) return;
        if(is_array($_SESSION['cart'])){
		if(product_exists($pid)) return;
		$max=count($_SESSION['cart']);
		$_SESSION['cart'][$max]['productid']=$pid;
		$_SESSION['cart'][$max]['qty']=$q;
	     }
	    else{
		$_SESSION['cart']=array();
		$_SESSION['cart'][0]['productid']=$pid;
		$_SESSION['cart'][0]['qty']=$q;
	     }
	}

	function product_exists($pid){
//	     $pid=intval($pid);
	     $max=count($_SESSION['cart']);
	     $flag=0;
	     for($i=0;$i<$max;$i++){
		 if($pid==$_SESSION['cart'][$i]['productid']){
			$flag=1;
			break;
		}

         }
	    return $flag;
	}

	function do_alert($msg)
	    {
	        echo '<script type="text/javascript">alert("' . $msg . '"); </script>';

    }
?>