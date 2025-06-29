<?php
/**
 * COURS PHP COMPLET - CHAPITRE 10: SESSIONS ET COOKIES
 * ===================================================
 */

echo "<h1>Chapitre 10: Sessions et Cookies</h1>";

// 1. INTRODUCTION AUX SESSIONS
echo "<h2>1. Introduction aux sessions</h2>";

// Démarrer une session
session_start();

echo "Session démarrée<br>";
echo "ID de session: " . session_id() . "<br>";
echo "Nom de session: " . session_name() . "<br>";

// 2. UTILISATION DES SESSIONS
echo "<h2>2. Utilisation des sessions</h2>";

// Stocker des données en session
$_SESSION['utilisateur'] = 'Jean Dupont';
$_SESSION['email'] = 'jean@example.com';
$_SESSION['derniere_visite'] = date('Y-m-d H:i:s');
$_SESSION['compteur'] = ($_SESSION['compteur'] ?? 0) + 1;

echo "Données stockées en session:<br>";
echo "Utilisateur: " . $_SESSION['utilisateur'] . "<br>";
echo "Email: " . $_SESSION['email'] . "<br>";
echo "Dernière visite: " . $_SESSION['derniere_visite'] . "<br>";
echo "Nombre de visites: " . $_SESSION['compteur'] . "<br>";

// Vérifier l'existence d'une variable de session
if (isset($_SESSION['utilisateur'])) {
    echo "L'utilisateur est connecté<br>";
}

// 3. GESTION DES SESSIONS
echo "<h2>3. Gestion des sessions</h2>";

// Informations sur la session
echo "Configuration des sessions:<br>";
echo "Durée de vie: " . ini_get('session.gc_maxlifetime') . " secondes<br>";
echo "Chemin de sauvegarde: " . session_save_path() . "<br>";
echo "Cookie de session: " . ini_get('session.cookie_lifetime') . " secondes<br>";

// Régénérer l'ID de session (sécurité)
$ancienId = session_id();
session_regenerate_id(true);
$nouvelId = session_id();
echo "ID régénéré: $ancienId → $nouvelId<br>";

// 4. SUPPRESSION DE DONNÉES DE SESSION
echo "<h2>4. Suppression de données de session</h2>";

// Supprimer une variable spécifique
$_SESSION['temp'] = 'Données temporaires';
echo "Données temp créées: " . $_SESSION['temp'] . "<br>";

unset($_SESSION['temp']);
echo "Données temp supprimées<br>";

// Vider toutes les variables de session (sans détruire la session)
// session_unset();

// 5. DESTRUCTION DE SESSION
echo "<h2>5. Destruction de session</h2>";

// Fonction pour détruire complètement une session
function detruireSession() {
    // Vider les variables
    session_unset();
    
    // Détruire la session côté serveur
    session_destroy();
    
    // Supprimer le cookie de session côté client
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
}

echo "Fonction de destruction de session définie<br>";

// 6. COOKIES
echo "<h2>6. Cookies</h2>";

// Créer un cookie simple
setcookie('nom_utilisateur', 'Jean', time() + 3600); // Expire dans 1 heure
echo "Cookie 'nom_utilisateur' créé<br>";

// Créer un cookie avec options
setcookie('preferences', json_encode(['theme' => 'sombre', 'langue' => 'fr']), 
    time() + (30 * 24 * 3600), // 30 jours
    '/', // Chemin
    '', // Domaine
    false, // Secure (HTTPS seulement)
    true // HttpOnly (pas accessible via JavaScript)
);
echo "Cookie 'preferences' créé avec options<br>";

// Lire les cookies (disponibles au prochain chargement de page)
echo "Cookies actuels:<br>";
if (!empty($_COOKIE)) {
    foreach ($_COOKIE as $nom => $valeur) {
        echo "- $nom: $valeur<br>";
    }
} else {
    echo "Aucun cookie (ils seront disponibles au prochain chargement)<br>";
}

// 7. SÉCURITÉ DES SESSIONS
echo "<h2>7. Sécurité des sessions</h2>";

// Configuration sécurisée des sessions
ini_set('session.cookie_httponly', 1); // Empêche l'accès JavaScript
ini_set('session.use_only_cookies', 1); // Utilise seulement les cookies
ini_set('session.cookie_secure', 0); // Mettre à 1 en HTTPS

// Vérification de l'IP (optionnel, peut poser problème avec les proxies)
function verifierIP() {
    if (!isset($_SESSION['ip_address'])) {
        $_SESSION['ip_address'] = $_SERVER['REMOTE_ADDR'];
    } elseif ($_SESSION['ip_address'] !== $_SERVER['REMOTE_ADDR']) {
        // IP différente, possible hijacking
        session_destroy();
        return false;
    }
    return true;
}

// Vérification du User-Agent
function verifierUserAgent() {
    if (!isset($_SESSION['user_agent'])) {
        $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
    } elseif ($_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
        // User-Agent différent, possible hijacking
        session_destroy();
        return false;
    }
    return true;
}

