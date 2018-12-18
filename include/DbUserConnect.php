<?php
ini_set ( 'display_errors', 1 );
ini_set ( 'display_startup_errors', 1 );
error_reporting ( E_ALL );	

$username = 'root';
$password = '';
$dbhost = 'localhost';
$database = $_SESSION['db_name']; 


$connect = mysqli_connect("$dbhost", "$username", "$password","$database");

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



?>
