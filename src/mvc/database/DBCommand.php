<?php
class DBCommand {
    public $params = array();
    public $connection;

    public function execute($query){
        $this->connection = DBConnection::getInstance();
        $result = $this->connection->getPdo()->query($query);
        return $result;
    }

    public function lastInsertId($name = NULL) {
    	return $this->connection->getPdo()->lastInsertId($name);
    }

    public function insert($columns,$tableName, $primaryKey){
    	unset($columns[$primaryKey]);
    	$query = '';
    	$keys = array_keys($columns);
    	$query = implode(",", $keys);
    	
    	$keyValues = Array();
    	foreach ($columns as $key=>$value){
    			array_push($keyValues, "'".$value."'");
    	}
    	
     	$values = implode(",", $keyValues);
    	$sentence = $this->connection->getPdo()->prepare('INSERT INTO '.$tableName.' ('.$query.') VALUES ('.$values.')');
    	$sentence->execute();
    	return $this->lastInsertId();
    	
    }

    public function update($columns,$tableName, $primaryKey){
    	$primaryKeyValue = $columns[$primaryKey];
		unset($columns[$primaryKey]);
    	$query = '';
		$arrayAux = Array();
    	foreach ($columns as $column => $value){
    		array_push($arrayAux, $column." = '".$value."'");
    	}
    	$query = implode(",", $arrayAux);
    	$sentence = $this->connection->getPdo()->prepare('UPDATE '.$tableName.' SET '.$query.' WHERE '.$primaryKey.' = '.$primaryKeyValue);
    	$sentence->execute();
    	return $this->lastInsertId();
    }

    public function select($columns,$tableName,$conditions = ''){
    	$result = Array();
    	
    	$query = '';
    	$keys = array_keys($columns);
    	$query = implode(",", $keys);
    	if($conditions != ''){
    		$conditions = 'WHERE '.$conditions;
    	}
    	$sentence = $this->connection->getPdo()->prepare("SELECT ".$query." FROM ".$tableName." ".$conditions);
    	
    	$sentence->execute();
	    while ($fila = $sentence->fetch()) {
	    	$row = Array();
	    	foreach ($columns as $column=>$value){
	    		if(in_array($column, array_keys($fila))){
	    			$row[$column] = $fila[$column];
	    		}else{
	    			$row[$column] = '';
	    		}
	    	}
	    	array_push($result, $row);
	 	 }
	 	 return $result;
    }

    public function delete($primaryKey,$value,$tableName){
    	$sentence = $this->connection->getPdo()->prepare('DELETE FROM '.$tableName.' WHERE '.$primaryKey.' = '.$value);
    	$sentence->execute();
    }
} 