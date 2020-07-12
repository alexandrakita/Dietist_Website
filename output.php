<?php

	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'diet');

	
    $dbhost=DB_SERVER;
	$dbuser=DB_USERNAME;
	$dbpass=DB_PASSWORD;
	$dbname=DB_DATABASE;
	$dbConnection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    $usersData ='';
	$sql = "SELECT * FROM users";
       
        
	mysqli_set_charset($dbConnection, "utf8");
		
	$result = mysqli_query($dbConnection, $sql);
		
	while ($row = mysqli_fetch_assoc($result)){
		$json_array[] = $row;
	}		
		
	$usersData = json_encode($json_array);
	echo $usersData;
?>