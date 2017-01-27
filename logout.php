<?php 


	require("tools/session.php");

	
	$session = new session();


	$session->destroySession();
	Header("Location:http://mo-portfolio.nl/headlines/login.php?message=U bent uitgelogd");


	if(!empty(isset($_GET['logout']))){
		if($_GET['logout'] == "true"){
			Header("Location:http://mo-portfolio.nl/headlines/login.php?message=password changed, please login");
		}
	}
?>