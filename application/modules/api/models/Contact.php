<?php

class Contact
{
    private $_restClient;
    private $_alegra;

    public function __construct()
    {
        $this->_alegra = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'alegra');
        $this->_restClient = new Zend_Rest_Client($this->_alegra->api->params->address);

        $this->_restClient->getHttpClient()->setAuth(
            $this->_alegra->api->params->user, 
            $this->_alegra->api->params->token,
            Zend_Http_Client::AUTH_BASIC
        );
    }

    public function restGet($id = null)
    {
        $response = null;

        try
        {
            if (is_null($id))
            {
                $response = $this->_restClient->restGet($this->_alegra->api->params->path)->getBody();
            }
            else
            {
                $response = $this->_restClient->restGet($this->_alegra->api->params->path . $id)->getBody();
            }
        }
        catch (Zend_Rest_Exception $e)
        {
            $response = array(
                'code' => $e->getCode(), 
                'message' => $e->getMessage()
            );
        }
        catch (Exception $e)
        {
            $response = array(
                'code' => $e->getCode(), 
                'message' => $e->getMessage()
            );
        }

        return $response;
    }

    public function restPost($request)
    {
        $response = null;

        try
        {
            $response = $this->_restClient->restPost($this->_alegra->api->params->path, json_encode($request))->getBody();
        }
        catch (Zend_Rest_Exception $e)
        {
            $response = array(
                'code' => $e->getCode(), 
                'message' => $e->getMessage()
            );
        }
        catch (Exception $e)
        {
            $response = array(
                'code' => $e->getCode(), 
                'message' => $e->getMessage()
            );
        }

        return $response;
    }

    public function restPut($request, $id)
    {
        $response = null;

        try
        {
            $response = $this->_restClient->restPut($this->_alegra->api->params->path . $id, json_encode($request))->getBody();
        }
        catch (Zend_Rest_Exception $e)
        {
            $response = array(
                'code' => $e->getCode(), 
                'message' => $e->getMessage()
            );
        }
        catch (Exception $e)
        {
            $response = array(
                'code' => $e->getCode(), 
                'message' => $e->getMessage()
            );
        }

        return $response;
    }

    public function restDelete($id)
    {
        $response = null;

        try
        {
            $response = $this->_restClient->restDelete($this->_alegra->api->params->path . $id)->getBody();
        }
        catch (Zend_Rest_Exception $e)
        {
            $response = array(
                'code' => $e->getCode(), 
                'message' => $e->getMessage()
            );
        }
        catch (Exception $e)
        {
            $response = array(
                'code' => $e->getCode(), 
                'message' => $e->getMessage()
            );
        }

        return $response;
    }
}