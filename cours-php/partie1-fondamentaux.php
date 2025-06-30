<?php
/**
 * COURS PHP COMPLET - PARTIE 1: FONDAMENTAUX
 * ==========================================
 * 
 * Cette partie couvre les concepts de base essentiels de PHP :
 * - Introduction au langage
 * - Variables et types de données
 * - Opérateurs
 * - Structures de contrôle
 * - Boucles
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partie 1: Fondamentaux PHP</title>
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
        
        .nav-link.disabled {
            background: #ccc;
            cursor: not-allowed;
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
        
        .example-box {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }
        
        .example-box h4 {
            color: #495057;
            margin-bottom: 15px;
            font-weight: 600;
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
            <h1>📚 Partie 1: Fondamentaux PHP</h1>
            <p>Découvrez les bases essentielles du langage PHP</p>
        </div>

        <div class="content">
            <div class="chapter">
                <h2>1. Introduction à PHP</h2>
                
                <div class="definition">
                    <h4>Qu'est-ce que PHP ?</h4>
                    <p><strong>PHP</strong> (PHP: Hypertext Preprocessor) est un langage de programmation côté serveur, open source, spécialement conçu pour le développement web. Il est exécuté sur le serveur avant d'envoyer le résultat au navigateur client.</p>
                </div>
                
                <h3>Caractéristiques principales de PHP</h3>
                <ul>
                    <li><strong>Langage côté serveur</strong> : Le code PHP s'exécute sur le serveur web</li>
                    <li><strong>Interprété</strong> : Pas besoin de compilation, exécution directe</li>
                    <li><strong>Dynamiquement typé</strong> : Les types de variables sont déterminés automatiquement</li>
                    <li><strong>Open source</strong> : Gratuit et avec une large communauté</li>
                    <li><strong>Multiplateforme</strong> : Fonctionne sur Windows, Linux, macOS</li>
                </ul>
                
                <h3>Pourquoi apprendre PHP ?</h3>
                <ul>
                    <li><strong>Popularité</strong> : Utilisé par 78% des sites web (WordPress, Facebook, Wikipedia)</li>
                    <li><strong>Facilité d'apprentissage</strong> : Syntaxe simple et intuitive</li>
                    <li><strong>Écosystème riche</strong> : Nombreuses bibliothèques et frameworks</li>
                    <li><strong>Opportunités professionnelles</strong> : Forte demande sur le marché</li>
                    <li><strong>Évolution constante</strong> : Nouvelles versions avec améliorations régulières</li>
                </ul>
                
                <h3>Première syntaxe PHP</h3>
                <p>Le code PHP est délimité par les balises <span class="syntax-highlight">&lt;?php</span> et <span class="syntax-highlight">?&gt;</span></p>
                
                <div class="code-block">
&lt;?php
// Ceci est un commentaire sur une ligne
echo "Bonjour le monde !";

/* 
   Ceci est un commentaire
   sur plusieurs lignes
*/

// Affichage avec print
print "Hello PHP !";

// Affichage avec printf (formaté)
printf("Nous sommes en %d", 2024);
?&gt;
                </div>
                
                <div class="output">
Bonjour le monde !
Hello PHP !
Nous sommes en 2024
                </div>
                
                <div class="tip">
                    Les balises PHP &lt;?php et ?&gt; délimitent le code PHP. Tout ce qui est en dehors est traité comme du HTML. La balise de fermeture ?&gt; est optionnelle si le fichier ne contient que du PHP.
                </div>
                
                <h3>Types de commentaires</h3>
                <div class="code-block">
&lt;?php
// Commentaire sur une ligne

# Autre syntaxe pour commentaire sur une ligne

/* 
   Commentaire sur plusieurs lignes
   Très utile pour documenter
   des blocs de code
*/

/**
 * Commentaire de documentation (DocBlock)
 * @param string $nom Le nom de l'utilisateur
 * @return string Le message de salutation
 */
?&gt;
                </div>
            </div>

            <div class="chapter">
                <h2>2. Variables et Types de Données</h2>
                
                <div class="definition">
                    <h4>Variables en PHP</h4>
                    <p>Une variable est un conteneur qui stocke une valeur. En PHP, les variables commencent par le symbole <strong>$</strong> suivi du nom de la variable. Les noms de variables sont sensibles à la casse.</p>
                </div>
                
                <h3>Règles de nommage des variables</h3>
                <ul>
                    <li>Commence par <span class="syntax-highlight">$</span></li>
                    <li>Suivi d'une lettre ou d'un underscore</li>
                    <li>Peut contenir des lettres, chiffres et underscores</li>
                    <li>Sensible à la casse (<span class="syntax-highlight">$nom</span> ≠ <span class="syntax-highlight">$Nom</span>)</li>
                    <li>Pas d'espaces ou de caractères spéciaux</li>
                </ul>
                
                <div class="code-block">
