<?php
/**
 * COURS PHP COMPLET - CHAPITRE 9: BASE DE DONNÉES (PDO)
 * =====================================================
 */

echo "<h1>Chapitre 9: Base de données avec PDO</h1>";

// 1. CONNEXION À LA BASE DE DONNÉES
echo "<h2>1. Connexion à la base de données</h2>";

try {
    // Configuration de la base de données
    $host = 'localhost';
    $dbname = 'cours_php';
    $username = 'root';
    $password = '';
    
    // Création de la connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Configuration des options PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    echo "Connexion à la base de données réussie<br>";
    
} catch (PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage() . "<br>";
    echo "Note: Assurez-vous que MySQL est démarré et que la base 'cours_php' existe<br>";
    exit;
}

// 2. CRÉATION DE TABLES
echo "<h2>2. Création de tables</h2>";

try {
    // Supprimer les tables si elles existent
    $pdo->exec("DROP TABLE IF EXISTS commandes");
    $pdo->exec("DROP TABLE IF EXISTS utilisateurs");
    
    // Créer la table utilisateurs
    $sql = "CREATE TABLE utilisateurs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(100) NOT NULL,
        email VARCHAR(150) UNIQUE NOT NULL,
        age INT,
        date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    $pdo->exec($sql);
    echo "Table 'utilisateurs' créée<br>";
    
    // Créer la table commandes
    $sql = "CREATE TABLE commandes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        utilisateur_id INT,
        produit VARCHAR(100) NOT NULL,
        prix DECIMAL(10,2) NOT NULL,
        date_commande TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id)
    )";
    
    $pdo->exec($sql);
    echo "Table 'commandes' créée<br>";
    
} catch (PDOException $e) {
    echo "Erreur lors de la création des tables: " . $e->getMessage() . "<br>";
}

// 3. INSERTION DE DONNÉES
echo "<h2>3. Insertion de données</h2>";

try {
    // Insertion simple
    $sql = "INSERT INTO utilisateurs (nom, email, age) VALUES ('Jean Dupont', 'jean@example.com', 30)";
    $pdo->exec($sql);
    echo "Utilisateur inséré (méthode exec)<br>";
    
    // Insertion avec requête préparée (recommandée)
    $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email, age) VALUES (?, ?, ?)");
    $stmt->execute(['Marie Martin', 'marie@example.com', 25]);
    echo "Utilisateur inséré (requête préparée avec ?)<br>";
    
    // Insertion avec paramètres nommés
    $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email, age) VALUES (:nom, :email, :age)");
    $stmt->execute([
        ':nom' => 'Pierre Durand',
        ':email' => 'pierre@example.com',
        ':age' => 35
    ]);
    echo "Utilisateur inséré (paramètres nommés)<br>";
    
    // Récupérer l'ID du dernier enregistrement inséré
    $dernierID = $pdo->lastInsertId();
    echo "Dernier ID inséré: $dernierID<br>";
    
    // Insertion multiple
    $utilisateurs = [
        ['Sophie Dubois', 'sophie@example.com', 28],
        ['Marc Moreau', 'marc@example.com', 32],
        ['Alice Petit', 'alice@example.com', 27]
    ];
    
    $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email, age) VALUES (?, ?, ?)");
    foreach ($utilisateurs as $user) {
        $stmt->execute($user);
    }
    echo "Insertion multiple réussie<br>";
    
} catch (PDOException $e) {
    echo "Erreur lors de l'insertion: " . $e->getMessage() . "<br>";
}

// 4. SÉLECTION DE DONNÉES
echo "<h2>4. Sélection de données</h2>";

try {
    // Sélection simple
    $stmt = $pdo->query("SELECT * FROM utilisateurs");
    $utilisateurs = $stmt->fetchAll();
    
    echo "Tous les utilisateurs:<br>";
    foreach ($utilisateurs as $user) {
        echo "- {$user['nom']} ({$user['email']}) - {$user['age']} ans<br>";
    }
    
    // Sélection avec condition
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE age > ?");
    $stmt->execute([30]);
    $utilisateursAges = $stmt->fetchAll();
    
    echo "<br>Utilisateurs de plus de 30 ans:<br>";
    foreach ($utilisateursAges as $user) {
        echo "- {$user['nom']} - {$user['age']} ans<br>";
    }
    
    // Sélection d'un seul enregistrement
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $stmt->execute(['jean@example.com']);
    $utilisateur = $stmt->fetch();
    
    if ($utilisateur) {
        echo "<br>Utilisateur trouvé: {$utilisateur['nom']}<br>";
    }
    
    // Compter les enregistrements
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM utilisateurs");
    $result = $stmt->fetch();
    echo "<br>Nombre total d'utilisateurs: {$result['total']}<br>";
    
} catch (PDOException $e) {
    echo "Erreur lors de la sélection: " . $e->getMessage() . "<br>";
}

