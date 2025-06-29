<?php
/**
 * COURS PHP COMPLET - CHAPITRE 7: PROGRAMMATION ORIENTÉE OBJET
 * ============================================================
 */

echo "<h1>Chapitre 7: Programmation Orientée Objet</h1>";

// 1. CLASSES ET OBJETS
echo "<h2>1. Classes et objets</h2>";

class Personne {
    // Propriétés
    public $nom;
    public $prenom;
    private $age;
    protected $email;
    
    // Constructeur
    public function __construct($nom, $prenom, $age) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
    }
    
    // Méthodes
    public function sePresenter() {
        return "Je suis {$this->prenom} {$this->nom}, j'ai {$this->age} ans.";
    }
    
    public function getAge() {
        return $this->age;
    }
    
    public function setAge($age) {
        if ($age > 0 && $age < 150) {
            $this->age = $age;
        }
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    protected function getEmail() {
        return $this->email;
    }
}

// Création d'objets
$personne1 = new Personne("Dupont", "Jean", 30);
$personne2 = new Personne("Martin", "Marie", 25);

echo $personne1->sePresenter() . "<br>";
echo $personne2->sePresenter() . "<br>";

// Accès aux propriétés
echo "Nom: " . $personne1->nom . "<br>";
$personne1->setAge(31);
echo "Nouvel âge: " . $personne1->getAge() . "<br>";

// 2. VISIBILITÉ (PUBLIC, PRIVATE, PROTECTED)
echo "<h2>2. Visibilité</h2>";

// public: accessible partout
// private: accessible seulement dans la classe
// protected: accessible dans la classe et ses sous-classes

echo "Propriété publique nom: " . $personne1->nom . "<br>";
// echo $personne1->age; // Erreur! Propriété privée
echo "Âge via getter: " . $personne1->getAge() . "<br>";

// 3. HÉRITAGE
echo "<h2>3. Héritage</h2>";

class Employe extends Personne {
    private $salaire;
    private $poste;
    
    public function __construct($nom, $prenom, $age, $poste, $salaire) {
        parent::__construct($nom, $prenom, $age);
        $this->poste = $poste;
        $this->salaire = $salaire;
    }
    
    public function sePresenter() {
        return parent::sePresenter() . " Je suis " . $this->poste . ".";
    }
    
    public function getSalaire() {
        return $this->salaire;
    }
    
    public function getPoste() {
        return $this->poste;
    }
    
    // Méthode qui utilise une propriété protected du parent
    public function afficherEmail() {
        return "Email: " . $this->getEmail();
    }
}

$employe = new Employe("Durand", "Pierre", 35, "Développeur", 45000);
echo $employe->sePresenter() . "<br>";
echo "Poste: " . $employe->getPoste() . "<br>";
echo "Salaire: " . $employe->getSalaire() . "€<br>";

$employe->setEmail("pierre.durand@example.com");
echo $employe->afficherEmail() . "<br>";

// 4. MÉTHODES ET PROPRIÉTÉS STATIQUES
echo "<h2>4. Méthodes et propriétés statiques</h2>";

class Compteur {
    private static $count = 0;
    public static $nom = "Compteur Global";
    
    public function __construct() {
        self::$count++;
    }
    
    public static function getCount() {
        return self::$count;
    }
    
    public static function reset() {
        self::$count = 0;
    }
}

echo "Compteur initial: " . Compteur::getCount() . "<br>";
echo "Nom: " . Compteur::$nom . "<br>";

$c1 = new Compteur();
$c2 = new Compteur();
$c3 = new Compteur();

echo "Compteur après 3 instances: " . Compteur::getCount() . "<br>";

Compteur::reset();
echo "Compteur après reset: " . Compteur::getCount() . "<br>";

// 5. CONSTANTES DE CLASSE
echo "<h2>5. Constantes de classe</h2>";

class MaClasse {
    const VERSION = "1.0.0";
    const AUTHOR = "Développeur";
    
    public function getInfo() {
        return "Version: " . self::VERSION . ", Auteur: " . self::AUTHOR;
    }
}

echo "Version: " . MaClasse::VERSION . "<br>";
echo MaClasse::AUTHOR . "<br>";

$obj = new MaClasse();
echo $obj->getInfo() . "<br>";

// 6. MÉTHODES MAGIQUES
echo "<h2>6. Méthodes magiques</h2>";

class MaClasseMagique {
    private $data = [];
    
    public function __construct($nom) {
        echo "Construction de l'objet: $nom<br>";
        $this->data['nom'] = $nom;
    }
    
    public function __destruct() {
        echo "Destruction de l'objet: " . $this->data['nom'] . "<br>";
    }
    
    public function __get($name) {
        echo "Accès à la propriété inexistante: $name<br>";
        return $this->data[$name] ?? null;
    }
    
