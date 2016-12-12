<?php
	require("menu.php");

	require("tools/readjson.php");

	$json = new readJson();
?>



<!DOCTYPE html>
<html>
<head>
	<title>Web News</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

	<div class="_wrap">
		
		<div class="inner-wrap">
			
			<div class="highlight-area">
				<?php

					ini_set('display_startup_errors', 1);
					ini_set('display_errors', 1);
					error_reporting(-1);

					$articles = $json->returnJsonData();

					$sliced = array_slice($articles, 0 , 3);

					foreach($sliced as $allArticles){

						echo "<div class='image'style='background-image: url(".$allArticles['urlToImage'].");'>

						<a href=".$allArticles['url']." target='_blank'><h1>".$allArticles['title']."</h1></a>
						</div>";

					}
				?>

			</div>

		</div>

	</div>




</body>

</html>