
<?php
//constant variable (variable name, value)
define('SERVERNAME', '127.0.0.1');
define('USERNAME', 'root');
define('PASSWORD', 'mariadb');
define('DBNAME', 'homeheaven');
try{
	
$connect = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DBNAME);

if (!$connect) {
	die("connection failed".mysqli_connect_error()); //die - stop process after that
} else {
	//echo "Connection successfully <br>";
	}
}
catch (Exception $e){
	die($e->getMessage());
}

?>
