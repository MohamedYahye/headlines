<?php 
	/**
	* save articles to db with username;
	*/
	class saveArticle {
		
		protected $articleToSave;
		private $username;

		function __construct(){


			if(!empty(isset($_POST['article-to-save']))){

				$session_exist = $this->doesSessionExist();

				if($session_exist){
					require("connect.php");
					$this->articleToSave = $_POST['article-to-save'];
					$this->saveArticle();

				}else{

					$message = "please login to save asrticles";

					$this->redirectWithErrorMessage($message);
				}

			}else{
				header("Location:http://mo-portfolio.nl/headlines/index.php");
			}


		}


		private function doesSessionExist(){
			require("session.php");

			$session = new session();

			$this->username = $session->returnUsername();

			$proceed = false;

			if($this->username == ""){
				$proceed = false;
			}else{
				$proceed = true;
			}


			return $proceed;
		}


		private function saveArticle(){

			try{
				$conn  = new connect();

				$dbh = $conn->returnConnection();


				$stmt = $dbh->prepare("SELECT * from register where username=:username");
				$stmt->bindParam(":username", $this->username);

				$stmt->execute();

				$userid;

				if($stmt->rowCount() > 0){
					while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

						$userid = $row['id'];
					}




					$stmt = $dbh->prepare("SELECT * from read_article where article_url=:articleurl");

					$stmt->bindParam(":articleurl", $this->articleToSave);

					$stmt->execute();

					$doesArticleExist;

					if($stmt->rowCount() > 0){
						while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

							if($this->articleToSave == $row['article_url']){
								$doesArticleExist = true;
								$message = "Article all ready saved";

								$this->redirectWithErrorMessage($message);
							}else{
								$doesArticleExist = false;

							}
						}
					}

					if($doesArticleExist){
						
					}else{
						$stmt = $dbh->prepare("INSERT INTO read_article (user_id, article_url) VALUES(:userid, :articleurl)");

						$stmt->bindParam(":userid", $userid);
						$stmt->bindParam(":articleurl", $this->articleToSave);

						if($stmt->execute()){
							$message = "Article saved successfully";

							$this->redirectWithErrorMessage($message);

							

						}else{
							echo "no success";
						}
					}




					
				}else{
					$message = "oeps something went wrong, please try again";

					$this->redirectWithErrorMessage($message);
				}

			}catch(Exception $e){
				echo $e->getMessage();
			}

			


		}

		private function redirectWithErrorMessage($message){

			try{
				if (isset($_SERVER["HTTP_REFERER"])) {


					$url = $_SERVER["HTTP_REFERER"];
					echo $url;

				    if(strpos($url, "?")){
				    	header("Location: " . $_SERVER["HTTP_REFERER"] . "&message=".$message."");
				    	
				    	
				    }else{


				    	header("Location: " . $_SERVER["HTTP_REFERER"] . "?message=".$message."");
				    }


			        
			    }




			}catch(Exception $e){
				var_dump($e->getMessage());
			}

			
		}
	}


	new saveArticle();

?>