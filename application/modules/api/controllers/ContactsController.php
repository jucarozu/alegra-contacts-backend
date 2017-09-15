<?php

require_once APPLICATION_PATH . '/modules/api/models/Contact.php';

class Api_ContactsController extends REST_Controller
{
    private $_contact;

    public function init()
    {
        $this->_contact = new Contact();
    }

    /**
     * The index action handles index/list requests; it should respond with a
     * list of the requested resources.
     */
    public function indexAction()
    {
        $this->_response->setHeader('Content-Type', 'application/json');
        echo $this->_contact->restGet();
    }

    /**
     * The head action handles HEAD requests; it should respond with an
     * identical response to the one that would correspond to a GET request,
     * but without the response body.
     */
    public function headAction()
    {
        $this->_response->setHeader('Content-Type', 'application/json');
        echo $this->_contact->restHead();
    }

    /**
     * The get action handles GET requests and receives an 'id' parameter; it
     * should respond with the server resource state of the resource identified
     * by the 'id' value.
     */
    public function getAction()
    {
        $this->_response->setHeader('Content-Type', 'application/json');
        echo $this->_contact->restGet($this->_getParam('id'));
    }

    /**
     * The post action handles POST requests; it should accept and digest a
     * POSTed resource representation and persist the resource state.
     */
    public function postAction()
    {
        $this->_response->setHeader('Content-Type', 'application/json');
        echo $this->_contact->restPost($this->_request->getParams());
    }

    /**
     * The put action handles PUT requests and receives an 'id' parameter; it
     * should update the server resource state of the resource identified by
     * the 'id' value.
     */
    public function putAction()
    {
        $this->_response->setHeader('Content-Type', 'application/json');
        echo $this->_contact->restPut($this->_request->getParams(), $this->_getParam('id'));
    }

    /**
     * The delete action handles DELETE requests and receives an 'id'
     * parameter; it should update the server resource state of the resource
     * identified by the 'id' value.
     */
    public function deleteAction()
    {
        $this->_response->setHeader('Content-Type', 'application/json');
        echo $this->_contact->restDelete($this->_getParam('id'));
    }
}