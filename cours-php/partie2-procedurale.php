<?php
/**
 * COURS PHP COMPLET - PARTIE 2: PROGRAMMATION PROCÉDURALE
 * ========================================================
 * 
 * Cette partie couvre la programmation procédurale en PHP :
 * - Fonctions définies par l'utilisateur
 * - Tableaux et manipulation
 * - Chaînes de caractères
 * - Gestion des fichiers
 * - Formulaires et validation
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partie 2: Programmation Procédurale</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>⚙️ Partie 2: Programmation Procédurale</h1>
            <p>Maîtrisez les fonctions, tableaux et manipulation de données</p>
        </div>

        <div class="content">
            <div class="chapter">
                <h2>1. Introduction à la Programmation Procédurale</h2>
                
                <div class="definition">
                    <h4>Programmation Procédurale</h4>
                    <p>La programmation procédurale est un paradigme de programmation qui organise le code en <strong>procédures</strong> (fonctions) qui opèrent sur des données. C'est une approche structurée qui divise les problèmes complexes en sous-problèmes plus simples.</p>
                </div>
                
                <h3>Caractéristiques de la programmation procédurale</h3>
                <ul>
                    <li><strong>Décomposition fonctionnelle</strong> : Le programme est divisé en fonctions</li>
                    <li><strong>Données et fonctions séparées</strong> : Les données sont passées aux fonctions</li>
                    <li><strong>Exécution séquentielle</strong> : Le code s'exécute de haut en bas</li>
                    <li><strong>Réutilisabilité</strong> : Les fonctions peuvent être réutilisées</li>
                    <li><strong>Modularité</strong> : Code organisé en modules logiques</li>
                </ul>
                
                <h3>Avantages de la programmation procédurale</h3>
                <ul>
                    <li>Simplicité d'apprentissage et de compréhension</li>
                    <li>Code plus organisé et maintenable</li>
                    <li>Réutilisation du code grâce aux fonctions</li>
                    <li>Débogage plus facile</li>
                    <li>Convient bien aux problèmes linéaires</li>
                </ul>
                
                <div class="code-block">
&lt;?php
// Exemple simple de programmation procédurale

// Fonction pour calculer l'aire d'un rectangle
function calculerAireRectangle($longueur, $largeur) {
    return $longueur * $largeur;
}

// Fonction pour calculer l'aire d'un cercle
function calculerAireCercle($rayon) {
    return pi() * $rayon * $rayon;
}

// Fonction pour afficher un résultat formaté
function afficherResultat($forme, $aire) {
    echo "L'aire du $forme est : " . round($aire, 2) . " unités carrées&lt;br&gt;";
}

// Utilisation des fonctions
$longueur = 10;
$largeur = 5;
$rayon = 3;

$aireRectangle = calculerAireRectangle($longueur, $largeur);
$aireCercle = calculerAireCercle($rayon);

afficherResultat("rectangle", $aireRectangle);
afficherResultat("cercle", $aireCercle);
?&gt;
                </div>
                
                <div class="output">
L'aire du rectangle est : 50 unités carrées<br>
L'aire du cercle est : 28.27 unités carrées
                </div>
            </div>

            <div class="chapter">
                <h2>2. Fonctions Définies par l'Utilisateur</h2>
                
                <div class="definition">
                    <h4>Fonctions</h4>
                    <p>Une fonction est un bloc de code réutilisable qui effectue une tâche spécifique. Elle peut recevoir des paramètres en entrée et retourner une valeur en sortie.</p>
                </div>
                
                <h3>Syntaxe de base d'une fonction</h3>
                <div class="code-block">
&lt;?php
// Syntaxe générale d'une fonction
function nomDeLaFonction($parametre1, $parametre2) {
    // Corps de la fonction
    $resultat = $parametre1 + $parametre2;
    return $resultat;
}

// Appel de la fonction
$somme = nomDeLaFonction(5, 3);
echo "Résultat : $somme&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Fonctions sans paramètres</h3>
                <div class="code-block">
&lt;?php
// Fonction sans paramètres
function direBonjour() {
    return "Bonjour tout le monde !";
}

function obtenirDateActuelle() {
    return date("d/m/Y H:i:s");
}

function genererNombreAleatoire() {
    return rand(1, 100);
}

// Utilisation
echo direBonjour() . "&lt;br&gt;";
echo "Date actuelle : " . obtenirDateActuelle() . "&lt;br&gt;";
echo "Nombre aléatoire : " . genererNombreAleatoire() . "&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Fonctions avec paramètres</h3>
                <div class="code-block">
&lt;?php
// Fonction avec un paramètre
function saluer($nom) {
    return "Bonjour $nom !";
}

// Fonction avec plusieurs paramètres
function calculerMoyenne($note1, $note2, $note3) {
    return ($note1 + $note2 + $note3) / 3;
}

// Fonction avec paramètres de types différents
function creerProfil($nom, $age, $estActif = true) {
    $statut = $estActif ? "actif" : "inactif";
    return "Profil : $nom, $age ans, statut $statut";
}

// Utilisation
echo saluer("Jean") . "&lt;br&gt;";
echo "Moyenne : " . calculerMoyenne(15, 12, 18) . "&lt;br&gt;";
echo creerProfil("Marie", 25) . "&lt;br&gt;";
echo creerProfil("Paul", 30, false) . "&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Paramètres par défaut</h3>
                <div class="code-block">
&lt;?php
// Fonction avec paramètres par défaut
function calculerPrix($prixHT, $tva = 0.20, $remise = 0) {
    $prixAvecTVA = $prixHT * (1 + $tva);
    $prixFinal = $prixAvecTVA * (1 - $remise);
    return round($prixFinal, 2);
}

// Fonction de salutation avec titre par défaut
function saluerAvecTitre($nom, $titre = "M./Mme") {
    return "Bonjour $titre $nom";
}

// Utilisation avec différents nombres de paramètres
echo "Prix 1 : " . calculerPrix(100) . " €&lt;br&gt;";
echo "Prix 2 : " . calculerPrix(100, 0.10) . " €&lt;br&gt;";
echo "Prix 3 : " . calculerPrix(100, 0.20, 0.15) . " €&lt;br&gt;";

echo saluerAvecTitre("Dupont") . "&lt;br&gt;";
echo saluerAvecTitre("Martin", "Dr") . "&lt;br&gt;";
?&gt;
                </div>
                
                <div class="tip">
                    Les paramètres avec valeurs par défaut doivent toujours être placés après les paramètres obligatoires.
                </div>
                
                <h3>Fonctions avec nombre variable de paramètres</h3>
                <div class="code-block">
&lt;?php
// Fonction avec nombre variable de paramètres (PHP 5.6+)
function calculerSomme(...$nombres) {
    $total = 0;
    foreach ($nombres as $nombre) {
        $total += $nombre;
    }
    return $total;
}

// Fonction pour créer une liste HTML
function creerListeHTML(...$elements) {
    $html = "&lt;ul&gt;";
    foreach ($elements as $element) {
        $html .= "&lt;li&gt;$element&lt;/li&gt;";
    }
    $html .= "&lt;/ul&gt;";
    return $html;
}

// Utilisation
echo "Somme(1, 2, 3) = " . calculerSomme(1, 2, 3) . "&lt;br&gt;";
echo "Somme(1, 2, 3, 4, 5) = " . calculerSomme(1, 2, 3, 4, 5) . "&lt;br&gt;";

echo creerListeHTML("Pomme", "Banane", "Orange");
?&gt;
                </div>
                
                <h3>Passage par référence</h3>
                <div class="definition">
                    <h4>Passage par référence</h4>
                    <p>Par défaut, PHP passe les paramètres par valeur (copie). Le passage par référence permet de modifier directement la variable originale en utilisant le symbole <span class="syntax-highlight">&</span>.</p>
                </div>
                
                <div class="code-block">
&lt;?php
// Passage par valeur (défaut)
function incrementerParValeur($nombre) {
    $nombre++;
    echo "Dans la fonction : $nombre&lt;br&gt;";
}

// Passage par référence
function incrementerParReference(&$nombre) {
    $nombre++;
    echo "Dans la fonction : $nombre&lt;br&gt;";
}

// Fonction pour échanger deux variables
function echanger(&$a, &$b) {
    $temp = $a;
    $a = $b;
    $b = $temp;
}

// Tests
$valeur1 = 5;
$valeur2 = 5;

echo "Valeur initiale : $valeur1&lt;br&gt;";
incrementerParValeur($valeur1);
echo "Après passage par valeur : $valeur1&lt;br&gt;&lt;br&gt;";

echo "Valeur initiale : $valeur2&lt;br&gt;";
incrementerParReference($valeur2);
echo "Après passage par référence : $valeur2&lt;br&gt;&lt;br&gt;";

// Test d'échange
$x = 10;
$y = 20;
echo "Avant échange : x=$x, y=$y&lt;br&gt;";
echanger($x, $y);
echo "Après échange : x=$x, y=$y&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Fonctions récursives</h3>
                <div class="definition">
                    <h4>Récursivité</h4>
                    <p>Une fonction récursive est une fonction qui s'appelle elle-même. Elle doit avoir une condition d'arrêt pour éviter une boucle infinie.</p>
                </div>
                
                <div class="code-block">
&lt;?php
// Calcul de factorielle (n!)
function factorielle($n) {
    // Condition d'arrêt
    if ($n <= 1) {
        return 1;
    }
    // Appel récursif
    return $n * factorielle($n - 1);
}

// Suite de Fibonacci
function fibonacci($n) {
    if ($n <= 1) {
        return $n;
    }
    return fibonacci($n - 1) + fibonacci($n - 2);
}

// Calcul de puissance
function puissance($base, $exposant) {
    if ($exposant == 0) {
        return 1;
    }
    if ($exposant == 1) {
        return $base;
    }
    return $base * puissance($base, $exposant - 1);
}

// Tests
echo "Factorielle de 5 : " . factorielle(5) . "&lt;br&gt;";
echo "Factorielle de 7 : " . factorielle(7) . "&lt;br&gt;";

echo "Fibonacci(8) : " . fibonacci(8) . "&lt;br&gt;";

echo "2^5 : " . puissance(2, 5) . "&lt;br&gt;";
echo "3^4 : " . puissance(3, 4) . "&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Portée des variables (Scope)</h3>
                <div class="definition">
                    <h4>Portée des variables</h4>
                    <p>La portée détermine où une variable peut être utilisée dans le code. PHP a plusieurs niveaux de portée : globale, locale, et statique.</p>
                </div>
                
                <div class="code-block">
&lt;?php
// Variable globale
$variableGlobale = "Je suis globale";

function testerPortee() {
    // Variable locale
    $variableLocale = "Je suis locale";
    
    // Pour accéder à une variable globale dans une fonction
    global $variableGlobale;
    
    echo "Dans la fonction - Globale : $variableGlobale&lt;br&gt;";
    echo "Dans la fonction - Locale : $variableLocale&lt;br&gt;";
}

// Variable statique
function compteur() {
    static $compte = 0;  // Conserve sa valeur entre les appels
    $compte++;
    return $compte;
}

// Tests
testerPortee();
echo "Hors fonction - Globale : $variableGlobale&lt;br&gt;";
// echo $variableLocale; // Erreur ! Variable non définie

echo "Premier appel compteur : " . compteur() . "&lt;br&gt;";
echo "Deuxième appel compteur : " . compteur() . "&lt;br&gt;";
echo "Troisième appel compteur : " . compteur() . "&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Fonctions anonymes et closures</h3>
                <div class="code-block">
&lt;?php
// Fonction anonyme simple
$saluer = function($nom) {
    return "Bonjour $nom !";
};

echo $saluer("Jean") . "&lt;br&gt;";

// Closure avec use
$multiplicateur = 10;
$multiplier = function($nombre) use ($multiplicateur) {
    return $nombre * $multiplicateur;
};

echo "5 × $multiplicateur = " . $multiplier(5) . "&lt;br&gt;";

// Fonction anonyme comme paramètre
function appliquerOperation($a, $b, $operation) {
    return $operation($a, $b);
}

$addition = function($x, $y) { return $x + $y; };
$multiplication = function($x, $y) { return $x * $y; };

echo "Addition : " . appliquerOperation(5, 3, $addition) . "&lt;br&gt;";
echo "Multiplication : " . appliquerOperation(5, 3, $multiplication) . "&lt;br&gt;";
?&gt;
                </div>
            </div>

            <div class="chapter">
                <h2>3. Tableaux et Manipulation</h2>
                
                <div class="definition">
                    <h4>Tableaux en PHP</h4>
                    <p>Un tableau est une structure de données qui peut stocker plusieurs valeurs sous un seul nom. PHP propose des tableaux indexés (avec des indices numériques) et des tableaux associatifs (avec des clés nommées).</p>
                </div>
                
                <h3>Création de tableaux</h3>
                <div class="code-block">
&lt;?php
// Tableaux indexés
$fruits = array("pomme", "banane", "orange");
$legumes = ["carotte", "brocoli", "épinard"]; // Syntaxe courte (PHP 5.4+)

// Tableau avec indices spécifiques
$nombres = [0 => 10, 1 => 20, 2 => 30];

// Tableaux associatifs
$personne = array(
    "nom" => "Dupont",
    "prenom" => "Jean",
    "age" => 30
);

$voiture = [
    "marque" => "Toyota",
    "modele" => "Corolla",
    "annee" => 2020,
    "couleur" => "rouge"
];

// Affichage
echo "Premier fruit : " . $fruits[0] . "&lt;br&gt;";
echo "Nom : " . $personne["nom"] . "&lt;br&gt;";
echo "Marque voiture : " . $voiture["marque"] . "&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Accès et modification des éléments</h3>
                <div class="code-block">
&lt;?php
$couleurs = ["rouge", "vert", "bleu"];
$utilisateur = ["nom" => "Martin", "age" => 25];

// Lecture
echo "Première couleur : " . $couleurs[0] . "&lt;br&gt;";
echo "Age utilisateur : " . $utilisateur["age"] . "&lt;br&gt;";

// Modification
$couleurs[1] = "jaune";
$utilisateur["age"] = 26;

echo "Couleur modifiée : " . $couleurs[1] . "&lt;br&gt;";
echo "Nouvel âge : " . $utilisateur["age"] . "&lt;br&gt;";

// Ajout d'éléments
$couleurs[] = "violet";  // Ajoute à la fin
$couleurs[10] = "orange"; // Ajoute à l'index 10
$utilisateur["ville"] = "Paris"; // Nouvelle clé

echo "Nouvelle couleur : " . $couleurs[3] . "&lt;br&gt;";
echo "Ville : " . $utilisateur["ville"] . "&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Fonctions de manipulation de tableaux</h3>
                
                <h4>Ajout et suppression d'éléments</h4>
                <div class="code-block">
&lt;?php
$stack = ["a", "b", "c"];

// Ajout à la fin
array_push($stack, "d", "e");
echo "Après push : " . implode(", ", $stack) . "&lt;br&gt;";

// Suppression du dernier élément
$dernier = array_pop($stack);
echo "Élément supprimé : $dernier&lt;br&gt;";
echo "Après pop : " . implode(", ", $stack) . "&lt;br&gt;";

// Ajout au début
array_unshift($stack, "z", "y");
echo "Après unshift : " . implode(", ", $stack) . "&lt;br&gt;";

// Suppression du premier élément
$premier = array_shift($stack);
echo "Premier supprimé : $premier&lt;br&gt;";
echo "Après shift : " . implode(", ", $stack) . "&lt;br&gt;";

// Suppression par clé
unset($stack[1]);
echo "Après unset[1] : " . implode(", ", $stack) . "&lt;br&gt;";
?&gt;
                </div>
                
                <h4>Tri de tableaux</h4>
                <div class="code-block">
&lt;?php
// Tri de tableaux indexés
$nombres = [3, 1, 4, 1, 5, 9, 2, 6];
$fruits = ["banane", "pomme", "orange", "abricot"];

echo "Nombres originaux : " . implode(", ", $nombres) . "&lt;br&gt;";

// Tri croissant
sort($nombres);
echo "Tri croissant : " . implode(", ", $nombres) . "&lt;br&gt;";

// Tri décroissant
rsort($nombres);
echo "Tri décroissant : " . implode(", ", $nombres) . "&lt;br&gt;";

// Tri des fruits
sort($fruits);
echo "Fruits triés : " . implode(", ", $fruits) . "&lt;br&gt;";

// Tri de tableaux associatifs
$ages = ["Jean" => 30, "Marie" => 25, "Paul" => 35];
echo "&lt;br&gt;Ages originaux : ";
foreach ($ages as $nom => $age) {
    echo "$nom($age) ";
}

// Tri par valeurs
asort($ages);
echo "&lt;br&gt;Tri par âge : ";
foreach ($ages as $nom => $age) {
    echo "$nom($age) ";
}

// Tri par clés
ksort($ages);
echo "&lt;br&gt;Tri par nom : ";
foreach ($ages as $nom => $age) {
    echo "$nom($age) ";
}
echo "&lt;br&gt;";
?&gt;
                </div>
                
                <h4>Recherche dans les tableaux</h4>
                <div class="code-block">
&lt;?php
$couleurs = ["rouge", "vert", "bleu", "jaune", "rouge"];
$notes = ["Jean" => 15, "Marie" => 18, "Paul" => 12];

// Vérifier l'existence d'une valeur
if (in_array("bleu", $couleurs)) {
    echo "Bleu est dans le tableau&lt;br&gt;";
}

// Trouver la position d'une valeur
$position = array_search("vert", $couleurs);
echo "Position de 'vert' : $position&lt;br&gt;";

// Trouver toutes les positions d'une valeur
$positions = array_keys($couleurs, "rouge");
echo "Positions de 'rouge' : " . implode(", ", $positions) . "&lt;br&gt;";

// Vérifier l'existence d'une clé
if (array_key_exists("Marie", $notes)) {
    echo "Marie a une note : " . $notes["Marie"] . "&lt;br&gt;";
}

// Compter les occurrences
$occurrences = array_count_values($couleurs);
echo "Occurrences : ";
foreach ($occurrences as $couleur => $count) {
    echo "$couleur($count) ";
}
echo "&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Tableaux multidimensionnels</h3>
                <div class="code-block">
&lt;?php
// Tableau de tableaux
$etudiants = [
    ["nom" => "Martin", "notes" => [15, 12, 18], "moyenne" => 0],
    ["nom" => "Durand", "notes" => [14, 16, 13], "moyenne" => 0],
    ["nom" => "Moreau", "notes" => [17, 15, 19], "moyenne" => 0]
];

// Calcul des moyennes
for ($i = 0; $i < count($etudiants); $i++) {
    $somme = array_sum($etudiants[$i]["notes"]);
    $etudiants[$i]["moyenne"] = $somme / count($etudiants[$i]["notes"]);
}

// Affichage
echo "Résultats des étudiants :&lt;br&gt;";
foreach ($etudiants as $etudiant) {
    echo $etudiant["nom"] . " : ";
    echo "notes(" . implode(", ", $etudiant["notes"]) . ") ";
    echo "moyenne(" . round($etudiant["moyenne"], 2) . ")&lt;br&gt;";
}

// Matrice 2D
$matrice = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

echo "&lt;br&gt;Matrice 3x3 :&lt;br&gt;";
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        echo $matrice[$i][$j] . " ";
    }
    echo "&lt;br&gt;";
}
?&gt;
                </div>
                
                <h3>Fonctions avancées de tableaux</h3>
                <div class="code-block">
&lt;?php
$nombres = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// Filtrage avec array_filter
$pairs = array_filter($nombres, function($n) {
    return $n % 2 == 0;
});
echo "Nombres pairs : " . implode(", ", $pairs) . "&lt;br&gt;";

// Transformation avec array_map
$carres = array_map(function($n) {
    return $n * $n;
}, $nombres);
echo "Carrés : " . implode(", ", $carres) . "&lt;br&gt;";

// Réduction avec array_reduce
$somme = array_reduce($nombres, function($carry, $item) {
    return $carry + $item;
}, 0);
echo "Somme : $somme&lt;br&gt;";

// Extraction de parties
$partie = array_slice($nombres, 2, 4);
echo "Slice(2,4) : " . implode(", ", $partie) . "&lt;br&gt;";

// Fusion de tableaux
$array1 = [1, 2, 3];
$array2 = [4, 5, 6];
$fusion = array_merge($array1, $array2);
echo "Fusion : " . implode(", ", $fusion) . "&lt;br&gt;";

// Intersection
$intersection = array_intersect([1, 2, 3, 4], [3, 4, 5, 6]);
echo "Intersection : " . implode(", ", $intersection) . "&lt;br&gt;";
?&gt;
                </div>
            </div>

            <div class="chapter">
                <h2>4. Manipulation de Chaînes de Caractères</h2>
                
                <div class="definition">
                    <h4>Chaînes de caractères</h4>
                    <p>Une chaîne de caractères (string) est une séquence de caractères. PHP offre de nombreuses fonctions pour manipuler, rechercher, modifier et formater les chaînes.</p>
                </div>
                
                <h3>Création et concaténation</h3>
                <div class="code-block">
&lt;?php
// Différentes façons de créer des chaînes
$simple = 'Chaîne simple';
$double = "Chaîne avec guillemets doubles";
$heredoc = &lt;&lt;&lt;EOT
Chaîne Heredoc
sur plusieurs lignes
avec variables: $simple
EOT;

$nowdoc = &lt;&lt;&lt;'EOT'
Chaîne Nowdoc
sans interprétation de variables: $simple
EOT;

// Concaténation
$prenom = "Jean";
$nom = "Dupont";
$nomComplet1 = $prenom . " " . $nom;
$nomComplet2 = "$prenom $nom";
$nomComplet3 = "{$prenom} {$nom}";

echo "Simple : $simple&lt;br&gt;";
echo "Double : $double&lt;br&gt;";
echo "Heredoc : " . nl2br($heredoc) . "&lt;br&gt;";
echo "Nowdoc : " . nl2br($nowdoc) . "&lt;br&gt;";
echo "Concaténation 1 : $nomComplet1&lt;br&gt;";
echo "Concaténation 2 : $nomComplet2&lt;br&gt;";
echo "Concaténation 3 : $nomComplet3&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Informations sur les chaînes</h3>
                <div class="code-block">
&lt;?php
$texte = "Bonjour le monde";

// Longueur
echo "Texte : '$texte'&lt;br&gt;";
echo "Longueur : " . strlen($texte) . " caractères&lt;br&gt;";

// Accès aux caractères
echo "Premier caractère : " . $texte[0] . "&lt;br&gt;";
echo "Dernier caractère : " . $texte[strlen($texte) - 1] . "&lt;br&gt;";

// Parcours caractère par caractère
echo "Caractères : ";
for ($i = 0; $i < strlen($texte); $i++) {
    echo $texte[$i] . " ";
}
echo "&lt;br&gt;";

// Nombre de mots
echo "Nombre de mots : " . str_word_count($texte) . "&lt;br&gt;";

// Informations détaillées
$infos = str_word_count($texte, 1); // Retourne un tableau des mots
echo "Mots : " . implode(", ", $infos) . "&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Recherche dans les chaînes</h3>
                <div class="code-block">
&lt;?php
$phrase = "PHP est un langage de programmation web";

// Position d'une sous-chaîne
$pos = strpos($phrase, "langage");
echo "Position de 'langage' : $pos&lt;br&gt;";

// Dernière position
$lastPos = strrpos($phrase, "a");
echo "Dernière position de 'a' : $lastPos&lt;br&gt;";

// Vérifier si une chaîne contient une sous-chaîne
if (strpos($phrase, "PHP") !== false) {
    echo "La phrase contient 'PHP'&lt;br&gt;";
}

// Fonctions modernes (PHP 8+)
if (str_contains($phrase, "web")) {
    echo "La phrase contient 'web'&lt;br&gt;";
}

if (str_starts_with($phrase, "PHP")) {
    echo "La phrase commence par 'PHP'&lt;br&gt;";
}

if (str_ends_with($phrase, "web")) {
    echo "La phrase finit par 'web'&lt;br&gt;";
}

// Recherche insensible à la casse
$posInsensible = stripos($phrase, "php");
echo "Position de 'php' (insensible) : $posInsensible&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Extraction de sous-chaînes</h3>
                <div class="code-block">
&lt;?php
$texte = "Bonjour le monde";

// Extraction avec substr
echo "Texte original : '$texte'&lt;br&gt;";
echo "substr(8) : '" . substr($texte, 8) . "'&lt;br&gt;";
echo "substr(0, 7) : '" . substr($texte, 0, 7) . "'&lt;br&gt;";
echo "substr(-5) : '" . substr($texte, -5) . "'&lt;br&gt;";
echo "substr(-5, 2) : '" . substr($texte, -5, 2) . "'&lt;br&gt;";

// Extraction avec des délimiteurs
$email = "utilisateur@example.com";
$nom = substr($email, 0, strpos($email, "@"));
$domaine = substr($email, strpos($email, "@") + 1);
echo "&lt;br&gt;Email : $email&lt;br&gt;";
echo "Nom : $nom&lt;br&gt;";
echo "Domaine : $domaine&lt;br&gt;";

// Extraction de mots
$phrase = "Le chat mange la souris";
$mots = explode(" ", $phrase);
echo "&lt;br&gt;Phrase : $phrase&lt;br&gt;";
echo "Premier mot : " . $mots[0] . "&lt;br&gt;";
echo "Dernier mot : " . end($mots) . "&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Remplacement et modification</h3>
                <div class="code-block">
&lt;?php
$texte = "J'aime les pommes et les pommes sont bonnes";

// Remplacement simple
$nouveau = str_replace("pommes", "oranges", $texte);
echo "Original : $texte&lt;br&gt;";
echo "Remplacé : $nouveau&lt;br&gt;";

// Remplacement avec compteur
$nouveau2 = str_replace("pommes", "poires", $texte, $count);
echo "Remplacements effectués : $count&lt;br&gt;";
echo "Résultat : $nouveau2&lt;br&gt;";

// Remplacement multiple
$recherche = ["pommes", "bonnes"];
$remplacement = ["bananes", "délicieuses"];
$nouveau3 = str_replace($recherche, $remplacement, $texte);
echo "Remplacement multiple : $nouveau3&lt;br&gt;";

// Remplacement insensible à la casse
$texte2 = "PHP est GÉNIAL et php est facile";
$nouveau4 = str_ireplace("php", "JavaScript", $texte2);
echo "&lt;br&gt;Remplacement insensible : $nouveau4&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Transformation de casse</h3>
                <div class="code-block">
&lt;?php
$texte = "Bonjour Le Monde";

echo "Original : '$texte'&lt;br&gt;";
echo "Minuscules : '" . strtolower($texte) . "'&lt;br&gt;";
echo "Majuscules : '" . strtoupper($texte) . "'&lt;br&gt;";
echo "Première lettre maj : '" . ucfirst(strtolower($texte)) . "'&lt;br&gt;";
echo "Chaque mot maj : '" . ucwords(strtolower($texte)) . "'&lt;br&gt;";

// Transformation personnalisée
function alternerCasse($texte) {
    $resultat = "";
    for ($i = 0; $i < strlen($texte); $i++) {
        if ($i % 2 == 0) {
            $resultat .= strtoupper($texte[$i]);
        } else {
            $resultat .= strtolower($texte[$i]);
        }
    }
    return $resultat;
}

echo "Casse alternée : '" . alternerCasse($texte) . "'&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Nettoyage et formatage</h3>
                <div class="code-block">
&lt;?php
$texte = "  Bonjour le monde  \n\t";

// Nettoyage des espaces
echo "Original : '" . addslashes($texte) . "'&lt;br&gt;";
echo "trim() : '" . trim($texte) . "'&lt;br&gt;";
echo "ltrim() : '" . ltrim($texte) . "'&lt;br&gt;";
echo "rtrim() : '" . rtrim($texte) . "'&lt;br&gt;";

// Nettoyage personnalisé
$texte2 = "...Bonjour...";
echo "trim personnalisé : '" . trim($texte2, ".") . "'&lt;br&gt;";

// Formatage de nombres
$nombre = 1234567.89;
echo "&lt;br&gt;Nombre : $nombre&lt;br&gt;";
echo "Formaté : " . number_format($nombre, 2, ',', ' ') . "&lt;br&gt;";

// Formatage avec sprintf
$nom = "Jean";
$age = 25;
$prix = 19.99;
echo sprintf("Nom: %s, Age: %d ans, Prix: %.2f€&lt;br&gt;", $nom, $age, $prix);

// Répétition de chaînes
echo "Séparateur : " . str_repeat("-", 30) . "&lt;br&gt;";
echo "Padding : '" . str_pad("123", 10, "0", STR_PAD_LEFT) . "'&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Division et jointure</h3>
                <div class="code-block">
&lt;?php
// Division de chaînes
$phrase = "pomme,banane,orange,kiwi";
$fruits = explode(",", $phrase);
echo "Phrase : '$phrase'&lt;br&gt;";
echo "Fruits : " . implode(" | ", $fruits) . "&lt;br&gt;";

// Division avec limite
$texte = "un-deux-trois-quatre-cinq";
$parties = explode("-", $texte, 3);
echo "&lt;br&gt;Texte : $texte&lt;br&gt;";
echo "Division limitée (3) : " . implode(" | ", $parties) . "&lt;br&gt;";

// Jointure de tableaux
$mots = ["Bonjour", "le", "monde"];
$phrase2 = implode(" ", $mots);
echo "&lt;br&gt;Mots : " . implode(", ", $mots) . "&lt;br&gt;";
echo "Phrase : $phrase2&lt;br&gt;";

// Division par lignes
$texte_multiligne = "Ligne 1\nLigne 2\nLigne 3";
$lignes = explode("\n", $texte_multiligne);
echo "&lt;br&gt;Lignes :&lt;br&gt;";
foreach ($lignes as $i => $ligne) {
    echo ($i + 1) . ": $ligne&lt;br&gt;";
}
?&gt;
                </div>
            </div>

            <div class="chapter">
                <h2>5. Gestion des Fichiers</h2>
                
                <div class="definition">
                    <h4>Gestion des fichiers</h4>
                    <p>PHP permet de lire, écrire, créer et manipuler des fichiers sur le serveur. C'est essentiel pour stocker des données, créer des logs, ou traiter des uploads.</p>
                </div>
                
                <h3>Lecture de fichiers</h3>
                <div class="code-block">
&lt;?php
// Créer un fichier de test
$contenuTest = "Ligne 1\nLigne 2\nLigne 3\nBonjour le monde!";
file_put_contents('test.txt', $contenuTest);

// Lire tout le fichier d'un coup
if (file_exists('test.txt')) {
    $contenu = file_get_contents('test.txt');
    echo "Contenu complet :&lt;br&gt;" . nl2br($contenu) . "&lt;br&gt;&lt;br&gt;";
    
    // Lire ligne par ligne
    $lignes = file('test.txt');
    echo "Lecture ligne par ligne :&lt;br&gt;";
    foreach ($lignes as $numero => $ligne) {
        echo "Ligne " . ($numero + 1) . ": " . trim($ligne) . "&lt;br&gt;";
    }
} else {
    echo "Le fichier test.txt n'existe pas&lt;br&gt;";
}

// Informations sur le fichier
if (file_exists('test.txt')) {
    echo "&lt;br&gt;Informations sur le fichier :&lt;br&gt;";
    echo "Taille : " . filesize('test.txt') . " octets&lt;br&gt;";
    echo "Dernière modification : " . date('Y-m-d H:i:s', filemtime('test.txt')) . "&lt;br&gt;";
    echo "Est lisible : " . (is_readable('test.txt') ? 'Oui' : 'Non') . "&lt;br&gt;";
    echo "Est modifiable : " . (is_writable('test.txt') ? 'Oui' : 'Non') . "&lt;br&gt;";
}
?&gt;
                </div>
                
                <h3>Écriture de fichiers</h3>
                <div class="code-block">
&lt;?php
// Écriture simple (écrase le contenu)
$message = "Bonjour, ceci est un test d'écriture.\n";
$message .= "Ligne ajoutée.\n";
$message .= "Date : " . date('Y-m-d H:i:s') . "\n";

if (file_put_contents('nouveau.txt', $message)) {
    echo "Fichier 'nouveau.txt' créé avec succès&lt;br&gt;";
} else {
    echo "Erreur lors de la création du fichier&lt;br&gt;";
}

// Ajout de contenu (sans écraser)
$ajout = "Ligne ajoutée en mode append.\n";
if (file_put_contents('nouveau.txt', $ajout, FILE_APPEND)) {
    echo "Contenu ajouté au fichier&lt;br&gt;";
}

// Lire le résultat
if (file_exists('nouveau.txt')) {
    echo "&lt;br&gt;Contenu de nouveau.txt :&lt;br&gt;";
    echo nl2br(file_get_contents('nouveau.txt'));
}

// Fonction pour écrire des logs
function ecrireLog($message) {
    $timestamp = date('Y-m-d H:i:s');
    $logEntry = "[$timestamp] $message\n";
    file_put_contents('app.log', $logEntry, FILE_APPEND | LOCK_EX);
}

ecrireLog("Application démarrée");
ecrireLog("Utilisateur connecté");
ecrireLog("Opération effectuée");

echo "&lt;br&gt;Logs écrits dans app.log&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Manipulation avec fopen/fclose</h3>
                <div class="code-block">
&lt;?php
// Lecture avec fopen
$fichier = fopen('test.txt', 'r');
if ($fichier) {
    echo "Lecture avec fgets() :&lt;br&gt;";
    while (($ligne = fgets($fichier)) !== false) {
        echo "- " . trim($ligne) . "&lt;br&gt;";
    }
    fclose($fichier);
} else {
    echo "Impossible d'ouvrir le fichier en lecture&lt;br&gt;";
}

// Écriture avec fopen
$fichier = fopen('ecriture.txt', 'w');
if ($fichier) {
    fwrite($fichier, "Première ligne\n");
    fwrite($fichier, "Deuxième ligne\n");
    fwrite($fichier, "Troisième ligne\n");
    fclose($fichier);
    echo "&lt;br&gt;Fichier 'ecriture.txt' créé avec fwrite()&lt;br&gt;";
} else {
    echo "Impossible d'ouvrir le fichier en écriture&lt;br&gt;";
}

// Lecture caractère par caractère
$fichier = fopen('test.txt', 'r');
if ($fichier) {
    echo "&lt;br&gt;Premiers caractères : ";
    for ($i = 0; $i < 10; $i++) {
        $char = fgetc($fichier);
        if ($char !== false) {
            echo $char;
        }
    }
    echo "&lt;br&gt;";
    fclose($fichier);
}
?&gt;
                </div>
                
                <h3>Gestion des dossiers</h3>
                <div class="code-block">
&lt;?php
$dossier = 'mon_dossier';

// Créer un dossier
if (!is_dir($dossier)) {
    if (mkdir($dossier, 0755)) {
        echo "Dossier '$dossier' créé&lt;br&gt;";
    } else {
        echo "Erreur lors de la création du dossier&lt;br&gt;";
    }
} else {
    echo "Le dossier '$dossier' existe déjà&lt;br&gt;";
}

// Lister le contenu d'un dossier
echo "&lt;br&gt;Contenu du dossier courant :&lt;br&gt;";
$contenu = scandir('.');
foreach ($contenu as $element) {
    if ($element != '.' && $element != '..') {
        $type = is_dir($element) ? '[DOSSIER]' : '[FICHIER]';
        $taille = is_file($element) ? ' (' . filesize($element) . ' octets)' : '';
        echo "$type $element$taille&lt;br&gt;";
    }
}

// Utilisation de glob pour filtrer
echo "&lt;br&gt;Fichiers .txt :&lt;br&gt;";
$fichiersTxt = glob('*.txt');
foreach ($fichiersTxt as $fichier) {
    echo "- $fichier (" . filesize($fichier) . " octets)&lt;br&gt;";
}

// Fonction récursive pour lister un dossier
function listerDossierRecursif($dossier, $niveau = 0) {
    $indent = str_repeat("  ", $niveau);
    $contenu = scandir($dossier);
    
    foreach ($contenu as $element) {
        if ($element != '.' && $element != '..') {
            $chemin = $dossier . '/' . $element;
            if (is_dir($chemin)) {
                echo $indent . "[DOSSIER] $element&lt;br&gt;";
                if ($niveau < 2) { // Limiter la profondeur
                    listerDossierRecursif($chemin, $niveau + 1);
                }
            } else {
                echo $indent . "[FICHIER] $element&lt;br&gt;";
            }
        }
    }
}
?&gt;
                </div>
                
                <h3>Formats de fichiers spéciaux</h3>
                
                <h4>Fichiers CSV</h4>
                <div class="code-block">
&lt;?php
// Créer un fichier CSV
$donnees = [
    ['nom', 'prenom', 'age', 'ville'],
    ['Dupont', 'Jean', 30, 'Paris'],
    ['Martin', 'Marie', 25, 'Lyon'],
    ['Durand', 'Pierre', 35, 'Marseille']
];

$fichier = fopen('utilisateurs.csv', 'w');
foreach ($donnees as $ligne) {
    fputcsv($fichier, $ligne);
}
fclose($fichier);
echo "Fichier CSV créé&lt;br&gt;";

// Lire un fichier CSV
echo "&lt;br&gt;Lecture du fichier CSV :&lt;br&gt;";
if (($handle = fopen('utilisateurs.csv', 'r')) !== false) {
    $headers = fgetcsv($handle);
    echo "En-têtes : " . implode(', ', $headers) . "&lt;br&gt;&lt;br&gt;";
    
    while (($data = fgetcsv($handle)) !== false) {
        echo "Utilisateur : " . implode(', ', $data) . "&lt;br&gt;";
    }
    fclose($handle);
}

// Fonction pour convertir CSV en tableau associatif
function csvVersTableau($fichier) {
    $resultat = [];
    if (($handle = fopen($fichier, 'r')) !== false) {
        $headers = fgetcsv($handle);
        while (($data = fgetcsv($handle)) !== false) {
            $resultat[] = array_combine($headers, $data);
        }
        fclose($handle);
    }
    return $resultat;
}

$utilisateurs = csvVersTableau('utilisateurs.csv');
echo "&lt;br&gt;Données structurées :&lt;br&gt;";
foreach ($utilisateurs as $user) {
    echo $user['prenom'] . " " . $user['nom'] . " (" . $user['age'] . " ans, " . $user['ville'] . ")&lt;br&gt;";
}
?&gt;
                </div>
                
                <h4>Fichiers JSON</h4>
                <div class="code-block">
&lt;?php
// Créer des données JSON
$data = [
    'utilisateurs' => [
        ['nom' => 'Dupont', 'age' => 30, 'actif' => true],
        ['nom' => 'Martin', 'age' => 25, 'actif' => false]
    ],
    'total' => 2,
    'date_creation' => date('Y-m-d H:i:s')
];

// Écrire JSON
$json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents('data.json', $json);
echo "Fichier JSON créé&lt;br&gt;";

// Lire JSON
$jsonContent = file_get_contents('data.json');
$decodedData = json_decode($jsonContent, true);

if ($decodedData !== null) {
    echo "&lt;br&gt;Données JSON lues :&lt;br&gt;";
    echo "Total : " . $decodedData['total'] . "&lt;br&gt;";
    echo "Date : " . $decodedData['date_creation'] . "&lt;br&gt;";
    echo "Utilisateurs :&lt;br&gt;";
    foreach ($decodedData['utilisateurs'] as $user) {
        $statut = $user['actif'] ? 'actif' : 'inactif';
        echo "- " . $user['nom'] . " (" . $user['age'] . " ans, $statut)&lt;br&gt;";
    }
} else {
    echo "Erreur lors du décodage JSON&lt;br&gt;";
}

// Fonction pour sauvegarder des données en JSON
function sauvegarderJSON($fichier, $donnees) {
    $json = json_encode($donnees, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    return file_put_contents($fichier, $json) !== false;
}

// Fonction pour charger des données JSON
function chargerJSON($fichier) {
    if (file_exists($fichier)) {
        $content = file_get_contents($fichier);
        return json_decode($content, true);
    }
    return null;
}
?&gt;
                </div>
                
                <h3>Gestion d'erreurs et sécurité</h3>
                <div class="code-block">
&lt;?php
// Fonction de lecture sécurisée
function lireFichierSecurise($nomFichier) {
    // Vérifications de sécurité
    if (empty($nomFichier)) {
        return ['erreur' => 'Nom de fichier vide'];
    }
    
    // Empêcher la traversée de dossiers
    if (strpos($nomFichier, '..') !== false) {
        return ['erreur' => 'Nom de fichier non autorisé'];
    }
    
    if (!file_exists($nomFichier)) {
        return ['erreur' => 'Fichier inexistant'];
    }
    
    if (!is_readable($nomFichier)) {
        return ['erreur' => 'Fichier non lisible'];
    }
    
    $contenu = file_get_contents($nomFichier);
    if ($contenu === false) {
        return ['erreur' => 'Erreur de lecture'];
    }
    
    return ['succes' => true, 'contenu' => $contenu];
}

// Test de la fonction sécurisée
$resultat = lireFichierSecurise('test.txt');
if (isset($resultat['erreur'])) {
    echo "Erreur : " . $resultat['erreur'] . "&lt;br&gt;";
} else {
    echo "Lecture réussie : " . strlen($resultat['contenu']) . " caractères&lt;br&gt;";
}

// Nettoyage des fichiers de test
$fichiersASupprimer = ['test.txt', 'nouveau.txt', 'ecriture.txt', 'utilisateurs.csv', 'data.json', 'app.log'];
foreach ($fichiersASupprimer as $fichier) {
    if (file_exists($fichier)) {
        unlink($fichier);
        echo "Supprimé : $fichier&lt;br&gt;";
    }
}

// Supprimer le dossier de test
if (is_dir('mon_dossier')) {
    rmdir('mon_dossier');
    echo "Dossier supprimé : mon_dossier&lt;br&gt;";
}
?&gt;
                </div>
            </div>
        </div>

        <div class="navigation">
            <a href="partie1-fondamentaux.php" class="nav-link">← Partie 1: Fondamentaux</a>
            <span>Partie 2/8</span>
            <a href="partie3-poo-fondamentaux.php" class="nav-link">Partie 3: POO Fondamentaux →</a>
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