<?php
/**
 * COURS PHP COMPLET - CHAPITRE 12: POO AVANCÉE
 * =============================================
 */

echo "<h1>Chapitre 12: Programmation Orientée Objet Avancée</h1>";

// 1. CONCEPTS AVANCÉS DE LA POO
echo "<h2>1. Concepts avancés de la POO</h2>";

echo "<h3>Les 4 piliers de la POO :</h3>";
echo "<ul>";
echo "<li><strong>Encapsulation</strong> : Masquer les détails d'implémentation</li>";
echo "<li><strong>Héritage</strong> : Réutiliser et étendre le code existant</li>";
echo "<li><strong>Polymorphisme</strong> : Même interface, comportements différents</li>";
echo "<li><strong>Abstraction</strong> : Simplifier la complexité</li>";
echo "</ul>";

// 2. ENCAPSULATION AVANCÉE
echo "<h2>2. Encapsulation avancée</h2>";

class BankAccount {
    private $balance;
    private $accountNumber;
    private $owner;
    
    public function __construct($owner, $initialBalance = 0) {
        $this->owner = $owner;
        $this->balance = $initialBalance;
        $this->accountNumber = $this->generateAccountNumber();
    }
    
    // Getter avec validation
    public function getBalance() {
        return $this->balance;
    }
    
    // Setter avec validation
    public function deposit($amount) {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Le montant doit être positif");
        }
        $this->balance += $amount;
        return $this;
    }
    
    public function withdraw($amount) {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Le montant doit être positif");
        }
        if ($amount > $this->balance) {
            throw new Exception("Solde insuffisant");
        }
        $this->balance -= $amount;
        return $this;
    }
    
    // Méthode privée (encapsulée)
    private function generateAccountNumber() {
        return 'ACC' . str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
    }
    
    public function getAccountInfo() {
        return [
            'owner' => $this->owner,
            'account_number' => $this->accountNumber,
            'balance' => $this->balance
        ];
    }
}

// Démonstration de l'encapsulation
try {
    $account = new BankAccount("Jean Dupont", 1000);
    echo "Compte créé pour: " . $account->getAccountInfo()['owner'] . "<br>";
    echo "Solde initial: " . $account->getBalance() . "€<br>";
    
    $account->deposit(500)->withdraw(200);
    echo "Solde après opérations: " . $account->getBalance() . "€<br>";
    
} catch (Exception $e) {
    echo "Erreur: " . $e->getMessage() . "<br>";
}

// 3. HÉRITAGE AVANCÉ
echo "<h2>3. Héritage avancé</h2>";

// Classe parent abstraite
abstract class Vehicle {
    protected $brand;
    protected $model;
    protected $year;
    
    public function __construct($brand, $model, $year) {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }
    
    // Méthode concrète
    public function getInfo() {
        return "{$this->brand} {$this->model} ({$this->year})";
    }
    
    // Méthode abstraite (doit être implémentée)
    abstract public function start();
    abstract public function getMaxSpeed();
    
    // Méthode finale (ne peut pas être redéfinie)
    final public function getAge() {
        return date('Y') - $this->year;
    }
}

// Interface pour les véhicules électriques
interface ElectricVehicle {
    public function charge();
    public function getBatteryLevel();
}

// Classe Car héritant de Vehicle
class Car extends Vehicle {
    private $doors;
    private $fuelType;
    
    public function __construct($brand, $model, $year, $doors, $fuelType) {
        parent::__construct($brand, $model, $year);
        $this->doors = $doors;
        $this->fuelType = $fuelType;
    }
    
    public function start() {
        return "Démarrage de la voiture avec la clé";
    }
    
    public function getMaxSpeed() {
        return 200; // km/h
    }
    
    public function getDoors() {
        return $this->doors;
    }
}

// Classe ElectricCar héritant de Car et implémentant ElectricVehicle
class ElectricCar extends Car implements ElectricVehicle {
    private $batteryLevel;
    private $range;
    
    public function __construct($brand, $model, $year, $doors, $range) {
        parent::__construct($brand, $model, $year, $doors, 'Electric');
        $this->range = $range;
        $this->batteryLevel = 100;
    }
    
    public function start() {
        return "Démarrage silencieux de la voiture électrique";
    }
    
    public function charge() {
        $this->batteryLevel = 100;
        return "Batterie rechargée à 100%";
    }
    
    public function getBatteryLevel() {
        return $this->batteryLevel;
    }
    
    public function getRange() {
        return $this->range;
    }
    
    // Redéfinition de getMaxSpeed
    public function getMaxSpeed() {
        return 180; // Les voitures électriques sont souvent limitées
    }
}

// Démonstration de l'héritage
$car = new Car("Toyota", "Corolla", 2020, 4, "Essence");
$electricCar = new ElectricCar("Tesla", "Model 3", 2022, 4, 500);

echo "Voiture classique: " . $car->getInfo() . "<br>";
echo "Démarrage: " . $car->start() . "<br>";
echo "Vitesse max: " . $car->getMaxSpeed() . " km/h<br>";
echo "Âge: " . $car->getAge() . " ans<br><br>";

