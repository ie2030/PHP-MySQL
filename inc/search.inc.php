<?php
require_once 'sheader.inc.php';
require_once 'db.inc.php';
require_once 'book.inc.php';
require_once 'bookstore.inc.php';


$dbh  = new Database;
$book = new Book($dbh);
?>