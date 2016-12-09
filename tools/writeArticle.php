<?php 

	


	/**
	* write articles to file
	* for easy loading
	*/


	class writeArticle {
		

		private $pathTowrite;
		private $API_KEY;
		public $source;

		private $data;

		protected $_src;

		function __construct() {

			require("sources.php");

			$this->source = array();

			$this->_src = new sources();


			$this->getSource();


			var_dump($this->source);

		}


		private function writeFile(){

		}



		private function getFile(){

		}


		private function getSource(){

			$this->source = $this->_src->getSourceId();

		}



	}


	new writeArticle();


?>