<?php
session_start();
error_reporting(0);

$username = 'root';
$password = 'mysql';
$dbhost = 'mysqlhost';
$database = $_SESSION['db_name']; 


mysql_pconnect ("$dbhost", "$username", "$password") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("$database") or die ('I cannot connect to the database because: ' . mysql_error());

$connect = mysqli_connect("$dbhost", "$username", "$password", "$database", "3306");



?>
