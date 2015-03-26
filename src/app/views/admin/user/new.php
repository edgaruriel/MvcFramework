<?php 
?>
<script src="../src/app/public/js/admin/user/new.js"></script>

<div class="container center">
	<div class="header">Nuevo Empleado</div>
        <div >
            <form action="../User/addUser" id="form" name="form" method="post" class="form-group">
                 
                    <label ><span>Nombre de usuario:</span></label><input type="text" id="username" name="username"/>

                    <label ><span>Contrase&ntilde;a: </span></label><input type="password" id="password" name="password"/>
                
                    <label ><span>Nombre: </span></label><input type="text" id="name" name="name"/>

                    <label ><span>Apellido(s): </span></label><input type="text" id="lastName" name="lastName"/>
                
                    <label ><span>Correo: </span></label><input type="text" id="email" name="email"/>
                
                <label ><span>Tipo: </span>
					<select id="typeUserId" name="typeUserId">
                    <option value="">Seleccione un tipo</option>
                    <?php 
                    foreach ($types as $type):?>
                    <option value="<?php echo $type->id;?>"><?php echo $type->name;?></option>
				<?php endforeach;;?>                    
                    </select>
                    </label>
                <input type="submit" name="newBtn" id="newBtn" value="Agregar" class="right verde">
                <a id="btn_cancelar" value="Cancelar" href="../User/listUser" class="button left azul"><span class="icon fa-times"></span>Cancelar</a>
                <br>
                <br>
                <br>
            </form>
        </div>
</div>
