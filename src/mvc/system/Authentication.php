<?php
class Authentication{
	public static $isLogged = 'is_logged';
	private static $instance = null;
	
	function __construct() {
		session_start();
	}
	
	static function getInstance(){
		if (!isset(self::$instance)) {
			self::$instance = new Authentication;
		}
		return self::$instance;
	}
	
	public function login($obj){
		$_SESSION[Authentication::$isLogged] = $obj;
	}
	
	public function getValueSession($value){
		return $_SESSION[$value];
	}
	
	public function setValueSession($index, $value){
		$_SESSION[$index] = $value;
	}
	
	public function getValueLogInSession(){
		if(isset($_SESSION[Authentication::$isLogged])){
			return $_SESSION[Authentication::$isLogged];
		}else{
			return null;
		}
	}
	
	public function isLogged(){
		if(isset($_SESSION[Authentication::$isLogged])){
			return true;
		}else{
			return false;
		}
	}
	
	public function logout(){
		session_destroy();
	}
	
}