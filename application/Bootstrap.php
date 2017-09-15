<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _initApplication()
    {
        // Se implementa el patrón Front Controller para inicializar el entorno de peticiones de la aplicación.
        $frontController = Zend_Controller_Front::getInstance();
        
        // Se definen las peticiones y respuestas de tipo REST.
        $frontController->setRequest(new REST_Request);
        $frontController->setResponse(new REST_Response);
        
        // Se agrega el módulo Api al enrutamiento REST.
        $apiRoute = new Zend_Rest_Route($frontController, array(), array('api'));
        $frontController->getRouter()->addRoute('api', $apiRoute);
    }
}