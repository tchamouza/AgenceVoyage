<?php
require_once 'bootstrap/autoload.php';

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\UserController;
use App\Controllers\ReservationController;
use App\Controllers\ContactController;

$router = new Router();

// Routes publiques
$router->get('/', [HomeController::class, 'index']);
$router->get('/services', [HomeController::class, 'services']);
$router->get('/about', [HomeController::class, 'about']);

// Routes de contact
$router->get('/contact', [ContactController::class, 'index']);
$router->post('/contact', [ContactController::class, 'index']);

// Routes d'authentification
$router->get('/login', [AuthController::class, 'showLogin']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/register', [AuthController::class, 'showRegister']);
$router->post('/register', [AuthController::class, 'register']);
$router->get('/logout', [AuthController::class, 'logout']);

// Routes protégées (utilisateur connecté)
$router->get('/dashboard', [UserController::class, 'dashboard']);
$router->get('/profile', [UserController::class, 'profile']);
$router->post('/profile', [UserController::class, 'profile']);

// Routes de réservation
$router->get('/reservations', [ReservationController::class, 'index']);
$router->get('/reservation', [ReservationController::class, 'create']);
$router->post('/reservation', [ReservationController::class, 'store']);
$router->get('/confirmation', [ReservationController::class, 'confirmation']);

// Résolution de la route
$router->resolve();
?>