<?php
class Gender extends ActiveRecord{
	
	public static $genderArray = Array('ACCION'=>1,'COMEDIA'=>2,'TERROR'=>3,'SUSPENSO'=>4,'DRAMA'=>5,'INFANTIL'=>6);

    public function finOneById($id){
        $this->find("id =".$id);
    }

    public function findAllGenders(){
        $genders = Array();
        $rows = $this->findAll();
        foreach ($rows as $row){
            $model = new Gender();
            $model->setAttributes($row);
            array_push($genders, $model);
        }
        return $genders;
    }

}