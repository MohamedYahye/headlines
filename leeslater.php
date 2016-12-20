<?php
	

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require("menu.php");

	require("tools/session.php");

	$session = new session();

	echo $session->returnUsername();

?>

<!DOCTYPE html>
<html>
<head>
	<title>save article</title>
	<link rel="stylesheet" type="text/css" href="leeslater.php">
	<script type="text/javascript" src='assets/js/jquery-3.1.1.min.js'></script>
</head>
<body>

	
	
</body>
</html>
