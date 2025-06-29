<?php
/**
 * COURS PHP COMPLET - CHAPITRE 2: OPÉRATEURS
 * ==========================================
 */

echo "<h1>Chapitre 2: Opérateurs</h1>";

// 1. OPÉRATEURS ARITHMÉTIQUES
echo "<h2>1. Opérateurs arithmétiques</h2>";

$a = 10;
$b = 3;

echo "$a + $b = " . ($a + $b) . "<br>";      // Addition
echo "$a - $b = " . ($a - $b) . "<br>";      // Soustraction
echo "$a * $b = " . ($a * $b) . "<br>";      // Multiplication
echo "$a / $b = " . ($a / $b) . "<br>";      // Division
echo "$a % $b = " . ($a % $b) . "<br>";      // Modulo
echo "$a ** $b = " . ($a ** $b) . "<br>";    // Exponentiation

// 2. OPÉRATEURS D'ASSIGNATION
echo "<h2>2. Opérateurs d'assignation</h2>";

$x = 5;
echo "x = $x<br>";

$x += 3;  // $x = $x + 3
echo "x += 3 → x = $x<br>";

$x -= 2;  // $x = $x - 2
echo "x -= 2 → x = $x<br>";

$x *= 2;  // $x = $x * 2
echo "x *= 2 → x = $x<br>";

$x /= 3;  // $x = $x / 3
echo "x /= 3 → x = $x<br>";

// 3. OPÉRATEURS DE COMPARAISON
echo "<h2>3. Opérateurs de comparaison</h2>";

$a = 5;
$b = "5";
$c = 10;

echo "a = $a, b = '$b', c = $c<br>";
echo "a == b: " . ($a == $b ? 'true' : 'false') . " (égalité)<br>";
echo "a === b: " . ($a === $b ? 'true' : 'false') . " (identité)<br>";
echo "a != c: " . ($a != $c ? 'true' : 'false') . " (différent)<br>";
echo "a !== b: " . ($a !== $b ? 'true' : 'false') . " (non identique)<br>";
echo "a < c: " . ($a < $c ? 'true' : 'false') . " (inférieur)<br>";
echo "a > c: " . ($a > $c ? 'true' : 'false') . " (supérieur)<br>";
echo "a <= c: " . ($a <= $c ? 'true' : 'false') . " (inférieur ou égal)<br>";
echo "a >= c: " . ($a >= $c ? 'true' : 'false') . " (supérieur ou égal)<br>";

// 4. OPÉRATEURS LOGIQUES
echo "<h2>4. Opérateurs logiques</h2>";

$vrai = true;
$faux = false;

echo "vrai && faux: " . ($vrai && $faux ? 'true' : 'false') . " (ET)<br>";
echo "vrai || faux: " . ($vrai || $faux ? 'true' : 'false') . " (OU)<br>";
echo "!vrai: " . (!$vrai ? 'true' : 'false') . " (NON)<br>";
echo "vrai and faux: " . ($vrai and $faux ? 'true' : 'false') . " (ET - priorité faible)<br>";
echo "vrai or faux: " . ($vrai or $faux ? 'true' : 'false') . " (OU - priorité faible)<br>";
echo "vrai xor faux: " . ($vrai xor $faux ? 'true' : 'false') . " (OU exclusif)<br>";

// 5. OPÉRATEURS D'INCRÉMENTATION/DÉCRÉMENTATION
echo "<h2>5. Incrémentation/Décrémentation</h2>";

$i = 5;
echo "i = $i<br>";
echo "++i = " . (++$i) . " (pré-incrémentation)<br>";
echo "i++ = " . ($i++) . " (post-incrémentation)<br>";
echo "i = $i<br>";
echo "--i = " . (--$i) . " (pré-décrémentation)<br>";
echo "i-- = " . ($i--) . " (post-décrémentation)<br>";
echo "i = $i<br>";

// 6. OPÉRATEUR TERNAIRE
echo "<h2>6. Opérateur ternaire</h2>";

$age = 18;
$statut = ($age >= 18) ? "Majeur" : "Mineur";
echo "Age: $age → Statut: $statut<br>";

// 7. OPÉRATEUR NULL COALESCING (PHP 7+)
echo "<h2>7. Opérateur Null Coalescing (PHP 7+)</h2>";

$nom = null;
$nomParDefaut = $nom ?? "Anonyme";
echo "Nom: " . ($nom ?? "non défini") . "<br>";
echo "Nom par défaut: $nomParDefaut<br>";

// 8. OPÉRATEURS DE CHAÎNES
echo "<h2>8. Opérateurs de chaînes</h2>";

$prenom = "Jean";
$nom = "Dupont";
$nomComplet = $prenom . " " . $nom;  // Concaténation
echo "Nom complet: $nomComplet<br>";

$message = "Bonjour ";
$message .= $prenom;  // Concaténation avec assignation
echo "Message: $message<br>";

// 9. OPÉRATEURS DE TABLEAUX
echo "<h2>9. Opérateurs de tableaux</h2>";

$array1 = [1, 2, 3];
$array2 = [4, 5, 6];
$union = $array1 + $array2;  // Union

echo "Array1: " . implode(", ", $array1) . "<br>";
echo "Array2: " . implode(", ", $array2) . "<br>";
echo "Union: " . implode(", ", $union) . "<br>";

$egal = ($array1 == $array2);
$identique = ($array1 === $array2);
echo "Array1 == Array2: " . ($egal ? 'true' : 'false') . "<br>";
echo "Array1 === Array2: " . ($identique ? 'true' : 'false') . "<br>";

?>