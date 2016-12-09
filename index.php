<?php
	require("menu.php");

	require("../readjson.php");

	$article = new readJson();
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



				$articles = $article->returnArticles();

				var_dump($articles);

			?>

		</div>

		</div>

	</div>

</body>
</html>