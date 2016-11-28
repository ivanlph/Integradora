<?php		
	$servername = "localhost";
	$username = "root";
	$password = "";

	try {
		$conn =  new PDO("mysql:host=$servername;dbname=letrelom", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
		echo "error" . $e;
	}