&lt;?php
// Variables valides
$nom = "Jean Dupont";
$age = 25;
$_prix = 19.99;
$estActif = true;
$nombre2 = 42;

// Variables invalides (ne pas utiliser)
// $2nombre = 10;     // Commence par un chiffre
// $nom-utilisateur;  // Contient un tiret
// $mon nom;          // Contient un espace

// Affichage des variables
echo "Nom: " . $nom . "&lt;br&gt;";
echo "Age: $age ans&lt;br&gt;";
echo "Prix: $_prix €&lt;br&gt;";
echo "Actif: " . ($estActif ? "Oui" : "Non");
?&gt;
                </div>
                
                <div class="output">
Nom: Jean Dupont<br>
Age: 25 ans<br>
Prix: 19.99 €<br>
Actif: Oui
                </div>
                
                <h3>Types de données en PHP</h3>
                <p>PHP est un langage dynamiquement typé, ce qui signifie que le type d'une variable est déterminé automatiquement selon sa valeur.</p>
                
                <table>
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Exemple</th>
                            <th>Fonction de test</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>string</strong></td>
                            <td>Chaîne de caractères</td>
                            <td>"Bonjour", 'Hello'</td>
                            <td>is_string()</td>
                        </tr>
                        <tr>
                            <td><strong>int</strong></td>
                            <td>Nombre entier</td>
                            <td>42, -10, 0</td>
                            <td>is_int()</td>
                        </tr>
                        <tr>
                            <td><strong>float</strong></td>
                            <td>Nombre décimal</td>
                            <td>3.14, -2.5</td>
                            <td>is_float()</td>
                        </tr>
                        <tr>
                            <td><strong>bool</strong></td>
                            <td>Booléen (vrai/faux)</td>
                            <td>true, false</td>
                            <td>is_bool()</td>
                        </tr>
                        <tr>
                            <td><strong>array</strong></td>
                            <td>Tableau</td>
                            <td>[1, 2, 3]</td>
                            <td>is_array()</td>
                        </tr>
                        <tr>
                            <td><strong>object</strong></td>
                            <td>Objet</td>
                            <td>new DateTime()</td>
                            <td>is_object()</td>
                        </tr>
                        <tr>
                            <td><strong>null</strong></td>
                            <td>Valeur nulle</td>
                            <td>null</td>
                            <td>is_null()</td>
                        </tr>
                        <tr>
                            <td><strong>resource</strong></td>
                            <td>Ressource externe</td>
                            <td>fopen()</td>
                            <td>is_resource()</td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="code-block">
&lt;?php
// Exemples de types de données
$texte = "Hello World";           // string
$nombre = 42;                     // int
$decimal = 3.14159;              // float
$booleen = true;                 // bool
$tableau = [1, 2, 3, "test"];    // array
$objet = new DateTime();         // object
$vide = null;                    // null

// Vérification des types avec gettype()
echo "Type de \$texte: " . gettype($texte) . "&lt;br&gt;";
echo "Type de \$nombre: " . gettype($nombre) . "&lt;br&gt;";
echo "Type de \$decimal: " . gettype($decimal) . "&lt;br&gt;";
echo "Type de \$booleen: " . gettype($booleen) . "&lt;br&gt;";
echo "Type de \$tableau: " . gettype($tableau) . "&lt;br&gt;";
echo "Type de \$objet: " . gettype($objet) . "&lt;br&gt;";
echo "Type de \$vide: " . gettype($vide) . "&lt;br&gt;&lt;br&gt;";

// Fonctions de vérification spécifiques
echo "Est-ce une chaîne ? " . (is_string($texte) ? "Oui" : "Non") . "&lt;br&gt;";
echo "Est-ce un entier ? " . (is_int($nombre) ? "Oui" : "Non") . "&lt;br&gt;";
echo "Est-ce un tableau ? " . (is_array($tableau) ? "Oui" : "Non") . "&lt;br&gt;";
echo "Est-ce null ? " . (is_null($vide) ? "Oui" : "Non") . "&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Conversion de types (Casting)</h3>
                <div class="code-block">
&lt;?php
$nombre = "123";        // string
$entier = (int)$nombre; // conversion en int
$decimal = (float)"3.14"; // conversion en float
$texte = (string)456;   // conversion en string
$booleen = (bool)1;     // conversion en bool

