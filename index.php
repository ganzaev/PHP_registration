<?php
namespace ganzaev;

use ganzaev\controllers\LoginControllers;
use ganzaev\controllers\LogoutControllers;
use ganzaev\controllers\RegisterControllers;


$page = null;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$controller = null;
switch ($page) {
    case 'login': {
        require_once('controllers/logincontrollers.php');
        $controller = new LoginControllers();
        $controller->Action();
        break;
    }
    case 'register': {
        require_once('controllers/registercontrollers.php');
        $controller = new RegisterControllers();
        $controller->Action();
        break;
    }
    case 'logout': {
        require_once('controllers/logoutcontrollers.php');
        $controller = new LogoutControllers();
        $controller->Action();
        break;
    }

    default: {
        require_once('controllers/registercontrollers.php');
        $controller = new RegisterControllers();
        $controller->Action();
        break;
    }
}