echo "Fonctions de sécurité définies<br>";

// 8. EXEMPLE D'AUTHENTIFICATION
echo "<h2>8. Exemple d'authentification</h2>";

class Auth {
    public static function login($username, $password) {
        // Simulation de vérification (en réalité, vérifier en base)
        $users = [
            'admin' => 'password123',
            'user' => 'motdepasse'
        ];
        
        if (isset($users[$username]) && $users[$username] === $password) {
            session_regenerate_id(true); // Sécurité
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['login_time'] = time();
            return true;
        }
        return false;
    }
    
    public static function logout() {
        session_unset();
        session_destroy();
    }
    
    public static function isLoggedIn() {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }
    
    public static function requireLogin() {
        if (!self::isLoggedIn()) {
            header('Location: login.php');
            exit;
        }
    }
    
    public static function getUser() {
        return $_SESSION['username'] ?? null;
    }
}

// Test de connexion
if (Auth::login('admin', 'password123')) {
    echo "Connexion réussie pour: " . Auth::getUser() . "<br>";
    echo "Statut: " . (Auth::isLoggedIn() ? 'Connecté' : 'Non connecté') . "<br>";
}

// 9. GESTION DU TIMEOUT
echo "<h2>9. Gestion du timeout</h2>";

class SessionTimeout {
    private static $timeout = 1800; // 30 minutes
    
    public static function check() {
        if (isset($_SESSION['last_activity'])) {
            if (time() - $_SESSION['last_activity'] > self::$timeout) {
                session_unset();
                session_destroy();
                return false; // Session expirée
            }
        }
        $_SESSION['last_activity'] = time();
        return true; // Session active
    }
    
    public static function getRemainingTime() {
        if (isset($_SESSION['last_activity'])) {
            $remaining = self::$timeout - (time() - $_SESSION['last_activity']);
            return max(0, $remaining);
        }
        return self::$timeout;
    }
}

// Test du timeout
if (SessionTimeout::check()) {
    $remaining = SessionTimeout::getRemainingTime();
    echo "Session active, temps restant: " . gmdate('i:s', $remaining) . "<br>";
} else {
    echo "Session expirée<br>";
}

// 10. STOCKAGE DE DONNÉES COMPLEXES
echo "<h2>10. Stockage de données complexes</h2>";

// Stocker un tableau
$_SESSION['panier'] = [
    ['produit' => 'Ordinateur', 'prix' => 899.99, 'quantite' => 1],
    ['produit' => 'Souris', 'prix' => 25.50, 'quantite' => 2]
];

// Stocker un objet (sera sérialisé automatiquement)
class Utilisateur {
    public $nom;
    public $email;
    public $preferences;
    
    public function __construct($nom, $email) {
        $this->nom = $nom;
        $this->email = $email;
        $this->preferences = [];
    }
}

$user = new Utilisateur('Jean Dupont', 'jean@example.com');
$user->preferences = ['theme' => 'sombre', 'notifications' => true];
$_SESSION['user_object'] = $user;

echo "Données complexes stockées:<br>";
echo "Panier: " . count($_SESSION['panier']) . " articles<br>";
echo "Utilisateur objet: " . $_SESSION['user_object']->nom . "<br>";

// 11. MESSAGES FLASH
echo "<h2>11. Messages flash</h2>";

class Flash {
    public static function set($type, $message) {
        $_SESSION['flash'][$type][] = $message;
    }
    
    public static function get($type = null) {
        if ($type) {
            $messages = $_SESSION['flash'][$type] ?? [];
            unset($_SESSION['flash'][$type]);
            return $messages;
        } else {
            $messages = $_SESSION['flash'] ?? [];
            unset($_SESSION['flash']);
            return $messages;
        }
    }
    
    public static function has($type) {
        return isset($_SESSION['flash'][$type]) && !empty($_SESSION['flash'][$type]);
    }
}

// Ajouter des messages flash
Flash::set('success', 'Opération réussie!');
Flash::set('error', 'Une erreur est survenue');
Flash::set('info', 'Information importante');

// Afficher les messages
$messages = Flash::get();
foreach ($messages as $type => $msgs) {
    foreach ($msgs as $msg) {
        echo "[$type] $msg<br>";
    }
}

// 12. NETTOYAGE ET BONNES PRATIQUES
echo "<h2>12. Nettoyage et bonnes pratiques</h2>";

echo "Bonnes pratiques pour les sessions:<br>";
echo "1. Toujours appeler session_start() au début<br>";
echo "2. Régénérer l'ID lors de la connexion<br>";
echo "3. Utiliser HTTPS en production<br>";
echo "4. Configurer les cookies sécurisés<br>";
echo "5. Implémenter un timeout<br>";
echo "6. Nettoyer les données sensibles<br>";
echo "7. Valider les données de session<br>";

// Supprimer les cookies de test
setcookie('nom_utilisateur', '', time() - 3600);
setcookie('preferences', '', time() - 3600);
echo "Cookies de test supprimés<br>";

?>