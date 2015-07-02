<?php
require_once 'ordheader.inc.php';
require_once 'db.inc.php';
require_once 'orderstore.inc.php';
require_once 'order.inc.php';




$dbh  = new Database;
$order = new order($dbh);

?>