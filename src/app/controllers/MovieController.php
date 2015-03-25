<?php
class MovieController extends MvcController{

    function listMoviesAction(){
        $model = new Movie();
        $movies = $model->findAllMovies();
        $this->render("index",array('movies' => $movies), "HeaderAdmin", "admin");
    }

    function newMovieAction(){
        $model = new Gender();
        $genders = $model->findAllGenders();
        $this->render("new",array('genders'=> $genders),"HeaderAdmin","admin");
    }

    function addMovieAction(){
        $data = $this->params;
        $model = new Movie();
        $model->setAttributes($data);
        $model->add();
        $this->redirect("../Movie/listMovies");
    }

    function deleteMovieAction(){
        $data = $this->params;
        $model = new Movie();
        $model->finOneById($data["id"]);
        $model->status = false;
        $model->update();
        $this->redirect("../Movie/listMovies");
    }

    function editMovieAction(){
        $data = $this->params;
        $model = new Movie();
        $model->finOneById($data["id"]);
        $modelGender = new Gender();
        $genders = $modelGender->findAllGenders();
        $this->render("edit",array('movie' => $model,'genders'=>$genders),"HeaderAdmin", "admin");
    }

    function updateMovieAction(){
        $data = $this->params;
        $model = new Movie();
        $model->setAttributes($data);

        $model->update();
        $this->redirect("../Movie/listMovies");
    }
}