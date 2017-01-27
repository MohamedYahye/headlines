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
			

			<?php 

				if(!empty(isset($_GET['message']))){
					echo "<p class='error-message'>" . $_GET['message']. "</p>";


					if($_GET['message'] == "success"){
						header("Location:http://mo-portfolio.nl/headlines/login.php");
					}
				}


			?>
			<span id="error"></span>
			<form class="form" method="POST" action="tools/registeruser.php" name="registerForm" >
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
		

		$(document).ready(function(){

			$("#error").hide();

			var error = $("#error");

			var proceed = false;
			$(".form").submit(function(event){
				

				var name = $("#name").val().length;
				var username = $("#username").val().length;
				var email = $("#email").val().length;
				var password = $("#password").val();
				var repeat = $("#repeat").val();

				var proceed = false;

				if(name > 0){
					if(username >= 6){
						proceed = true
					}else{

						addCss(128)
						showError("username must be greater than 6 chars");

						return false;
					}

					if(email > 0){
						proceed = true;
					}else{

						addCss(220)
						showError("incorrect email");
						return false;
					}

					if(password.length >= 6){
						proceed = true
					}else{
						addCss(318)
						showError("password must be 6 chars or greater");

						return false;
					}

					if(repeat == password){
						proceed = true;
					}else{
						addCss(418)
						showError("passwords don't match")
						return false;
					}


					return proceed;
				}else{

					showError("name is too short");
					

					return false;
				}


				if(proceed){

				}else{
					event.preventDefault();
				}

				



			})




			function showError(message){
				error.text(message).show().fadeOut(3000);
			}



			function addCss(margin){
				return error.css("margin-top", margin + "px");
			}

		});



	</script>

</body>
</html>