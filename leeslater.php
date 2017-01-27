<?php
	

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require("menu.php");

	require("tools/session.php");


	function getUserArticles(){
		$session = new session();

		$user = $session->returnUsername();


		if($user != ""){

			require("tools/connect.php");

			$conn = new connect();

			$dbh = $conn->returnConnection();


			$stmt = $dbh->prepare("SELECT id from register where username=:username");

			$stmt->bindparam(":username", $user);

			$stmt->execute();
			$user_id;
			if($stmt->rowCount() > 0){
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

					$user_id = $row['id'];


					if($user_id != null){
						$stmt = $dbh->prepare("SELECT article_url from read_article where user_id=:user_id");
						$stmt->bindParam(":user_id", $user_id);

						$stmt->execute();

						if($stmt->rowCount() > 0){
							while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
								echo "<a href=".$row['article_url']." target='_blank'>".$row['article_url']."</a><br/><br/><br/>";
							}

						}else{
							echo "no articles saved";
						}
					}
					
				}

			}else{
				echo "found nothing";
			}







		}else{
			echo "<a href='login.php'>Login to save articles </a> ";
		}
	}




?>

<!DOCTYPE html>
<html>
<head>
	<title>save article</title>
	<link rel="stylesheet" type="text/css" href="assets/css/leeslater.css">
	<script type="text/javascript" src='assets/js/jquery-3.1.1.min.js'></script>
</head>
<body>

	<?php 
		echo "<div class='saved-articles'>";
				getUserArticles();
		echo "</div>";

	?>
	
</body>
</html>