echo "Nombre original: $nombre (" . gettype($nombre) . ")&lt;br&gt;";
echo "Converti en int: $entier (" . gettype($entier) . ")&lt;br&gt;";
echo "Converti en float: $decimal (" . gettype($decimal) . ")&lt;br&gt;";
echo "Converti en string: $texte (" . gettype($texte) . ")&lt;br&gt;";
echo "Converti en bool: " . ($booleen ? "true" : "false") . " (" . gettype($booleen) . ")&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Constantes</h3>
                <div class="definition">
                    <h4>Constantes</h4>
                    <p>Une constante est une valeur qui ne peut pas être modifiée pendant l'exécution du script. Les constantes sont définies avec <span class="syntax-highlight">define()</span> ou le mot-clé <span class="syntax-highlight">const</span>.</p>
                </div>
                
                <div class="code-block">
&lt;?php
// Définition de constantes avec define()
define('SITE_NAME', 'Mon Site Web');
define('VERSION', '1.0.0');
define('PI', 3.14159);

// Définition avec const (PHP 5.3+)
const MAX_USERS = 100;
const DB_HOST = 'localhost';

// Utilisation des constantes
echo "Site: " . SITE_NAME . "&lt;br&gt;";
echo "Version: " . VERSION . "&lt;br&gt;";
echo "Pi: " . PI . "&lt;br&gt;";
echo "Max utilisateurs: " . MAX_USERS . "&lt;br&gt;";

// Constantes prédéfinies
echo "Version PHP: " . PHP_VERSION . "&lt;br&gt;";
echo "Système: " . PHP_OS . "&lt;br&gt;";
echo "Fichier actuel: " . __FILE__ . "&lt;br&gt;";
echo "Ligne actuelle: " . __LINE__ . "&lt;br&gt;";
?&gt;
                </div>
                
                <div class="warning">
                    Les noms de constantes sont sensibles à la casse et ne commencent pas par $. Par convention, on les écrit en MAJUSCULES. Une fois définie, une constante ne peut plus être modifiée.
                </div>
            </div>

            <div class="chapter">
                <h2>3. Opérateurs</h2>
                
                <div class="definition">
                    <h4>Opérateurs</h4>
                    <p>Les opérateurs sont des symboles qui permettent d'effectuer des opérations sur les variables et les valeurs. PHP propose plusieurs types d'opérateurs pour différents usages.</p>
                </div>
                
                <h3>Opérateurs arithmétiques</h3>
                <p>Utilisés pour effectuer des calculs mathématiques.</p>
                
                <table>
                    <thead>
                        <tr>
                            <th>Opérateur</th>
                            <th>Nom</th>
                            <th>Exemple</th>
                            <th>Résultat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>+</strong></td>
                            <td>Addition</td>
                            <td>$a + $b</td>
                            <td>Somme de $a et $b</td>
                        </tr>
                        <tr>
                            <td><strong>-</strong></td>
                            <td>Soustraction</td>
                            <td>$a - $b</td>
                            <td>Différence de $a et $b</td>
                        </tr>
                        <tr>
                            <td><strong>*</strong></td>
                            <td>Multiplication</td>
                            <td>$a * $b</td>
                            <td>Produit de $a et $b</td>
                        </tr>
                        <tr>
                            <td><strong>/</strong></td>
                            <td>Division</td>
                            <td>$a / $b</td>
                            <td>Quotient de $a et $b</td>
                        </tr>
                        <tr>
                            <td><strong>%</strong></td>
                            <td>Modulo</td>
                            <td>$a % $b</td>
                            <td>Reste de la division</td>
                        </tr>
                        <tr>
                            <td><strong>**</strong></td>
                            <td>Puissance</td>
                            <td>$a ** $b</td>
                            <td>$a élevé à la puissance $b</td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="code-block">
&lt;?php
$a = 10;
$b = 3;

echo "a = $a, b = $b&lt;br&gt;&lt;br&gt;";

echo "Addition: $a + $b = " . ($a + $b) . "&lt;br&gt;";
echo "Soustraction: $a - $b = " . ($a - $b) . "&lt;br&gt;";
echo "Multiplication: $a * $b = " . ($a * $b) . "&lt;br&gt;";
echo "Division: $a / $b = " . ($a / $b) . "&lt;br&gt;";
echo "Modulo: $a % $b = " . ($a % $b) . "&lt;br&gt;";
echo "Puissance: $a ** $b = " . ($a ** $b) . "&lt;br&gt;";

