<?php
// print_r(__DIR__);
// exit();
//include_once(dirname(__FILE__)."/src/mvc/Autoloader.php");
include_once(__DIR__."/src/mvc/system/WebApplication.php");

try {
	
	$webApplication = WebApplication::getInstance();
	$webApplication->start();
	
} catch (Exception $e) {
	echo '<div style="width: 100%; background-color: blue">';
	echo '<p style="color: #FFF;">Excepción capturada: '.$e->getMessage().'</p>';
	echo '</div>';
}
?>


