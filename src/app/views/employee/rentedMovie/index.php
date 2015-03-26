<?php
?>
<div class="container center">
    <div class="header">Rentas</div>
            <div class="actions">
	            <a href="../RentedMovie/new" class="button right verde"><span class="icon fa-plus"></span>Nueva renta</a>
	            <a href="../Index/indexEmployee" class="button left azul"><span class="icon fa-home"></span>Regresar</a>
            </div>
            <table style="width:100%" border="1">
                <thead>
                   <tr>
                    <th>Id</th>
                    <th>Pelicula</th>
                    <th>Cliente</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Fecha de renta</th>
                    <th>Fecha de devoluci&oacute;n</th>
                    <th>Estatus</th>
                    <th>Operaciones</th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($allRented as $rented):?>
                    <tr>
                    	<td><?php echo $rented->id;?></td>
                    	<td><?php echo $rented->getMovie()->title;?></td>
                    	<td><?php echo $rented->getClient()->name." ".$rented->getClient()->lastName;?></td>
                    	<td><?php echo $rented->rentedUnits;?></td>
                    	<td><?php echo $rented->total;?></td>
                    	<td><?php echo $rented->date;?></td>
                    	<td><?php echo $rented->devolutionDate;?></td>
                    	<td>
                    	<?php if($rented->isRented == ClientHasMovie::$statusArray["RENTED"]):?>
                    	<strong class="rentado">RENTADO</strong>
                    	<?php else:?>
                    	<strong class="devuelto">DEVUELTO</strong>
                    	<?php endif;?>
                    	</td>
                    	<td>
                    	<?php if($rented->isRented == ClientHasMovie::$statusArray["RENTED"]):?>
                    	 <a href="../RentedMovie/returnMovie?id=<?php echo $rented->id;?> " class="s-button verde">Devolver</a>
                    		<!-- <input type="hidden" id="idRented" name="idRented" value="<?php //echo $rented->id;?>"/>  -->
                    		<!-- <button type="submit" class="verde">Devolver</button>  -->
                    	<?php endif;?>
                    	</td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
</div>
