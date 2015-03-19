<?php 
class LogIn{
	public function initLogIn(){
		echo '<form action="../LogIn/Authentication" method="post">';
		echo '<label>Usuario: </label> <input type="text" id="user" name="user"/>';
		echo '<br>';
		echo '<br>';
		echo '<label>Contrase&ntilde;a: </label> <input type="password" id="password" name="password">';
		echo '<br>';
		echo '<button type="submit">Log In</button>';
		echo '</form>';
	}
}

