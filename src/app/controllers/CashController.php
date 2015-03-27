<?php

class CashController extends MvcController{

    function cashAdminAction(){
        $model = new ClientHasMovie();
        $arrayMovies = $model->findAllMovieToday();
        $this->render("index",array('arrayMovies' => $arrayMovies), "HeaderAdmin", "admin");
    }

    function cashEmployeeAction(){
        $model = new ClientHasMovie();
        $arrayMovies = $model->findAllMovieToday();
        $this->render("index",array('arrayMovies' => $arrayMovies), "HeaderEmployee", "employee");
    }
} 