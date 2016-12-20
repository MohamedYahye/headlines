<?php

	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);

	require("menu.php");
	require("tools/articleBySource.php");
	require("tools/sources.php");
?>



<!DOCTYPE html>
<html>
<head>
	<title>Web News</title>
	<link rel="stylesheet" type="text/css" href="assets/css/indexstyle.css">
	<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
</head>

	<script type="text/javascript">

		$(function(){

			$.each($('input'),function(i,val){
			    if($(this).attr("type")=="hidden"){
			        var valueOfHidFiled=$(this).val();
			        console.log(valueOfHidFiled);
			    }
			});
		})

	</script>

<body>

	<div class="_wrap">
		
		<div class="inner-container">
				<?php
					
					if(!empty(isset($_GET['message']))){
						echo "<p class='error-message'>".$_GET['message']."</p>";
					}

					$source = new sources();

					$sources = $source->getSourceId();

					
					$sliced = array_slice($sources, 0, 5);

					

					foreach($sliced as $src){
						$article = new articleBySource($src);

						$articles = $article->returnArticle();

						$article_sliced = array_slice($articles, 0, 15);

						foreach($article_sliced as $art){
							echo "<div class='location'><a href=".$art['url']." target='_blank'>

								<div class='article-image' style='background-image:url(".$art['urlToImage'].");'>
									<h5 id='title'>".$art['title']."</h5>
								</div>
								
							</a><form method='post' action='tools/saveArticle.php'><input name='article-to-save'type='hidden' value=".$art['url']."><input type='submit'id='mark' value='favorite'></form><div>";
						}

					}



				?>

		</div>

	</div>




</body>




</html>