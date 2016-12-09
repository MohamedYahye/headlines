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



		private function getArticles(){

			foreach($this->_src as $src){

				$this->articles = $this->_articles->getArticles($src);
			}

			


		}



		public function returnArticles(){
			return $this->articles;
		}
	}


	//new articleObj();


?>