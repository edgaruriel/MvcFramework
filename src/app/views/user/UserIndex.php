<?php
class UserIndex{
	function listUser($users){
		$view = new View();
		$view->header();
		
		echo '<table>';
		'<thead>';
			echo '<tr>';
				echo '<th>Nombre</th>';
				echo '<th>Apellidos</th>';
				echo '<th>Usuario</th>';
				echo '<th>Contrase&ntilde;a</th>';
				echo '<th>Operaciones</th>';
			echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
			foreach ($users as $user){
			echo '<tr>';
				echo '<td>';
				echo '<label>'.$user->name;
				echo '</td>';
				echo '<td>';
				echo '<label>'.$user->lastName.'</label>';
				echo '</td>';
				echo '<td>';
				echo '<label>'.$user->userName.'</label>';
				echo '</td>';
				echo '<td>';
				echo '<label>'.$user->password.'</label>';
				echo '</td>';
				echo '<td>';
				echo '<a href="../User/editUser?id='.$user->id.'">Editar</a>|';
				echo '<a href="../User/deleteUser?id='.$user->id.'">Eliminar</a>|';
				echo '</td>';
			echo '<tr>';
			}
		echo '</tbody>';
		echo '</table>';
		$view->footer();
	}
}
