<?php 

	/**
	* get sources by category
	* get articles by the returned sources
	*/
	class sourceByCategory{
		

		private $pathToSource;
		public $sourceArray;

		function __construct($category) {


			

			$this->sourceArray = array();

			$this->getSourceByCategory($category);
		}



		private function getSourceByCategory($category){
			$this->pathToSource = "https://newsapi.org/v1/sources?category=".$category."";

			$content = file_get_contents($this->pathToSource);

			$json = json_decode($content, true);


			if($json['status'] == "ok"){
				foreach($json as $data){
					$this->sourceArray = $data;
				}
			}
		}





		private function findInArray($haytack){

			while ($x_value = current($haytack)) {

			    $x = key($haytack);

			    if ($x_value == 'sport') {
			    	echo $x ."<br /> ";
			    }
			    next($haytack);
			}

		}
		


		public function returnSources(){
			return $this->sourceArray;
		}


	}

	//new sourceByCategory();
?>