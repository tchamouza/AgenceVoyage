<?php
/**
 * COURS PHP COMPLET - PARTIE 3: POO - FONDAMENTAUX
 * =================================================
 * 
 * Cette partie couvre les fondamentaux de la Programmation Orientée Objet :
 * - Concepts de base de la POO
 * - Classes et objets
 * - Propriétés et méthodes
 * - Constructeurs et destructeurs
 * - Visibilité (public, private, protected)
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partie 3: POO - Fondamentaux</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            margin-bottom: 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .chapter {
            margin-bottom: 50px;
            padding-bottom: 30px;
            border-bottom: 2px solid #eee;
        }
        
        .chapter:last-child {
            border-bottom: none;
        }
        
        h1 {
            color: #667eea;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        h2 {
            color: #764ba2;
            font-size: 1.8rem;
            margin: 30px 0 20px 0;
            padding-left: 20px;
            border-left: 4px solid #667eea;
        }
        
        h3 {
            color: #555;
            font-size: 1.3rem;
            margin: 25px 0 15px 0;
            background: #f8f9fa;
            padding: 10px 15px;
            border-radius: 8px;
            border-left: 3px solid #667eea;
        }
        
        h4 {
            color: #666;
            font-size: 1.1rem;
            margin: 20px 0 10px 0;
        }
        
        .definition {
            background: #e3f2fd;
            border-left: 4px solid #2196f3;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 8px 8px 0;
        }
        
        .definition h4 {
            color: #1976d2;
            margin-bottom: 10px;
            font-weight: bold;
        }
        
        .concept-box {
            background: #f3e5f5;
            border-left: 4px solid #9c27b0;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 8px 8px 0;
        }
        
        .concept-box h4 {
            color: #7b1fa2;
            margin-bottom: 10px;
            font-weight: bold;
        }
        
        .code-block {
            background: #2d3748;
            color: #e2e8f0;
            padding: 25px;
            border-radius: 10px;
            margin: 20px 0;
            overflow-x: auto;
            font-family: 'Courier New', monospace;
            position: relative;
            font-size: 14px;
            line-height: 1.5;
        }
        
        .code-block::before {
            content: "PHP";
            position: absolute;
            top: 10px;
            right: 15px;
            background: #667eea;
            color: white;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .output {
            background: #f7fafc;
            border: 2px solid #e2e8f0;
            padding: 20px;
            border-radius: 8px;
            margin: 15px 0;
            font-family: monospace;
            position: relative;
        }
        
        .output::before {
            content: "🖥️ Résultat:";
            font-weight: bold;
            color: #667eea;
            display: block;
            margin-bottom: 15px;
            font-family: 'Segoe UI', sans-serif;
        }
        
        .tip {
            background: #e6fffa;
            border-left: 4px solid #38b2ac;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 8px 8px 0;
        }
        
        .tip::before {
            content: "💡 Astuce: ";
            font-weight: bold;
            color: #38b2ac;
        }
        
        .warning {
            background: #fffbeb;
            border-left: 4px solid #f6ad55;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 8px 8px 0;
        }
        
        .warning::before {
            content: "⚠️ Attention: ";
            font-weight: bold;
            color: #f6ad55;
        }
        
        .important {
            background: #fef2f2;
            border-left: 4px solid #f56565;
            padding: 20px;
            margin: 20px 0;
            border-radius: 0 8px 8px 0;
        }
        
        .important::before {
            content: "❗ Important: ";
            font-weight: bold;
            color: #f56565;
        }
        
        .navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            margin-top: 30px;
        }
        
        .nav-link {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }
        
        ul, ol {
            margin-left: 30px;
            margin-bottom: 20px;
        }
        
        li {
            margin-bottom: 8px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        th {
            background: #667eea;
            color: white;
            font-weight: 600;
        }
        
        tr:hover {
            background: #f8f9fa;
        }
        
        .syntax-highlight {
            background: #fff3cd;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: monospace;
            color: #856404;
        }
        
        .pillars-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        
        .pillar {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
        }
        
        .pillar h4 {
            color: #667eea;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🏗️ Partie 3: POO - Fondamentaux</h1>
            <p>Découvrez les concepts de base de la Programmation Orientée Objet</p>
        </div>

        <div class="content">
            <div class="chapter">
                <h2>1. Introduction à la Programmation Orientée Objet</h2>
                
                <div class="definition">
                    <h4>Programmation Orientée Objet (POO)</h4>
                    <p>La Programmation Orientée Objet est un paradigme de programmation qui organise le code autour d'<strong>objets</strong> plutôt que de fonctions. Un objet combine des données (propriétés) et des comportements (méthodes) dans une seule entité.</p>
                </div>
                
                <h3>Différences entre programmation procédurale et POO</h3>
                
                <table>
                    <thead>
                        <tr>
                            <th>Aspect</th>
                            <th>Programmation Procédurale</th>
                            <th>Programmation Orientée Objet</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Organisation</strong></td>
                            <td>Fonctions et données séparées</td>
                            <td>Objets contenant données et méthodes</td>
                        </tr>
                        <tr>
                            <td><strong>Approche</strong></td>
                            <td>Top-down (du général au particulier)</td>
                            <td>Bottom-up (du particulier au général)</td>
                        </tr>
                        <tr>
                            <td><strong>Réutilisabilité</strong></td>
                            <td>Réutilisation de fonctions</td>
                            <td>Réutilisation d'objets et classes</td>
                        </tr>
                        <tr>
                            <td><strong>Maintenance</strong></td>
                            <td>Plus difficile pour gros projets</td>
                            <td>Plus facile grâce à l'encapsulation</td>
                        </tr>
                        <tr>
                            <td><strong>Exemple</strong></td>
                            <td>calculerAire($longueur, $largeur)</td>
                            <td>$rectangle->calculerAire()</td>
                        </tr>
                    </tbody>
                </table>
                
                <h3>Les 4 piliers de la POO</h3>
                
                <div class="pillars-grid">
                    <div class="pillar">
                        <h4>🔒 Encapsulation</h4>
                        <p>Regrouper les données et méthodes dans une classe et contrôler l'accès via la visibilité</p>
                    </div>
                    <div class="pillar">
                        <h4>🧬 Héritage</h4>
                        <p>Créer de nouvelles classes basées sur des classes existantes pour réutiliser le code</p>
                    </div>
                    <div class="pillar">
                        <h4>🎭 Polymorphisme</h4>
                        <p>Utiliser une même interface pour des objets de types différents</p>
                    </div>
                    <div class="pillar">
                        <h4>🎨 Abstraction</h4>
                        <p>Simplifier la complexité en cachant les détails d'implémentation</p>
                    </div>
                </div>
                
                <h3>Avantages de la POO</h3>
                <ul>
                    <li><strong>Modularité</strong> : Code organisé en modules logiques</li>
                    <li><strong>Réutilisabilité</strong> : Classes réutilisables dans différents contextes</li>
                    <li><strong>Maintenabilité</strong> : Modifications localisées dans les classes</li>
                    <li><strong>Extensibilité</strong> : Facile d'ajouter de nouvelles fonctionnalités</li>
                    <li><strong>Abstraction</strong> : Simplification des problèmes complexes</li>
                    <li><strong>Collaboration</strong> : Équipes peuvent travailler sur différentes classes</li>
                </ul>
                
                <div class="code-block">
&lt;?php
// Exemple comparatif : Procédural vs POO

// ========== APPROCHE PROCÉDURALE ==========
function creerUtilisateur($nom, $email) {
    return [
        'nom' => $nom,
        'email' => $email,
        'date_creation' => date('Y-m-d H:i:s')
    ];
}

function afficherUtilisateur($utilisateur) {
    return $utilisateur['nom'] . ' (' . $utilisateur['email'] . ')';
}

function validerEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Utilisation procédurale
$user1 = creerUtilisateur("Jean Dupont", "jean@example.com");
echo "Procédural : " . afficherUtilisateur($user1) . "&lt;br&gt;";

// ========== APPROCHE ORIENTÉE OBJET ==========
class Utilisateur {
    private $nom;
    private $email;
    private $dateCreation;
    
    public function __construct($nom, $email) {
        $this->nom = $nom;
        $this->setEmail($email);
        $this->dateCreation = date('Y-m-d H:i:s');
    }
    
    public function setEmail($email) {
        if ($this->validerEmail($email)) {
            $this->email = $email;
        } else {
            throw new Exception("Email invalide");
        }
    }
    
    private function validerEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    public function afficher() {
        return $this->nom . ' (' . $this->email . ')';
    }
    
    public function getNom() {
        return $this->nom;
    }
    
    public function getEmail() {
        return $this->email;
    }
}

// Utilisation orientée objet
$user2 = new Utilisateur("Marie Martin", "marie@example.com");
echo "POO : " . $user2->afficher() . "&lt;br&gt;";
echo "Nom : " . $user2->getNom() . "&lt;br&gt;";
?&gt;
                </div>
                
                <div class="output">
Procédural : Jean Dupont (jean@example.com)<br>
POO : Marie Martin (marie@example.com)<br>
Nom : Marie Martin
                </div>
            </div>

            <div class="chapter">
                <h2>2. Classes et Objets</h2>
                
                <div class="definition">
                    <h4>Classe et Objet</h4>
                    <p>Une <strong>classe</strong> est un modèle ou un plan qui définit les propriétés et méthodes communes à un groupe d'objets. Un <strong>objet</strong> est une instance concrète d'une classe.</p>
                </div>
                
                <div class="concept-box">
                    <h4>Analogie</h4>
                    <p>Pensez à une classe comme au plan d'une maison : elle définit où sont les pièces, les portes, etc. L'objet est la maison réelle construite à partir de ce plan. Vous pouvez construire plusieurs maisons (objets) à partir du même plan (classe).</p>
                </div>
                
                <h3>Syntaxe de base d'une classe</h3>
                <div class="code-block">
&lt;?php
// Définition d'une classe simple
class Voiture {
    // Propriétés (attributs)
    public $marque;
    public $modele;
    public $couleur;
    public $vitesse;
    
    // Méthodes (comportements)
    public function demarrer() {
        return "La voiture démarre";
    }
    
    public function accelerer($vitesse) {
        $this->vitesse += $vitesse;
        return "Accélération à " . $this->vitesse . " km/h";
    }
    
    public function freiner() {
        $this->vitesse = 0;
        return "La voiture s'arrête";
    }
    
    public function klaxonner() {
        return "Beep beep !";
    }
}

// Création d'objets (instances)
$voiture1 = new Voiture();
$voiture1->marque = "Toyota";
$voiture1->modele = "Corolla";
$voiture1->couleur = "rouge";
$voiture1->vitesse = 0;

$voiture2 = new Voiture();
$voiture2->marque = "BMW";
$voiture2->modele = "X5";
$voiture2->couleur = "noir";
$voiture2->vitesse = 0;

// Utilisation des objets
echo "Voiture 1 : " . $voiture1->marque . " " . $voiture1->modele . " " . $voiture1->couleur . "&lt;br&gt;";
echo $voiture1->demarrer() . "&lt;br&gt;";
echo $voiture1->accelerer(50) . "&lt;br&gt;";
echo $voiture1->klaxonner() . "&lt;br&gt;";

echo "&lt;br&gt;Voiture 2 : " . $voiture2->marque . " " . $voiture2->modele . " " . $voiture2->couleur . "&lt;br&gt;";
echo $voiture2->demarrer() . "&lt;br&gt;";
echo $voiture2->accelerer(80) . "&lt;br&gt;";
echo $voiture2->freiner() . "&lt;br&gt;";
?&gt;
                </div>
                
                <div class="output">
Voiture 1 : Toyota Corolla rouge<br>
La voiture démarre<br>
Accélération à 50 km/h<br>
Beep beep !<br>
<br>
Voiture 2 : BMW X5 noir<br>
La voiture démarre<br>
Accélération à 80 km/h<br>
La voiture s'arrête
                </div>
                
                <h3>Le mot-clé $this</h3>
                <div class="definition">
                    <h4>$this</h4>
                    <p>Le mot-clé <span class="syntax-highlight">$this</span> fait référence à l'instance actuelle de la classe. Il permet d'accéder aux propriétés et méthodes de l'objet depuis l'intérieur de la classe.</p>
                </div>
                
                <div class="code-block">
&lt;?php
class CompteBancaire {
    public $titulaire;
    public $solde;
    public $devise;
    
    public function deposer($montant) {
        if ($montant > 0) {
            $this->solde += $montant;
            return "Dépôt de $montant {$this->devise}. Nouveau solde : {$this->solde} {$this->devise}";
        }
        return "Montant invalide";
    }
    
    public function retirer($montant) {
        if ($montant > 0 && $montant <= $this->solde) {
            $this->solde -= $montant;
            return "Retrait de $montant {$this->devise}. Nouveau solde : {$this->solde} {$this->devise}";
        }
        return "Retrait impossible";
    }
    
    public function consulterSolde() {
        return "Solde de {$this->titulaire} : {$this->solde} {$this->devise}";
    }
    
    public function transferer($montant, $compteDestinataire) {
        if ($this->retirer($montant) !== "Retrait impossible") {
            $compteDestinataire->deposer($montant);
            return "Transfert de $montant {$this->devise} effectué";
        }
        return "Transfert impossible";
    }
}

// Création de comptes
$compte1 = new CompteBancaire();
$compte1->titulaire = "Jean Dupont";
$compte1->solde = 1000;
$compte1->devise = "€";

$compte2 = new CompteBancaire();
$compte2->titulaire = "Marie Martin";
$compte2->solde = 500;
$compte2->devise = "€";

// Opérations bancaires
echo $compte1->consulterSolde() . "&lt;br&gt;";
echo $compte1->deposer(200) . "&lt;br&gt;";
echo $compte1->retirer(150) . "&lt;br&gt;";
echo $compte1->consulterSolde() . "&lt;br&gt;&lt;br&gt;";

echo $compte2->consulterSolde() . "&lt;br&gt;";
echo $compte1->transferer(300, $compte2) . "&lt;br&gt;";
echo $compte1->consulterSolde() . "&lt;br&gt;";
echo $compte2->consulterSolde() . "&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Propriétés et méthodes</h3>
                
                <h4>Types de propriétés</h4>
                <div class="code-block">
&lt;?php
class Produit {
    // Propriétés avec valeurs par défaut
    public $nom = "Produit sans nom";
    public $prix = 0.0;
    public $enStock = true;
    public $categories = [];
    
    // Propriété calculée (via méthode)
    public function getPrixTTC($tauxTVA = 0.20) {
        return $this->prix * (1 + $tauxTVA);
    }
    
    public function ajouterCategorie($categorie) {
        if (!in_array($categorie, $this->categories)) {
            $this->categories[] = $categorie;
        }
    }
    
    public function estDisponible() {
        return $this->enStock && $this->prix > 0;
    }
    
    public function afficherInfos() {
        $statut = $this->estDisponible() ? "Disponible" : "Indisponible";
        $categories = empty($this->categories) ? "Aucune" : implode(", ", $this->categories);
        
        return "Produit : {$this->nom}&lt;br&gt;" .
               "Prix HT : {$this->prix} €&lt;br&gt;" .
               "Prix TTC : " . round($this->getPrixTTC(), 2) . " €&lt;br&gt;" .
               "Statut : $statut&lt;br&gt;" .
               "Catégories : $categories&lt;br&gt;";
    }
}

// Utilisation
$produit = new Produit();
$produit->nom = "Ordinateur portable";
$produit->prix = 899.99;
$produit->ajouterCategorie("Informatique");
$produit->ajouterCategorie("Bureautique");

echo $produit->afficherInfos();

// Autre produit
$produit2 = new Produit();
$produit2->nom = "Livre PHP";
$produit2->prix = 29.99;
$produit2->enStock = false;
$produit2->ajouterCategorie("Livres");
$produit2->ajouterCategorie("Programmation");

echo "&lt;br&gt;" . $produit2->afficherInfos();
?&gt;
                </div>
                
                <h3>Méthodes statiques et propriétés statiques</h3>
                <div class="definition">
                    <h4>Membres statiques</h4>
                    <p>Les propriétés et méthodes <span class="syntax-highlight">static</span> appartiennent à la classe elle-même plutôt qu'à une instance particulière. Elles sont partagées par toutes les instances de la classe.</p>
                </div>
                
                <div class="code-block">
&lt;?php
class Compteur {
    // Propriété statique
    private static $nombreInstances = 0;
    public static $version = "1.0";
    
    // Propriété d'instance
    private $id;
    
    public function __construct() {
        self::$nombreInstances++;
        $this->id = self::$nombreInstances;
    }
    
    // Méthode statique
    public static function getNombreInstances() {
        return self::$nombreInstances;
    }
    
    public static function resetCompteur() {
        self::$nombreInstances = 0;
    }
    
    // Méthode d'instance
    public function getId() {
        return $this->id;
    }
    
    public function afficherInfo() {
        return "Instance #{$this->id} - Total instances : " . self::$nombreInstances;
    }
}

// Utilisation des membres statiques (sans créer d'objet)
echo "Version : " . Compteur::$version . "&lt;br&gt;";
echo "Instances créées : " . Compteur::getNombreInstances() . "&lt;br&gt;&lt;br&gt;";

// Création d'objets
$obj1 = new Compteur();
echo $obj1->afficherInfo() . "&lt;br&gt;";

$obj2 = new Compteur();
echo $obj2->afficherInfo() . "&lt;br&gt;";

$obj3 = new Compteur();
echo $obj3->afficherInfo() . "&lt;br&gt;";

echo "&lt;br&gt;Total final : " . Compteur::getNombreInstances() . "&lt;br&gt;";

// Reset du compteur
Compteur::resetCompteur();
echo "Après reset : " . Compteur::getNombreInstances() . "&lt;br&gt;";
?&gt;
                </div>
                
                <div class="tip">
                    Utilisez <span class="syntax-highlight">self::</span> pour accéder aux membres statiques depuis l'intérieur de la classe, et <span class="syntax-highlight">NomClasse::</span> depuis l'extérieur.
                </div>
            </div>

            <div class="chapter">
                <h2>3. Constructeurs et Destructeurs</h2>
                
                <div class="definition">
                    <h4>Constructeur et Destructeur</h4>
                    <p>Le <strong>constructeur</strong> (<span class="syntax-highlight">__construct</span>) est une méthode spéciale appelée automatiquement lors de la création d'un objet. Le <strong>destructeur</strong> (<span class="syntax-highlight">__destruct</span>) est appelé quand l'objet est détruit.</p>
                </div>
                
                <h3>Constructeur simple</h3>
                <div class="code-block">
&lt;?php
class Personne {
    private $nom;
    private $prenom;
    private $age;
    private $dateCreation;
    
    // Constructeur
    public function __construct($nom, $prenom, $age) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        $this->dateCreation = date('Y-m-d H:i:s');
        
        echo "Nouvelle personne créée : {$this->prenom} {$this->nom}&lt;br&gt;";
    }
    
    // Destructeur
    public function __destruct() {
        echo "Objet {$this->prenom} {$this->nom} détruit&lt;br&gt;";
    }
    
    public function sePresenter() {
        return "Je suis {$this->prenom} {$this->nom}, j'ai {$this->age} ans.";
    }
    
    public function getAge() {
        return $this->age;
    }
    
    public function vieillir() {
        $this->age++;
        return "Joyeux anniversaire ! Nouvel âge : {$this->age} ans";
    }
}

// Création d'objets avec constructeur
$personne1 = new Personne("Dupont", "Jean", 30);
echo $personne1->sePresenter() . "&lt;br&gt;";
echo $personne1->vieillir() . "&lt;br&gt;&lt;br&gt;";

$personne2 = new Personne("Martin", "Marie", 25);
echo $personne2->sePresenter() . "&lt;br&gt;&lt;br&gt;";

// Les destructeurs seront appelés automatiquement à la fin du script
?&gt;
                </div>
                
                <h3>Constructeur avec paramètres optionnels</h3>
                <div class="code-block">
&lt;?php
class Rectangle {
    private $longueur;
    private $largeur;
    private $couleur;
    private $unite;
    
    public function __construct($longueur, $largeur, $couleur = "blanc", $unite = "cm") {
        $this->longueur = $longueur;
        $this->largeur = $largeur;
        $this->couleur = $couleur;
        $this->unite = $unite;
        
        echo "Rectangle créé : {$longueur}x{$largeur} {$unite}, couleur {$couleur}&lt;br&gt;";
    }
    
    public function calculerAire() {
        return $this->longueur * $this->largeur;
    }
    
    public function calculerPerimetre() {
        return 2 * ($this->longueur + $this->largeur);
    }
    
    public function afficherInfos() {
        $aire = $this->calculerAire();
        $perimetre = $this->calculerPerimetre();
        
        return "Rectangle {$this->couleur} : {$this->longueur}x{$this->largeur} {$this->unite}&lt;br&gt;" .
               "Aire : {$aire} {$this->unite}²&lt;br&gt;" .
               "Périmètre : {$perimetre} {$this->unite}&lt;br&gt;";
    }
    
    public function redimensionner($nouvelleLongueur, $nouvelleLargeur) {
        $this->longueur = $nouvelleLongueur;
        $this->largeur = $nouvelleLargeur;
        return "Rectangle redimensionné : {$nouvelleLongueur}x{$nouvelleLargeur} {$this->unite}";
    }
}

// Différentes façons de créer des rectangles
$rect1 = new Rectangle(10, 5);
echo $rect1->afficherInfos() . "&lt;br&gt;";

$rect2 = new Rectangle(8, 6, "rouge");
echo $rect2->afficherInfos() . "&lt;br&gt;";

$rect3 = new Rectangle(15, 12, "bleu", "m");
echo $rect3->afficherInfos() . "&lt;br&gt;";

echo $rect1->redimensionner(12, 8) . "&lt;br&gt;";
echo $rect1->afficherInfos();
?&gt;
                </div>
                
                <h3>Validation dans le constructeur</h3>
                <div class="code-block">
&lt;?php
class CompteBancaireSecurise {
    private $numero;
    private $titulaire;
    private $solde;
    private $dateOuverture;
    
    public function __construct($numero, $titulaire, $soldeInitial = 0) {
        // Validation du numéro de compte
        if (empty($numero) || strlen($numero) < 8) {
            throw new Exception("Numéro de compte invalide (minimum 8 caractères)");
        }
        
        // Validation du titulaire
        if (empty($titulaire) || strlen($titulaire) < 2) {
            throw new Exception("Nom du titulaire invalide");
        }
        
        // Validation du solde initial
        if ($soldeInitial < 0) {
            throw new Exception("Le solde initial ne peut pas être négatif");
        }
        
        $this->numero = $numero;
        $this->titulaire = $titulaire;
        $this->solde = $soldeInitial;
        $this->dateOuverture = date('Y-m-d H:i:s');
        
        echo "Compte {$this->numero} ouvert pour {$this->titulaire} avec {$soldeInitial}€&lt;br&gt;";
    }
    
    public function __destruct() {
        echo "Fermeture du compte {$this->numero}&lt;br&gt;";
    }
    
    public function getInfos() {
        return "Compte {$this->numero} - {$this->titulaire} - Solde : {$this->solde}€";
    }
    
    public function deposer($montant) {
        if ($montant <= 0) {
            throw new Exception("Le montant doit être positif");
        }
        
        $this->solde += $montant;
        return "Dépôt de {$montant}€ effectué. Nouveau solde : {$this->solde}€";
    }
}

// Tests avec validation
try {
    $compte1 = new CompteBancaireSecurise("12345678", "Jean Dupont", 1000);
    echo $compte1->getInfos() . "&lt;br&gt;";
    echo $compte1->deposer(500) . "&lt;br&gt;&lt;br&gt;";
    
    // Test avec données invalides
    $compte2 = new CompteBancaireSecurise("123", "A", -100);
    
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "&lt;br&gt;&lt;br&gt;";
}

try {
    $compte3 = new CompteBancaireSecurise("87654321", "Marie Martin", 500);
    echo $compte3->getInfos() . "&lt;br&gt;";
    
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "&lt;br&gt;";
}
?&gt;
                </div>
                
                <h3>Constructeur avec initialisation complexe</h3>
                <div class="code-block">
&lt;?php
class Bibliotheque {
    private $nom;
    private $livres;
    private $membres;
    private $dateCreation;
    private $capaciteMax;
    
    public function __construct($nom, $capaciteMax = 1000) {
        $this->nom = $nom;
        $this->capaciteMax = $capaciteMax;
        $this->livres = [];
        $this->membres = [];
        $this->dateCreation = date('Y-m-d H:i:s');
        
        // Initialisation avec quelques livres par défaut
        $this->initialiserLivresParDefaut();
        
        echo "Bibliothèque '{$this->nom}' créée avec {$this->capaciteMax} places&lt;br&gt;";
        echo "Initialisée avec " . count($this->livres) . " livres&lt;br&gt;";
    }
    
    private function initialiserLivresParDefaut() {
        $livresParDefaut = [
            ["titre" => "Le Petit Prince", "auteur" => "Antoine de Saint-Exupéry"],
            ["titre" => "1984", "auteur" => "George Orwell"],
            ["titre" => "L'Étranger", "auteur" => "Albert Camus"]
        ];
        
        foreach ($livresParDefaut as $livre) {
            $this->livres[] = $livre;
        }
    }
    
    public function ajouterLivre($titre, $auteur) {
        if (count($this->livres) >= $this->capaciteMax) {
            return "Capacité maximale atteinte";
        }
        
        $this->livres[] = ["titre" => $titre, "auteur" => $auteur];
        return "Livre '$titre' ajouté à la bibliothèque";
    }
    
    public function ajouterMembre($nom, $email) {
        $this->membres[] = [
            "nom" => $nom,
            "email" => $email,
            "date_inscription" => date('Y-m-d H:i:s')
        ];
        return "Membre '$nom' inscrit";
    }
    
    public function getStatistiques() {
        return "Bibliothèque '{$this->nom}' :&lt;br&gt;" .
               "- Livres : " . count($this->livres) . "/{$this->capaciteMax}&lt;br&gt;" .
               "- Membres : " . count($this->membres) . "&lt;br&gt;" .
               "- Créée le : {$this->dateCreation}&lt;br&gt;";
    }
    
    public function listerLivres() {
        $liste = "Livres disponibles :&lt;br&gt;";
        foreach ($this->livres as $index => $livre) {
            $liste .= ($index + 1) . ". {$livre['titre']} par {$livre['auteur']}&lt;br&gt;";
        }
        return $liste;
    }
}

// Création et utilisation
$biblio = new Bibliotheque("Bibliothèque Municipale", 500);
echo $biblio->getStatistiques() . "&lt;br&gt;";

echo $biblio->ajouterLivre("Le Seigneur des Anneaux", "J.R.R. Tolkien") . "&lt;br&gt;";
echo $biblio->ajouterMembre("Jean Dupont", "jean@example.com") . "&lt;br&gt;";
echo $biblio->ajouterMembre("Marie Martin", "marie@example.com") . "&lt;br&gt;&lt;br&gt;";

echo $biblio->getStatistiques() . "&lt;br&gt;";
echo $biblio->listerLivres();
?&gt;
                </div>
            </div>

            <div class="chapter">
                <h2>4. Visibilité des Propriétés et Méthodes</h2>
                
                <div class="definition">
                    <h4>Visibilité (Encapsulation)</h4>
                    <p>La visibilité contrôle l'accès aux propriétés et méthodes d'une classe. PHP propose trois niveaux : <span class="syntax-highlight">public</span>, <span class="syntax-highlight">private</span>, et <span class="syntax-highlight">protected</span>.</p>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>Visibilité</th>
                            <th>Accès depuis la classe</th>
                            <th>Accès depuis l'extérieur</th>
                            <th>Accès depuis les sous-classes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>public</strong></td>
                            <td>✅ Oui</td>
                            <td>✅ Oui</td>
                            <td>✅ Oui</td>
                        </tr>
                        <tr>
                            <td><strong>private</strong></td>
                            <td>✅ Oui</td>
                            <td>❌ Non</td>
                            <td>❌ Non</td>
                        </tr>
                        <tr>
                            <td><strong>protected</strong></td>
                            <td>✅ Oui</td>
                            <td>❌ Non</td>
                            <td>✅ Oui</td>
                        </tr>
                    </tbody>
                </table>
                
                <h3>Exemple complet de visibilité</h3>
                <div class="code-block">
&lt;?php
class UtilisateurComplet {
    // Propriétés publiques (accessibles partout)
    public $nom;
    public $dateInscription;
    
    // Propriétés privées (accessibles seulement dans cette classe)
    private $motDePasse;
    private $email;
    private $soldeCompte;
    
    // Propriétés protégées (accessibles dans cette classe et ses sous-classes)
    protected $niveauAcces;
    protected $derniereConnexion;
    
    public function __construct($nom, $email, $motDePasse) {
        $this->nom = $nom;
        $this->email = $email;
        $this->setMotDePasse($motDePasse);
        $this->soldeCompte = 0;
        $this->niveauAcces = "utilisateur";
        $this->dateInscription = date('Y-m-d H:i:s');
        $this->derniereConnexion = null;
    }
    
    // Méthodes publiques (interface publique de la classe)
    public function seConnecter($motDePasse) {
        if ($this->verifierMotDePasse($motDePasse)) {
            $this->derniereConnexion = date('Y-m-d H:i:s');
            return "Connexion réussie pour {$this->nom}";
        }
        return "Mot de passe incorrect";
    }
    
    public function changerMotDePasse($ancienMdp, $nouveauMdp) {
        if ($this->verifierMotDePasse($ancienMdp)) {
            $this->setMotDePasse($nouveauMdp);
            return "Mot de passe changé avec succès";
        }
        return "Ancien mot de passe incorrect";
    }
    
    public function consulterSolde() {
        return "Solde : {$this->soldeCompte}€";
    }
    
    public function crediterCompte($montant) {
        if ($montant > 0) {
            $this->soldeCompte += $montant;
            return "Compte crédité de {$montant}€";
        }
        return "Montant invalide";
    }
    
    // Méthodes privées (logique interne)
    private function verifierMotDePasse($motDePasse) {
        return password_verify($motDePasse, $this->motDePasse);
    }
    
    private function setMotDePasse($motDePasse) {
        if (strlen($motDePasse) < 6) {
            throw new Exception("Mot de passe trop court (minimum 6 caractères)");
        }
        $this->motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);
    }
    
    private function validerEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    // Méthodes protégées (pour les sous-classes)
    protected function changerNiveauAcces($niveau) {
        $niveauxValides = ["utilisateur", "moderateur", "admin"];
        if (in_array($niveau, $niveauxValides)) {
            $this->niveauAcces = $niveau;
            return true;
        }
        return false;
    }
    
    protected function obtenirInfosInternes() {
        return [
            'email' => $this->email,
            'niveau' => $this->niveauAcces,
            'derniere_connexion' => $this->derniereConnexion,
            'solde' => $this->soldeCompte
        ];
    }
    
    // Getters publics pour accéder aux données privées
    public function getEmail() {
        return $this->email;
    }
    
    public function getNiveauAcces() {
        return $this->niveauAcces;
    }
    
    public function getDerniereConnexion() {
        return $this->derniereConnexion ?? "Jamais connecté";
    }
}

// Utilisation de la classe
try {
    $user = new UtilisateurComplet("Jean Dupont", "jean@example.com", "motdepasse123");
    
    // Accès aux propriétés publiques
    echo "Nom : " . $user->nom . "&lt;br&gt;";
    echo "Date inscription : " . $user->dateInscription . "&lt;br&gt;";
    
    // Utilisation des méthodes publiques
    echo $user->seConnecter("motdepasse123") . "&lt;br&gt;";
    echo "Dernière connexion : " . $user->getDerniereConnexion() . "&lt;br&gt;";
    echo $user->crediterCompte(100) . "&lt;br&gt;";
    echo $user->consulterSolde() . "&lt;br&gt;";
    echo $user->changerMotDePasse("motdepasse123", "nouveaumotdepasse") . "&lt;br&gt;";
    
    // Accès via getters
    echo "Email : " . $user->getEmail() . "&lt;br&gt;";
    echo "Niveau : " . $user->getNiveauAcces() . "&lt;br&gt;";
    
    // Ces lignes provoqueraient des erreurs :
    // echo $user->motDePasse;        // Erreur : propriété privée
    // echo $user->niveauAcces;       // Erreur : propriété protégée
    // $user->setMotDePasse("test");  // Erreur : méthode privée
    
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "&lt;br&gt;";
}
?&gt;
                </div>
                
                <h3>Getters et Setters</h3>
                <div class="concept-box">
                    <h4>Getters et Setters</h4>
                    <p>Les <strong>getters</strong> permettent de lire les propriétés privées, les <strong>setters</strong> permettent de les modifier avec validation. C'est une pratique courante pour contrôler l'accès aux données.</p>
                </div>
                
                <div class="code-block">
&lt;?php
class Produit {
    private $nom;
    private $prix;
    private $stock;
    private $tva;
    
    public function __construct($nom, $prix, $stock = 0) {
        $this->setNom($nom);
        $this->setPrix($prix);
        $this->setStock($stock);
        $this->tva = 0.20; // 20% par défaut
    }
    
    // Getters
    public function getNom() {
        return $this->nom;
    }
    
    public function getPrix() {
        return $this->prix;
    }
    
    public function getPrixTTC() {
        return $this->prix * (1 + $this->tva);
    }
    
    public function getStock() {
        return $this->stock;
    }
    
    public function getTva() {
        return $this->tva;
    }
    
    // Setters avec validation
    public function setNom($nom) {
        if (empty($nom) || strlen($nom) < 2) {
            throw new Exception("Nom de produit invalide");
        }
        $this->nom = $nom;
    }
    
    public function setPrix($prix) {
        if ($prix < 0) {
            throw new Exception("Le prix ne peut pas être négatif");
        }
        $this->prix = $prix;
    }
    
    public function setStock($stock) {
        if ($stock < 0) {
            throw new Exception("Le stock ne peut pas être négatif");
        }
        $this->stock = $stock;
    }
    
    public function setTva($tva) {
        if ($tva < 0 || $tva > 1) {
            throw new Exception("TVA doit être entre 0 et 1");
        }
        $this->tva = $tva;
    }
    
    // Méthodes métier
    public function ajouterStock($quantite) {
        if ($quantite <= 0) {
            throw new Exception("Quantité doit être positive");
        }
        $this->stock += $quantite;
        return "Stock ajouté : +{$quantite}. Nouveau stock : {$this->stock}";
    }
    
    public function vendreStock($quantite) {
        if ($quantite <= 0) {
            throw new Exception("Quantité doit être positive");
        }
        if ($quantite > $this->stock) {
            throw new Exception("Stock insuffisant");
        }
        $this->stock -= $quantite;
        return "Vente effectuée : -{$quantite}. Stock restant : {$this->stock}";
    }
    
    public function estDisponible() {
        return $this->stock > 0;
    }
    
    public function afficherInfos() {
        $statut = $this->estDisponible() ? "En stock" : "Rupture";
        return "Produit : {$this->nom}&lt;br&gt;" .
               "Prix HT : {$this->prix}€&lt;br&gt;" .
               "Prix TTC : " . round($this->getPrixTTC(), 2) . "€&lt;br&gt;" .
               "Stock : {$this->stock} ({$statut})&lt;br&gt;" .
               "TVA : " . ($this->tva * 100) . "%&lt;br&gt;";
    }
}

// Utilisation avec getters/setters
try {
    $produit = new Produit("Smartphone", 299.99, 50);
    echo $produit->afficherInfos() . "&lt;br&gt;";
    
    // Modification via setters
    $produit->setPrix(279.99);
    $produit->setTva(0.10); // TVA réduite
    echo "Après modification :&lt;br&gt;";
    echo $produit->afficherInfos() . "&lt;br&gt;";
    
    // Gestion du stock
    echo $produit->ajouterStock(25) . "&lt;br&gt;";
    echo $produit->vendreStock(30) . "&lt;br&gt;";
    echo $produit->afficherInfos() . "&lt;br&gt;";
    
    // Test avec valeurs invalides
    $produit->setPrix(-10); // Provoquera une exception
    
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "&lt;br&gt;";
}
?&gt;
                </div>
                
                <div class="important">
                    L'encapsulation est un principe fondamental de la POO. Elle permet de protéger les données et de contrôler leur accès, garantissant ainsi l'intégrité de l'objet.
                </div>
            </div>
        </div>

        <div class="navigation">
            <a href="partie2-procedurale.php" class="nav-link">← Partie 2: Programmation Procédurale</a>
            <span>Partie 3/8</span>
            <a href="partie4-poo-avancee.php" class="nav-link">Partie 4: POO Avancée →</a>
        </div>
    </div>

    <script>
        // Animation des blocs de code
        document.addEventListener('DOMContentLoaded', function() {
            const codeBlocks = document.querySelectorAll('.code-block');
            
            codeBlocks.forEach(block => {
                block.addEventListener('click', function() {
                    // Sélectionner le texte du bloc de code
                    const range = document.createRange();
                    range.selectNodeContents(this);
                    const selection = window.getSelection();
                    selection.removeAllRanges();
                    selection.addRange(range);
                });
            });
            
            // Animation au scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.chapter').forEach(chapter => {
                chapter.style.opacity = '0';
                chapter.style.transform = 'translateY(30px)';
                chapter.style.transition = 'all 0.6s ease';
                observer.observe(chapter);
            });
        });
    </script>
</body>
</html>