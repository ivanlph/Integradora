<?php	

	class Conexion{
		#private $servername = "sql9.freemysqlhosting.net";
		#private $username = "sql9147877";
		#private $password = "a89gR3dXT1";

		private $servername = "localhost";
		private $username = "root";
		private $password = "";

		private $con;

		function __construct(){
			try {
			#$conn =  new PDO("mysql:host=$this->servername;dbname=sql9147877", $this->username, $this->password);
			$conn =  new PDO("mysql:host=$this->servername;dbname=letrelom", $this->username, $this->password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->con = $conn;
			} catch (Exception $e) {
				echo "error" . $e;
			}
		}

		function getCon(){
			return $this->con;
		}
	}