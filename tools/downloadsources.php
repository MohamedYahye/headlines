<?php 
	
	/**
	* download all sources and save in json file; filename = sources.json
	*/


	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);

	class downloadsources {
		

		protected $sources;
		protected $sourceLocation;


		function __construct() {

			$this->sources = array();
			$this->articlesArray = array();

			$this->sourceLocation = "https://newsapi.org/v1/sources";

			$this->getSources();
		}


		protected function getSources(){


			$content = file_get_contents($this->sourceLocation);

			$json = json_decode($content, TRUE);

			if($json['status'] == "ok"){
				foreach($json as $src){
					$this->sources = $src;
					
					$this->writeBadJsonSources();
				}
				

			}
		}




		protected function writeBadJsonSources(){
			$fh = fopen("articles/sources.json", 'w')
			      or die("Error opening output file");
			fwrite($fh, json_encode($this->sources,JSON_UNESCAPED_UNICODE));
			fclose($fh);
		}


	// 	protected function writeJson() {

	// 		$filename = "articles/sources.json";

	// 		$data = $this->sources;

	// 	    if (!file_exists($this->getJsonDirectory())) {
	// 	      if (!drush_mkdir($this->getJsonDirectory())) {
	// 	        return drush_set_error('NO_JSON_DIR', dt('Unable to create JSON directory at !file', array('!file' => $this->getJsonDirectory())));
	// 	      }
	// 	    }
	// 	    // Remove headers.
	// 	    array_shift($data);
	// 	    $json_filename = str_replace('xml', 'json', $filename);
	// 	    $file = $this->getJsonDirectory() . '/' . $json_filename;
	// 	    if (file_exists($file)) {
	// 	      unlink($file);
	// 	    }
	// 	    $json_data = json_encode($data);
	// 	    if (!file_put_contents($file, $json_data)) {
	// 	      return drush_set_error(dt('Failed to write JSON for file !file', array('!file' => $json_filename)));
	// 	    }
	// 	    var_dump('Wrote JSON to file !file', array('!file' => $file), 'ok');
	// 	    return TRUE;
	// 	}


	// 	private function getJsonDirectory(){
	// 		return basename(__DIR__);
	// 	}
	}


	new downloadsources();


?>