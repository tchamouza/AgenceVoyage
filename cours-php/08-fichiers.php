<?php
/**
 * COURS PHP COMPLET - CHAPITRE 8: GESTION DES FICHIERS
 * ====================================================
 */

echo "<h1>Chapitre 8: Gestion des fichiers</h1>";

// 1. LECTURE DE FICHIERS
echo "<h2>1. Lecture de fichiers</h2>";

// Créer un fichier de test
$contenuTest = "Ligne 1\nLigne 2\nLigne 3\nBonjour le monde!";
file_put_contents('test.txt', $contenuTest);

// Lire tout le fichier
$contenu = file_get_contents('test.txt');
echo "Contenu complet:<br>" . nl2br($contenu) . "<br><br>";

// Lire ligne par ligne
$lignes = file('test.txt');
echo "Lecture ligne par ligne:<br>";
foreach ($lignes as $numero => $ligne) {
    echo "Ligne " . ($numero + 1) . ": " . trim($ligne) . "<br>";
}

// 2. ÉCRITURE DE FICHIERS
echo "<h2>2. Écriture de fichiers</h2>";

// Écrire (écrase le contenu)
file_put_contents('nouveau.txt', "Nouveau contenu");
echo "Fichier 'nouveau.txt' créé<br>";

// Ajouter du contenu
file_put_contents('nouveau.txt', "\nLigne ajoutée", FILE_APPEND);
echo "Contenu ajouté au fichier<br>";

// Lire le résultat
echo "Contenu de nouveau.txt:<br>" . nl2br(file_get_contents('nouveau.txt')) . "<br><br>";

// 3. MANIPULATION AVEC FOPEN/FCLOSE
echo "<h2>3. Manipulation avec fopen/fclose</h2>";

// Ouvrir en lecture
$fichier = fopen('test.txt', 'r');
if ($fichier) {
    echo "Lecture avec fgets():<br>";
    while (($ligne = fgets($fichier)) !== false) {
        echo "- " . trim($ligne) . "<br>";
    }
    fclose($fichier);
}

// Ouvrir en écriture
$fichier = fopen('ecriture.txt', 'w');
if ($fichier) {
    fwrite($fichier, "Première ligne\n");
    fwrite($fichier, "Deuxième ligne\n");
    fwrite($fichier, "Troisième ligne\n");
    fclose($fichier);
    echo "Fichier 'ecriture.txt' créé avec fwrite()<br>";
}

// 4. MODES D'OUVERTURE
echo "<h2>4. Modes d'ouverture</h2>";

$modes = [
    'r' => 'Lecture seule',
    'r+' => 'Lecture/écriture',
    'w' => 'Écriture (écrase)',
    'w+' => 'Lecture/écriture (écrase)',
    'a' => 'Écriture (ajoute à la fin)',
    'a+' => 'Lecture/écriture (ajoute à la fin)',
    'x' => 'Création et écriture (échec si existe)',
    'c' => 'Ouvre pour écriture seulement'
];

echo "Modes d'ouverture:<br>";
foreach ($modes as $mode => $description) {
    echo "$mode: $description<br>";
}

// 5. INFORMATIONS SUR LES FICHIERS
echo "<h2>5. Informations sur les fichiers</h2>";

$fichier = 'test.txt';

if (file_exists($fichier)) {
    echo "Le fichier '$fichier' existe<br>";
    echo "Taille: " . filesize($fichier) . " octets<br>";
    echo "Dernière modification: " . date('Y-m-d H:i:s', filemtime($fichier)) . "<br>";
    echo "Dernier accès: " . date('Y-m-d H:i:s', fileatime($fichier)) . "<br>";
    echo "Permissions: " . substr(sprintf('%o', fileperms($fichier)), -4) . "<br>";
    echo "Est un fichier: " . (is_file($fichier) ? 'oui' : 'non') . "<br>";
    echo "Est un dossier: " . (is_dir($fichier) ? 'oui' : 'non') . "<br>";
    echo "Est lisible: " . (is_readable($fichier) ? 'oui' : 'non') . "<br>";
    echo "Est modifiable: " . (is_writable($fichier) ? 'oui' : 'non') . "<br>";
}

// 6. GESTION DES DOSSIERS
echo "<h2>6. Gestion des dossiers</h2>";

$dossier = 'mon_dossier';

// Créer un dossier
if (!is_dir($dossier)) {
    mkdir($dossier, 0755);
    echo "Dossier '$dossier' créé<br>";
}

// Lister le contenu d'un dossier
echo "Contenu du dossier courant:<br>";
$contenu = scandir('.');
foreach ($contenu as $element) {
    if ($element != '.' && $element != '..') {
        $type = is_dir($element) ? '[DOSSIER]' : '[FICHIER]';
        echo "$type $element<br>";
    }
}

// Utilisation de glob
echo "<br>Fichiers .txt:<br>";
$fichiersTxt = glob('*.txt');
foreach ($fichiersTxt as $fichier) {
    echo "- $fichier<br>";
}

// 7. COPIE, DÉPLACEMENT, SUPPRESSION
echo "<h2>7. Copie, déplacement, suppression</h2>";