    public function __set($name, $value) {
        echo "Définition de la propriété: $name = $value<br>";
        $this->data[$name] = $value;
    }
    
    public function __call($name, $arguments) {
        echo "Appel de méthode inexistante: $name avec arguments: " . implode(', ', $arguments) . "<br>";
    }
    
    public function __toString() {
        return "Objet MaClasseMagique: " . $this->data['nom'];
    }
}

$magic = new MaClasseMagique("Test");
echo $magic->nom . "<br>";
$magic->age = 25;
echo $magic->age . "<br>";
$magic->methodeInexistante("arg1", "arg2");
echo $magic . "<br>";

// 7. INTERFACES
echo "<h2>7. Interfaces</h2>";

interface Drawable {
    public function draw();
    public function getArea();
}

interface Colorable {
    public function setColor($color);
    public function getColor();
}

class Rectangle implements Drawable, Colorable {
    private $width;
    private $height;
    private $color;
    
    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }
    
    public function draw() {
        return "Dessiner un rectangle {$this->width}x{$this->height}";
    }
    
    public function getArea() {
        return $this->width * $this->height;
    }
    
    public function setColor($color) {
        $this->color = $color;
    }
    
    public function getColor() {
        return $this->color;
    }
}

$rect = new Rectangle(10, 5);
echo $rect->draw() . "<br>";
echo "Aire: " . $rect->getArea() . "<br>";
$rect->setColor("rouge");
echo "Couleur: " . $rect->getColor() . "<br>";

// 8. CLASSES ABSTRAITES
echo "<h2>8. Classes abstraites</h2>";

abstract class Forme {
    protected $nom;
    
    public function __construct($nom) {
        $this->nom = $nom;
    }
    
    // Méthode concrète
    public function getNom() {
        return $this->nom;
    }
    
    // Méthode abstraite (doit être implémentée)
    abstract public function calculerAire();
    abstract public function calculerPerimetre();
}

class Cercle extends Forme {
    private $rayon;
    
    public function __construct($rayon) {
        parent::__construct("Cercle");
        $this->rayon = $rayon;
    }
    
    public function calculerAire() {
        return pi() * $this->rayon * $this->rayon;
    }
    
    public function calculerPerimetre() {
        return 2 * pi() * $this->rayon;
    }
}

$cercle = new Cercle(5);
echo "Forme: " . $cercle->getNom() . "<br>";
echo "Aire: " . round($cercle->calculerAire(), 2) . "<br>";
echo "Périmètre: " . round($cercle->calculerPerimetre(), 2) . "<br>";

// 9. TRAITS
echo "<h2>9. Traits</h2>";

trait Logger {
    public function log($message) {
        echo "[LOG] " . date('Y-m-d H:i:s') . " - $message<br>";
    }
}

trait Validator {
    public function validate($data) {
        return !empty($data);
    }
}

class User {
    use Logger, Validator;
    
    private $name;
    
    public function __construct($name) {
        if ($this->validate($name)) {
            $this->name = $name;
            $this->log("Utilisateur créé: $name");
        }
    }
    
    public function getName() {
        return $this->name;
    }
}

$user = new User("Alice");
echo "Nom utilisateur: " . $user->getName() . "<br>";

// 10. NAMESPACES
echo "<h2>10. Namespaces</h2>";

namespace MonProjet\Models {
    class User {
        public function __construct() {
            echo "User du namespace MonProjet\\Models<br>";
        }
    }
}

namespace MonProjet\Controllers {
    class UserController {
        public function __construct() {
            echo "UserController du namespace MonProjet\\Controllers<br>";
            // Utilisation d'une classe du même namespace
            $user = new \MonProjet\Models\User();
        }
    }
}

namespace {
    // Namespace global
    $controller = new MonProjet\Controllers\UserController();
}

// 11. AUTOLOADING
echo "<h2>11. Autoloading</h2>";

// Exemple d'autoloader simple
spl_autoload_register(function ($className) {
    $file = str_replace('\\', '/', $className) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// 12. EXCEPTIONS
echo "<h2>12. Exceptions</h2>";

class MonException extends Exception {
    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}

class Calculator {
    public function divide($a, $b) {
        if ($b == 0) {
            throw new MonException("Division par zéro impossible!");
        }
        return $a / $b;
    }
}

$calc = new Calculator();

try {
    echo "10 / 2 = " . $calc->divide(10, 2) . "<br>";
    echo "10 / 0 = " . $calc->divide(10, 0) . "<br>";
} catch (MonException $e) {
    echo "Erreur: " . $e->getMessage() . "<br>";
} catch (Exception $e) {
    echo "Erreur générale: " . $e->getMessage() . "<br>";
} finally {
    echo "Bloc finally exécuté<br>";
}

?>