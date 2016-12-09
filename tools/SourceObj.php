<?php

	require('sources.php');
	/**
	* source object
	* create source object
	*/
	class SourceObj {
		

		public $status;
		public $source;
		public $name;
		public $url;
		public $urlToImage;


		function __construct(){
			$this->status = "";
			$this->source = array();
			$this->name = array();
			$this->url = "";
			$this->urlToImage = "";


			$this->fillSourceArr();
		}


		function fillSourceArr(){
			$sources = new sources();

			$this->source = $sources->getSourceId();
			
		}



		function returnSources(){
			return $this->source;
		}

		function returnName(){
			return $this->name;
		}
	}
?>