// Exemple pratique du modulo
echo "&lt;br&gt;Exemples pratiques du modulo:&lt;br&gt;";
for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 == 0) {
        echo "$i est pair&lt;br&gt;";
    } else {
        echo "$i est impair&lt;br&gt;";
    }
}
?&gt;
                </div>
                
                <h3>Opérateurs de comparaison</h3>
                <p>Utilisés pour comparer deux valeurs. Retournent toujours un booléen (true ou false).</p>
                
                <table>
                    <thead>
                        <tr>
                            <th>Opérateur</th>
                            <th>Nom</th>
                            <th>Exemple</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>==</strong></td>
                            <td>Égal</td>
                            <td>$a == $b</td>
                            <td>Vrai si $a égal à $b (conversion de type)</td>
                        </tr>
                        <tr>
                            <td><strong>===</strong></td>
                            <td>Identique</td>
                            <td>$a === $b</td>
                            <td>Vrai si $a égal à $b et même type</td>
                        </tr>
                        <tr>
                            <td><strong>!=</strong></td>
                            <td>Différent</td>
                            <td>$a != $b</td>
                            <td>Vrai si $a différent de $b</td>
                        </tr>
                        <tr>
                            <td><strong>!==</strong></td>
                            <td>Non identique</td>
                            <td>$a !== $b</td>
                            <td>Vrai si $a différent de $b ou type différent</td>
                        </tr>
                        <tr>
                            <td><strong>&lt;</strong></td>
                            <td>Inférieur</td>
                            <td>$a &lt; $b</td>
                            <td>Vrai si $a inférieur à $b</td>
                        </tr>
                        <tr>
                            <td><strong>&gt;</strong></td>
                            <td>Supérieur</td>
                            <td>$a &gt; $b</td>
                            <td>Vrai si $a supérieur à $b</td>
                        </tr>
                        <tr>
                            <td><strong>&lt;=</strong></td>
                            <td>Inférieur ou égal</td>
                            <td>$a &lt;= $b</td>
                            <td>Vrai si $a inférieur ou égal à $b</td>
                        </tr>
                        <tr>
                            <td><strong>&gt;=</strong></td>
                            <td>Supérieur ou égal</td>
                            <td>$a &gt;= $b</td>
                            <td>Vrai si $a supérieur ou égal à $b</td>
                        </tr>
                        <tr>
                            <td><strong>&lt;=&gt;</strong></td>
                            <td>Spaceship</td>
                            <td>$a &lt;=&gt; $b</td>
                            <td>-1, 0 ou 1 selon la comparaison</td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="code-block">
&lt;?php
$x = 5;
$y = "5";
$z = 10;

echo "x = $x (" . gettype($x) . "), y = '$y' (" . gettype($y) . "), z = $z&lt;br&gt;&lt;br&gt;";

// Comparaisons d'égalité
echo "x == y: " . ($x == $y ? 'true' : 'false') . " (égalité avec conversion)&lt;br&gt;";
echo "x === y: " . ($x === $y ? 'true' : 'false') . " (identité stricte)&lt;br&gt;";
echo "x != z: " . ($x != $z ? 'true' : 'false') . " (différent)&lt;br&gt;";
echo "x !== y: " . ($x !== $y ? 'true' : 'false') . " (non identique)&lt;br&gt;&lt;br&gt;";

// Comparaisons de grandeur
echo "x &lt; z: " . ($x < $z ? 'true' : 'false') . " (inférieur)&lt;br&gt;";
echo "x &gt; z: " . ($x > $z ? 'true' : 'false') . " (supérieur)&lt;br&gt;";
echo "x &lt;= z: " . ($x <= $z ? 'true' : 'false') . " (inférieur ou égal)&lt;br&gt;";
echo "x &gt;= z: " . ($x >= $z ? 'true' : 'false') . " (supérieur ou égal)&lt;br&gt;&lt;br&gt;";

// Opérateur spaceship (PHP 7+)
echo "Opérateur spaceship:&lt;br&gt;";
echo "x &lt;=&gt; z: " . ($x <=> $z) . " (-1 car x &lt; z)&lt;br&gt;";
echo "z &lt;=&gt; x: " . ($z <=> $x) . " (1 car z &gt; x)&lt;br&gt;";
echo "x &lt;=&gt; x: " . ($x <=> $x) . " (0 car x == x)&lt;br&gt;";
?&gt;
                </div>
                
                <div class="important">
                    La différence entre == et === est cruciale : == compare les valeurs avec conversion de type, tandis que === compare les valeurs ET les types sans conversion.
                </div>
                
                <h3>Opérateurs logiques</h3>
                <p>Utilisés pour combiner des conditions booléennes.</p>
                
                <table>
                    <thead>
                        <tr>
                            <th>Opérateur</th>
                            <th>Nom</th>
                            <th>Exemple</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>&&</strong></td>
                            <td>ET (AND)</td>
                            <td>$a && $b</td>
                            <td>Vrai si $a ET $b sont vrais</td>
                        </tr>
                        <tr>
                            <td><strong>||</strong></td>
                            <td>OU (OR)</td>
                            <td>$a || $b</td>
                            <td>Vrai si $a OU $b est vrai</td>
                        </tr>
                        <tr>
                            <td><strong>!</strong></td>
                            <td>NON (NOT)</td>
                            <td>!$a</td>
                            <td>Vrai si $a est faux</td>
                        </tr>
                        <tr>
                            <td><strong>and</strong></td>
                            <td>ET (priorité faible)</td>
                            <td>$a and $b</td>
                            <td>Même que && mais priorité plus faible</td>
                        </tr>
                        <tr>
                            <td><strong>or</strong></td>
                            <td>OU (priorité faible)</td>
                            <td>$a or $b</td>
                            <td>Même que || mais priorité plus faible</td>
                        </tr>
                        <tr>
                            <td><strong>xor</strong></td>
                            <td>OU exclusif</td>
                            <td>$a xor $b</td>
                            <td>Vrai si $a ou $b est vrai, mais pas les deux</td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="code-block">
