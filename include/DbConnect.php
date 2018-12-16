<?php

error_reporting(0);

$username = 'root';
$password = 'mysql';
$dbhost = 'mysqlhost';
$database = 'test'; 


mysql_pconnect ("$dbhost", "$username", "$password") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("$database") or die ('I cannot connect to the database because: ' . mysql_error());

$connection = mysqli_connect("$dbhost", "$username", "$password", "$database", "3306");



?>
