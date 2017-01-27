<?php 
	
	/**
	* create session and store username
	*/
	class session{

		function __construct(){


			session_start();
		}


		public function setUser($username){



			$_SESSION['username'] = $username;
		}


		public function returnUsername(){

			if(!empty($_SESSION['username'])){
				return $_SESSION['username'];
			}else{
				return false;
			}

			
		}


		public function destroySession(){
			session_destroy();
		}
	}


?>