<?php

class CashController extends MvcController{

    function cashAdminAction(){
        $model = new ClientHasMovie();
        $date = Date("Y-m-d");
        $registers = $model->findAll("DATE_FORMAT(date, '%Y-%m-%d') = '".$date."'");
        $arrayIdMovies = array();
        $arrayMovies = array();

        foreach($registers as $register){
            if(!in_array($register["movie_id"],$arrayIdMovies)){
                array_push($arrayIdMovies,$register["movie_id"]);
            }
        }

        foreach($arrayIdMovies as $id){
            $cquery = "SELECT SUM(client_has_movie.rented_units) AS total FROM client_has_movie WHERE movie_id=".$id." AND DATE_FORMAT(date, '%Y-%m-%d') = '".$date."'";
            $result = $model->executeQuery($cquery);

            $movie = new Movie();
            $movie->finOneById($id);
            foreach($result as $row){
                array_push($arrayMovies,array("units"=>$row["total"],"movie"=>$movie));
            }
        }

        $this->render("index",array('arrayMovies' => $arrayMovies), "HeaderAdmin", "admin");
    }

    function cashEmployeeAction(){
        $model = new ClientHasMovie();
        $date = Date("Y-m-d");
        $registers = $model->findAll("DATE_FORMAT(date, '%Y-%m-%d') = '".$date."'");
        $arrayIdMovies = array();
        $arrayMovies = array();

        foreach($registers as $register){
            if(!in_array($register["movie_id"],$arrayIdMovies)){
                array_push($arrayIdMovies,$register["movie_id"]);
            }
        }

        foreach($arrayIdMovies as $id){
            $cquery = "SELECT SUM(client_has_movie.rented_units) AS total FROM client_has_movie WHERE movie_id=".$id." AND DATE_FORMAT(date, '%Y-%m-%d') = '".$date."'";
            $result = $model->executeQuery($cquery);

            $movie = new Movie();
            $movie->finOneById($id);
            foreach($result as $row){
                array_push($arrayMovies,array("units"=>$row["total"],"movie"=>$movie));
            }
        }

        $this->render("index",array('arrayMovies' => $arrayMovies), "HeaderEmployee", "employee");
    }
} 