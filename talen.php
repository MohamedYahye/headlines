<?php 
	
	require("menu.php");



	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);



	require("tools/sourceByLanguage.php");
	require("tools/articleBySource.php");

?>




<!DOCTYPE html>
<html>
<head>
	<title>Language</title>
	<link rel="stylesheet" type="text/css" href="assets/css/talen.css"/>
</head>
<body>

	<div class="container">
	
		<div class="inner-container">
			
			<?php

				$sourceArray;
				$articleArray;

				if(!empty(isset($_GET['language']))){

					$languageShort = "";
					$languageParam = $_GET['language'];


					if($languageParam == "German"){
						$languageShort = "de";
					}

					$sourceArray = array();

					$source = new sourceByLanguage($languageShort);

					$sources = $source->returnSources();

					foreach($sources as $src){
						$sourceArray = $src['id'];

						$article = new articleBySource($sourceArray);

						$articles = $article->returnArticle();

						foreach($articles as $art){
							$articleArray = $art;

							echo "<div class='location'><a class='class-articles' href=".$articleArray['url']." target='_blank' title=".$articleArray['title'].">
									<div class='article-image' style='background-image: url(".$articleArray['urlToImage'].");'>
									<h5 id='title'>".$articleArray['title']."</h5></div></a><form method='post' action='tools/saveArticle.php'><input name='article-to-save'type='hidden' value=".$art['url']."><input type='submit'id='mark' value='favorite'></form><div>";


						}
					}

				}else{
					$dirname = "images/countries/";
					$images = glob($dirname."*.png");
					$categoryArray = array("German");
					foreach(array_combine($images, $categoryArray) as $image => $cat) {
						echo "<a href='http://mo-portfolio.nl/headlines/talen.php?language=".$cat."' title=".$cat.">

						<div class='category-images' style='background-image: url(".$image.");'><h1 id='category'>".$cat."</h1></div>

						</a>";
					}
				}

				


			?>


		</div>


	</div>


</body>
</html>