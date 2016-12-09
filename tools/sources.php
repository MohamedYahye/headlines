<?php 

	/**
	* source
	* get all sources
	*/
	class sources	{
		
		protected $location;



		function __construct() {

			$this->location = "https://newsapi.org/v1/sources";
			//$this->getSourceId();

		}


		public function getSourceId(){

			$content = file_get_contents($this->location);

			$result = json_decode($content, TRUE);

			$sourceArray = array();

			if($result['status'] == "ok"){

				foreach($result['sources'] as $src){
					$sourceArray[] = $src['id'];
				}
				return $sourceArray;
			}else{
				echo "oeps, something went wrong!";
			}
			
		}
	}






	//new sources();
?>