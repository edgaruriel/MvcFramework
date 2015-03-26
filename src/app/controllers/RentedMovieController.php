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
		$movies = json_decode($data["movies"],true);
		$today = date('Y-m-d');
		foreach ($movies as $movie){
			$model = new ClientHasMovie();
			$model->setAttributes($data);
			$model->movieId = $movie["id"];
			$model->date = $today;
			$model->isRented = true;
			$model->rentedUnits = $movie["numberMovie"];
			$model->total = $movie["numberMovie"];
			$model->addMovieRented();
		}
		
		//$model->
	}
}