<?php
class UserController extends MvcController{
	
	function listUserAction(){
 		$modelUser = new User();
 		$UserList = new UserIndex();
 		$userArray = $modelUser->findAllUser();
        $this->render("listUser",array('users' => $userArray));
		//$UserList->listUser($userArray);
	}
	
	function newUserAction(){
		$UserNew = new UserNew();
		$UserNew->newUser();
	}

	function addUserAction(){
		$data = $this->params;
		$modelUser = new User();
		$modelUser->setAttributes($data);
		$modelUser->add();
		$this->redirect("../User/listUser");
	}
	
	function deleteUserAction(){
		$data = $this->params;
		$modelUser = new User();
		$modelUser->setAttributes($data);
		$modelUser->deleteOneByPrimaryKey();
		$this->redirect("../User/listUser");
	}
	
	function editUserAction(){
		$data = $this->params;
		$modelUser = new User();
		$modelUser->finOneById($data["id"]);
		$userEdit = new UserEdit();
		$userEdit->edit($modelUser);
	}
	
	function updateUserAction(){
		$data = $this->params;
		$modelUser = new User();
		$modelUser->setAttributes($data);
		
		$modelUser->update();
		$this->redirect("../User/listUser");
	}
	
}