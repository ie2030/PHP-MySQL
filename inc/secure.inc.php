<?php
require 'access.inc.php';
if (!loggedIn()) {
  header('Location:index.php');
}
?>