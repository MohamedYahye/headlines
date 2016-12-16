<?php 

	
	/**
	* connect to db and return connection object;
	*/
	class connect{
		

		private $username;
		private $password;
		function __construct() {

			$this->username = "mo_po_nl_Webnews";
			$this->password = "cAf4DKMapcXm";


			try {
			    $conn = new PDO('mysql:host=95.170.72.98;dbname=mo_portfolio_nl_Webnews', $this->username, $this->password);
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    
			} catch(PDOException $e) {
			    echo 'ERROR: ' . $e->getMessage();
			}

			
			
		}
	}


	//new connect();


?>