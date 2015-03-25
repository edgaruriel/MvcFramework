<?php ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script src="../../../../public/js/admin/movie/index.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../../public/css/main.css" media="screen" />
</head>
<body onload="refresh();">
<div class="nav">
	<a href="../employee/index.php" class="nav-button">Catalogo de usuarios</a>
	<a href="../movie/index.php" class="nav-button">Catalogo de peliculas</a>
	<a href="../cash/index.php" class="nav-button">Corte de caja del d&iacute;a</a>
	<a href="../../../services/LoginService.php?logOut" class="exit-button right"><span class="icon fa-off"></span></a>
</div>
<div class="container center" >
	<input type="hidden" id="idRefresh" name="idRefresh" value="<?php echo (isset($_GET["refresh"]))? $_GET["refresh"]: "";?>"/>
	<div class="header">Peliculas</div>
        <div>
            <div class="actions">
	            <a href="newMovie" class="button right verde"><span class="icon fa-plus"></span>Agregar Pelicula</a>
	            <a href="../index.php" class="button left azul"><span class="icon fa-home"></span>Regresar</a>
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
                                <a href="edit.php?idMovie=<?php echo $movie->id;?>" class="s-button verde"><span class="s-icon fa-edit"></span></a>
                                <a href="../../../services/MovieService.php?action=delete&idMovie=<?php echo $movie->id;?>" class="s-button rojo"><span class="s-icon fa-trash"></span></a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
    </div>
</div>
</body>
</html>

