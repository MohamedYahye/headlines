<?php 
	
	/**
	* login user and create session to store username
	*/


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	class loginuser {
		
		private $username;
		private $password;
		private $email;

		protected $continue;

		function __construct() {

			$message = "working";

			if(isset($_POST['submit'])){

				$name = $_POST['username'];
				

				if($name == ""){
					$this->continue = false;
					$message = "username is empty";
					$this->redirectWithErrorMessage($message);
				}else{
					$this->continue = true;
					$this->username = $name;
				}

				$password = $_POST['password'];
				if($password == ""){
					$message = "password is empty";
					$this->redirectWithErrorMessage($message);
				}else{
					//$encrypted = $this->encryptPassword($password.$this->username);
					$this->password = $password;
				}
				
			}else{
				$message = "oeps.. something went wrong, please try again!";
			}

			$this->checkUserinDb();
		}




		private function checkUserinDb(){
			require("connect.php");
			require("passHash.php");
			require("session.php");

			$conn = new connect();

			$session = new session();

			$proceed = $this->continue;

			$hash = new passHash();

			if($proceed){

				try{


					$dbh = $conn->returnConnection();

					$stmt = $dbh->prepare("SELECT * from register where username = :username");

					$stmt->bindParam(":username", $this->username);

					$stmt->execute();
					if($stmt->rowCount() > 0){
						while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

							$check = $hash->check_password($row['password'], $this->password);

							if($check){
								$session->setUser($row['username']);

								Header("Location:http://mo-portfolio.nl/headlines/leeslater.php");
							}else{
								$message = "username or password incorrect";
								$this->redirectWithErrorMessage($message);
						}

						}
					}else{
						$message = "username or password is incorrect";
						$this->redirectWithErrorMessage($message);
					}
					

					

					}catch(Exception $e){
						echo $e->getMessage();
					}
				
				
			}else{
				$message = "oeps.. something went wrong, please try again!";
				$this->redirectWithErrorMessage($message);
			}

			
		}



		private function redirectWithErrorMessage($message){

			try{
				header("Location:http://mo-portfolio.nl/headlines/login.php?message=".$message." ");
			}catch(Exception $e){
				var_dump($e->getMessage());
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

	new loginuser();


?>