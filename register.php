<?php 

	require_once("menu.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registter</title>
	<link rel="stylesheet" type="text/css" href="assets/css/registerstyle.css">
</head>
<body>


	<div class="wrap">
		<form name="register" method="post">
			

			<input type='text' name="username" placeholder="John" /><br/>
			<input type="email" name="email" placeholder="jonh@live.nl" /><br/>
			<input type="password" name="password" placeholder="******"><br />
			<input type="password" name="repeatpassword" placeholder="******"><br/>
			<input type="submit" name="submit" value="submit">
		</form>
	</div>

</body>
</html>