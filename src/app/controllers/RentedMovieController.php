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
			
			$movieModel = new Movie();
			$movieModel->finOneById($movie["id"]);
			$movieModel->rentedUnits +=  $movie["numberMovie"];
			$movieModel->update();
			
		}
		$this->redirect("../RentedMovie/index");
	}
	
	function returnMovieAction(){
		$data = $this->params;
		$rented = new ClientHasMovie();
		$rented->findOneById($data["id"]);
		
		$rented->isRented = false;
		
		$movie = $rented->getMovie();
		if(($movie->rentedUnits - $rented->rentedUnits) < 0){
			$movie->rentedUnits = 0;
		}else{
			$movie->rentedUnits = $movie->rentedUnits - $rented->rentedUnits;
		}
		$rented->update();
		$movie->update();
		$this->redirect("../RentedMovie/index");
	}
}