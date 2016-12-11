<?php

class UserController extends Zend_Controller_Action
{

    protected $log = "/var/tmp/triplan.log";

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function signupAction()
    {
        // action body
        $request = $this->getRequest();

        if ($this->getRequest()->isPost()) {
            $user = new Application_Model_UserMapper();
            $user->signup_save();
            //return $this->_helper->redirector('signin');
        }
    }

    public function signinAction()
    {
        // action body
        $request = $this->getRequest();

        if ($this->getRequest()->isPost()) {
            $user = new Application_Model_UserMapper();
            $user->signin_check();

            exit;
        }
    }

}






