<?php 


	/**
	* download all articles adn save to json file
	*/


	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);

	class downloadArticle {
		
		private $sourceArray;
		protected $articleArray;

		private $articelPath;

		private $sourcePath;

		private $API_KEY;

		private $location;

		function __construct() {

			$this->API_KEY = "f15a57355e374710923d902efe952db5";

			$this->sourceArray = array();

			$this->articleArray = array();


			$this->articelPath = "articles/data.json";
			$this->sourcePath = "articles/sources.json";

			$this->getSources();
		}



		private function getSources(){
			$content = file_get_contents($this->sourcePath);

			$json = json_decode($content, TRUE);

			foreach($json as $source){
				$this->sourceArray = $source['id'];

				$this->downloadArticle($source['id']);
			}
		}


		private function downloadArticle($src){
			$this->location = $this->location = "https://newsapi.org/v1/articles?source=".$src."&apiKey=".$this->API_KEY."";

			$content = file_get_contents($this->location);

			$json = json_decode($content, TRUE);

			

			if($json['status'] == "ok"){
				foreach($json as $article){
					$this->articleArray = $article;


					$this->writeBadJsonArticle($article);
				}


			}

		}



		private function writeBadJsonArticle($data){
			$fh = fopen("articles/data.json", 'w')
			      or die("Error opening output file");
			fwrite($fh, json_encode($data,JSON_UNESCAPED_UNICODE));
			fclose($fh);
		}


		private function returnSource(){
			return $this->sourceArray;
		}
	}


	new downloadArticle();



?>