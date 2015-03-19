<?php
class URLManager{
	public $url = '';
	public $controller = '';
	public $action = '';
	public $params = Array();
	
	function processURL($Request){
		if(count($Request)>0){
			$url = $Request['ruta'];
			
			$url = preg_replace('/\/$/', '', $url);
			$this->url = $url;
			
			$urlArray = explode('/', $url);
			
			if(count($urlArray)==2){
				$countVal = count($urlArray);
				
				for($c = 0; $c < $countVal; $c++){
					$urlArray[$c] = $this->limpiar($urlArray[$c]);
				}
				$this->controller = $urlArray[0];
				$this->action = $urlArray[1];
				unset($Request["ruta"]);
				$this->params = $Request;
			}else{
				throw new Exception('ERROR: URL invalido, no se encontro un controller y action');
			}
		}else{
			 throw new Exception('ERROR: URL invalido, no se encontro un controller y action');
		}
	}
	

	/**
	 * Toma una cadena y eliminar todos los caracteres no deseados. Solo letras(a-Z), numeros y guiones
	 *
	 * @param string $valor La cadena a filtrar
	 * @return string La cadena ya filtrada
	 */
	private function limpiar($valor){
	
		// permitimos solo letras(a-Z), numeros y guiones
		return preg_replace('/[^a-zA-Z0-9-_.@ ]/', '', $valor);
	}
	
	function getRequest(){
		return $_REQUEST;
	}
	
	function getController(){
		return $this->controller;
	}
	
	function getAction(){
		return $this->action;
	}
	
	function getParams(){
		return $this->params;
	}
}