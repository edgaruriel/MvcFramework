<?php
include_once(dirname(__FILE__)."/Config.php");
//print_r(dirname(__FILE__)."/Autoloader.php");
//include_once(__DIR__."/src/mvc/system/Autoloader.php");

class WebApplication{
	private $config = null;
	private $urlManager = null;
// 	public $user = null;
	//private $activePreDispatch = false;
	private $db = null;
	private static $instance = null;
	
	static function getInstance(){
		if (!isset(self::$instance)) {
			self::$instance = new WebApplication;
		}
		return self::$instance;
	}
	
// 	/**
// 	 * @return the $activePreDispatch
// 	 */
// 	public function getActivePreDispatch() {
// 		return $this->activePreDispatch;
// 	}

	/**
	 * @return the $urlManager
	 */
	public function getUrlManager() {
		return $this->urlManager;
	}

	function start(){
		$this->urlManager = new URLManager();
		$this->urlManager->processURL($_REQUEST);
		//validar
		/*
		 * $Tester = new Test();
	
		var_export(method_exists($Tester, 'anything')); // false
		var_export(is_callable(array($Tester, 'anything'))); // true
		*/
		if($this->existControllerAndAction($this->urlManager->getController(), $this->urlManager->getAction())){
 			$controller = $this->urlManager->getController();
 			$action = $this->urlManager->getAction();
 			$controller.= Config::$suffixController;
 			$action.= Config::$suffixAction;
 			
 			$controllerObj = new $controller();
 			$controllerObj->setParams($this->urlManager->getParams());
  			//$this->existPreDispatch($this->urlManager->getController());
 			$controllerObj->runAction();
//  			$controllerObj->$action();
		}
		
	}
	
	private function existPreDispatch($controller){
		$controller .= Config::$suffixController;
		if(method_exists(new $controller(), "preDispatch")){
			$this->activePreDispatch = true;
		}else{
			$this->activePreDispatch = false;
		}
	}
	
	private function existControllerAndAction($controller,$action){
		$flag = false;
		$config = Config::getInstance()->getParams();
		$controller .= Config::$suffixController;
		foreach ($config as $index=>$value){
			$path = dirname(__FILE__).'/../../../'.$value.$controller.'.php';
			if (file_exists ($path)){
				$flag = true;
				break;
			}
		}
		
		if(!$flag){
			throw new Exception('ERROR: Controller '.$controller.' no fue encontrado');
		}else{
			$action .= Config::$suffixAction;
			if(method_exists(new $controller(), $action)){
				return true;
			}else{
				throw new Exception('ERROR: Action '.$action.' no fue encontrado');
			}
			
		}
	}
	
// 	private function existAction($controller, $action){
// 		$flag = false;
// 		$suffixAction = Config::getInstance()->getSuffixAction();
// 		foreach ($config as $index=>$value){
// 			$path = dirname(__FILE__).'/../../../'.$value.$action.$suffixAction.'.php';
// 			if (method_exists ($path)){
// 				$flag = true;
// 				break;
// 			}
// 		}
		
// 		if(!$flag){
// 			throw new Exception('ERROR: Controller '.$controller.' no fue encontrado');
// 		}else{
// 			return true;
// 		}
// 	}
	
}

function __autoload($nameClass) {
	$config = Config::getInstance()->getParams();
	foreach ($config as $index=>$value){
		$path = dirname(__FILE__).'/../../../'.$value.$nameClass.'.php';
		if (file_exists ($path)){
			require_once $path;
			break;
		}
	}
}