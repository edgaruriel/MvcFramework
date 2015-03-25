<?php
?>
<div class="container center" >
		<div class="header">Empleados</div>
        <div>
            <div class="actions">
	            <a href="../User/newUser" class="button right verde"><span class="icon fa-plus"></span>Agregar Empleado</a>
	            <a href="../Index/indexAdmin" class="button left azul"><span class="icon fa-home"></span>Regresar</a>
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
