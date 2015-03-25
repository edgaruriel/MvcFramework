<?php
abstract class MvcController{
	protected $params = Array();

	/**
	 * @param multitype: $params
	 */
	public function setParams($params) {
		$this->params = $params;
	}
	
	private function callActionFunction(){
		if(Authentication::getInstance()->isLogged()){
			$access = AccessController::getInstance()->authorizedAccess();
			
			$controller = WebApplication::getInstance()->getUrlManager()->getController();
			$action = WebApplication::getInstance()->getUrlManager()->getAction();
			
			$authorized = $access["authorized"];
			$flagAccess = false;
			foreach ($authorized as $userA=>$controllerArray){
				if(Authentication::getInstance()->getValueLogInSession() != null && Authentication::getInstance()->getValueLogInSession() == $userA){
					if(in_array($controller,array_keys($controllerArray))){
						$actionsAccess = $controllerArray[$controller];
						if(in_array($action, $actionsAccess, true)){
							$flagAccess = true;
							$action.= Config::$suffixAction;
							$this->$action();
						}else if(in_array('*', $actionsAccess)){
							$flagAccess = true;
							$action.= Config::$suffixAction;
							$this->$action();
						}else{
							throw new Exception('ERROR: No tiene autorizaci&oacute;n al action '.$action);
							break;
						}
					}else{
						throw new Exception('ERROR: No tiene autorizaci&oacute;n al controller '.$controller);
						break;
					}
				}
			}
			
			if(!$flagAccess){
				throw new Exception('ERROR: Acceso no autirozado!!');
			}
		}else{
			$url = "Location:../LogIn/logIn";
			$this->redirect($url);
		}
	}
	
	public function runAction(){
		$access = AccessController::getInstance()->authorizedAccess();
		$controller = WebApplication::getInstance()->getUrlManager()->getController();
		$action = WebApplication::getInstance()->getUrlManager()->getAction();
		
		if(in_array('default', array_keys($access))){
			$controllerDefault = $access["default"];
			if(in_array($controller, array_keys($controllerDefault))){
				$actionsDefault = $controllerDefault[$controller];
				if($actionsDefault == '*'){
					$action.= Config::$suffixAction;
					$this->$action();
				}else if($action == $actionsDefault){
					$action.= Config::$suffixAction;
					$this->$action();
				}else{
					throw new Exception('ERROR: Intento acceder a un action no autirozado!!');
				}
			}else{
				$this->callActionFunction();
			}
		}else{
			$this->callActionFunction();
		}
	}
	
	public function redirect($url){
		header("Location:".$url);
	}

	public function render($view,$params = array(), $renderHeader = null, $path = null){
		$file = "";
		if($path != null){
			$file = $this->getPath($view, $path);
		}else{
			$file = $this->getPath($view);
		}
       
        if(is_array($params) && !is_null($params)){
            extract($params);
        }

        ob_start();
        if($renderHeader != null)
        	include dirname(__FILE__)."/../../app/views/".$renderHeader.".php";
        
        require($file);
        echo ob_get_clean();
    }

    public function getPath($view,$path = null){
        $controller = WebApplication::getInstance()->getUrlManager()->getController();
        if($path != null){
        	return dirname(__FILE__)."/../../app/views/".$path."/".$controller."/".$view.".php";
        }else{
        	return dirname(__FILE__)."/../../app/views/".$controller."/".$view.".php";
        }
    }
	
}
