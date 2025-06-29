<?php
require_once 'config/config.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/ReservationController.php';
require_once 'controllers/ContactController.php';
require_once 'controllers/UserController.php';

session_start();

// Routeur simple
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);
$path = str_replace('/index.php', '', $path);

// Routes
switch ($path) {
    case '/':
    case '/home':
        $controller = new HomeController();
        $controller->index();
        break;
    
    case '/services':
        $controller = new HomeController();
        $controller->services();
        break;
    
    case '/about':
        $controller = new HomeController();
        $controller->about();
        break;
    
    case '/contact':
        $controller = new ContactController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->store();
        } else {
            $controller->index();
        }
        break;
    
    case '/register':
        $controller = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->register();
        } else {
            $controller->showRegister();
        }
        break;
    
    case '/login':
        $controller = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->login();
        } else {
            $controller->showLogin();
        }
        break;
    
    case '/logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    
    case '/dashboard':
        $controller = new UserController();
        $controller->dashboard();
        break;
    
    case '/profile':
        $controller = new UserController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->updateProfile();
        } else {
            $controller->showProfile();
        }
        break;
    
    case '/reservation':
        $controller = new ReservationController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->store();
        } else {
            $controller->create();
        }
        break;
    
    case '/reservations':
        $controller = new ReservationController();
        $controller->index();
        break;
    
    case '/confirmation':
        $controller = new ReservationController();
        $controller->confirmation();
        break;
    
    default:
        http_response_code(404);
        include 'views/errors/404.php';
        break;
}
?>