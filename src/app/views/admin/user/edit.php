<?php 
// class edit{
// 	function edit($User){
// 		$view = new View();
// 		$view->header();
		
// 		echo '<form action="../User/updateUser"  method="post">';
// 		echo '<input type="hidden" id="id" name="id" value="'.$User->id.'"/>';
// 		echo '<label>Nombre: </label> <input id="name" name="name" value="'.$User->name.'"/>';
// 		echo '<br>';
// 		echo '<label>Apellido: </label> <input id="lastName" name="lastName" value="'.$User->lastName.'"/>';
// 		echo '<br>';
// 		echo '<label>Usuario: </label> <input id="userName" name="userName" value="'.$User->userName.'"/>';
// 		echo '<br>';
// 		echo '<label>Contrase&ntilde;a: </label> <input id="password" name="password" value="'.$User->password.'"/>';
// 		echo '<br>';
// 		echo '<input type="hidden" id="typeUser" name="typeUser" value="'.$User->typeUser.'"/>';
// 		echo '<button type="submit">Actualizar</button>';
// 		echo '</form>';
		
// 		$view->footer();
// 	}
// }

?>
<script src="../src/app/public/js/admin/user/edit.js"></script>
<div class="container center">
    <div class="header">Editar: <?php echo $employee->name;?></div>
            <form action="../User/updateUser" id="form" name="form" method="post" class="form-group">
                <input type="hidden" id="id" name="id" value="<?php echo $employee->id;?>">
                <?php //if(isset($errorEmail)):?>
                  <!--   <label style="text-align: center; color: red;">Ya existe un usuario con el correo: <?php //echo $_GET["email"];?></label> -->
                <?php //endif;?>
                <?php //if(isset($errorEmail)):?>
                   <!--  <label style="text-align: center; color: red;">Ya existe un usuario con el nombre de usuario: <?php // echo $_GET["username"];?></label>  -->
                <?php // endif;?>

                <label ><span>Nombre de usuario:</span></label><input type="text" id="username" name="username"  value="<?php echo $employee->username;?>"/>

                <label ><span>Contrase&ntilde;a: </span></label><input type="password" id="password" name="password" value="<?php //echo $employee->password;?>"/>
                
                <label ><span>Nombre: </span></label><input type="text" id="name" name="name" value="<?php echo $employee->name;?>"/>

                <label ><span>Apellido(s): </span></label><input type="text" id="lastName" name="lastName" value="<?php echo $employee->lastName;?>"/>
                
                <label ><span>Correo: </span></label><input type="text" id="email" name="email" value="<?php echo $employee->email;?>"/>
                
                <label ><span>Tipo: </span></label>
					<select id="typeUserId" name="typeUserId">
                    <option value="">Seleccione un tipo</option>
                    <?php 
                    foreach ($types as $type):?>
                    <?php if($type->id == $employee->getTypeUser()->id):?>
                    <option value="<?php echo $type->id;?>" selected="selected"><?php echo $type->name;?></option>
                    <?php 
                    continue;
                    endif;?>
                    <option value="<?php echo $type->id;?>"><?php echo $type->name;?></option>
					<?php endforeach;?>                    
                    </select>
                    <br>
                <input type="submit" name="editBtn" id="editBtn" value="Actualizar" class="right verde">
                <a id="btn_cancelar" value="Cancelar" href="../User/listUser" class="button left azul"><span class="icon fa-times"></span>Cancelar</a>
                <br>
                <br>
                <br>
            </form>
    
</div>