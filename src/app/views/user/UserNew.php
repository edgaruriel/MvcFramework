<?php 
//include_once(dirname(__FILE__)."/View.php");
class UserNew {
	function newUser(){
		$view = new View();
		$view->header();
		
		echo '<form action="../User/addUser"  method="post">';
		echo '<label>Nombre: </label> <input id="name" name="name"/>';
		echo '<br>';
		echo '<label>Apellido: </label> <input id="lastName" name="lastName">';
		echo '<br>';
		echo '<label>Usuario: </label> <input id="userName" name="userName" />';
		echo '<br>';
		echo '<label>Contrase&ntilde;a: </label> <input id="password" name="password" />';
		echo '<br>';
		echo '<input type="hidden" id="typeUser" name="typeUser" value="'.User::$typeUserArray["admin"].'"/>';
		echo '<button type="submit">Agregar</button>';
		echo '</form>';
		
		$view->footer();
	}
}
