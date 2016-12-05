<?php		
	$servername = "sql9.freemysqlhosting.net";
	$username = "sql9147877";
	$password = "a89gR3dXT1";

	try {
		$conn =  new PDO("mysql:host=$servername;dbname=sql9147877", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
		echo "error" . $e;
	}