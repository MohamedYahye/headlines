<?php
	require("menu.php");

	require("tools/articleObj.php");

	$article = new articleObj();
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

				
				var_dump(array_slice($articles, 50));


			?>

		</div>

		</div>

	</div>

</body>
</html>