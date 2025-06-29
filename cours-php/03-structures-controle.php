<?php
/**
 * COURS PHP COMPLET - CHAPITRE 3: STRUCTURES DE CONTRÔLE
 * ======================================================
 */

echo "<h1>Chapitre 3: Structures de contrôle</h1>";

// 1. STRUCTURE IF/ELSE
echo "<h2>1. Structure if/else</h2>";

$age = 20;

if ($age >= 18) {
    echo "Vous êtes majeur<br>";
} else {
    echo "Vous êtes mineur<br>";
}

// If/elseif/else
$note = 15;

if ($note >= 16) {
    echo "Mention très bien<br>";
} elseif ($note >= 14) {
    echo "Mention bien<br>";
} elseif ($note >= 12) {
    echo "Mention assez bien<br>";
} elseif ($note >= 10) {
    echo "Passable<br>";
} else {
    echo "Échec<br>";
}

// 2. STRUCTURE SWITCH
echo "<h2>2. Structure switch</h2>";

$jour = "lundi";

switch ($jour) {
    case "lundi":
        echo "Début de semaine<br>";
        break;
    case "mardi":
    case "mercredi":
    case "jeudi":
        echo "Milieu de semaine<br>";
        break;
    case "vendredi":
        echo "Fin de semaine<br>";
        break;
    case "samedi":
    case "dimanche":
        echo "Week-end<br>";
        break;
    default:
        echo "Jour invalide<br>";
}

// 3. BOUCLE FOR
echo "<h2>3. Boucle for</h2>";

echo "Comptage de 1 à 5:<br>";
for ($i = 1; $i <= 5; $i++) {
    echo "Nombre: $i<br>";
}

// Boucle for avec pas différent
echo "Nombres pairs de 0 à 10:<br>";
for ($i = 0; $i <= 10; $i += 2) {
    echo "$i ";
}
echo "<br>";

// 4. BOUCLE WHILE
echo "<h2>4. Boucle while</h2>";

$compteur = 1;
echo "Boucle while de 1 à 3:<br>";
while ($compteur <= 3) {
    echo "Compteur: $compteur<br>";
    $compteur++;
}

// 5. BOUCLE DO-WHILE
echo "<h2>5. Boucle do-while</h2>";

$nombre = 1;
echo "Boucle do-while:<br>";
do {
    echo "Nombre: $nombre<br>";
    $nombre++;
} while ($nombre <= 3);

// 6. BOUCLE FOREACH
echo "<h2>6. Boucle foreach</h2>";

// Tableau indexé
$fruits = ["pomme", "banane", "orange"];
echo "Fruits:<br>";
foreach ($fruits as $fruit) {
    echo "- $fruit<br>";
}

// Tableau associatif
$personne = [
    "nom" => "Dupont",
    "prenom" => "Jean",
    "age" => 30
];

echo "Informations personnelles:<br>";
foreach ($personne as $cle => $valeur) {
    echo "$cle: $valeur<br>";
}

// Foreach avec index
echo "Fruits avec index:<br>";
foreach ($fruits as $index => $fruit) {
    echo "$index: $fruit<br>";
}

// 7. BREAK ET CONTINUE
echo "<h2>7. Break et continue</h2>";

echo "Exemple avec break:<br>";
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        break; // Sort de la boucle
    }
    echo "$i ";
}
echo "<br>";

echo "Exemple avec continue:<br>";
for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 == 0) {
        continue; // Passe à l'itération suivante
    }
    echo "$i "; // Affiche seulement les nombres impairs
}
echo "<br>";

// 8. STRUCTURES ALTERNATIVES
echo "<h2>8. Structures alternatives</h2>";

// Syntaxe alternative pour if
$condition = true;
if ($condition):
    echo "Condition vraie avec syntaxe alternative<br>";
endif;

// Syntaxe alternative pour foreach
echo "Fruits avec syntaxe alternative:<br>";
foreach ($fruits as $fruit):
    echo "- $fruit<br>";
endforeach;

// 9. MATCH (PHP 8+)
echo "<h2>9. Match (PHP 8+)</h2>";

$grade = 'B';
$message = match($grade) {
    'A' => 'Excellent',
    'B' => 'Bien',
    'C' => 'Moyen',
    'D' => 'Passable',
    'F' => 'Échec',
    default => 'Grade invalide'
};
echo "Grade $grade: $message<br>";

// 10. GOTO (déconseillé)
echo "<h2>10. Goto (déconseillé)</h2>";

$i = 0;
debut:
echo "i = $i<br>";
$i++;
if ($i < 3) {
    goto debut;
}
echo "Fin du goto<br>";

?>