<?php

class Auth {

	public $db;

	public function __construct(queryBuilder $db){
		$this->db = $db;
	}

	public function registrateUser($email, $pass, $impgpath) {
		$user = $this->db->addNew('users', [
			'email' => $email,
			'pass' => md5($pass),
			'imgpath' => $impgpath			
		]);
		$_SESSION['user'] = $user;
	}

	public function accessLoginingUser($email, $pass){		

		$user = $this->db->checkOne('users', $email, $pass);
		if($user) {
			$_SESSION['user'] = $user;
			return true;
		}
		return false;
	}

	public function logoutUser(){
		unset($_SESSION['user']);
	}

	public function checkUser(){
		if(isset($_SESSION['user'])) {
			return true;
		}	
		return false;
	}

	public function currentUser(){
		
		if(isset($_SESSION['user'])) {
			return $_SESSION['user'];
		}				
	}			
}