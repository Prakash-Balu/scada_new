<?PHP 
$username = 'root';
$password = 'mysql';
$dbhost = 'mysqlhost';
$database = 'test'; 
		
		$conn1 = new PDO("mysql:host=".$dbhost.";dbname=".$database."",$username,$password);
	
		
		mysql_pconnect ("$dbhost", "$username", "$password") or die ('I cannot connect to the database because: ' . mysql_error());		
		mysql_select_db ("$database") or die ('I cannot connect to the database because: ' . mysql_error());
		
				
?>
