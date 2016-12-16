<?php 
	
	/**
	* regiser user
	* validate data
	*/


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	class registeruser {
		

		private $name;
		private $username;
		private $password;
		private $repeatpassword;
		private $email;

		private $continue = false;

		function __construct() {
			$message = "";

			if(!empty(isset($_POST['name']))){
				$this->name = $_POST['name'];

				if(strlen($this->name) < 6){
					$message = "name is too short";
					$this->redirectWithErrorMessage($message);
				}else{
					echo $this->name;
				}
			}

			if(!empty(isset($_POST['username']))){
				$this->username = $_POST['username'];

				if(strlen($this->username) < 6){
					$message = "username is too short";
					$this->redirectWithErrorMessage($message);
				}else{
					echo $this->username;
				}
			}


			if(!empty(isset($_POST['email']))){
				$this->email = $_POST['email'];

				if($this->email == ""){
					$message = "email incorrect";
					$this->redirectWithErrorMessage($message);
				}else{
					echo $this->email;
				}
			}


			if(!empty(isset($_POST['password']))){
				$this->password = $_POST['password'];

				if(strlen($this->password) > 0 && strlen($this->password) >= 8){
					echo $this->password;
				}else{
					$message = "password is too short";
					$this->redirectWithErrorMessage($message);
				}
			}


			if(!empty(isset($_POST['repeat']))){
				$this->repeat = $_POST['repeat'];

				if($this->repeat == $this->password){
					echo $this->repeat;
				}else{
					$message = "password dont match";
					$this->redirectWithErrorMessage($message);
				}
			}
		}



		private function redirectWithErrorMessage($message){
			header("Location:http://mo-portfolio.nl/headlines/register.php?message=".$message." ");
		}



	}


	new registeruser();

?>