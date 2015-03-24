<?php
class ActiveRecord {
    public $columns = array();
    public $columnsDB = array();
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
    	$parts = preg_split('/(?=[A-Z])/', get_class($this), -1, PREG_SPLIT_NO_EMPTY);
       if(count($parts) >1){
       		$name = '';
       		return strtolower(implode("_", $parts));
       }else{
       	return strtolower(get_class($this));
       }
      
    }

    protected function getMetaData(){
        $result = DBConnection::getInstance()->getCommand()->execute("SHOW FULL COLUMNS FROM ".$this->getTableName());
        foreach ($result as $row){
        	$field = $this->changeNameField($row["Field"]);
        	$this->columns[$field] = null;
        	$this->columnsDB[$row["Field"]] = null;
        	if($row["Key"] === "PRI"){
        		$this->primaryKey = $row["Field"];
        	}
        }
    }
    
    private function changeNameField($name)
    {
    	$flag = false;
    	$result = "";
    	$nameArray = explode("_",$name);
    	if(count($nameArray)>1)
    	{
    		foreach ($nameArray as $item)
    		{
    			if($flag){
    				$result .= ucfirst(strtolower($item));
    			}else{
    				$result .= $item;
    			}
    			$flag = true;
    		}
    	}else{
		return $name;
    	}
    	return $result;
    }
    
    public function findAll($conditions = ''){
    	$result = DBConnection::getInstance()->getCommand()->select($this->columnsDB,$this->getTableName(),$conditions);
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
    		$field = $this->changeNameField($column);
    		if($field == $this->primaryKey && $value != '' && $value != null){
    			$this->isNewRecord = false;
    		}
			$this->$field = $value;
		}
    }

    public function save(){
		if($this->isNewRecord()){
		return DBConnection::getInstance()->getCommand()->insert($this->columnsDB,$this->columns,$this->getTableName(),$this->primaryKey);
		}else{
		return DBConnection::getInstance()->getCommand()->update($this->columnsDB,$this->columns,$this->getTableName(),$this->primaryKey);
		}
    }

    public function delete(){
    	DBConnection::getInstance()->getCommand()->delete($this->primaryKey,$this->columns[$this->primaryKey],$this->getTableName());
    }

    public function find($conditions){
		$result = DBConnection::getInstance()->getCommand()->select($this->columnsDB,$this->getTableName(),$conditions);
		if(count($result) == 1){
			$this->setAttributes($result[0]);
		}else if(count($result) != 0){
			throw new Exception('ERROR: Existe m&aacute;s de una coincidencia en la condici&oacute;n: '.$conditions.' Se recomienda utilizar el m&eacute;todo findAll');
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