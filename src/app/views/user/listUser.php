<?php
?>

<div class="container center" >
		<div class="header">Empleados</div>
        <div>
            <div class="actions">
	            <a href="../User/newUser" class="button right verde"><span class="icon fa-plus"></span>Agregar Empleado</a>
	            <a href="../User/listUser" class="button left azul"><span class="icon fa-home"></span>Regresar</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>OPERACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $employee):?>
                        <tr>
                            <td><?php echo $employee->id;?></td>
                            <td><?php echo utf8_encode($employee->username);?></td>
                            <td><?php echo utf8_encode($employee->name);?></td>
                            <td><?php echo utf8_encode($employee->lastName);?></td>
                            <td><?php echo utf8_encode($employee->email)?></td>
                            <td>
                            <?php 
                         /*   foreach ($types as $type):
                            	if($type->getId() == $employee->getTypeUser())
                            		echo utf8_encode($type->getName());
                            endforeach; */
                            echo utf8_encode($employee->getTypeUser()->name); 
                            ?>
                            </td>
                            <td>
                                <a href="edit.php?idEmployee=<?php echo $employee->id;?> " class="s-button verde"><span class="s-icon fa-edit"></span></a>
                                <a href="../../../services/EmployeeService.php?action=delete&idEmployee=<?php echo $employee->id;?>" class="s-button rojo"><span class="s-icon fa-trash"></span></a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
                
            </table>
    </div>
</div>
<!-- 
<table>
		<thead>
			 <tr>
				 <th>Nombre</th>
				 <th>Apellidos</th>
				 <th>Usuario</th>
				 <th>Contrase&ntildea</th>
				 <th>Operaciones</th>
			 </tr>
		 </thead>
		 <tbody>
			<?php // foreach ($users as $user): ?>
			 <tr>
				 <td>
				 <label><? //= $user->name; ?></label>
				 </td>
				 <td>
				 <label><? //=$user->lastName;?></label>
				 </td>
				 <td>
				 <label><? //=$user->username;?></label>
				 </td>
				 <td>
				 <label><? //=$user->password;?></label>
				 </td>
				 <td>
				 <a href="../User/editUser?id=".<? //= $user->id;?>>Editar</a>|
				 <a href="../User/deleteUser?id=".<? //= $user->id;?>>Eliminar</a>|
				 </td>
			 </tr>
			<?php //endforeach;?>
		 </tbody>
</table>
 -->