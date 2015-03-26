<?php

?>
<script src="../src/app/public/js/employee/client/edit.js"></script>

<div class="container center">
	<div class="header">Editar: <?php echo $client->name;?></div>
            <form action="../Client/updateClient" id="form" name="form" method="post" class="form-group">
                <input type="hidden" id="id" name="id" value="<?php echo $client->id;?>">
                    
                    <label ><span>Nombre: </span></label><input type="text" id="name" name="name" value="<?php echo $client->name;?>"/>

                    <label ><span>Apellido(s): </span></label><input type="text" id="lastName" name="lastName" value="<?php echo $client->lastName;?>"/>

                    <label ><span>Correo: </span></label><input type="text" id="email" name="email" value="<?php echo $client->email;?>"/>

                    <label ><span>IFE: </span></label><input type="text" id="ife" name="ife" value="<?php echo $client->ife;?>"/>
                <br>
                <input type="submit" name="editBtn" id="editBtn" value="Actualizar" class="right verde">
                <a id="btn_cancelar" value="Cancelar" href="../Client/listClient" class="button left azul"><span class="icon fa-times"></span>Cancelar</a>
            </form>
	<br><br><br>
</div>
</body>
</html>