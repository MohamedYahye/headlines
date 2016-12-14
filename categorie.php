<?php 
	
	require("menu.php");
	require("tools/sourceByCategory.php");
	require("tools/articleBySource.php");



	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);
?>



<!DOCTYPE html>
<html>
<head>
	<title>Categories</title>
	<link rel="stylesheet" type="text/css" href="assets/css/categorystyle.css"/>
</head>
<body>

	<div class="container">
		
	<div class="inner-container">
		
		<?php 


			if(!empty($_GET['category'])){

				$sourceBy = new sourceByCategory($_GET['category']);

				$sources = $sourceBy->returnSources();

				$sourceArray = array();
				$articleArray = array();

				foreach($sources as $source){
					$sourceArray = $source['id'];


					$articleBySource = new articleBySource($sourceArray);

					$articleArray = $articleBySource->returnArticle();

					foreach($articleArray as $articles){

						echo "<a class='class-articles' href=".$articles['url']." target='_blank' title=".$articles['title'].">
						<div class='article-image' style='background-image: url(".$articles['urlToImage'].");'>
						<h5 id='title'>".$articles['title']."</h5></div></a>";
					}
					
				}

				
			}else{

				$dirname = "images/category/";
				$images = glob($dirname."*.png");
				$categoryArray = array("business", "entertainment", "gaming", "general", "music", "science-and-nature", "sport", "technology");
				foreach(array_combine($images, $categoryArray) as $image => $cat) {
					echo "<a href='http://mo-portfolio.nl/headlines/categorie.php?category=".$cat."' title=".$cat.">

					<div class='category-images' style='background-image: url(".$image.");'><h1 id='category'>".$cat."</h1></div>

					</a>";
				}
			}
		?>


	</div>

	</div>

</body>
</html>