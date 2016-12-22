<?php

class IdeaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $request = $this->getRequest();
        if ($this->getRequest()->isPost()) 
        {
            $user_id=$_POST['user_id'];
            $idea = new Application_Model_IdeaMapper();
            $result=$idea->idea_show($user_id);
            exit();
        }

    }

    public function createAction()
    {
    }

    public function editAction()
    {
        
        $request = $this->getRequest();
        if ($this->getRequest()->isPost()) {

            $idea = new Application_Model_IdeaMapper();
            $idea->idea_save();
            exit;
        }
        else{
        if ($request->getParam("id")!='')
        {
            $id=$request->getParam("id");
            $idea = new Application_Model_IdeaMapper();
            $result=$idea->idea_find($id);
        }
        else
        {
        $title=$request->getParam("title");
        $sdate = $request->getParam("sdate");
        $edate = $request->getParam("edate");
        $dest = $request->getParam("dest");
        $source = $request->getParam("source");
        $this->view->sdate = date_create_from_format('Y-m-d', $sdate);
        $this->view->edate = date_create_from_format('Y-m-d', $edate);
        $this->view->source=$source;
        $this->view->dest=$dest;
        $this->view->title=$title;
        }

        $replace=str_replace(" ","+",$dest);
        $getPoiInfo="https://maps.googleapis.com/maps/api/place/textsearch/xml?query=point+of+interests+in+".$replace."&key=AIzaSyD7q2AX3EtCIPd9i1ITISdayG8tQhjMXaQ";
        $poiInfo=file_get_contents($getPoiInfo);
        $this->view->xml=simplexml_load_string($poiInfo) or die ("sorry we cannot find this place");
        }
    }

    public function saveAction()
    {
        // action body


        
    }


}









