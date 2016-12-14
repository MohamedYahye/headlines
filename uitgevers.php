<?php 
	require("menu.php");

	require('tools/readsources.php');
	require("tools/articleBySource.php");
	
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);

	

	
	
	
	
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
				

				if(!empty(isset($_GET['source']))){

					$article = new articleBySource($_GET['source']);


					$articelArray = $article->returnArticle();


					foreach($articelArray as $article){
						echo "<a href=".$article['url']." target='_blank'> 
							<div class='article-image' style='background-image: url(".$article['urlToImage'].");'>
							<h4 id='title'>".$article['title']."</h4>
							</div></a>";
					}

				}else{
					$source = new readsources();



					$sources = $source->returnSources();

					foreach($sources as $_source){
						echo "<div class='allsources' style='background-image: url(".$_source['urlsToLogos']['medium'].");'>";
						echo "<a class='sourcenames' href='http://mo-portfolio.nl/headlines/uitgevers.php?source=".$_source['id']."'>".$_source['name']."</a></div>";
					}
				}

				
			?>
		</div>
	</div>


</body>
</html>