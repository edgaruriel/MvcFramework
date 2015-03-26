var MOVIES;
var ADD_MOVIES = new Array();
var ajax = {};
window.onload = function() {
	document.getElementById("numberMovie").onkeypress= function(){return justNumbers(event)};
	 document.getElementById("btnNew").onclick = function(){return rentedMovies()};
	MOVIES = JSON.parse(document.getElementById("allMovie").value);
}

function addMovie(){
var selectedMovie =	document.getElementById("movie").value;
var numberMovie =	document.getElementById("numberMovie").value;
	if(selectedMovie != '' && numberMovie != '' && numberMovie != ' ' && numberMovie != '.'){
		if(validateMovie(selectedMovie, numberMovie)){
			var movieAux = getMovieById(selectedMovie);
			var newMovie = new Movie();
			newMovie.id = selectedMovie;
			newMovie.title = movieAux.title;
			newMovie.year = movieAux.year;
			newMovie.numberMovie = numberMovie;
			var index = ADD_MOVIES.length;
			if(index != 0){
				//index--;
			}
			ADD_MOVIES[index] = newMovie;
			//console.log("Index a buscar "+index+" cantidad: "+ADD_MOVIES.length);
			addRowToTableMovies(index);
			refreshAddMovie();
		}else{
			//console.log("ERROR");
		}
	}else{
		alert("Seleccione una pelicula y un numero de peliculas valido");
	}
}

function getMovieById(idMovie){
	var movieOneAux = null;
	var i;
	for(i = 0; i< MOVIES.length; i++){
		var movieAux = MOVIES[i];
		if(movieAux.id==idMovie){
			movieOneAux = movieAux;
			break;
		}
	}
	return movieOneAux;
}

function deleteMovie(index){
	var i;
	for(i = 1; i<=ADD_MOVIES.length; i++){
		document.getElementById("selectedMoviesTable").deleteRow(1);
	}
	index--;
	refreshSelectMovie(index);
	ADD_MOVIES.splice(index, 1);
	for(i = 0; i<ADD_MOVIES.length; i++){
		addRowToTableMovies(i);
	}
	//console.log("Borro indice: "+index+" queda: "+ADD_MOVIES.length);
}

function refreshSelectMovie(index){
	var movie = ADD_MOVIES[index];
	//console.log(movie);
	var x = document.getElementById("movie");
    var option = document.createElement("option");
    var i;
    for(i=0;i<MOVIES.length;i++){
    	var movieAux = MOVIES[i];
    	if(movie.id == movieAux.id){
    		 option.text = movieAux.title+" ("+movieAux.year+") Disponibles "+(parseInt(movieAux.totalUnits - movieAux.rentedUnits));
    		 option.value = movieAux.id;
    		 break;
    	}
    }
    x.add(option);
}

function addRowToTableMovies(index){
	var selected  = ADD_MOVIES[index];
	index++;
	var table = document.getElementById("selectedMoviesTable");
	var row = table.insertRow(index);
	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
	var cell3 = row.insertCell(2);
	var cell4 = row.insertCell(3);
	cell1.innerHTML = selected.title;
	cell2.innerHTML = selected.year;
	cell3.innerHTML = selected.numberMovie;
	cell4.innerHTML = '<button onclick="deleteMovie('+index+');" class="sm-button rojo"><span class="s-icon fa-trash"></span></button>';
}

function refreshAddMovie(){
	document.getElementById("numberMovie").value = "";
	 var select = document.getElementById("movie");
	 select.remove(select.selectedIndex);
}

function validateMovie(idSelected,amountMovie){
	var i;
	var flag = false;
	for(i = 0; i< MOVIES.length; i++){
		var movieAux = MOVIES[i];
		if(movieAux.id == idSelected){
			var totalUnits = parseInt(movieAux.totalUnits);
			var rentedUnits = parseInt(movieAux.rentedUnits);
			var existUnits = totalUnits - rentedUnits;
			if(amountMovie <= existUnits && existUnits != 0 && amountMovie != 0){
				flag = true;
			}else{
				alert("El n�mero de peliculas disponibles para este titulo es: "+existUnits);
				flag = false;
			}
			break;
		}else{
			//console.log('No se encontro el '+idSelected+ " Paso: "+movieAux.id);
		}
	}
	return flag;
}

function rentedMovies(){
	var flag = true;
	var idClient = document.getElementById("clientId").value;
	if(idClient != ""){
		var date = document.getElementById("devolutionDate").value;
		if(date != ""){
			if(ADD_MOVIES.length > 0){
				//sendAjaxToAddRented();
				var movies = document.getElementById("movies");
				var json = JSON.stringify(ADD_MOVIES);
				movies.value = json;
			}else{
				flag = false;
				alert("Agregue al menos una pelicula");
			}
		}else{
			flag = false;
			alert("Seleccione una fecha para la devolucion");
		}
	}else{
		flag = false;
		alert("Seleccione un cliente");
	}
	return flag;
}

var Movie = function(){
	this.id;
	this.title;
	this.year;
	this.numberMovie;
}


function justNumbers(e)
{
	var keynum = window.event ? window.event.keyCode : e.which;
	if ((keynum == 8) || (keynum == 46))
	return true;
	 
	return /\d/.test(String.fromCharCode(keynum));
}

