<?php
/**
 * COURS PHP COMPLET - CHAPITRE 11: ARCHITECTURE MVC
 * =================================================
 */

echo "<h1>Chapitre 11: Architecture MVC (Model-View-Controller)</h1>";

// 1. INTRODUCTION À L'ARCHITECTURE MVC
echo "<h2>1. Introduction à l'architecture MVC</h2>";

echo "<h3>Qu'est-ce que MVC ?</h3>";
echo "<p>MVC est un pattern architectural qui sépare une application en trois composants principaux :</p>";
echo "<ul>";
echo "<li><strong>Model (Modèle)</strong> : Gère les données et la logique métier</li>";
echo "<li><strong>View (Vue)</strong> : Gère l'affichage et l'interface utilisateur</li>";
echo "<li><strong>Controller (Contrôleur)</strong> : Gère les interactions utilisateur et coordonne Model et View</li>";
echo "</ul>";

echo "<h3>Avantages de MVC :</h3>";
echo "<ul>";
echo "<li>Séparation des responsabilités</li>";
echo "<li>Code plus maintenable et testable</li>";
echo "<li>Réutilisabilité des composants</li>";
echo "<li>Travail en équipe facilité</li>";
echo "<li>Évolutivité améliorée</li>";
echo "</ul>";

// 2. STRUCTURE D'UN PROJET MVC
echo "<h2>2. Structure d'un projet MVC</h2>";

echo "<pre>";
echo "projet-mvc/
├── app/
│   ├── Controllers/        # Contrôleurs
│   │   ├── BaseController.php
│   │   ├── HomeController.php
│   │   └── UserController.php
│   ├── Models/            # Modèles
│   │   ├── BaseModel.php
│   │   └── User.php
│   ├── Views/             # Vues
│   │   ├── layouts/
│   │   │   ├── header.php
│   │   │   └── footer.php
│   │   ├── home/
│   │   │   └── index.php
│   │   └── users/
│   │       ├── index.php
│   │       └── show.php
│   └── Core/              # Classes du framework
│       ├── Router.php
│       ├── Database.php
│       └── App.php
├── config/                # Configuration
│   └── database.php
├── public/                # Point d'entrée public
│   ├── index.php
│   ├── css/
│   └── js/
└── vendor/               # Dépendances (Composer)
";
echo "</pre>";

// 3. IMPLÉMENTATION DU MODÈLE (MODEL)
echo "<h2>3. Implémentation du Modèle (Model)</h2>";

