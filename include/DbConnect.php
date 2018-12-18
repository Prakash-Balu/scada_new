<?php
ini_set ( 'display_errors', 1 );
ini_set ( 'display_startup_errors', 1 );
error_reporting ( E_ALL );

$username = 'root';
$password = '';
$dbhost = 'localhost';
$database = 'va_master'; 

$connection = mysqli_connect("$dbhost", "$username", "$password","$database");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  /* 
mysql_pconnect ("$dbhost", "$username", "$password") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("$database") or die ('I cannot connect to the database because: ' . mysql_error());

$connection = mysqli_connect("$dbhost", "$username", "$password", "$database", "3306"); */



?>
