<?php

	/**
	* articles
	* return all articles
	*/

	error_reporting(~0);
	ini_set('display_errors', 1);

	class articles {

		

		private $API_KEY;
		

		private $location;
		public $articlesArray;
		protected $dataError;

		function __construct() {

			$this->dataError = true;

			$this->API_KEY = "f15a57355e374710923d902efe952db5";
			//var_dump($this->getArticles("the-next-web"));
			$this->articlesArray = array();
		}


		function getArticles($src) {

			$this->location = "https://newsapi.org/v1/articles?source=".$src."&apiKey=".$this->API_KEY."";
			//ini_set('max_execution_time', 100);
			$content = file_get_contents($this->location);

			$result = json_decode($content, TRUE);

			if($result['status'] == 'ok'){

				foreach($result as $article){
					$this->articlesArray[] = $article;
				}

				return $this->articlesArray;

			}else{
				return "no data in " . pathinfo(__FILE__, PATHINFO_FILENAME);
			}

		}

		
	}
	//new articles();
?>