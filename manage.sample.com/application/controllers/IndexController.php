<?php

class IndexController extends BaseController
{
    public function init()
	{
		parent::init();
	}
	
	public function indexAction()
	{
        return $this->redirect('/admin');
	}
	
	public function helloAction()
	{
        $this->view->title = 'Hello world';
        //$this->view->setNoRender();
	}
    
}

?>