&lt;?php
$vrai = true;
$faux = false;
$age = 25;
$permis = true;

echo "vrai = " . ($vrai ? 'true' : 'false') . ", faux = " . ($faux ? 'true' : 'false') . "&lt;br&gt;&lt;br&gt;";

// Opérateurs logiques de base
echo "vrai && faux: " . ($vrai && $faux ? 'true' : 'false') . " (ET)&lt;br&gt;";
echo "vrai || faux: " . ($vrai || $faux ? 'true' : 'false') . " (OU)&lt;br&gt;";
echo "!vrai: " . (!$vrai ? 'true' : 'false') . " (NON)&lt;br&gt;";
echo "vrai xor faux: " . ($vrai xor $faux ? 'true' : 'false') . " (OU exclusif)&lt;br&gt;&lt;br&gt;";

// Exemple pratique
echo "Exemples pratiques:&lt;br&gt;";
echo "Age: $age, Permis: " . ($permis ? 'oui' : 'non') . "&lt;br&gt;";

if ($age >= 18 && $permis) {
    echo "Peut conduire une voiture&lt;br&gt;";
} else {
    echo "Ne peut pas conduire une voiture&lt;br&gt;";
}

if ($age >= 16 || $permis) {
    echo "Peut conduire un scooter&lt;br&gt;";
} else {
    echo "Ne peut pas conduire un scooter&lt;br&gt;";
}
?&gt;
                </div>
                
                <h3>Opérateurs d'assignation</h3>
                <p>Utilisés pour assigner des valeurs aux variables.</p>
                
                <div class="code-block">
&lt;?php
$nombre = 10;
echo "Valeur initiale: $nombre&lt;br&gt;";

// Opérateurs d'assignation combinés
$nombre += 5;  // Équivalent à: $nombre = $nombre + 5
echo "Après +=5: $nombre&lt;br&gt;";

$nombre -= 3;  // Équivalent à: $nombre = $nombre - 3
echo "Après -=3: $nombre&lt;br&gt;";

$nombre *= 2;  // Équivalent à: $nombre = $nombre * 2
echo "Après *=2: $nombre&lt;br&gt;";

$nombre /= 4;  // Équivalent à: $nombre = $nombre / 4
echo "Après /=4: $nombre&lt;br&gt;";

$nombre %= 3;  // Équivalent à: $nombre = $nombre % 3
echo "Après %=3: $nombre&lt;br&gt;";

// Concaténation
$texte = "Hello";
$texte .= " World";  // Équivalent à: $texte = $texte . " World"
echo "Texte: $texte&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Opérateurs d'incrémentation et décrémentation</h3>
                <div class="code-block">
&lt;?php
$i = 5;
echo "Valeur initiale de i: $i&lt;br&gt;";

// Pré-incrémentation (incrémente puis retourne)
echo "++i = " . (++$i) . " (i vaut maintenant $i)&lt;br&gt;";

// Post-incrémentation (retourne puis incrémente)
echo "i++ = " . ($i++) . " (i vaut maintenant $i)&lt;br&gt;";

// Pré-décrémentation
echo "--i = " . (--$i) . " (i vaut maintenant $i)&lt;br&gt;";

// Post-décrémentation
echo "i-- = " . ($i--) . " (i vaut maintenant $i)&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Opérateurs spéciaux</h3>
                
                <h4>Opérateur ternaire</h4>
                <div class="definition">
                    <h4>Opérateur ternaire</h4>
                    <p>L'opérateur ternaire <span class="syntax-highlight">condition ? valeur_si_vrai : valeur_si_faux</span> est une forme condensée de if/else.</p>
                </div>
                
                <div class="code-block">
&lt;?php
$age = 18;
$note = 15;

// Opérateur ternaire simple
$statut = ($age >= 18) ? "Majeur" : "Mineur";
echo "Statut: $statut&lt;br&gt;";

// Opérateur ternaire imbriqué
$mention = ($note >= 16) ? "Très bien" : (($note >= 14) ? "Bien" : (($note >= 12) ? "Assez bien" : "Passable"));
echo "Mention: $mention&lt;br&gt;";

