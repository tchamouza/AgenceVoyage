<?php
/**
 * COURS PHP COMPLET - CHAPITRE 6: CHAÎNES DE CARACTÈRES
 * =====================================================
 */

echo "<h1>Chapitre 6: Chaînes de caractères</h1>";

// 1. CRÉATION DE CHAÎNES
echo "<h2>1. Création de chaînes</h2>";

$simple = 'Chaîne simple';
$double = "Chaîne avec guillemets doubles";
$heredoc = <<<EOT
Chaîne Heredoc
sur plusieurs lignes
avec variables: $simple
EOT;

$nowdoc = <<<'EOT'
Chaîne Nowdoc
sans interprétation de variables: $simple
EOT;

echo "Simple: $simple<br>";
echo "Double: $double<br>";
echo "Heredoc: " . nl2br($heredoc) . "<br>";
echo "Nowdoc: " . nl2br($nowdoc) . "<br>";

// 2. CONCATÉNATION
echo "<h2>2. Concaténation</h2>";

$prenom = "Jean";
$nom = "Dupont";

$nomComplet1 = $prenom . " " . $nom;
$nomComplet2 = "$prenom $nom";
$nomComplet3 = "{$prenom} {$nom}";

echo "Méthode 1: $nomComplet1<br>";
echo "Méthode 2: $nomComplet2<br>";
echo "Méthode 3: $nomComplet3<br>";

// 3. LONGUEUR ET CARACTÈRES
echo "<h2>3. Longueur et caractères</h2>";

$texte = "Bonjour";
echo "Texte: '$texte'<br>";
echo "Longueur: " . strlen($texte) . "<br>";
echo "Premier caractère: " . $texte[0] . "<br>";
echo "Dernier caractère: " . $texte[strlen($texte) - 1] . "<br>";

// Parcours caractère par caractère
echo "Caractères: ";
for ($i = 0; $i < strlen($texte); $i++) {
    echo $texte[$i] . " ";
}
echo "<br>";

// 4. RECHERCHE DANS LES CHAÎNES
echo "<h2>4. Recherche dans les chaînes</h2>";

$phrase = "PHP est un langage de programmation";

echo "Phrase: '$phrase'<br>";
echo "Position de 'langage': " . strpos($phrase, "langage") . "<br>";
echo "Dernière position de 'a': " . strrpos($phrase, "a") . "<br>";
echo "Contient 'PHP': " . (strpos($phrase, "PHP") !== false ? "oui" : "non") . "<br>";
echo "Commence par 'PHP': " . (str_starts_with($phrase, "PHP") ? "oui" : "non") . "<br>";
echo "Finit par 'programmation': " . (str_ends_with($phrase, "programmation") ? "oui" : "non") . "<br>";

// 5. EXTRACTION DE SOUS-CHAÎNES
echo "<h2>5. Extraction de sous-chaînes</h2>";

$texte = "Bonjour le monde";
echo "Texte original: '$texte'<br>";
echo "substr(8): '" . substr($texte, 8) . "'<br>";
echo "substr(0, 7): '" . substr($texte, 0, 7) . "'<br>";
echo "substr(-5): '" . substr($texte, -5) . "'<br>";
echo "substr(-5, 2): '" . substr($texte, -5, 2) . "'<br>";

// 6. REMPLACEMENT
echo "<h2>6. Remplacement</h2>";

$texte = "J'aime les pommes et les pommes sont bonnes";
echo "Original: '$texte'<br>";

$nouveau = str_replace("pommes", "oranges", $texte);
echo "Remplacement simple: '$nouveau'<br>";

$nouveau2 = str_replace("pommes", "oranges", $texte, $count);
echo "Remplacement avec compteur: '$nouveau2' ($count remplacements)<br>";

// Remplacement avec tableau
$recherche = ["pommes", "bonnes"];
$remplacement = ["poires", "délicieuses"];
$nouveau3 = str_replace($recherche, $remplacement, $texte);
echo "Remplacement multiple: '$nouveau3'<br>";

// 7. TRANSFORMATION DE CASSE
echo "<h2>7. Transformation de casse</h2>";

