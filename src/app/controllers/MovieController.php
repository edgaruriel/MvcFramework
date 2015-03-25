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
        $this->render("new",array('genders'=> $genders));
    }

    function addMovieAction(){
        $data = $this->params;
        $model = new Movie();
        $model->setAttributes($data);
        $model->add();
        $this->redirect("../User/listUser");
    }

    function deleteMovieAction(){
        $data = $this->params;
        $model = new Movie();
        $model->setAttributes($data);
        $model->status = false;
        $model->update();
        $this->redirect("../User/listUser");
    }

    function editMovieAction(){
        $data = $this->params;
        $model = new Movie();
        $model->finOneById($data["id"]);
        $this->render("edit",array('movie' => $model));
    }

    function updateMovieAction(){
        $data = $this->params;
        $model = new Movie();
        $model->setAttributes($data);

        $model->update();
        $this->redirect("../User/listUser");
    }
}