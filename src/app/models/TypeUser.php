<?php
class TypeUser extends ActiveRecord{

	public static $typeUserArray = Array('admin'=>1, 'employee'=>2, 'manager'=>3);
	
	public function finOneById($id){
		$this->find("id =".$id);
	}
	
}