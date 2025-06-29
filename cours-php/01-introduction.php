<?php
/**
 * COURS PHP COMPLET - CHAPITRE 1: INTRODUCTION
 * ============================================
 */

echo "<h1>Chapitre 1: Introduction à PHP</h1>";

// 1. QU'EST-CE QUE PHP ?
echo "<h2>1. Qu'est-ce que PHP ?</h2>";
echo "<p>PHP (PHP: Hypertext Preprocessor) est un langage de programmation côté serveur.</p>";

// 2. SYNTAXE DE BASE
echo "<h2>2. Syntaxe de base</h2>";

// Les balises PHP
echo "<!-- Balises PHP -->";
// <?php ... ?> - Balises complètes (recommandées)
// <? ... ?> - Balises courtes (déconseillées)

// 3. COMMENTAIRES
echo "<h2>3. Commentaires</h2>";

// Commentaire sur une ligne
/* 
   Commentaire 
   sur plusieurs 
   lignes 
*/
/**
 * Commentaire de documentation
 * @param string $param Description
 * @return bool
 */

// 4. AFFICHAGE
echo "<h2>4. Affichage</h2>";

echo "Hello World avec echo<br>";
print "Hello World avec print<br>";
printf("Hello %s avec printf<br>", "World");

// 5. VARIABLES
echo "<h2>5. Variables</h2>";

$nom = "Jean";
$age = 25;
$prix = 19.99;
$actif = true;

echo "Nom: $nom<br>";
echo "Age: $age<br>";
echo "Prix: $prix<br>";
echo "Actif: " . ($actif ? 'Oui' : 'Non') . "<br>";

// 6. CONSTANTES
echo "<h2>6. Constantes</h2>";

define('SITE_NAME', 'Mon Site');
const VERSION = '1.0.0';

echo "Site: " . SITE_NAME . "<br>";
echo "Version: " . VERSION . "<br>";

// 7. TYPES DE DONNÉES
echo "<h2>7. Types de données</h2>";

$string = "Chaîne de caractères";
$integer = 42;
$float = 3.14;
$boolean = true;
$array = [1, 2, 3];
$null = null;

echo "String: " . gettype($string) . "<br>";
echo "Integer: " . gettype($integer) . "<br>";
echo "Float: " . gettype($float) . "<br>";
echo "Boolean: " . gettype($boolean) . "<br>";
echo "Array: " . gettype($array) . "<br>";
echo "Null: " . gettype($null) . "<br>";

// 8. VÉRIFICATION DE TYPES
echo "<h2>8. Vérification de types</h2>";

echo "is_string(\$string): " . (is_string($string) ? 'true' : 'false') . "<br>";
echo "is_int(\$integer): " . (is_int($integer) ? 'true' : 'false') . "<br>";
echo "is_float(\$float): " . (is_float($float) ? 'true' : 'false') . "<br>";
echo "is_bool(\$boolean): " . (is_bool($boolean) ? 'true' : 'false') . "<br>";
echo "is_array(\$array): " . (is_array($array) ? 'true' : 'false') . "<br>";
echo "is_null(\$null): " . (is_null($null) ? 'true' : 'false') . "<br>";

?>