echo "Voiture électrique: " . $electricCar->getInfo() . "<br>";
echo "Démarrage: " . $electricCar->start() . "<br>";
echo "Vitesse max: " . $electricCar->getMaxSpeed() . " km/h<br>";
echo "Batterie: " . $electricCar->getBatteryLevel() . "%<br>";
echo "Autonomie: " . $electricCar->getRange() . " km<br>";

// 4. POLYMORPHISME
echo "<h2>4. Polymorphisme</h2>";

// Interface commune
interface Drawable {
    public function draw();
    public function getArea();
}

// Classes implémentant l'interface
class Circle implements Drawable {
    private $radius;
    
    public function __construct($radius) {
        $this->radius = $radius;
    }
    
    public function draw() {
        return "Dessiner un cercle de rayon {$this->radius}";
    }
    
    public function getArea() {
        return pi() * $this->radius * $this->radius;
    }
}

class Rectangle implements Drawable {
    private $width;
    private $height;
    
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
}

class Triangle implements Drawable {
    private $base;
    private $height;
    
    public function __construct($base, $height) {
        $this->base = $base;
        $this->height = $height;
    }
    
    public function draw() {
        return "Dessiner un triangle base:{$this->base} hauteur:{$this->height}";
    }
    
    public function getArea() {
        return ($this->base * $this->height) / 2;
    }
}

// Fonction polymorphe
function drawShape(Drawable $shape) {
    echo $shape->draw() . " - Aire: " . round($shape->getArea(), 2) . "<br>";
}

// Démonstration du polymorphisme
$shapes = [
    new Circle(5),
    new Rectangle(10, 6),
    new Triangle(8, 4)
];

echo "Démonstration du polymorphisme:<br>";
foreach ($shapes as $shape) {
    drawShape($shape);
}

// 5. TRAITS AVANCÉS
echo "<h2>5. Traits avancés</h2>";

// Trait pour la journalisation
trait Logger {
    private $logFile = 'app.log';
    
    public function log($message, $level = 'INFO') {
        $timestamp = date('Y-m-d H:i:s');
        $logEntry = "[$timestamp] [$level] $message" . PHP_EOL;
        file_put_contents($this->logFile, $logEntry, FILE_APPEND);
        echo "Log: $message<br>";
    }
    
    public function logError($message) {
        $this->log($message, 'ERROR');
    }
    
    public function logWarning($message) {
        $this->log($message, 'WARNING');
    }
}

// Trait pour la validation
trait Validator {
    public function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    public function validateRequired($value) {
        return !empty(trim($value));
    }
    
    public function validateLength($value, $min, $max) {
        $length = strlen($value);
        return $length >= $min && $length <= $max;
    }
}

// Trait pour le cache
trait Cacheable {
    private $cache = [];
    
    public function cache($key, $value = null) {
        if ($value === null) {
            return $this->cache[$key] ?? null;
        }
        $this->cache[$key] = $value;
        return $this;
    }
    
    public function clearCache($key = null) {
        if ($key === null) {
            $this->cache = [];
        } else {
            unset($this->cache[$key]);
        }
        return $this;
    }
}

// Classe utilisant plusieurs traits
class UserService {
    use Logger, Validator, Cacheable;
    
    public function createUser($data) {
        $this->log("Tentative de création d'utilisateur");
        
        // Validation
        if (!$this->validateRequired($data['name'])) {
            $this->logError("Nom requis");
            return false;
        }
        
        if (!$this->validateEmail($data['email'])) {
            $this->logError("Email invalide: " . $data['email']);
            return false;
        }
        
        if (!$this->validateLength($data['password'], 6, 20)) {
            $this->logWarning("Mot de passe doit faire entre 6 et 20 caractères");
            return false;
        }
        
        // Simulation de création
        $userId = rand(1000, 9999);
        $this->cache("user_$userId", $data);
        $this->log("Utilisateur créé avec ID: $userId");
        
        return $userId;
    }
    
    public function getUser($id) {
        $cached = $this->cache("user_$id");
        if ($cached) {
            $this->log("Utilisateur $id récupéré du cache");
            return $cached;
        }
        
        $this->log("Utilisateur $id non trouvé");
        return null;
    }
}

// Démonstration des traits
$userService = new UserService();

$userData = [
    'name' => 'Jean Dupont',
    'email' => 'jean@example.com',
    'password' => 'motdepasse123'
];

$userId = $userService->createUser($userData);
if ($userId) {
    $user = $userService->getUser($userId);
    echo "Utilisateur récupéré: " . $user['name'] . "<br>";
}

// 6. MÉTHODES MAGIQUES AVANCÉES
echo "<h2>6. Méthodes magiques avancées</h2>";

class MagicContainer {
    private $data = [];
    private $methods = [];
    
    // __get et __set pour les propriétés dynamiques
    public function __get($name) {
        echo "Accès à la propriété: $name<br>";
        return $this->data[$name] ?? null;
    }
    
    public function __set($name, $value) {
        echo "Définition de la propriété: $name = $value<br>";
        $this->data[$name] = $value;
    }
    
    // __isset et __unset
    public function __isset($name) {
        return isset($this->data[$name]);
    }
    
