<?php
require_once('database/Database.php');//start session at default constructor
$session = new Database();//session is at default constructor

unset($_SESSION['loginname']);
unset($_SESSION['username']);

header('location: index.php');
?>