// Copier un fichier
if (copy('test.txt', 'copie_test.txt')) {
    echo "Fichier copié vers 'copie_test.txt'<br>";
}

// Renommer/déplacer un fichier
if (rename('copie_test.txt', $dossier . '/test_deplace.txt')) {
    echo "Fichier déplacé vers '$dossier/test_deplace.txt'<br>";
}

// Supprimer un fichier
if (file_exists('nouveau.txt')) {
    unlink('nouveau.txt');
    echo "Fichier 'nouveau.txt' supprimé<br>";
}

// 8. UPLOAD DE FICHIERS
echo "<h2>8. Upload de fichiers</h2>";

// Exemple de traitement d'upload (simulation)
echo "Exemple de traitement d'upload:<br>";
echo "<pre>";
echo "if (\$_FILES['upload']['error'] === UPLOAD_ERR_OK) {
    \$tmpName = \$_FILES['upload']['tmp_name'];
    \$name = \$_FILES['upload']['name'];
    \$size = \$_FILES['upload']['size'];
    \$type = \$_FILES['upload']['type'];
    
    // Vérifications
    if (\$size > 1000000) { // 1MB max
        echo 'Fichier trop volumineux';
    } else {
        \$destination = 'uploads/' . basename(\$name);
        if (move_uploaded_file(\$tmpName, \$destination)) {
            echo 'Upload réussi';
        }
    }
}";
echo "</pre>";

// 9. LECTURE CSV
echo "<h2>9. Lecture CSV</h2>";

// Créer un fichier CSV de test
$csvData = "nom,prenom,age\nDupont,Jean,30\nMartin,Marie,25\nDurand,Pierre,35";
file_put_contents('test.csv', $csvData);

echo "Lecture du fichier CSV:<br>";
if (($handle = fopen('test.csv', 'r')) !== false) {
    $headers = fgetcsv($handle);
    echo "En-têtes: " . implode(', ', $headers) . "<br><br>";
    
    while (($data = fgetcsv($handle)) !== false) {
        echo "Ligne: " . implode(', ', $data) . "<br>";
    }
    fclose($handle);
}

// 10. ÉCRITURE CSV
echo "<h2>10. Écriture CSV</h2>";

$donnees = [
    ['nom', 'prenom', 'ville'],
    ['Dubois', 'Paul', 'Paris'],
    ['Moreau', 'Sophie', 'Lyon'],
    ['Petit', 'Marc', 'Marseille']
];

$fichier = fopen('export.csv', 'w');
foreach ($donnees as $ligne) {
    fputcsv($fichier, $ligne);
}
fclose($fichier);
echo "Fichier CSV 'export.csv' créé<br>";

// 11. LECTURE JSON
echo "<h2>11. Lecture/Écriture JSON</h2>";

// Créer des données JSON
$data = [
    'utilisateurs' => [
        ['nom' => 'Dupont', 'age' => 30],
        ['nom' => 'Martin', 'age' => 25]
    ],
    'total' => 2
];

// Écrire JSON
file_put_contents('data.json', json_encode($data, JSON_PRETTY_PRINT));
echo "Fichier JSON créé<br>";

// Lire JSON
$jsonContent = file_get_contents('data.json');
$decodedData = json_decode($jsonContent, true);

echo "Données JSON lues:<br>";
echo "Total: " . $decodedData['total'] . "<br>";
foreach ($decodedData['utilisateurs'] as $user) {
    echo "- " . $user['nom'] . " (" . $user['age'] . " ans)<br>";
}

// 12. GESTION D'ERREURS
echo "<h2>12. Gestion d'erreurs</h2>";

// Lecture sécurisée
function lireFichierSecurise($nomFichier) {
    if (!file_exists($nomFichier)) {
        return "Erreur: Le fichier n'existe pas";
    }
    
    if (!is_readable($nomFichier)) {
        return "Erreur: Le fichier n'est pas lisible";
    }
    
    $contenu = file_get_contents($nomFichier);
    if ($contenu === false) {
        return "Erreur: Impossible de lire le fichier";
    }
    
    return $contenu;
}

echo "Test lecture sécurisée:<br>";
echo "Fichier existant: " . (strlen(lireFichierSecurise('test.txt')) > 50 ? "OK" : "Erreur") . "<br>";
echo "Fichier inexistant: " . lireFichierSecurise('inexistant.txt') . "<br>";

// 13. NETTOYAGE
echo "<h2>13. Nettoyage des fichiers de test</h2>";

$fichiersASupprimer = ['test.txt', 'ecriture.txt', 'test.csv', 'export.csv', 'data.json'];

foreach ($fichiersASupprimer as $fichier) {
    if (file_exists($fichier)) {
        unlink($fichier);
        echo "Supprimé: $fichier<br>";
    }
}

// Supprimer le dossier et son contenu
if (is_dir($dossier)) {
    $fichiersDossier = glob($dossier . '/*');
    foreach ($fichiersDossier as $fichier) {
        unlink($fichier);
    }
    rmdir($dossier);
    echo "Dossier '$dossier' supprimé<br>";
}

?>