<?php

// Definir la ruta del directorio de la aplicación.
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Definir el entorno de la aplicación.
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Agregar el directorio /library en el include_path.
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

// Cargar la librería de Zend Framework.
require_once 'Zend/Application.php';

// Inicializar la configuración de la aplicación.
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

// Arrancar y ejecutar la aplicación.
$application->bootstrap()->run();