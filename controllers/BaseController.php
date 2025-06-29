<?php
class BaseController {
    protected $pdo;
    
    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }
    
    protected function requireAuth() {
        if (!isset($_SESSION['utilisateur'])) {
            redirect('/login');
        }
    }
    
    protected function view($viewName, $data = []) {
        extract($data);
        include "views/{$viewName}.php";
    }
    
    protected function redirect($url) {
        header("Location: {$url}");
        exit();
    }
    
    protected function validateRequired($fields, $data) {
        $errors = [];
        foreach ($fields as $field) {
            if (empty($data[$field])) {
                $errors[] = "Le champ {$field} est obligatoire.";
            }
        }
        return $errors;
    }
}
?>