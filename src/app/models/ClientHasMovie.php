<?php
class ClientHasMovie extends ActiveRecord{
	public static $statusArray = Array('RENTED'=>1, 'NOT_RENTED'=>0);
	public $client = null;
	public $movie = null;
	

    /**
	 * @return the $client
	 */
	public function getClient() {
		return $this->client;
	}

	/**
	 * @return the $movie
	 */
	public function getMovie() {
		return $this->movie;
	}

	/**
	 * @param field_type $client
	 */
	public function setClient($client) {
		$this->client = $client;
	}

	/**
	 * @param field_type $movie
	 */
	public function setMovie($movie) {
		$this->movie = $movie;
	}

	public function findAllMovieToday(){
        $date = Date("Y-m-d");
        $registers = $this->findAll("DATE_FORMAT(date, '%Y-%m-%d') = '".$date."'");
        $arrayIdMovies = array();
        $arrayMovies = array();

        foreach($registers as $register){
            if(!in_array($register["movie_id"],$arrayIdMovies)){
                array_push($arrayIdMovies,$register["movie_id"]);
            }
        }

        foreach($arrayIdMovies as $id){
            $cquery = "SELECT SUM(client_has_movie.rented_units) AS total FROM client_has_movie WHERE movie_id=".$id." AND DATE_FORMAT(date, '%Y-%m-%d') = '".$date."'";
            $result = $this->executeQuery($cquery);

            $movie = new Movie();
            $movie->finOneById($id);
            foreach($result as $row){
                array_push($arrayMovies,array("units"=>$row["total"],"movie"=>$movie));
            }
        }

        return $arrayMovies;
    }
    
    public function findAllMovieRented(){
    	$rentedArray = Array();
    	$rows = $this->findAll();
    	foreach ($rows as $row){
    		$model = new ClientHasMovie();
    		$model->setAttributes($row);
    		
    		$client = new Client();
    		$client->findOneById($model->clientId);
    		$model->setClient($client);
    		
    		$movie = new Movie();
    		$movie->finOneById($model->movieId);
    		$model->setMovie($movie);
    		
    		array_push($rentedArray, $model);
    	}
    	return $rentedArray;
    }
    
    public function addMovieRented(){
    	$this->save();
    }
    
    public function update(){
    	$this->save();
    }
    
    public function findOneById($id){
    	$this->find(" id=".$id);
    	
    	$client = new Client();
    	$client->findOneById($this->clientId);
    	$this->setClient($client);
    	
    	$movie = new Movie();
    	$movie->finOneById($this->movieId);
    	$this->setMovie($movie);
    }

}