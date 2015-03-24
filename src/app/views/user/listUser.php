<?php 
?>

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
			<?php foreach ($users as $user): ?>
			 <tr>
				 <td>
				 <label><?= $user->name; ?></label>
				 </td>
				 <td>
				 <label><?=$user->lastName;?></label>
				 </td>
				 <td>
				 <label><?=$user->username;?></label>
				 </td>
				 <td>
				 <label><?=$user->password;?></label>
				 </td>
				 <td>
				 <a href="../User/editUser?id=".<?= $user->id;?>>Editar</a>|
				 <a href="../User/deleteUser?id=".<?= $user->id;?>>Eliminar</a>|
				 </td>
			 </tr>
			<?php endforeach;?>
		 </tbody>
</table>
