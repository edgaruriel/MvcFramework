<?php
class LogInController extends MvcController{
	
	public function logInAction(){
		$this->render("logIn",array());
	}
	
	public function AuthenticationAction(){
		$data = $this->params;
		$modelUser = new User();
		$modelUser->login($data["user"], sha1($data["password"]));
		
		if(Authentication::getInstance()->isLogged()){
			//$url = "../User/listUser";
			$url = "";
			if($modelUser->getTypeUser()->id == TypeUser::$typeUserArray["ADMIN"]){
				$url = "../Index/indexAdmin";
				//$this->redirect($url);
			}else if($modelUser->getTypeUser()->id == TypeUser::$typeUserArray["EMPLOYEE"]){
				$url = "../Index/indexEmployee";
			}else{
				$url = "../LogIn/logOut";
			}
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

