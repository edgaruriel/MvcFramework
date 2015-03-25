<?php
class Movie extends ActiveRecord{
	public static $statusArray = Array('activo'=>1,'borrado'=>0);

    public $gender = null;

    /**
     * @return null
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param null $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
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
        $gender = new Gender();
        $gender->finOneById($this->genderId);
        $this->setGender($gender);
    }

    public function findAllMovies(){
        $movies = Array();
        $rows = $this->findAll("status = 1");
        foreach ($rows as $row){
            $model = new Movie();
            $model->setAttributes($row);
            $gender = new Gender();
            $gender->finOneById($model->genderId);
            $model->setGender($gender);
            array_push($movies, $model);
        }
        return $movies;
    }
}