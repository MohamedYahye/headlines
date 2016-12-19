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
				

				if(strlen($_POST['name']) > 0){
					$this->name = $_POST['name'];
					$this->continue = true;
					
				}else{
					$this->continue = false;
					$message = "name is too short";
					$this->redirectWithErrorMessage($message);
				}
			}

			if(!empty(isset($_POST['username']))){
				

				if(strlen($_POST['username']) >= 6){
					$this->username = $_POST['username'];
					$this->continue = true;
				}else{
					$this->continue = false;
					$message = "username is too short";
					$this->redirectWithErrorMessage($message);
				}
			}


			if(!empty(isset($_POST['email']))){
				

				if($_POST['email'] != ""){
					$this->email = $_POST['email'];
					
					$this->continue = true;
				}else{
					$this->continue = false;
					$message = "email incorrect";
					$this->redirectWithErrorMessage($message);
				}
			}


			if(!empty(isset($_POST['password']))){
				

				if(strlen($_POST['password']) > 0 && strlen($_POST['password']) >= 6){
					$this->password = $_POST['password'];
					//echo $this->password;
					$this->continue = true;
				}else{
					$this->continue = false;
					$message = "password is too short";
					$this->redirectWithErrorMessage($message);
				}
			}


			if(!empty(isset($_POST['repeat']))){
				

				if($_POST['repeat'] == $this->password){
					$this->repeat = $_POST['repeat'];
					//echo $this->repeat;
					$this->continue = true;
				}else{
					$this->continue = false;
					$message = "password dont match";
					$this->redirectWithErrorMessage($message);
				}
			}



			$this->registeruser();
		}



		private function redirectWithErrorMessage($message){
			header("Location:http://mo-portfolio.nl/headlines/register.php?message=".$message." ");
		}



		private function registeruser(){

			require("connect.php");
			require("passHash.php");

			$connect = new connect();

			$dbh = $connect->returnConnection();

			$proceed = $this->continue;

			if($proceed){
				

				$stmt = $dbh->prepare("SELECT * from register where username =:username AND email=:email");

				$stmt->bindParam(":username", $this->username);
				$stmt->bindParam(":email", $this->email);

				$stmt->execute();

				if($stmt->rowCount() > 0){
					$message = "username allready taken";
					$this->redirectWithErrorMessage($message);

				}else{
					$hash = new passHash();

					$pass_hash = $hash->hash($this->password);

					$stmt = $dbh->prepare("INSERT INTO register (name, username, email, password) 
						VALUES(:name, :username, :email, :password)");

					$stmt->bindParam(":name", $this->name);
					$stmt->bindParam(":username", $this->username);
					$stmt->bindParam(":email", $this->email);
					$stmt->bindParam(":password", $pass_hash);

					if($stmt->execute()){

						$message = "success";

						$this->redirectWithErrorMessage($message);
					}else{
						$message = "oeps.. something went wrong, please try again!";
						$this->redirectWithErrorMessage($message);
					}

					

				}


			}else{
				$message = "oeps.. something went wrong, please try again!";
				$this->redirectWithErrorMessage($message);
			}
		}


		private function encryptPassword($input, $rounds = 7){
			$blowfish;
			if(defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH){
				
				$salt = "";
			    $salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
			    for($i=0; $i < 22; $i++) {
			      $salt .= $salt_chars[array_rand($salt_chars)];
			    }
			    return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);

			}else{
				$blowfish = false;
			}


		}
	}


	new registeruser();

?>