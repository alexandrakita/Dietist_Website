<?php

    define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'diet');
	
    function getDB() 
	{
		$dbhost=DB_SERVER;
		$dbuser=DB_USERNAME;
		$dbpass=DB_PASSWORD;
		$dbname=DB_DATABASE;
		$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $dbuser, $dbpass);	
		$dbConnection->exec("set names 'utf8';");
		$dbConnection->exec("SET CHARACTER SET 'utf8';"); 
		$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $dbConnection;
	}
	
	$username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['name'];
    $email = $_POST['email'];

	$sql = "INSERT INTO users (username, password, name, email) VALUES (:username, :password, :fname, :email)";
    
	try {
        $dbCon = getDB();
        $stmt = $dbCon->prepare($sql);  
        $stmt->bindParam("username", $username);
		$stmt->bindParam("password", $password);
		$stmt->bindParam("fname", $fname);
		$stmt->bindParam("email", $email);
        $stmt->execute();
        //$order_delivered = $stmt->fetchObject();  
        $dbCon = null;
        //echo json_encode($order_delivered);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
    }

?>