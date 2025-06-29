<?php
/**
 * COURS PHP COMPLET - CHAPITRE 5: TABLEAUX
 * ========================================
 */

echo "<h1>Chapitre 5: Tableaux</h1>";

// 1. CRÉATION DE TABLEAUX
echo "<h2>1. Création de tableaux</h2>";

// Tableau indexé
$fruits = array("pomme", "banane", "orange");
$legumes = ["carotte", "brocoli", "épinard"]; // Syntaxe courte (PHP 5.4+)

echo "Fruits: " . implode(", ", $fruits) . "<br>";
echo "Légumes: " . implode(", ", $legumes) . "<br>";

// Tableau associatif
$personne = array(
    "nom" => "Dupont",
    "prenom" => "Jean",
    "age" => 30
);

$voiture = [
    "marque" => "Toyota",
    "modele" => "Corolla",
    "annee" => 2020
];

// 2. ACCÈS AUX ÉLÉMENTS
echo "<h2>2. Accès aux éléments</h2>";

echo "Premier fruit: " . $fruits[0] . "<br>";
echo "Deuxième légume: " . $legumes[1] . "<br>";
echo "Nom: " . $personne["nom"] . "<br>";
echo "Marque voiture: " . $voiture["marque"] . "<br>";

// 3. MODIFICATION DES ÉLÉMENTS
echo "<h2>3. Modification des éléments</h2>";

$fruits[0] = "poire";
$personne["age"] = 31;

echo "Premier fruit modifié: " . $fruits[0] . "<br>";
echo "Nouvel âge: " . $personne["age"] . "<br>";

// 4. AJOUT D'ÉLÉMENTS
echo "<h2>4. Ajout d'éléments</h2>";

// Ajout à la fin
$fruits[] = "kiwi";
array_push($legumes, "tomate", "concombre");

// Ajout avec clé spécifique
$personne["ville"] = "Paris";

echo "Fruits après ajout: " . implode(", ", $fruits) . "<br>";
echo "Légumes après ajout: " . implode(", ", $legumes) . "<br>";
echo "Ville ajoutée: " . $personne["ville"] . "<br>";

// 5. SUPPRESSION D'ÉLÉMENTS
echo "<h2>5. Suppression d'éléments</h2>";

unset($fruits[1]); // Supprime "banane"
unset($personne["ville"]);

echo "Fruits après suppression: " . implode(", ", $fruits) . "<br>";

// array_pop et array_shift
$dernierLegume = array_pop($legumes);
$premierLegume = array_shift($legumes);

echo "Dernier légume supprimé: $dernierLegume<br>";
echo "Premier légume supprimé: $premierLegume<br>";
echo "Légumes restants: " . implode(", ", $legumes) . "<br>";

// 6. TABLEAUX MULTIDIMENSIONNELS
echo "<h2>6. Tableaux multidimensionnels</h2>";

$etudiants = [
    [
        "nom" => "Martin",
        "notes" => [15, 12, 18]
    ],
    [
        "nom" => "Durand",
        "notes" => [14, 16, 13]
    ]
];

echo "Premier étudiant: " . $etudiants[0]["nom"] . "<br>";
echo "Première note du premier étudiant: " . $etudiants[0]["notes"][0] . "<br>";

// 7. PARCOURS DE TABLEAUX
echo "<h2>7. Parcours de tableaux</h2>";

// Avec foreach
echo "Parcours avec foreach:<br>";
foreach ($fruits as $index => $fruit) {
    if (isset($fruit)) { // Vérifier si l'élément existe
        echo "$index: $fruit<br>";
    }
}

// Avec for (tableaux indexés)
echo "Parcours avec for:<br>";
$nombres = [1, 2, 3, 4, 5];
for ($i = 0; $i < count($nombres); $i++) {
    echo "Index $i: " . $nombres[$i] . "<br>";
}

// 8. FONCTIONS DE TABLEAUX UTILES
echo "<h2>8. Fonctions de tableaux utiles</h2>";

$nombres = [3, 1, 4, 1, 5, 9, 2, 6];

echo "Tableau original: " . implode(", ", $nombres) . "<br>";
echo "Nombre d'éléments: " . count($nombres) . "<br>";
echo "Somme: " . array_sum($nombres) . "<br>";
echo "Maximum: " . max($nombres) . "<br>";
echo "Minimum: " . min($nombres) . "<br>";

// Tri
sort($nombres);
echo "Tri croissant: " . implode(", ", $nombres) . "<br>";

rsort($nombres);
echo "Tri décroissant: " . implode(", ", $nombres) . "<br>";

// 9. RECHERCHE DANS LES TABLEAUX
echo "<h2>9. Recherche dans les tableaux</h2>";

$couleurs = ["rouge", "vert", "bleu", "jaune"];

echo "Recherche 'bleu': " . (in_array("bleu", $couleurs) ? "trouvé" : "non trouvé") . "<br>";
echo "Position de 'vert': " . array_search("vert", $couleurs) . "<br>";

$cle = array_key_exists("nom", $personne);
echo "Clé 'nom' existe: " . ($cle ? "oui" : "non") . "<br>";

// 10. FILTRAGE ET TRANSFORMATION
echo "<h2>10. Filtrage et transformation</h2>";

$nombres = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// Filtrer les nombres pairs
$pairs = array_filter($nombres, function($n) {
    return $n % 2 == 0;
});
echo "Nombres pairs: " . implode(", ", $pairs) . "<br>";

// Transformer (multiplier par 2)
$doubles = array_map(function($n) {
    return $n * 2;
}, $nombres);
echo "Nombres doublés: " . implode(", ", $doubles) . "<br>";

// Réduire (somme)
$somme = array_reduce($nombres, function($carry, $item) {
    return $carry + $item;
}, 0);
echo "Somme avec array_reduce: $somme<br>";

// 11. FUSION ET INTERSECTION
echo "<h2>11. Fusion et intersection</h2>";

$array1 = [1, 2, 3];
$array2 = [3, 4, 5];

$fusion = array_merge($array1, $array2);
echo "Fusion: " . implode(", ", $fusion) . "<br>";

$intersection = array_intersect($array1, $array2);
echo "Intersection: " . implode(", ", $intersection) . "<br>";

$difference = array_diff($array1, $array2);
echo "Différence: " . implode(", ", $difference) . "<br>";

// 12. EXTRACTION DE PARTIES
echo "<h2>12. Extraction de parties</h2>";

$alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g'];

$partie = array_slice($alphabet, 2, 3);
echo "Partie (index 2, 3 éléments): " . implode(", ", $partie) . "<br>";

$premiers = array_slice($alphabet, 0, 3);
echo "3 premiers: " . implode(", ", $premiers) . "<br>";

$derniers = array_slice($alphabet, -3);
echo "3 derniers: " . implode(", ", $derniers) . "<br>";

// 13. CONVERSION CLÉS/VALEURS
echo "<h2>13. Conversion clés/valeurs</h2>";

$donnees = ["nom" => "Jean", "age" => 30, "ville" => "Paris"];

$cles = array_keys($donnees);
$valeurs = array_values($donnees);

echo "Clés: " . implode(", ", $cles) . "<br>";
echo "Valeurs: " . implode(", ", $valeurs) . "<br>";

// Inverser clés et valeurs
$inverse = array_flip($donnees);
print_r($inverse);

?>