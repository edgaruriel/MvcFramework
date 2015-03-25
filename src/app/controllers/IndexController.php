<?php
class IndexController extends MvcController{

	public function indexAdminAction(){
		
		$this->render("index",array(),"HeaderAdmin","admin");
	}
	
	public function indexEmployeeAction(){
		
	}
}