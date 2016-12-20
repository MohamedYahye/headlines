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
			return $_SESSION['username'];
		}


		public function destroySession(){
			unset($_SESSION['username']);
		}
	}


?>