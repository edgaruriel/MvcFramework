<?php ?>
<div class="container center" >
	<input type="hidden" id="idRefresh" name="idRefresh" value="<?php echo (isset($_GET["refresh"]))? $_GET["refresh"]: "";?>"/>
	<div class="header">Peliculas</div>
        <div>
            <div class="actions">
	            <a href="newMovie" class="button right verde"><span class="icon fa-plus"></span>Agregar Pelicula</a>
	            <a href="../Index/indexAdmin" class="button left azul"><span class="icon fa-home"></span>Regresar</a>
            </div>
            <table style="" border="1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Disponibles</th>
                        <th>Precio</th>
                        <th>Genero</th>
                        <th>OPERACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($movies as $movie):?>
                        <tr>
                            <td><?php echo $movie->id;?></td>
                            <td><?php echo utf8_encode($movie->title);?></td>
                            <?php $available = ($movie->totalUnits) - ($movie->rentedUnits);?>
                            <td><?php echo $available;?></td>
                            <td><?php echo '$'.number_format($movie->price,2);?></td>
                            <td><?php echo utf8_encode($movie->getGender()->name);?></td>
                            <td>
                                <a href="editMovie?id=<?php echo $movie->id;?>" class="s-button verde"><span class="s-icon fa-edit"></span></a>
                                <a href="deleteMovie?id=<?php echo $movie->id;?>" class="s-button rojo"><span class="s-icon fa-trash"></span></a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
    </div>
</div>