// Comparaison avec if/else classique
if ($age >= 18) {
    $statut2 = "Majeur";
} else {
    $statut2 = "Mineur";
}
echo "Même résultat avec if/else: $statut2&lt;br&gt;";
?&gt;
                </div>
                
                <h4>Opérateur null coalescing (PHP 7+)</h4>
                <div class="definition">
                    <h4>Opérateur null coalescing (??)</h4>
                    <p>L'opérateur <span class="syntax-highlight">??</span> retourne la première valeur qui n'est pas null.</p>
                </div>
                
                <div class="code-block">
&lt;?php
$nom = null;
$prenom = "";
$surnom = "Johnny";

// Opérateur null coalescing
$nomAffiche = $nom ?? $prenom ?? $surnom ?? "Anonyme";
echo "Nom affiché: '$nomAffiche'&lt;br&gt;";

// Équivalent avec isset()
$nomAffiche2 = isset($nom) ? $nom : (isset($prenom) ? $prenom : (isset($surnom) ? $surnom : "Anonyme"));
echo "Même résultat: '$nomAffiche2'&lt;br&gt;";

// Utilisation pratique avec $_GET
$page = $_GET['page'] ?? 'accueil';
echo "Page demandée: $page&lt;br&gt;";
?&gt;
                </div>
                
                <h4>Opérateurs de chaînes</h4>
                <div class="code-block">
&lt;?php
$prenom = "Jean";
$nom = "Dupont";

// Concaténation avec .
$nomComplet = $prenom . " " . $nom;
echo "Nom complet: $nomComplet&lt;br&gt;";

// Concaténation avec assignation
$message = "Bonjour ";
$message .= $prenom;
$message .= " " . $nom;
echo "Message: $message&lt;br&gt;";

// Interpolation de variables dans les chaînes
$presentation = "Je m'appelle $prenom $nom";
echo "Présentation: $presentation&lt;br&gt;";

// Avec accolades pour clarifier
$age = 25;
$phrase = "J'ai {$age} ans et je m'appelle {$prenom}";
echo "Phrase: $phrase&lt;br&gt;";
?&gt;
                </div>
            </div>

            <div class="chapter">
                <h2>4. Structures de Contrôle</h2>
                
                <div class="definition">
                    <h4>Structures de contrôle</h4>
                    <p>Les structures de contrôle permettent de modifier l'ordre d'exécution des instructions dans un programme. Elles incluent les conditions (if/else, switch) et les boucles (for, while, foreach).</p>
                </div>
                
                <h3>Structures conditionnelles</h3>
                
                <h4>Structure if/else</h4>
                <p>La structure if/else permet d'exécuter du code selon qu'une condition est vraie ou fausse.</p>
                
                <div class="code-block">
&lt;?php
$note = 15;
$age = 17;

// If simple
if ($note >= 10) {
    echo "Vous avez réussi l'examen !&lt;br&gt;";
}

// If/else
if ($age >= 18) {
    echo "Vous êtes majeur&lt;br&gt;";
} else {
    echo "Vous êtes mineur&lt;br&gt;";
}

// If/elseif/else
if ($note >= 16) {
    echo "Mention très bien&lt;br&gt;";
} elseif ($note >= 14) {
    echo "Mention bien&lt;br&gt;";
} elseif ($note >= 12) {
    echo "Mention assez bien&lt;br&gt;";
} elseif ($note >= 10) {
    echo "Passable&lt;br&gt;";
} else {
    echo "Échec&lt;br&gt;";
}

// Conditions multiples
$permis = true;
if ($age >= 18 && $permis) {
    echo "Peut conduire une voiture&lt;br&gt;";
} elseif ($age >= 16) {
    echo "Peut conduire un scooter&lt;br&gt;";
} else {
    echo "Trop jeune pour conduire&lt;br&gt;";
}
?&gt;
                </div>
                
                <h4>Structure switch</h4>
                <p>La structure switch permet de comparer une variable à plusieurs valeurs possibles.</p>
                
                <div class="code-block">
&lt;?php
$jour = "lundi";
$note = "B";

// Switch simple
switch ($jour) {
    case "lundi":
        echo "Début de semaine&lt;br&gt;";
        break;
    case "mardi":
    case "mercredi":
    case "jeudi":
        echo "Milieu de semaine&lt;br&gt;";
        break;
    case "vendredi":
        echo "Fin de semaine&lt;br&gt;";
        break;
    case "samedi":
    case "dimanche":
        echo "Week-end&lt;br&gt;";
        break;
    default:
        echo "Jour invalide&lt;br&gt;";
}

