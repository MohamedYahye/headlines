<?php
	
	require("menu.php");

?>





<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
	<link rel="stylesheet" type="text/css" href="assets/css/account.css">
	<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
</head>
<body>


	<div class="_wrap">
		
		<h4>Account info bekijken en wijzigen</h4>

		<div class="user_info">
			<?php 


				if(!empty(isset($_GET['message']))){
					echo "<p id='message'>".$_GET['message']."</p>";
				}


				require("tools/session.php");

				$session = new session();


				$user = $session->returnUsername();

				if ($user == "") {
					Header("Location:http://mo-portfolio.nl/headlines/login.php?message=login om accout te bekijken");

				}else{
					echo "<p id='username'> Gebruikersnaam: ".$user."</p>";
					
				}



			?>
			<br /><br />

			<h4>Wachtwoord wijzigen</h4>
			<br />

			<form class="form_change" method="POST" action="tools/changePassword.php">
				
				<label for="wachtwoord">Current Password:</label><br/><br />

				<input type="password" name="current" id="current"><br /><br />

				<h4>Nieuw wachtwoord</h4><br />

				<label for="newpass">nieuw wachtwoord:</label><br /><br />
				<input type="password" name="newpass" id="newpass"><br /><br />
				<label for="new_repeat">Repeat password:</label><br/><br />
				<input type="password" name="new_repeat" id="new_repeat"><br /><br/>



				<input type="submit" value="Verzenden">

			</form>

		</div>

	</div>


	<script type="text/javascript">
		

	$(document).ready(function(){

		$(".form_change").submit(function(event){

			var proceed = false;
			var current_password = $("#current").val().length;

			var newpass = $("#newpass").val();
			var new_repeat = $("#new_repeat").val();

			if(current_password >= 6){

				if(newpass.length >= 6){
					proceed = true;
				}else{
					console.log("password too short");
					proceed = false;
				}

				if(new_repeat == newpass){
					proceed = true;
				}else{
					console.log("password dont match");
					proceed = false;
				}




			}else{
				proceed = false;
			}



			if(proceed){

			}else{
				event.preventDefault();
			}

			

		})


	})


	</script>


</body>
</html>


