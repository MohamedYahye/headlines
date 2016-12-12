<?php 
	require("menu.php");

	require('tools/readsources.php');

	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);



	if(!empty(isset($_GET['source']))){
		echo $_GET['source'];
	}

	$source = new readsources();
	
	
	
?>



<!DOCTYPE html>
<html>
<head>
	<title>Uitgvers</title>
	<link rel="stylesheet" type="text/css" href="assets/css/sources.css">
</head>
<body>

	<div class="source-containter">
		<div class="sources">
			<?php

				ini_set('display_startup_errors', 1);
				ini_set('display_errors', 1);
				error_reporting(-1);
				

				$sources = $source->returnSources();

				foreach($sources as $_source){
					echo "<div class='allsources' style='background-image: url(".$_source['urlsToLogos']['medium'].");'>";
					echo "<a class='sourcenames' href='http://mo-portfolio.nl/headlines/uitgevers.php?source=".$_source['id']."'>".$_source['name']."</a></div>";
				}
			?>
		</div>
	</div>


</body>
</html>