// Switch avec différents types
switch ($note) {
    case "A":
        echo "Excellent (16-20)&lt;br&gt;";
        break;
    case "B":
        echo "Bien (14-15)&lt;br&gt;";
        break;
    case "C":
        echo "Assez bien (12-13)&lt;br&gt;";
        break;
    case "D":
        echo "Passable (10-11)&lt;br&gt;";
        break;
    case "F":
        echo "Échec (0-9)&lt;br&gt;";
        break;
    default:
        echo "Note invalide&lt;br&gt;";
}
?&gt;
                </div>
                
                <div class="warning">
                    N'oubliez pas le <span class="syntax-highlight">break;</span> dans chaque case du switch, sinon l'exécution continuera dans les cases suivantes (fall-through).
                </div>
                
                <h4>Match (PHP 8+)</h4>
                <p>L'expression match est une alternative plus moderne au switch.</p>
                
                <div class="code-block">
&lt;?php
$grade = 'B';
$statut = 1;

// Match simple
$message = match($grade) {
    'A' => 'Excellent',
    'B' => 'Bien',
    'C' => 'Moyen',
    'D' => 'Passable',
    'F' => 'Échec',
    default => 'Grade invalide'
};
echo "Grade $grade: $message&lt;br&gt;";

// Match avec conditions multiples
$description = match($statut) {
    0 => 'Inactif',
    1, 2, 3 => 'Actif',
    4, 5 => 'En attente',
    default => 'Statut inconnu'
};
echo "Statut $statut: $description&lt;br&gt;";

// Match avec expressions
$age = 25;
$categorie = match(true) {
    $age < 13 => 'Enfant',
    $age < 18 => 'Adolescent',
    $age < 65 => 'Adulte',
    default => 'Senior'
};
echo "Age $age: $categorie&lt;br&gt;";
?&gt;
                </div>
                
                <h3>Structures de boucles</h3>
                
                <h4>Boucle for</h4>
                <p>La boucle for est utilisée quand on connaît le nombre d'itérations à l'avance.</p>
                
                <div class="code-block">
&lt;?php
// Boucle for classique
echo "Comptage de 1 à 5:&lt;br&gt;";
for ($i = 1; $i <= 5; $i++) {
    echo "Nombre: $i&lt;br&gt;";
}

echo "&lt;br&gt;Nombres pairs de 0 à 10:&lt;br&gt;";
for ($i = 0; $i <= 10; $i += 2) {
    echo "$i ";
}
echo "&lt;br&gt;&lt;br&gt;";

// Boucle for décroissante
echo "Compte à rebours:&lt;br&gt;";
for ($i = 5; $i >= 1; $i--) {
    echo "$i... ";
}
echo "Décollage !&lt;br&gt;&lt;br&gt;";

// Boucle for avec plusieurs variables
echo "Table de multiplication:&lt;br&gt;";
for ($i = 1, $j = 1; $i <= 3; $i++, $j++) {
    echo "$i x $j = " . ($i * $j) . "&lt;br&gt;";
}
?&gt;
                </div>
                
                <h4>Boucle while</h4>
                <p>La boucle while s'exécute tant qu'une condition est vraie.</p>
                
                <div class="code-block">
&lt;?php
// While simple
$compteur = 1;
echo "Boucle while de 1 à 3:&lt;br&gt;";
while ($compteur <= 3) {
    echo "Compteur: $compteur&lt;br&gt;";
    $compteur++;
}

// While avec condition complexe
$nombre = 1;
$somme = 0;
echo "&lt;br&gt;Somme des nombres de 1 à 10:&lt;br&gt;";
while ($nombre <= 10) {
    $somme += $nombre;
    echo "Ajout de $nombre, somme = $somme&lt;br&gt;";
    $nombre++;
}

// Attention aux boucles infinies !
$tentatives = 0;
$maxTentatives = 5;
while ($tentatives < $maxTentatives) {
    echo "Tentative " . ($tentatives + 1) . "&lt;br&gt;";
    $tentatives++;
    // Sans cette ligne, boucle infinie !
}
?&gt;
                </div>
                
                <h4>Boucle do-while</h4>
                <p>La boucle do-while s'exécute au moins une fois, puis continue tant que la condition est vraie.</p>
                
                <div class="code-block">
&lt;?php
// Do-while - s'exécute au moins une fois
$nombre = 1;
echo "Boucle do-while:&lt;br&gt;";
do {
    echo "Nombre: $nombre&lt;br&gt;";
    $nombre++;
} while ($nombre <= 3);

// Exemple pratique : menu utilisateur
$choix = 0;
echo "&lt;br&gt;Simulation d'un menu:&lt;br&gt;";
do {
    echo "Menu: 1-Voir, 2-Ajouter, 3-Quitter&lt;br&gt;";
    $choix = rand(1, 3); // Simulation d'un choix utilisateur
    echo "Choix: $choix&lt;br&gt;";
    
    switch ($choix) {
        case 1:
            echo "Affichage des données&lt;br&gt;";
            break;
        case 2:
            echo "Ajout de données&lt;br&gt;";
            break;
        case 3:
            echo "Au revoir !&lt;br&gt;";
            break;
    }
    echo "&lt;br&gt;";
} while ($choix != 3);
?&gt;
                </div>
                
                <h4>Boucle foreach</h4>
                <p>La boucle foreach est spécialement conçue pour parcourir les tableaux.</p>
                
                <div class="code-block">
