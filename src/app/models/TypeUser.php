<?php
class TypeUser extends ActiveRecord{

	public static $typeUserArray = Array('ADMIN'=>1, 'EMPLOYEE'=>2, 'MANAGER'=>3);
	
	public function finOneById($id){
		$this->find("id =".$id);
	}
	
	public function findAllTypeUser(){
		$typeUserArray = Array();
		$rows = $this->findAll();
		foreach ($rows as $row){
			$typeUser = new TypeUser();
			$typeUser->setAttributes($row);
			array_push($typeUserArray, $typeUser);
		}
		return $typeUserArray;
	}
	
}