// 5. MISE À JOUR DE DONNÉES
echo "<h2>5. Mise à jour de données</h2>";

try {
    // Mise à jour simple
    $stmt = $pdo->prepare("UPDATE utilisateurs SET age = ? WHERE email = ?");
    $stmt->execute([31, 'jean@example.com']);
    
    $rowCount = $stmt->rowCount();
    echo "Nombre de lignes mises à jour: $rowCount<br>";
    
    // Mise à jour multiple
    $stmt = $pdo->prepare("UPDATE utilisateurs SET age = age + 1 WHERE age < ?");
    $stmt->execute([30]);
    
    $rowCount = $stmt->rowCount();
    echo "Utilisateurs rajeunis: $rowCount<br>";
    
} catch (PDOException $e) {
    echo "Erreur lors de la mise à jour: " . $e->getMessage() . "<br>";
}

// 6. SUPPRESSION DE DONNÉES
echo "<h2>6. Suppression de données</h2>";

try {
    // Supprimer un utilisateur spécifique
    $stmt = $pdo->prepare("DELETE FROM utilisateurs WHERE email = ?");
    $stmt->execute(['alice@example.com']);
    
    $rowCount = $stmt->rowCount();
    echo "Utilisateurs supprimés: $rowCount<br>";
    
    // Compter les utilisateurs restants
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM utilisateurs");
    $result = $stmt->fetch();
    echo "Utilisateurs restants: {$result['total']}<br>";
    
} catch (PDOException $e) {
    echo "Erreur lors de la suppression: " . $e->getMessage() . "<br>";
}

// 7. JOINTURES
echo "<h2>7. Jointures</h2>";

try {
    // Insérer quelques commandes
    $commandes = [
        [1, 'Ordinateur portable', 899.99],
        [1, 'Souris', 25.50],
        [2, 'Clavier', 75.00],
        [3, 'Écran', 299.99]
    ];
    
    $stmt = $pdo->prepare("INSERT INTO commandes (utilisateur_id, produit, prix) VALUES (?, ?, ?)");
    foreach ($commandes as $commande) {
        $stmt->execute($commande);
    }
    echo "Commandes insérées<br>";
    
    // Jointure pour afficher les commandes avec les noms d'utilisateurs
    $sql = "SELECT u.nom, u.email, c.produit, c.prix, c.date_commande 
            FROM utilisateurs u 
            INNER JOIN commandes c ON u.id = c.utilisateur_id 
            ORDER BY c.date_commande DESC";
    
    $stmt = $pdo->query($sql);
    $resultats = $stmt->fetchAll();
    
    echo "<br>Commandes avec utilisateurs:<br>";
    foreach ($resultats as $row) {
        echo "- {$row['nom']} a commandé {$row['produit']} pour {$row['prix']}€<br>";
    }
    
    // Jointure avec agrégation
    $sql = "SELECT u.nom, COUNT(c.id) as nb_commandes, SUM(c.prix) as total_depense
            FROM utilisateurs u 
            LEFT JOIN commandes c ON u.id = c.utilisateur_id 
            GROUP BY u.id, u.nom";
    
    $stmt = $pdo->query($sql);
    $statistiques = $stmt->fetchAll();
    
    echo "<br>Statistiques par utilisateur:<br>";
    foreach ($statistiques as $stat) {
        $total = $stat['total_depense'] ?? 0;
        echo "- {$stat['nom']}: {$stat['nb_commandes']} commandes, {$total}€ dépensés<br>";
    }
    
} catch (PDOException $e) {
    echo "Erreur lors des jointures: " . $e->getMessage() . "<br>";
}

// 8. TRANSACTIONS
echo "<h2>8. Transactions</h2>";

