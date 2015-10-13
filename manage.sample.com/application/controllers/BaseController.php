<?php

class BaseController extends Star_Controller_Action
{
    
    public function init()
    {
        $this->chekcAuth();
    }


    /**
     * 权限验证
     */
    protected function chekcAuth()
	{
        $admin_service = new AdminService();
        $controller = $this->request->getControllerName();
        $action = $this->request->getActionName();

        //登录页面和验证码不需要权限验证
        if (($controller == 'admin' && ($action == 'login' || $action == 'captcha')) || $controller == 'index' || empty($controller))
        {
            return true;
        }
        
        //验证用户是否登录
        if ($admin_service->checkLogin() == false)
        {
            return $this->redirect('/admin/login');
        }

        if ($admin_service->checkAuth($controller, $action) == false)
        {
            if ($this->request->isAjax())
            {
                return $this->showJson(403, '对不起，您没有权限。');
            } else {
                echo "对不起，您没有权限。";
                exit;
            }
        }
	}

}

?>