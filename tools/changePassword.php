<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	class changePassword {

		private $currentPassword;
		private $newPassword;

		private $hash;

		private $continue;

		function __construct() {

			require("passHash.php");


			$this->hash = new PassHash();

			if(!empty(isset($_POST['current']))){
				$this->currentPassword = $_POST['current'];

				//echo $this->currentPassword;
			}else{
				echo "currentPassword is empty";
			}



			if(!empty(isset($_POST['newpass']))){
				$this->newPassword = $_POST['newpass'];
				//echo $this->newPassword;
			}else{
				echo "new pass is empty";
			}


			if(!empty(isset($_POST['new_repeat']))){
				if($_POST['new_repeat'] != $this->newPassword){
					echo "passwords dont equal";
				}else{
				}
			}else{
				echo "repeat cant be empty";
			}


			

			$this->changePassword();

		}

		private function returnNewHashedPassword(){



			try{

				$pass_hash = $this->hash->hash($this->newPassword);



				return $pass_hash;



			}catch(Exception $e){
				echo $e->getMessage();
			}


		}



		private function changePassword(){


			require("connect.php");
			require("session.php");

			$session = new session();

			$conn = new connect();

			$proceed = false;
			$dbh = $conn->returnConnection();
			$userId;
			try{
				$user = $session->returnUsername();


				if($user == false){
					
				}else{
					


					$stmt = $dbh->prepare("SELECT * FROM register where(username=:username)");


					$stmt->bindParam(":username", $user);

					$stmt->execute();
					if($stmt->rowCount() > 0){
						while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


							$check = $this->hash->check_password($row['password'], $this->currentPassword);

							if($check){
								$userId = $row['id'];
								echo $userId . "<br />";
								$proceed = true;




							}else{
								Header("Location:http://mo-portfolio.nl/headlines/account.php?message='current password is incorrect'");
							}

						}
					}else{
						echo "error";
					}
				}
				


				if($proceed){


					$newPassword = $this->returnNewHashedPassword();
					echo $newPassword . "<br />";
					$stmt = $dbh->prepare("UPDATE `register` SET `password`=? WHERE id=?");

					if($stmt->execute(array($newPassword, $userId))){
						Header("Location:http://mo-portfolio.nl/headlines/logout.php?logout=true");
					}else{
						Header("Location:http://mo-portfolio.nl/headlines/account.php?message='oeps.... something went wrong, please try again!'");
					}


				}


			}catch(Exception $e){
				echo $e->getMessage();
			}


		}

		
	}



	new changePassword();


?>