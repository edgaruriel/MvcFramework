<?php
class ClientHasMovie extends ActiveRecord{

    public function findAll(){
        $date = Date("Y-m-d");
        $arrayIdMovies = array();
        $rows = $this->findAll("DATE_FORMAT(date, '%Y-%m-%d') = '".$date."'");
        print_r($rows);
        exit();
        foreach ($rows as $row){
            if(!in_array($row["movie_id"],$arrayIdMovies)){
                array_push($arrayIdMovies,$row["movie_id"]);
            }
            /*$model = new Movie();
            $model->finOneById($row["movie_id"]);
            array_push($array,array("units"=>$adatos["total"],"movie"=>$controller->findOne($idMovie)));*/
        }
        print_r($arrayIdMovies);
        exit();
        return $arrayIdMovies;
    }

}