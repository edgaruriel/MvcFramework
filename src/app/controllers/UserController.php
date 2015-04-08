<?php
class UserController extends MvcController{
	
	function listUserAction(){
 		$modelUser = new User();
 		$userArray = $modelUser->findAllUser();
        $this->render("index",array('users' => $userArray),"HeaderAdmin", "admin");
	}
	
	function newUserAction(){
		$typeUser = new TypeUser();
		$typeUserArray = $typeUser->findAllTypeUser();
		$this->render("new",array('types' => $typeUserArray),"HeaderAdmin", "admin");
	}

	function addUserAction(){
		$data = $this->params;
		$modelUser = new User();
		$modelUser->setAttributes($data);
		$modelUser->status = true;
		$modelUser->password = sha1($modelUser->password);
		$modelUser->add();
		$this->redirect("../User/listUser");
	}
	
	function deleteUserAction(){
		$data = $this->params;
		$modelUser = new User();
		$modelUser->findOneById($data["id"]);
		$modelUser->status = false;
		$modelUser->update();
		//$modelUser->deleteOneByPrimaryKey();
		$this->redirect("../User/listUser");
	}
	
	function editUserAction(){
		$data = $this->params;
		$modelUser = new User();
		$modelUser->findOneById($data["id"]);
		$typeUser = new TypeUser();
		$typeUserArray = $typeUser->findAllTypeUser();
		$this->render("edit",array('employee' => $modelUser, 'types'=>$typeUserArray),"HeaderAdmin", "admin");
	}
	
	function updateUserAction(){
		$data = $this->params;
		$modelUser = new User();
		$modelUser->findOneById($data["id"]);
		if($data["password"] != ""){
		$modelUser->setAttributes($data);
		$modelUser->password = sha1($modelUser->password);
		}else{
		$password = $modelUser->password;
		$modelUser->setAttributes($data);
		$modelUser->password = $password;
		}
		
		$modelUser->update();
		$this->redirect("../User/listUser");
	}
	
}