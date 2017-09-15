<?php

class Api_Bootstrap extends Zend_Application_Module_Bootstrap
{
    public function _initRestApi()
    {
        // Se implementa el patrón Front Controller para inicializar el entorno de peticiones de la API REST.
        $frontController = Zend_Controller_Front::getInstance();
        
        // Se registra el plugin RestHandler.
        $frontController->registerPlugin(new REST_Controller_Plugin_RestHandler($frontController));
        
        // Se agrega el helper ContextSwitch.
        $contextSwitch = new REST_Controller_Action_Helper_ContextSwitch();
        Zend_Controller_Action_HelperBroker::addHelper($contextSwitch);
        
        // Se agrega el helper RestContexts.
        $restContexts = new REST_Controller_Action_Helper_RestContexts();
        Zend_Controller_Action_HelperBroker::addHelper($restContexts);
    }
}