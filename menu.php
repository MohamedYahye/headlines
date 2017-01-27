<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/menu.css">
</head>
<body>

</body>
	
	<div class="wrap">
		<div class="main-menu">
			
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="uitgevers.php">Uitgevers</a></li>
				<li><a href="categorie.php">Categorieën</a></li>
				<li><a href="talen.php">Talen</a></li>
				<li><a href="register.php">Registreren</a></li>
				<li><a href="login.php">Inloggen</a></li>
				<li><a href="leeslater.php">Lees later</a></li>
			</ul>

			<div class="info">
				
				<ul>
					<?php 


						if (session_status() == PHP_SESSION_ACTIVE) {
						  echo 'Session is active';
						}else{

							if(!class_exists("session")){

								echo "<li> <a href='account.php'>Account Bekijken</a></li>";


							}



						}

					?>


					<li><a href="logout.php">Logout</a></li>
				</ul>

			</div>

		</div>

	</div>

</html>