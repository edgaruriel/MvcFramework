<?php
class ClientController extends MvcController{
	
	function listClientAction(){
 		$modelClient = new Client();
 		$clientArray = $modelClient->findAllCientsActive();
        $this->render("index",array('clients' => $clientArray),"HeaderEmployee", "employee");
	}
	
	function newClientAction(){
		$this->render("new",array(),"HeaderEmployee", "employee");
	}

	function addClientAction(){
		$data = $this->params;
		$modelClient = new Client();
		$modelClient->setAttributes($data);
		$modelClient->status = true;
		$modelClient->add();
		$this->redirect("../Client/listClient");
	}
	
	function deleteClientAction(){
		$data = $this->params;
		$modelClient = new Client();
		$modelClient->findOneById($data["id"]);
		$modelClient->status = false;
		$modelClient->update();
		//$modelClient->deleteOneByPrimaryKey();
		$this->redirect("../Client/listClient");
	}
	
	function editClientAction(){
		$data = $this->params;
		$modelClient = new Client();
		$modelClient->findOneById($data["id"]);
		$this->render("edit",array('client' => $modelClient),"HeaderEmployee", "employee");
	}
	
	function updateClientAction(){
		$data = $this->params;
		$modelClient = new Client();
		$modelClient->findOneById($data["id"]);
		$modelClient->setAttributes($data);
		$modelClient->update();
		$this->redirect("../Client/listClient");
	}
	
}