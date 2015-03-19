<?php
class User extends ActiveRecord{
	public static $ID = 0;
	public static  $FIRST_NAME = 1;
	public static  $LAST_NAME = 2;
	public static  $USER = 3;
	public static  $PASSWORD = 4;
	public static  $TYPE_USER = 5;
	
	public static $typeUserArray = Array('admin'=>1, 'employee'=>2, 'manager'=>3);
	
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
			$modelUser = new User();
			$modelUser->setAttributes($row);
			array_push($users, $modelUser);
		}
		return $users;
	}
	
	public function login($user,$password){
		$this->find("username ='".$user."' AND password = '".$password."'");
		if($this->username == $user && $this->password == $password){
			Authentication::getInstance()->login($this->typeUser);
		}
	}
}