<?php 

	/**
	* get article by source;
	* check if articles can be downloaded fully
	*/
	class articleBySource {
		

		private $location;

		protected $articleBySource;

		private $API_KEY;

		function __construct($src) {

			$this->API_KEY = "f15a57355e374710923d902efe952db5";

			$this->articleBySource = array();



			$this->getArticleBySource($src);
		}


		private function getArticleBySource($src){
			$this->location = "https://newsapi.org/v1/articles?source=".$src."&apiKey=".$this->API_KEY."";



			$content = file_get_contents($this->location);

			$json = json_decode($content, TRUE);

			if($json['status'] == "ok"){
				foreach($json as $article){
					$this->articleBySource = $article;
				}
			}
		}


		public function returnArticle(){
			return $this->articleBySource;
		}
	}


?>