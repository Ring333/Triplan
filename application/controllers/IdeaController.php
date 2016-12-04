<?php

class IdeaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function createAction()
    {

    }

    public function editAction()
    {
        $request = $this->getRequest();
        $sdate = $request->getParam("sdate");
        $edate = $request->getParam("edate");
        $dest = strtolower($request->getParam("dest"));
        echo $edate.'   '.$sdate;
    }


}







