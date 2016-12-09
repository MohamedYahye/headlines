<?php 

	/**
	* get from internal json file
	* this because of easy loading
	*/
	class readJson {
		
		private $path;
		protected $articleArray;

		public $articles;
		public $title;
		public $url;
		public $urlToImage;
		public $description;


		function __construct() {
			$this->path = "tools/articles/data.json";

			$this->articleArray = array();
			$this->articles = array();
			$this->title = array();
			$this->url = array();
			$this->urlToImage = array();
			$this->description = array();


			$this->getJsonData();

		}



		private function getJsonData(){

			$content = file_get_contents($this->path);

			$json = json_decode($content, TRUE);



			$this->articleArray = $json;

		}


		public function returnJsonData(){

			$sliced = array_slice($this->articleArray, 0, 50);

			return $sliced;
		}

	}


?>


<!DOCTYPE html>
<html>
<head>
	<title>test file</title>
</head>
<body>

	<?php 

		ini_set('display_startup_errors', 1);
		ini_set('display_errors', 1);
		error_reporting(-1);

		$json = new readJson();

		$articles = $json->returnJsonData();

		foreach($articles as $article){
			echo "<div class='article-image'style='background-image: url(".$article['urlToImage'].")' ;>

				<a href=".$article['url']." target='_blank'>".$article['title']."</a> <br/>

			</div>";
		}


	?>

	<style type="text/css">
		
		.article-image{
			background-position: center center;
			background-repeat: no-repeat;
			background-size: contain;
			height: 120px;
			width: 100%;
			float: left;
		}


	</style>

</body>
</html>