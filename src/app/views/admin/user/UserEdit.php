<?php 
class UserEdit{
	function edit($User){
		$view = new View();
		$view->header();
		
		echo '<form action="../User/updateUser"  method="post">';
		echo '<input type="hidden" id="id" name="id" value="'.$User->id.'"/>';
		echo '<label>Nombre: </label> <input id="name" name="name" value="'.$User->name.'"/>';
		echo '<br>';
		echo '<label>Apellido: </label> <input id="lastName" name="lastName" value="'.$User->lastName.'"/>';
		echo '<br>';
		echo '<label>Usuario: </label> <input id="userName" name="userName" value="'.$User->userName.'"/>';
		echo '<br>';
		echo '<label>Contrase&ntilde;a: </label> <input id="password" name="password" value="'.$User->password.'"/>';
		echo '<br>';
		echo '<input type="hidden" id="typeUser" name="typeUser" value="'.$User->typeUser.'"/>';
		echo '<button type="submit">Actualizar</button>';
		echo '</form>';
		
		$view->footer();
	}
}




		

?>