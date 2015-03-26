<?php
class Client extends ActiveRecord{
	
	public static $statusArray = Array('ACTIVE'=>1, 'NOT_ACTIVE'=>0);
	
	function findOneById($id){
		$this->find("id =".$id);
	}
	
	function findAllCientsActive(){
		$clients = Array();
		$rows = $this->findAll("status =".self::$statusArray["ACTIVE"]);
		foreach ($rows as $row){
			$model = new Client();
			$model->setAttributes($row);
			array_push($clients, $model);
		}
		return $clients;
	}
	
}