<?php 

	/**
	* create article object and properties
	*/
	class articleObj {
		

		

		protected $status;
		protected $source;
		protected $articles;
		protected $sortby;
		protected $title;
		protected $description;
		protected $url;
		protected $urlToImage;


		private $_source; // hold source object;

		public $_articles; // hold article object

		public $_src;

		function __construct() {

			require("SourceObj.php");
			require("articles.php");


			$this->status = "";
			$this->sources = array();
			$this->articles = array();
			$this->sortby = "";
			$this->title = array();
			$this->description = array();
			$this->url = array();
			$this->urlToImage = array();


			$this->_source = new SourceObj();
			$this->_articles = new articles();


			$this->_src = $this->_source->returnSources();

			$this->getArticles();

		}



		public function getArticles(){

			

			foreach($this->_src as $src){
				$this->articles = $this->_articles->getArticles($src);
				$this->writeJson();


			}

			//return $this->articles;

			

			
		}


		public function returnTitle(){
			return $this->title;
		}


		public function returnArticles(){

			return $this->articles;
		}




		protected function writeJson() {

			$filename = "articles/data.json";

			$data = $this->articles;

		    if (!file_exists($this->getJsonDirectory())) {
		      if (!drush_mkdir($this->getJsonDirectory())) {
		        return drush_set_error('NO_JSON_DIR', dt('Unable to create JSON directory at !file', array('!file' => $this->getJsonDirectory())));
		      }
		    }
		    // Remove headers.
		    array_shift($data);
		    $json_filename = str_replace('xml', 'json', $filename);
		    $file = $this->getJsonDirectory() . '/' . $json_filename;
		    if (file_exists($file)) {
		      unlink($file);
		    }
		    $json_data = json_encode($data);
		    if (!file_put_contents($file, $json_data)) {
		      return drush_set_error(dt('Failed to write JSON for file !file', array('!file' => $json_filename)));
		    }
		    var_dump('Wrote JSON to file !file', array('!file' => $file), 'ok');
		    return TRUE;
		}


		private function getJsonDirectory(){
			return basename(__DIR__);
		}
	}


	//new articleObj();


?>