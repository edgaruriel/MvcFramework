<?php
class RentedMovieController extends MvcController{
	
	function indexAction(){
		$model = new ClientHasMovie();
		$rentedArray = $model->findAllMovieRented();
		$this->render("index",array('allRented' => $rentedArray),"HeaderEmployee", "employee");
	}
	
	function newAction(){
		$client = new Client();
		$allClients = $client->findAllCientsActive();
		
		$movie = new Movie();
		$movies = $movie->findAllMovies();
		$this->render("new",array('allClients' => $allClients, "allMovies"=>$movies),"HeaderEmployee", "employee");
	}
	
	function addAction(){
		$data = $this->params;
		$model = new ClientHasMovie();
		$model->setAttributes($data);
		
		//$model->
	}
}