    public function __unset($name) {
        unset($this->data[$name]);
    }
    
    // __call pour les méthodes dynamiques
    public function __call($name, $arguments) {
        if (isset($this->methods[$name])) {
            return call_user_func_array($this->methods[$name], $arguments);
        }
        throw new BadMethodCallException("Méthode $name non trouvée");
    }
    
    // Ajouter une méthode dynamiquement
    public function addMethod($name, $callback) {
        $this->methods[$name] = $callback;
    }
    
    // __toString
    public function __toString() {
        return "MagicContainer avec " . count($this->data) . " propriétés";
    }
    
    // __invoke (permet d'utiliser l'objet comme une fonction)
    public function __invoke($message) {
        return "Container appelé avec: $message";
    }
    
    // __clone
    public function __clone() {
        echo "Objet cloné<br>";
        $this->data = array_map(function($item) {
            return is_object($item) ? clone $item : $item;
        }, $this->data);
    }
}

// Démonstration des méthodes magiques
$container = new MagicContainer();

// __set et __get
$container->name = "Test";
echo "Nom: " . $container->name . "<br>";

// __call avec méthode dynamique
$container->addMethod('greet', function($name) {
    return "Bonjour $name!";
});
echo $container->greet("Jean") . "<br>";

// __toString
echo $container . "<br>";

// __invoke
echo $container("Message test") . "<br>";

// __clone
$container2 = clone $container;

// 7. DESIGN PATTERNS COURANTS
echo "<h2>7. Design Patterns courants</h2>";

echo "<h3>Singleton Pattern :</h3>";
class DatabaseConnection {
    private static $instance = null;
    private $connection;
    
    private function __construct() {
        // Simulation de connexion
        $this->connection = "Connexion DB établie";
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connection;
    }
    
    // Empêcher le clonage
    private function __clone() {}
    
    // Empêcher la désérialisation
    private function __wakeup() {}
}

$db1 = DatabaseConnection::getInstance();
$db2 = DatabaseConnection::getInstance();
echo "Même instance: " . ($db1 === $db2 ? 'Oui' : 'Non') . "<br>";

echo "<h3>Factory Pattern :</h3>";
abstract class Animal {
    abstract public function makeSound();
}

class Dog extends Animal {
    public function makeSound() {
        return "Woof!";
    }
}

class Cat extends Animal {
    public function makeSound() {
        return "Meow!";
    }
}

class AnimalFactory {
    public static function create($type) {
        switch (strtolower($type)) {
            case 'dog':
                return new Dog();
            case 'cat':
                return new Cat();
            default:
                throw new InvalidArgumentException("Type d'animal inconnu: $type");
        }
    }
}

$dog = AnimalFactory::create('dog');
$cat = AnimalFactory::create('cat');
echo "Chien: " . $dog->makeSound() . "<br>";
echo "Chat: " . $cat->makeSound() . "<br>";

echo "<h3>Observer Pattern :</h3>";
interface Observer {
    public function update($data);
}

class Subject {
    private $observers = [];
    private $state;
    
    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }
    
    public function detach(Observer $observer) {
        $key = array_search($observer, $this->observers);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }
    
    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this->state);
        }
    }
    
    public function setState($state) {
        $this->state = $state;
        $this->notify();
    }
}

class EmailNotifier implements Observer {
    public function update($data) {
        echo "Email envoyé: $data<br>";
    }
}

class SMSNotifier implements Observer {
    public function update($data) {
        echo "SMS envoyé: $data<br>";
    }
}

$subject = new Subject();
$subject->attach(new EmailNotifier());
$subject->attach(new SMSNotifier());
$subject->setState("Nouvelle notification");

// 8. GESTION D'ERREURS AVANCÉE
echo "<h2>8. Gestion d'erreurs avancée</h2>";

// Exception personnalisée
class ValidationException extends Exception {
    private $errors;
    
    public function __construct($errors, $message = "Erreurs de validation", $code = 0, Exception $previous = null) {
        $this->errors = $errors;
        parent::__construct($message, $code, $previous);
    }
    
    public function getErrors() {
        return $this->errors;
    }
}

class UserValidator {
    public function validate($data) {
        $errors = [];
        
        if (empty($data['name'])) {
            $errors['name'] = 'Le nom est requis';
        }
        
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email valide requis';
        }
        
        if (!empty($errors)) {
            throw new ValidationException($errors);
        }
        
        return true;
    }
}

// Utilisation avec gestion d'erreurs
try {
    $validator = new UserValidator();
    $validator->validate(['name' => '', 'email' => 'invalid-email']);
} catch (ValidationException $e) {
    echo "Erreurs de validation:<br>";
    foreach ($e->getErrors() as $field => $error) {
        echo "- $field: $error<br>";
    }
} catch (Exception $e) {
    echo "Erreur générale: " . $e->getMessage() . "<br>";
}

echo "<p><strong>Conclusion :</strong> La POO avancée en PHP offre des outils puissants pour créer des applications robustes, maintenables et extensibles. La maîtrise de ces concepts est essentielle pour tout développeur PHP professionnel.</p>";

?>