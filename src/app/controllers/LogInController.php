<?php
class LogInController extends MvcController{
	
	public function logInAction(){
		$login = new LogIn();
		$login->initLogIn();
	}
	
	public function AuthenticationAction(){
		$data = $this->params;
		$modelUser = new User();
		$modelUser->login($data["user"], $data["password"]);
		
		if(Authentication::getInstance()->isLogged()){
			$url = "Location:../User/listUser";
			$this->redirect($url);
		}else{
			$url = "Location:../LogIn/logIn";
			$this->redirect($url);
		}
	}
	
	public function logOutAction(){
		Authentication::getInstance()->logout();
		$url = "Location:../LogIn/logIn";
		$this->redirect($url);
	}
}

