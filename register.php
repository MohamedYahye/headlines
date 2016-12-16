<?php 

	require_once("menu.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registter</title>
	<link rel="stylesheet" type="text/css" href="assets/css/registerstyle.css">
	<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
</head>
<body>


	<div class="container">

		<div class="form-container">
			
			<form class="form" method="POST" action="register.php" name="registerForm">
				<label class="label" for="name">Name:</label><br /><br />
				<input type="text" name="name" id="name"><br /><br />
				<label class="label" for="username">Username:</label><br /> <br />
				<input type="text" name="username" id="username"><br /><br />
				<label class="label" for="email">Email:</label><br /><br />
				<input type="email" name="email" id="email"><br /><br />
				<label class="label" for="password">Password:</label><br /><br />
				<input type="password" name="password" id="password"><br /><br />
				<label class="label" for="repeat" >Repeat password:</label><br /><br />
				<input type="password" name="repeat" id="repeat"><br /><br />

				<input id='submit'type="submit" value="submit" name="submit">


			</form>


		</div>

	</div>


	<script type="text/javascript">
		
		$(function() {

			var proceed = false;

			var name = returnElement("name");
			var username = returnElement("username");
			var email = returnElement("email");
			var password = returnElement("password");
			var repeat = returnElement("repeat");
			var submit = returnElement("submit");


			


			submit.on("click", function(){
				
			})


			function returnElement($id){

				return $("#" + $id);
			}



		});
		


		
	</script>

</body>
</html>