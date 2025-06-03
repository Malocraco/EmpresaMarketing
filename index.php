<?php
session_start();

// Cambiar la lógica de routing para que la página principal muestre servicios

// Simple routing
$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? 'index';

// Include utilities
require_once 'utils/db.php';
require_once 'utils/utils.php';

// Route to appropriate controller
switch ($page) {
    case 'home':
        require_once 'controllers/HomeController.php';
        $controller = new HomeController();
        break;
    case 'user':
        require_once 'controllers/UserController.php';
        $controller = new UserController();
        break;
    case 'service':
        require_once 'controllers/ServiceController.php';
        $controller = new ServiceController();
        break;
    case 'quote':
        require_once 'controllers/QuoteController.php';
        $controller = new QuoteController();
        break;
    case 'payment':
        require_once 'controllers/PaymentController.php';
        $controller = new PaymentController();
        break;
    case 'report':
        require_once 'controllers/ReportController.php';
        $controller = new ReportController();
        break;
    case 'unauthorized':
        require_once 'controllers/UnauthorizedController.php';
        $controller = new UnauthorizedController();
        break;
    default:
        require_once 'controllers/HomeController.php';
        $controller = new HomeController();
        $action = 'index';
        break;
}

// Call the appropriate action
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    $controller->index();
}
?>
