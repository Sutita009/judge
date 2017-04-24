<?php
require_once('../functions.php');
if(!loggedin())
  header("Location: login.php");
else
  include('header.php');

?>