&lt;?php
// Tableau indexé
$fruits = ["pomme", "banane", "orange", "kiwi"];
echo "Fruits disponibles:&lt;br&gt;";
foreach ($fruits as $fruit) {
    echo "- $fruit&lt;br&gt;";
}

// Tableau indexé avec index
echo "&lt;br&gt;Fruits avec index:&lt;br&gt;";
foreach ($fruits as $index => $fruit) {
    echo "$index: $fruit&lt;br&gt;";
}

// Tableau associatif
$personne = [
    "nom" => "Dupont",
    "prenom" => "Jean",
    "age" => 30,
    "ville" => "Paris"
];

echo "&lt;br&gt;Informations personnelles:&lt;br&gt;";
foreach ($personne as $cle => $valeur) {
    echo "$cle: $valeur&lt;br&gt;";
}

// Tableau multidimensionnel
$etudiants = [
    ["nom" => "Martin", "note" => 15],
    ["nom" => "Durand", "note" => 18],
    ["nom" => "Moreau", "note" => 12]
];

echo "&lt;br&gt;Notes des étudiants:&lt;br&gt;";
foreach ($etudiants as $etudiant) {
    echo $etudiant["nom"] . ": " . $etudiant["note"] . "/20&lt;br&gt;";
}
?&gt;
                </div>
                
                <h3>Contrôle de boucles</h3>
                
                <h4>Break et continue</h4>
                <div class="definition">
                    <h4>Break et Continue</h4>
                    <p><span class="syntax-highlight">break</span> sort complètement de la boucle, tandis que <span class="syntax-highlight">continue</span> passe à l'itération suivante.</p>
                </div>
                
                <div class="code-block">
&lt;?php
// Exemple avec break
echo "Exemple avec break (arrêt à 5):&lt;br&gt;";
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        echo "Arrêt à $i&lt;br&gt;";
        break; // Sort de la boucle
    }
    echo "$i ";
}
echo "&lt;br&gt;&lt;br&gt;";

// Exemple avec continue
echo "Exemple avec continue (ignore les pairs):&lt;br&gt;";
for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 == 0) {
        continue; // Passe à l'itération suivante
    }
    echo "$i "; // Affiche seulement les nombres impairs
}
echo "&lt;br&gt;&lt;br&gt;";

// Break avec niveau (boucles imbriquées)
echo "Break avec niveau (boucles imbriquées):&lt;br&gt;";
for ($i = 1; $i <= 3; $i++) {
    echo "Boucle externe: $i&lt;br&gt;";
    for ($j = 1; $j <= 3; $j++) {
        if ($i == 2 && $j == 2) {
            echo "Break niveau 2&lt;br&gt;";
            break 2; // Sort des deux boucles
        }
        echo "  Boucle interne: $j&lt;br&gt;";
    }
}
?&gt;
                </div>
                
                <h3>Syntaxes alternatives</h3>
                <p>PHP propose des syntaxes alternatives pour les structures de contrôle, utiles dans les templates.</p>
                
                <div class="code-block">
&lt;?php
$age = 25;
$fruits = ["pomme", "banane", "orange"];
?&gt;

&lt;!-- Syntaxe alternative pour if --&gt;
&lt;?php if ($age >= 18): ?&gt;
    &lt;p&gt;Vous êtes majeur&lt;/p&gt;
&lt;?php else: ?&gt;
    &lt;p&gt;Vous êtes mineur&lt;/p&gt;
&lt;?php endif; ?&gt;

&lt;!-- Syntaxe alternative pour foreach --&gt;
&lt;ul&gt;
&lt;?php foreach ($fruits as $fruit): ?&gt;
    &lt;li&gt;&lt;?= $fruit ?&gt;&lt;/li&gt;
&lt;?php endforeach; ?&gt;
&lt;/ul&gt;

&lt;!-- Syntaxe alternative pour for --&gt;
&lt;?php for ($i = 1; $i <= 3; $i++): ?&gt;
    &lt;p&gt;Paragraphe numéro &lt;?= $i ?&gt;&lt;/p&gt;
&lt;?php endfor; ?&gt;
                </div>
                
                <div class="tip">
                    Les syntaxes alternatives sont particulièrement utiles quand vous mélangez PHP et HTML, car elles rendent le code plus lisible.
                </div>
            </div>
        </div>

        <div class="navigation">
            <a href="index.php" class="nav-link">← Retour au sommaire</a>
            <span>Partie 1/8</span>
            <a href="partie2-procedurale.php" class="nav-link">Partie 2: Programmation Procédurale →</a>
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