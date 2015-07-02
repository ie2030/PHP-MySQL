<?php

require_once 'orderdetheader.inc.php';
require_once 'db.inc.php';
require_once 'det.inc.php';
require_once 'orddetstore.inc.php';

$dbh  = new Database;
$ordersdetails = new ordersdetails($dbh);

?>