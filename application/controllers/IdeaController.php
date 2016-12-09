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
        $dest = $request->getParam("dest");
        $source = $request->getParam("source");
        $this->view->sdate = date_create_from_format('Y-m-d', $sdate);
        $this->view->edate = date_create_from_format('Y-m-d', $edate);
        $this->view->source=$source;
        $this->view->dest=$dest;
    }


}







