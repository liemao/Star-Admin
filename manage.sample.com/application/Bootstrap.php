<?php

require 'Star/Application/Bootstrap/Bootstrap.php';

class Bootstrap extends Star_Application_Bootstrap_Bootstrap
{
    /**
     *  初始化layout
     */
    protected function _initLayout()
    {
        Star_Layout::startMvc(array(
			'base_path' => APPLICATION_PATH . '/layouts',
			'script_path' => 'default',
		));
    }
	
    /**
     * 设置csrf_token
     */
    protected function _initCsrfToken()
    {
        $csrf_token = AdminService::getCsrfToken();
        $this->view->assign('csrf_token', $csrf_token);
    }
}

