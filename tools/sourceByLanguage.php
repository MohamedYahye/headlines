<?php 
	
	/**
	* get categories by certain language;
	* return this to view
	*/
	class sourceByLanguage {
		
		private $location;

		protected $sourceArray;

		function __construct($language){

			$this->sourceArray = array();


			$this->getSourceByLanguage($language);
		}



		private function getSourceByLanguage($language){
			$this->location = "https://newsapi.org/v1/sources?language=".$language."";

			$content = file_get_contents($this->location);

			$json = json_decode($content, TRUE);

			if($json['status'] == "ok"){
				foreach($json as $src){
					$this->sourceArray = $src;
				}
			}
		}
	

		public function returnSources(){
			return $this->sourceArray;
		}

	}




?>