$texte = "Bonjour Le Monde";
echo "Original: '$texte'<br>";
echo "Minuscules: '" . strtolower($texte) . "'<br>";
echo "Majuscules: '" . strtoupper($texte) . "'<br>";
echo "Première lettre maj: '" . ucfirst(strtolower($texte)) . "'<br>";
echo "Chaque mot maj: '" . ucwords(strtolower($texte)) . "'<br>";

// 8. NETTOYAGE DES CHAÎNES
echo "<h2>8. Nettoyage des chaînes</h2>";

$texte = "  Bonjour le monde  \n\t";
echo "Original: '" . addslashes($texte) . "'<br>";
echo "trim(): '" . trim($texte) . "'<br>";
echo "ltrim(): '" . ltrim($texte) . "'<br>";
echo "rtrim(): '" . rtrim($texte) . "'<br>";

// Nettoyage personnalisé
$texte2 = "...Bonjour...";
echo "trim personnalisé: '" . trim($texte2, ".") . "'<br>";

// 9. DIVISION ET JOINTURE
echo "<h2>9. Division et jointure</h2>";

$phrase = "pomme,banane,orange,kiwi";
$fruits = explode(",", $phrase);
echo "Phrase: '$phrase'<br>";
echo "Après explode: " . print_r($fruits, true) . "<br>";

$rejointe = implode(" - ", $fruits);
echo "Après implode: '$rejointe'<br>";

// Division avec limite
$texte = "un-deux-trois-quatre-cinq";
$parties = explode("-", $texte, 3);
echo "Division limitée: " . print_r($parties, true) . "<br>";

// 10. FORMATAGE
echo "<h2>10. Formatage</h2>";

$nom = "Jean";
$age = 25;
$prix = 19.99;

echo sprintf("Nom: %s, Age: %d ans, Prix: %.2f€<br>", $nom, $age, $prix);

// Formatage avec printf
printf("Bonjour %s, vous avez %d ans<br>", $nom, $age);

// Formatage de nombres
$nombre = 1234567.89;
echo "Nombre formaté: " . number_format($nombre, 2, ',', ' ') . "<br>";

// 11. ENCODAGE ET ÉCHAPPEMENT
echo "<h2>11. Encodage et échappement</h2>";

$texte = "Texte avec 'apostrophes' et \"guillemets\"";
echo "Original: $texte<br>";
echo "addslashes: " . addslashes($texte) . "<br>";
echo "htmlspecialchars: " . htmlspecialchars($texte) . "<br>";

$html = "<script>alert('XSS')</script>";
echo "HTML dangereux: " . htmlspecialchars($html) . "<br>";

// 12. EXPRESSIONS RÉGULIÈRES (PREG)
echo "<h2>12. Expressions régulières</h2>";

$email = "test@example.com";
$pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

if (preg_match($pattern, $email)) {
    echo "'$email' est un email valide<br>";
} else {
    echo "'$email' n'est pas un email valide<br>";
}

// Extraction avec preg_match
$texte = "Téléphone: 01-23-45-67-89";
if (preg_match("/(\d{2})-(\d{2})-(\d{2})-(\d{2})-(\d{2})/", $texte, $matches)) {
    echo "Numéro trouvé: " . $matches[0] . "<br>";
    echo "Première partie: " . $matches[1] . "<br>";
}

// Remplacement avec regex
$texte = "Les dates sont: 2023-12-25 et 2024-01-01";
$nouveau = preg_replace("/(\d{4})-(\d{2})-(\d{2})/", "$3/$2/$1", $texte);
echo "Dates reformatées: $nouveau<br>";

// 13. FONCTIONS UTILES
echo "<h2>13. Fonctions utiles</h2>";

$texte = "Bonjour le monde";

echo "str_repeat('*', 10): " . str_repeat("*", 10) . "<br>";
echo "str_pad('123', 10, '0', STR_PAD_LEFT): '" . str_pad("123", 10, "0", STR_PAD_LEFT) . "'<br>";
echo "strrev('$texte'): '" . strrev($texte) . "'<br>";
echo "str_shuffle('abcdef'): '" . str_shuffle("abcdef") . "'<br>";

// Comparaison de chaînes
$str1 = "abc";
$str2 = "ABC";
echo "strcmp('$str1', '$str2'): " . strcmp($str1, $str2) . "<br>";
echo "strcasecmp('$str1', '$str2'): " . strcasecmp($str1, $str2) . "<br>";

?>