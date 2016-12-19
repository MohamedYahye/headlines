<?php 

	
	/**
	* connect to db and return connection object;
	*/
	class connect{
		

		private $username;
		private $password;

		public $conn;
		function __construct() {
			$this->username = "mo_po_nl_Webnews";
			$this->password = "cAf4DKMapcXm";
			$this->conn = null;

			$this->connect();
			
		}



		private function connect(){



			try {
			    $this->conn = new PDO('mysql:host=95.170.72.98;dbname=mo_portfolio_nl_Webnews', $this->username, $this->password);
			    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    
			    
			} catch(PDOException $e) {
			    echo 'ERROR: ' . $e->getMessage();
			}
		}



		public function returnConnection(){
			return $this->conn;
		}


		public function closeConnection(){
			return $this->conn = null;
		}
	}


	//new connect();


?>