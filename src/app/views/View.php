<?php
class View{
	function header(){
		echo '<strong>Catalogo de usuario. Autor: Edgar Rrod&iacute;guez</strong>'.' <a href="../LogIn/logOut">Log Out</a>|';
		echo '<br>';
		echo '<a href="../User/newUser">Agregar Usuario</a>|';
		echo '<a href="../User/listUser">Listar usuario</a>|';
		echo '<br>';
		echo '<br>';
	}
	
	function footer(){
		echo '<br>';
		echo '<br>';
		echo '<strong>Derechos reservados</strong>';
	}
}