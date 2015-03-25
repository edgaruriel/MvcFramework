<?php
class AccessController{
	private static $instance = null;
	
	static function getInstance(){
		if (!isset(self::$instance)) {
			self::$instance = new AccessController;
		}
		return self::$instance;
	}
	/**
	 * Estructura del arreglo de config.
	 * Array(
	 * 		'actionDefault'=> Son todos los actions que todos los tipos de usuarios pueden acceder,
	 * 		'authorized'=>
 	 * 				Array(
	 * 						Son todos los tipos de usuarios disponibles => 
	 * 											Array(
	 * 												Son todos los controladores disponibles para el usuario padre=>
	 * 													Array(){
	 * 														Son todos los actions disponibles dentro del controlador, * significan todos los actions
	 * 													}
	 * 											)
	 * 						)
	 * )
	 */
	function authorizedAccess(){
		return Array(
				'default'=>Array( //controllers
							'LogIn'=>'*' //actions
									
						),
				'authorized'=>Array(//type users
							TypeUser::$typeUserArray["admin"]=>Array( //controller
														'User'=>Array(//actions
																	'newUser',
																	'addUser',
																	'listUser',
																	'deleteUser',
																	'editUser',
																	'updateUser'
																),
                                                        'Movie'=>Array('*')
									)
						));
	}
	
	function getConfigDB(){
		return Array(
				"host" => "localhost",
				"username" => "root",
				"password" => "root",
				"schema" => "mvc",
				"dbtype"=> "mysql"
				);
	}
}