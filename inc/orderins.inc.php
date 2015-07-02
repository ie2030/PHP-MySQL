<?php
require_once 'ordheader.inc.php';
require_once 'db.inc.php';
require_once 'orderstore.inc.php';
require_once 'order.inc.php';
require_once 'customer.inc.php';

$dbh  = new Database;
$customer = new customer($dbh);
$order = new order($dbh);

?>