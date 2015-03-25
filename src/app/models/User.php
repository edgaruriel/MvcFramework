<?php
class User extends ActiveRecord{
/*	public static $ID = 0;
	public static  $FIRST_NAME = 1;
	public static  $LAST_NAME = 2;
	public static  $USER = 3;
	public static  $PASSWORD = 4;
	public static  $TYPE_USER = 5;
*/

	public $typeUser = null;
	
	/**
	 * @return the $typeUser
	 */
	public function getTypeUser() {
		return $this->typeUser;
	}

	/**
	 * @param field_type $typeUser
	 */
	public function setTypeUser($typeUser) {
		$this->typeUser = $typeUser;
	}

	public function add(){
		$id = $this->save();
	}
	
	public function deleteOneByPrimaryKey(){
		$this->delete();
	}
	
	public function update(){
		$this->save();
	}
	
	public function finOneById($id){
		$this->find("id =".$id);
	}
	
	public function findAllUser(){
		$users = Array();
		$rows = $this->findAll();
		foreach ($rows as $row){
			$model = new User();
			$model->setAttributes($row);
			
			$typeUser = new TypeUser();
			$typeUser->finOneById($model->typeUserId);
			$model->setTypeUser($typeUser);
			
			array_push($users, $model);
		}
		return $users;
	}
	
	public function login($user,$password){
		$this->find("username ='".$user."' AND password = '".$password."'");
		$typeUser = new TypeUser();
		$typeUser->finOneById($this->typeUserId);
		$this->setTypeUser($typeUser);

		//$this->getTypeUser()->id == TypeUser::$typeUserArray["admin"]
		if($this->username == $user && $this->password == $password){
			Authentication::getInstance()->login($this->getTypeUser()->id);
		}
	}
}