<?php
namespace App\Middleware;

use App\Core\Session;

class AuthMiddleware {
    
    public static function handle() {
        Session::start();
        
        if (!Session::isAuthenticated()) {
            header('Location: /login');
            exit();
        }
        
        return true;
    }
    
    public static function guest() {
        Session::start();
        
        if (Session::isAuthenticated()) {
            header('Location: /dashboard');
            exit();
        }
        
        return true;
    }
}
?>