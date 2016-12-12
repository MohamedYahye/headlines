<?php 

	

	/**
	* get all sources from articles/sources.json
	*/
	class readsources {
		
		private $path;
		private $sourcesArray;


		function __construct(){
			$this->path = "tools/articles/sources.json";
			$this->sourcesArray = array();
			$this->singleSourceArticle = array();


			$this->getSources($this->path);
		}



		private function getSources(){
			$content = file_get_contents($this->path);

			$json = json_decode($content, TRUE);


			$this->sourcesArray = $json;
		}


		public function returnSources(){
			return $this->sourcesArray;
		}



		
	}


	//new readsources();

?>