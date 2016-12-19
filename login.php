<?php 
	
	require("menu.php");


?>



<!DOCTYPE html>
<html>
<head>
	<title>register</title>
	<link rel="stylesheet" type="text/css" href="assets/css/loginstyle.css">
</head>
<body>

	<div class="container">
		<div class="form-container">

				<?php 

				if(!empty(isset($_GET['message']))){
					echo "<p class='error-message'>" . $_GET['message']. "</p>";
				}


			?>
			
			<form name="login" method="POST" action="tools/loginuser.php" class="form">
				
				<label for="username">username:</label><br /><br />
				<input type="text" name="username"><br /><br/ >
				<label for="password">password:</label><br /><br />
				<input type="password" name="password"><br /><br/>
				<input type="submit" name="submit">


			</form>


		</div>

	</div>


</body>
</html>