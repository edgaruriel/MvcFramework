<?php
?>
<script src="../src/app/public/js/employee/rentedMovie/new.js"></script>
<div class="container center">
 <form action="../RentedMovie/add" id="form" name="form" method="post" class="form-group">
	<div class="header">Nueva Renta</div>
	<div class="form-group">
		<label><span>Cliente:</span></label>
		<select id="clientId" name="clientId">
			<option value="">Seleccione un cliente</option>
			<?php foreach ($allClients as $client):?>
			<option value="<?php echo $client->id;?>"><?php echo $client->name;?></option>
			<?php endforeach;?>
		</select>
		
		<label><span>Fecha de devoluci&oacute;n</span></label>
		<input type="date" id="devolutionDate" name="devolutionDate"/>

		<label><span>Pelicula:</span></label>
		<select id="movie" name="movie">
			<option value="">Seleccione una pelicula</option>
			<?php 
			$arrayAux = Array();
			foreach ($allMovies as $movie):
			array_push($arrayAux, $movie->columns);
			?>
			<option value="<?php echo $movie->id;?>"><?php echo $movie->title.' ('.$movie->year.')'.' Disponibles '.($movie->totalUnits - $movie->rentedUnits);?></option>
			<?php endforeach;?>
		</select>
		<input type="hidden" id="allMovie" name="allMovie" value='<?php echo json_encode($arrayAux);?>'/>
		<label><span>N&uacute;mero de peliculas a rentar:</span></label>
		<input type="number" id="numberMovie" name="number" />

		<button type="button" onclick="addMovie();" class="verde"><span class="icon fa-plus"></span>Agregar pelicula</button>
	</div>
		<hr>
		<h3>Lista de peliculas agregadas</h3>
		<table id="selectedMoviesTable" name="selectedMoviesTable" class="tableMovie">
			<thead>
				<tr>
					<th>Titulo</th>
					<th>A&ntilde;o</th>
					<th>Unidades</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody id="tbodyMovieList">
				
			</tbody>
		</table>
		<input type="hidden" id="movies" name="movies" value=""/>
	<button type="submit" class="verde right" id="btnNew" name="btnNew">Rentar</button>
	</form>
	<a id="btn_cancelar" value="Cancelar" href="../RentedMovie/index" class="button azul left"><span class="icon fa-times"></span>Cancelar</a>
	<br><br><br>
</div>
