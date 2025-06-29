<?php
// Configuration de la base de données
$host = 'localhost';      
$dbname = 'travel';  
$username = 'root';       
$password = '';           

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Configuration générale
define('BASE_URL', 'http://localhost');
define('UPLOAD_DIR', 'uploads/');

// Fonction helper pour les vues
function view($viewName, $data = []) {
    extract($data);
    include "views/{$viewName}.php";
}

function redirect($url) {
    header("Location: {$url}");
    exit();
}
?>