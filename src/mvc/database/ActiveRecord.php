<?php
class ActiveRecord {
    public $columns = array();
    public $isNewRecord = true;
    public $dbConnection;
    public $metaData;
    public $primaryKey;

    function __construct()
    {
     	$this->getMetaData();
         $this->dbConnection = DBConnection::getInstance();
    }

    protected function getTableName(){
        return strtolower(get_class($this));
    }

    protected function getMetaData(){
        $result = DBConnection::getInstance()->getCommand()->execute("SHOW FULL COLUMNS FROM ".$this->getTableName());
        foreach ($result as $row){
        	$this->columns[$row["Field"]] = null;
        	if($row["Key"] === "PRI"){
        		$this->primaryKey = $row["Field"];
        	}
        }

    }
    
    public function findAll($conditions = ''){
    	$result = DBConnection::getInstance()->getCommand()->select($this->columns,$this->getTableName(),$conditions);
    	return $result;
    }

    public function getAttributes($attributesArray){
    	$result = Array();
    	foreach ($attributesArray as $column => $value){
    		$result[$column] = $this->$column;
    	}
    	return $result;
    }

    public function setAttributes($attributesArray){
    	foreach ($attributesArray as $column => $value){
    		if($column == $this->primaryKey && $value != '' && $value != null){
    			$this->isNewRecord = false;
    		}
			$this->$column = $value;
		}
    }

    public function save(){
		if($this->isNewRecord()){
		return DBConnection::getInstance()->getCommand()->insert($this->columns,$this->getTableName(),$this->primaryKey);
		}else{
		return DBConnection::getInstance()->getCommand()->update($this->columns,$this->getTableName(),$this->primaryKey);
		}
    }

    public function delete(){
    	DBConnection::getInstance()->getCommand()->delete($this->primaryKey,$this->columns[$this->primaryKey],$this->getTableName());
    }

    public function find($conditions){
		$result = DBConnection::getInstance()->getCommand()->select($this->columns,$this->getTableName(),$conditions);
		if(count($result) == 1){
			$this->setAttributes($result[0]);
		}else if(count($result) != 0){
			throw new Exception('ERROR: Existe m&aactute; de una coincidencia en con la condici&oacute;n: '.$conditions.' Se recomienda utilizar el m&eacute;todo findAll');
		}
    }

    public function isNewRecord(){
		return $this->isNewRecord;
    }

    public function __get($property){
        if(array_key_exists($property, $this->columns)){
            return $this->columns[$property];
        }else{
//             return parent::__get($property);
        }
    }

    public function __set($property,$value){
        if(array_key_exists($property, $this->columns)){
            $this->columns[$property] = $value;
        }else{
//             parent::__set($property,$value);
        }
    }
} 