try {
    // Commencer une transaction
    $pdo->beginTransaction();
    
    // Insérer un nouvel utilisateur
    $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email, age) VALUES (?, ?, ?)");
    $stmt->execute(['Test Transaction', 'test@example.com', 40]);
    $userId = $pdo->lastInsertId();
    
    // Insérer une commande pour cet utilisateur
    $stmt = $pdo->prepare("INSERT INTO commandes (utilisateur_id, produit, prix) VALUES (?, ?, ?)");
    $stmt->execute([$userId, 'Produit Test', 99.99]);
    
    // Valider la transaction
    $pdo->commit();
    echo "Transaction réussie - Utilisateur et commande créés<br>";
    
} catch (PDOException $e) {
    // Annuler la transaction en cas d'erreur
    $pdo->rollback();
    echo "Transaction annulée: " . $e->getMessage() . "<br>";
}

// 9. REQUÊTES PRÉPARÉES AVANCÉES
echo "<h2>9. Requêtes préparées avancées</h2>";

try {
    // Recherche avec LIKE
    $recherche = 'Jean';
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE nom LIKE ?");
    $stmt->execute(["%$recherche%"]);
    $resultats = $stmt->fetchAll();
    
    echo "Recherche '$recherche':<br>";
    foreach ($resultats as $user) {
        echo "- {$user['nom']}<br>";
    }
    
    // Requête avec IN
    $ages = [25, 30, 35];
    $placeholders = str_repeat('?,', count($ages) - 1) . '?';
    $stmt = $pdo->prepare("SELECT nom, age FROM utilisateurs WHERE age IN ($placeholders)");
    $stmt->execute($ages);
    $resultats = $stmt->fetchAll();
    
    echo "<br>Utilisateurs avec âges spécifiques:<br>";
    foreach ($resultats as $user) {
        echo "- {$user['nom']} ({$user['age']} ans)<br>";
    }
    
} catch (PDOException $e) {
    echo "Erreur dans les requêtes avancées: " . $e->getMessage() . "<br>";
}

// 10. GESTION D'ERREURS ET SÉCURITÉ
echo "<h2>10. Gestion d'erreurs et sécurité</h2>";

// Exemple de fonction sécurisée
function obtenirUtilisateur($pdo, $email) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    } catch (PDOException $e) {
        error_log("Erreur base de données: " . $e->getMessage());
        return false;
    }
}

$user = obtenirUtilisateur($pdo, 'jean@example.com');
if ($user) {
    echo "Utilisateur trouvé: {$user['nom']}<br>";
} else {
    echo "Utilisateur non trouvé ou erreur<br>";
}

// Exemple de validation des données
function creerUtilisateur($pdo, $nom, $email, $age) {
    // Validation
    if (empty($nom) || empty($email)) {
        return "Nom et email requis";
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Email invalide";
    }
    
    if ($age < 0 || $age > 120) {
        return "Âge invalide";
    }
    
    try {
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email, age) VALUES (?, ?, ?)");
        $stmt->execute([$nom, $email, $age]);
        return "Utilisateur créé avec succès";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Violation de contrainte unique
            return "Cet email existe déjà";
        }
        return "Erreur lors de la création";
    }
}

echo creerUtilisateur($pdo, "Test Validation", "validation@example.com", 25) . "<br>";
echo creerUtilisateur($pdo, "Test Validation", "validation@example.com", 25) . "<br>"; // Doublon

// 11. PAGINATION
echo "<h2>11. Pagination</h2>";

try {
    $page = 1;
    $parPage = 3;
    $offset = ($page - 1) * $parPage;
    
    // Compter le total
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM utilisateurs");
    $total = $stmt->fetch()['total'];
    
    // Récupérer la page
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs LIMIT ? OFFSET ?");
    $stmt->execute([$parPage, $offset]);
    $utilisateurs = $stmt->fetchAll();
    
    echo "Page $page (Total: $total utilisateurs):<br>";
    foreach ($utilisateurs as $user) {
        echo "- {$user['nom']}<br>";
    }
    
    $totalPages = ceil($total / $parPage);
    echo "Total pages: $totalPages<br>";
    
} catch (PDOException $e) {
    echo "Erreur pagination: " . $e->getMessage() . "<br>";
}

// 12. NETTOYAGE
echo "<h2>12. Nettoyage</h2>";

try {
    $pdo->exec("DROP TABLE IF EXISTS commandes");
    $pdo->exec("DROP TABLE IF EXISTS utilisateurs");
    echo "Tables supprimées<br>";
} catch (PDOException $e) {
    echo "Erreur lors du nettoyage: " . $e->getMessage() . "<br>";
}

// Fermer la connexion
$pdo = null;
echo "Connexion fermée<br>";

?>