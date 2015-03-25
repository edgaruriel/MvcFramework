<?php
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Editar pelicula</title>
    <script src="../../../../public/js/admin/movie/edit.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../../public/css/main.css" media="screen" />
</head>
<body>

   <div class="container center">
   <div class="header">Editar Pelicula: <?php echo $movie->title;?></div>
   		<?php if($movie != null):?>
   			<form action="../Movie/addMovie" id="form" name="form" method="post" enctype="multipart/form-data"  class="form-group">
   					<input type="hidden" id="id" name="id" value="<?php echo $movie->id;?>"/>
                    <label ><span>Titulo:</span> </label><input type="text" id="title" name="title" value="<?php echo $movie->title;?>"/>

                    <label ><span>Formato: </span></label><input type="text" id="format" name="format" value="<?php echo $movie->format;?>"/>

                    <label ><span>Total de unidades: </span></label><input type="number" id="totalUnits" min="1" name="totalUnits" value="<?php echo $movie->totalUnits;?>"/>

                    <label ><span>A&ntilde;o: </span></label>
                    <select id="year" name="year">
                    <option value="">Seleccione un a&ntilde;o</option>
                    <?php for($i =1980; $i<2015; $i++):?>
                    <?php if($movie->year == $i):?>
                    <option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
                    <?php 
                    continue;
                    endif;?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
					<?php endfor;?>                    
                    </select>
  
                    <label ><span>Precio ($): </span></label><input type="number" min="1" id="price" name="price" value="<?php echo $movie->price;?>"/>
 
                    <label ><span>C&oacute;digo: </span></label><input type="text" id="code" name="code" value="<?php echo $movie->code;?>"/>

                    <label ><span>Genero: </span></label>
					<select id="genderId" name="genderId">
                    <option value="">Seleccione un g&eacute;nero</option>
                    <?php 
                    foreach ($genders as $gender):?>
                    <?php if($movie->getGender()->id == $gender->id):?>
                    <option value="<?php echo $gender->id;?>" selected="selected"><?php echo $gender->name;?></option>
                    <?php 
                    continue;
                    endif;?>
                    <option value="<?php echo $gender->id;?>"><?php echo $gender->name;?></option>
					<?php endforeach;;?>                    
                    </select>

                     <br>
                    <br>
                <input type="submit" name="editBtn" id="editBtn" value="Actualizar" class="right verde">
                <a id="btn_cancelar" value="Cancelar" href="../Movie/listMovies" class="button left azul"><span class="icon fa-times"></span>Cancelar</a>
                
            </form>
   		<?php else:?>
   			<h1>Error: La pelicula no existe</h1>
   		<?php endif;?>
<br>
                <br>
                <br>
    </div>

</body>
</html>
