<?php

class Api_ErrorController extends REST_Controller
{
    public function init()
    {
    }

    public function errorAction()
    {
        if ($this->_request->hasError())
        {
            $error = $this->_request->getError();
            $this->view->message = $error->message;
            $this->getResponse()->setHttpResponseCode($error->code);
            return;
        }

        $errors = $this->_getParam('error_handler');
        
        if (!$errors || !$errors instanceof ArrayObject)
        {
            $this->view->message = 'Ha llegado a la página de error.';
            return;
        }
        
        switch ($errors->type)
        {
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ROUTE:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
                // 404 - Controlador o acción no encontrada.
                $this->view->message = 'Page not found';
                $this->getResponse()->setHttpResponseCode(404);
                break;
            default:
                // 500 - Error interno de la aplicación.
                $this->view->message = 'Application error';
                $this->getResponse()->setHttpResponseCode(500);
                break;
        }
        
        // Mostrar excepciones en caso de estar configurado de esta manera.
        if ($this->getInvokeArg('displayExceptions') == true)
        {
            $this->view->exception = $errors->exception->getMessage();
        }
    }
}