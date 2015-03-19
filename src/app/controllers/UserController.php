<?php
class UserController extends MvcController{
	
	function listUserAction(){
 		$modelUser = new User();
 		$UserList = new UserIndex();
 		$userArray = $modelUser->findAllUser();
		$UserList->listUser($userArray);
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
		$this->redirect("Location:../User/listUser");
	}
	
	function deleteUserAction(){
		$data = $this->params;
		$modelUser = new User();
		$modelUser->setAttributes($data);
		$modelUser->deleteOneByPrimaryKey();
		$this->redirect("Location:../User/listUser");
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
		$this->redirect("Location:../User/listUser");
	}
	
}