<?php
class LogInController extends MvcController{
	
	public function logInAction(){
// 		$login = new LogIn();
// 		$login->initLogIn();
		$this->render("LogIn",array());
	}
	
	public function AuthenticationAction(){
		$data = $this->params;
		$modelUser = new User();
		$modelUser->login($data["user"], sha1($data["password"]));
		
// 		print_r($modelUser->columns);
// 		echo '\n';
// 		print_r($modelUser->columnsDB);
// 		exit();
		if(Authentication::getInstance()->isLogged()){
			$url = "../User/listUser";
			$this->redirect($url);
		}else{
			$url = "../LogIn/logIn";
			$this->redirect($url);
		}
	}
	
	public function logOutAction(){
		Authentication::getInstance()->logout();
		$url = "../LogIn/logIn";
		$this->redirect($url);
	}
}

