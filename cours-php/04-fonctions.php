<?php
/**
 * COURS PHP COMPLET - CHAPITRE 4: FONCTIONS
 * =========================================
 */

echo "<h1>Chapitre 4: Fonctions</h1>";

// 1. DÉCLARATION ET APPEL DE FONCTION
echo "<h2>1. Déclaration et appel de fonction</h2>";

function direBonjour() {
    return "Bonjour tout le monde!";
}

echo direBonjour() . "<br>";

// 2. FONCTIONS AVEC PARAMÈTRES
echo "<h2>2. Fonctions avec paramètres</h2>";

function saluer($nom) {
    return "Bonjour $nom!";
}

function additionner($a, $b) {
    return $a + $b;
}

echo saluer("Jean") . "<br>";
echo "5 + 3 = " . additionner(5, 3) . "<br>";

// 3. PARAMÈTRES PAR DÉFAUT
echo "<h2>3. Paramètres par défaut</h2>";

function saluerAvecTitre($nom, $titre = "M.") {
    return "Bonjour $titre $nom!";
}

echo saluerAvecTitre("Dupont") . "<br>";
echo saluerAvecTitre("Martin", "Mme") . "<br>";

// 4. NOMBRE VARIABLE DE PARAMÈTRES
echo "<h2>4. Nombre variable de paramètres</h2>";

function somme(...$nombres) {
    $total = 0;
    foreach ($nombres as $nombre) {
        $total += $nombre;
    }
    return $total;
}

echo "Somme(1, 2, 3) = " . somme(1, 2, 3) . "<br>";
echo "Somme(1, 2, 3, 4, 5) = " . somme(1, 2, 3, 4, 5) . "<br>";

// 5. PASSAGE PAR RÉFÉRENCE
echo "<h2>5. Passage par référence</h2>";

function incrementer(&$nombre) {
    $nombre++;
}

$valeur = 5;
echo "Avant: $valeur<br>";
incrementer($valeur);
echo "Après: $valeur<br>";

// 6. FONCTIONS ANONYMES (CLOSURES)
echo "<h2>6. Fonctions anonymes</h2>";

$multiplier = function($a, $b) {
    return $a * $b;
};

echo "3 × 4 = " . $multiplier(3, 4) . "<br>";

// Fonction anonyme avec use
$facteur = 10;
$multiplierParFacteur = function($nombre) use ($facteur) {
    return $nombre * $facteur;
};

echo "5 × $facteur = " . $multiplierParFacteur(5) . "<br>";

// 7. FONCTIONS FLÉCHÉES (PHP 7.4+)
echo "<h2>7. Fonctions fléchées (PHP 7.4+)</h2>";

$carre = fn($x) => $x * $x;
echo "Carré de 4 = " . $carre(4) . "<br>";

// 8. FONCTIONS RÉCURSIVES
echo "<h2>8. Fonctions récursives</h2>";

function factorielle($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorielle($n - 1);
}

echo "Factorielle de 5 = " . factorielle(5) . "<br>";

// 9. PORTÉE DES VARIABLES
echo "<h2>9. Portée des variables</h2>";

$globale = "Variable globale";

function testerPortee() {
    global $globale;
    $locale = "Variable locale";
    
    echo "Dans la fonction - Globale: $globale<br>";
    echo "Dans la fonction - Locale: $locale<br>";
}

testerPortee();
echo "Hors fonction - Globale: $globale<br>";
// echo "Hors fonction - Locale: $locale<br>"; // Erreur!

// 10. VARIABLES STATIQUES
echo "<h2>10. Variables statiques</h2>";

function compteur() {
    static $compte = 0;
    $compte++;
    return $compte;
}

echo "Appel 1: " . compteur() . "<br>";
echo "Appel 2: " . compteur() . "<br>";
echo "Appel 3: " . compteur() . "<br>";

// 11. FONCTIONS DE CALLBACK
echo "<h2>11. Fonctions de callback</h2>";

function appliquerOperation($a, $b, $callback) {
    return $callback($a, $b);
}

$addition = function($x, $y) { return $x + $y; };
$multiplication = function($x, $y) { return $x * $y; };

echo "Callback addition: " . appliquerOperation(5, 3, $addition) . "<br>";
echo "Callback multiplication: " . appliquerOperation(5, 3, $multiplication) . "<br>";

// 12. FONCTIONS INTÉGRÉES UTILES
echo "<h2>12. Fonctions intégrées utiles</h2>";

// Fonctions de chaînes
$texte = "  Hello World  ";
echo "strlen('$texte') = " . strlen($texte) . "<br>";
echo "trim('$texte') = '" . trim($texte) . "'<br>";
echo "strtoupper('$texte') = '" . strtoupper($texte) . "'<br>";
echo "strtolower('$texte') = '" . strtolower($texte) . "'<br>";

// Fonctions de tableaux
$nombres = [3, 1, 4, 1, 5, 9];
echo "count(\$nombres) = " . count($nombres) . "<br>";
echo "max(\$nombres) = " . max($nombres) . "<br>";
echo "min(\$nombres) = " . min($nombres) . "<br>";
echo "array_sum(\$nombres) = " . array_sum($nombres) . "<br>";

// Fonctions mathématiques
echo "abs(-5) = " . abs(-5) . "<br>";
echo "round(3.7) = " . round(3.7) . "<br>";
echo "ceil(3.2) = " . ceil(3.2) . "<br>";
echo "floor(3.8) = " . floor(3.8) . "<br>";
echo "rand(1, 10) = " . rand(1, 10) . "<br>";

?>