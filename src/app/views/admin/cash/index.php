<?php
$serviceDate = new Date();
$total = 0;
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Corte</title>
    <link rel="stylesheet" type="text/css" href="../src/app/public/css/main.css" media="screen" />
</head>
<body>
<div class="container center">
	<div class="header"><?php echo "Fecha de corte: ".$serviceDate->getDateFormat(Date('Y-m-d'));?></div>
        <div class="actions">
	            <a href="../Index/indexAdmin" class="button left azul"><span class="icon fa-home"></span>Regresar</a>
        </div>
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Pelicula</th>
                    <th>C&oacute;digo</th>
                    <th>Precio Unitario</th>
                    <th>Unidades rentadas</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($arrayMovies as $movies):?>
                    <?php $units = $movies["units"];?>
                    <?php $movie = $movies["movie"];
                    $totalMovie = $movie->price*$units;?>
                    <tr>
                        <td><?php echo $movie->id;?></td>
                        <td><?php echo $movie->title;?></td>
                        <td><?php echo $movie->code;?></td>
                        <td><?php echo '$'.number_format($movie->price,"2");?></td>
                        <td><?php echo $units;?></td>
                        <td><?php echo '$'.number_format($totalMovie,"2");?></td>
                    </tr>
                    <?php $total += $totalMovie;?>
                <?php endforeach;?>
                </tbody>
            </table>

            <h3 class="right"><?php echo "Total: $".number_format($total,'2');?></h3>
			<br><br><br>
</div>
</body>
</html>