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
        $replace=str_replace(" ","+",$dest);
        $getPoiInfo="https://maps.googleapis.com/maps/api/place/textsearch/xml?query=point+of+interests+in+".$replace."&key=AIzaSyD7q2AX3EtCIPd9i1ITISdayG8tQhjMXaQ";
        $poiInfo=file_get_contents($getPoiInfo);
        $this->view->xml=simplexml_load_string($poiInfo) or die ("sorry we cannot find this place");
    }


}







