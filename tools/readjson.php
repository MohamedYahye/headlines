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

			//$sliced = array_slice($this->articleArray, 0, 50);

			return $this->articleArray;
		}


	}


?>