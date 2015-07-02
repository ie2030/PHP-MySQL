<?php
require_once 'customerheader.inc.php';
require_once 'db.inc.php';
require_once 'customer.inc.php';
require_once 'cstore.inc.php';




$dbh  = new Database;

$customer = new customer($dbh);

?>