echo "<h3>Classe de base pour les modèles :</h3>";
echo "<pre>";
echo htmlspecialchars('<?php
// app/Models/BaseModel.php
abstract class BaseModel {
    protected $db;
    protected $table;
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    // Méthodes CRUD de base
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function findAll() {
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function create($data) {
        $fields = implode(",", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        
        $sql = "INSERT INTO {$this->table} ({$fields}) VALUES ({$placeholders})";
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute($data);
    }
    
    public function update($id, $data) {
        $fields = [];
        foreach (array_keys($data) as $field) {
            $fields[] = "{$field} = :{$field}";
        }
        $fields = implode(", ", $fields);
        
        $sql = "UPDATE {$this->table} SET {$fields} WHERE id = :id";
        $data["id"] = $id;
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute($data);
    }
    
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}');
echo "</pre>";

echo "<h3>Modèle spécifique (User) :</h3>";
echo "<pre>";
echo htmlspecialchars('<?php
// app/Models/User.php
class User extends BaseModel {
    protected $table = "users";
    
    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function validateUser($data) {
        $errors = [];
        
        if (empty($data["name"])) {
            $errors[] = "Le nom est requis";
        }
        
        if (empty($data["email"]) || !filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email valide requis";
        }
        
        if ($this->emailExists($data["email"])) {
            $errors[] = "Cet email existe déjà";
        }
        
        return $errors;
    }
    
    private function emailExists($email) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM {$this->table} WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }
}');
echo "</pre>";

// 4. IMPLÉMENTATION DU CONTRÔLEUR (CONTROLLER)
echo "<h2>4. Implémentation du Contrôleur (Controller)</h2>";

echo "<h3>Contrôleur de base :</h3>";
echo "<pre>";
echo htmlspecialchars('<?php
// app/Controllers/BaseController.php
abstract class BaseController {
    protected function view($view, $data = []) {
        // Extraire les données pour les rendre disponibles dans la vue
        extract($data);
        
        // Inclure la vue
        $viewPath = "app/Views/{$view}.php";
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            throw new Exception("Vue non trouvée: {$view}");
        }
    }
    
    protected function redirect($url) {
        header("Location: {$url}");
        exit();
    }
    
    protected function json($data) {
        header("Content-Type: application/json");
        echo json_encode($data);
        exit();
    }
    
    protected function validateRequest($method = "POST") {
        if ($_SERVER["REQUEST_METHOD"] !== $method) {
            throw new Exception("Méthode non autorisée");
        }
    }
}');
echo "</pre>";

echo "<h3>Contrôleur spécifique (UserController) :</h3>";
echo "<pre>";
echo htmlspecialchars('<?php
// app/Controllers/UserController.php
class UserController extends BaseController {
    private $userModel;
    
    public function __construct() {
        $this->userModel = new User();
    }
    
    // Afficher la liste des utilisateurs
    public function index() {
        $users = $this->userModel->findAll();
        
        $this->view("users/index", [
            "title" => "Liste des utilisateurs",
            "users" => $users
        ]);
    }
    
    // Afficher un utilisateur spécifique
    public function show($id) {
        $user = $this->userModel->find($id);
        
        if (!$user) {
            $this->redirect("/users");
        }
        
        $this->view("users/show", [
            "title" => "Profil utilisateur",
            "user" => $user
        ]);
    }
    
    // Créer un nouvel utilisateur
    public function create() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                "name" => $_POST["name"] ?? "",
                "email" => $_POST["email"] ?? "",
                "password" => password_hash($_POST["password"] ?? "", PASSWORD_DEFAULT)
            ];
            
            $errors = $this->userModel->validateUser($data);
            
            if (empty($errors)) {
                if ($this->userModel->create($data)) {
                    $this->redirect("/users");
                } else {
                    $errors[] = "Erreur lors de la création";
                }
            }
            
            $this->view("users/create", [
                "title" => "Créer un utilisateur",
                "errors" => $errors,
                "data" => $data
            ]);
        } else {
            $this->view("users/create", [
                "title" => "Créer un utilisateur"
            ]);
        }
    }
}');
echo "</pre>";

// 5. IMPLÉMENTATION DE LA VUE (VIEW)
echo "<h2>5. Implémentation de la Vue (View)</h2>";

echo "<h3>Layout principal (header.php) :</h3>";
echo "<pre>";
echo htmlspecialchars('<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "Mon Application MVC" ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="/">Accueil</a>
            <a href="/users">Utilisateurs</a>
        </nav>
    </header>
    <main>');
echo "</pre>";

echo "<h3>Vue pour la liste des utilisateurs :</h3>";
echo "<pre>";
echo htmlspecialchars('<?php
// app/Views/users/index.php
include "app/Views/layouts/header.php";
?>

<h1>Liste des utilisateurs</h1>

<a href="/users/create" class="btn">Ajouter un utilisateur</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user["id"]) ?></td>
            <td><?= htmlspecialchars($user["name"]) ?></td>
            <td><?= htmlspecialchars($user["email"]) ?></td>
            <td>
                <a href="/users/<?= $user["id"] ?>">Voir</a>
                <a href="/users/<?= $user["id"] ?>/edit">Modifier</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include "app/Views/layouts/footer.php"; ?>');
echo "</pre>";

// 6. ROUTEUR (ROUTER)
echo "<h2>6. Routeur (Router)</h2>";

echo "<h3>Implémentation du routeur :</h3>";
echo "<pre>";
echo htmlspecialchars('<?php
// app/Core/Router.php
class Router {
    private $routes = [];
    
    public function get($path, $callback) {
        $this->routes["GET"][$path] = $callback;
    }
    
    public function post($path, $callback) {
        $this->routes["POST"][$path] = $callback;
    }
    
    public function resolve() {
        $method = $_SERVER["REQUEST_METHOD"];
        $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        
        // Recherche de route exacte
        if (isset($this->routes[$method][$path])) {
            return $this->executeCallback($this->routes[$method][$path]);
        }
        
        // Recherche de route avec paramètres
        foreach ($this->routes[$method] as $route => $callback) {
            if ($this->matchRoute($route, $path)) {
                return $this->executeCallback($callback, $this->extractParams($route, $path));
            }
        }
        
        // Route non trouvée
        http_response_code(404);
        echo "Page non trouvée";
    }
    
    private function matchRoute($route, $path) {
        $routePattern = preg_replace("/\{[^}]+\}/", "([^/]+)", $route);
        return preg_match("#^{$routePattern}$#", $path);
    }
    
    private function extractParams($route, $path) {
        $routePattern = preg_replace("/\{[^}]+\}/", "([^/]+)", $route);
        preg_match("#^{$routePattern}$#", $path, $matches);
        return array_slice($matches, 1);
    }
    
    private function executeCallback($callback, $params = []) {
        if (is_array($callback)) {
            $controller = new $callback[0]();
            $method = $callback[1];
            return call_user_func_array([$controller, $method], $params);
        }
        
        return call_user_func_array($callback, $params);
    }
}');
echo "</pre>";

// 7. POINT D'ENTRÉE (INDEX.PHP)
echo "<h2>7. Point d'entrée (index.php)</h2>";

echo "<pre>";
echo htmlspecialchars('<?php
// public/index.php

// Autoloader simple
spl_autoload_register(function ($class) {
    $file = "../app/" . str_replace("\\", "/", $class) . ".php";
    if (file_exists($file)) {
        require_once $file;
    }
});

// Démarrage de la session
session_start();

// Création du routeur
$router = new Router();

// Définition des routes
$router->get("/", [HomeController::class, "index"]);
$router->get("/users", [UserController::class, "index"]);
$router->get("/users/{id}", [UserController::class, "show"]);
$router->get("/users/create", [UserController::class, "create"]);
$router->post("/users/create", [UserController::class, "create"]);

// Résolution de la route
try {
    $router->resolve();
} catch (Exception $e) {
    echo "Erreur: " . $e->getMessage();
}');
echo "</pre>";

// 8. AVANTAGES ET INCONVÉNIENTS
echo "<h2>8. Avantages et inconvénients de MVC</h2>";

echo "<h3>✅ Avantages :</h3>";
echo "<ul>";
echo "<li><strong>Séparation des responsabilités</strong> : Chaque composant a un rôle précis</li>";
echo "<li><strong>Maintenabilité</strong> : Code plus facile à maintenir et déboguer</li>";
echo "<li><strong>Testabilité</strong> : Chaque composant peut être testé indépendamment</li>";
echo "<li><strong>Réutilisabilité</strong> : Les modèles et vues peuvent être réutilisés</li>";
echo "<li><strong>Travail en équipe</strong> : Développeurs peuvent travailler sur différents composants</li>";
echo "<li><strong>Évolutivité</strong> : Facilite l'ajout de nouvelles fonctionnalités</li>";
echo "</ul>";

echo "<h3>❌ Inconvénients :</h3>";
echo "<ul>";
echo "<li><strong>Complexité initiale</strong> : Plus complexe pour de petits projets</li>";
echo "<li><strong>Courbe d'apprentissage</strong> : Nécessite de comprendre le pattern</li>";
echo "<li><strong>Overhead</strong> : Plus de fichiers et de structure</li>";
echo "<li><strong>Sur-ingénierie</strong> : Peut être excessif pour des applications simples</li>";
echo "</ul>";

// 9. BONNES PRATIQUES MVC
echo "<h2>9. Bonnes pratiques MVC</h2>";

echo "<h3>📋 Règles à suivre :</h3>";
echo "<ul>";
echo "<li><strong>Modèles</strong> : Ne doivent contenir que la logique métier et d'accès aux données</li>";
echo "<li><strong>Vues</strong> : Ne doivent contenir que du code d'affichage (HTML, CSS, JS)</li>";
echo "<li><strong>Contrôleurs</strong> : Doivent rester légers et ne faire que coordonner</li>";
echo "<li><strong>Pas de logique métier dans les contrôleurs</strong></li>";
echo "<li><strong>Pas d'accès direct aux données dans les vues</strong></li>";
echo "<li><strong>Utiliser des interfaces pour découpler les composants</strong></li>";
echo "<li><strong>Implémenter la validation dans les modèles</strong></li>";
echo "<li><strong>Gérer les erreurs de manière centralisée</strong></li>";
echo "</ul>";

// 10. FRAMEWORKS MVC PHP POPULAIRES
echo "<h2>10. Frameworks MVC PHP populaires</h2>";

echo "<h3>🚀 Frameworks recommandés :</h3>";
echo "<ul>";
echo "<li><strong>Laravel</strong> : Framework le plus populaire, très complet</li>";
echo "<li><strong>Symfony</strong> : Framework robuste et modulaire</li>";
echo "<li><strong>CodeIgniter</strong> : Simple et léger</li>";
echo "<li><strong>CakePHP</strong> : Convention over configuration</li>";
echo "<li><strong>Zend/Laminas</strong> : Framework d'entreprise</li>";
echo "<li><strong>Phalcon</strong> : Framework C extension, très rapide</li>";
echo "</ul>";

echo "<h3>Pourquoi utiliser un framework ?</h3>";
echo "<ul>";
echo "<li>Gain de temps de développement</li>";
echo "<li>Sécurité intégrée</li>";
echo "<li>Communauté et documentation</li>";
echo "<li>Outils et fonctionnalités avancées</li>";
echo "<li>Standards et bonnes pratiques</li>";
echo "</ul>";

echo "<p><strong>Conclusion :</strong> L'architecture MVC est essentielle pour développer des applications PHP maintenables et évolutives. Elle sépare clairement les responsabilités et facilite le travail en équipe.</p>";

?>