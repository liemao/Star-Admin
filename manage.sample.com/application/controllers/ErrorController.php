<?php

class ErrorController extends BaseController
{
    protected $code_message = array(
        403 => 'Oops, an error has occurred. Forbidden!',
        404 => '404 Page not found',
        500 => 'Oops, an error has occurred. Internal server error!',
    );
    public function indexAction()
    {
        $code = $this->view->code;
        
        if (!isset($this->code_message[$code]))
        {
            $code = 404;
        }
        
        $message = $this->code_message[$code];
        $this->view->message = $message;
    }
}

?>