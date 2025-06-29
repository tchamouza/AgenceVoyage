<?php
/**
 * COURS PHP COMPLET - INDEX
 * =========================
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours PHP Complet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            line-height: 1.6;
        }
        .header {
            background: #2c3e50;
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: center;
        }
        .chapter {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.2s;
        }
        .chapter:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .chapter h3 {
            color: #2c3e50;
            margin-top: 0;
        }
        .chapter-link {
            display: inline-block;
            background: #3498db;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            transition: background 0.3s;
        }
        .chapter-link:hover {
            background: #2980b9;
        }
        .topics {
            list-style-type: none;
            padding: 0;
        }
        .topics li {
            background: white;
            margin: 5px 0;
            padding: 8px 15px;
            border-left: 3px solid #3498db;
            border-radius: 3px;
        }
        .progress {
            background: #ecf0f1;
            border-radius: 10px;
            padding: 3px;
            margin: 20px 0;
        }
        .progress-bar {
            background: linear-gradient(90deg, #3498db, #2ecc71);
            height: 20px;
            border-radius: 8px;
            width: 0%;
            transition: width 0.5s ease;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            background: #34495e;
            color: white;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🚀 Cours PHP Complet</h1>
        <p>De Débutant à Avancé - Maîtrisez PHP étape par étape</p>
    </div>

    <div class="progress">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    <div class="chapter">
        <h3>📚 Chapitre 1: Introduction à PHP</h3>
        <p>Découvrez les bases de PHP, la syntaxe, les variables et les types de données.</p>
        <ul class="topics">
            <li>Qu'est-ce que PHP ?</li>
            <li>Syntaxe de base et balises</li>
            <li>Variables et constantes</li>
            <li>Types de données</li>
            <li>Affichage et commentaires</li>
        </ul>
        <a href="01-introduction.php" class="chapter-link">Commencer le chapitre 1</a>
    </div>

    <div class="chapter">
        <h3>⚡ Chapitre 2: Opérateurs</h3>
        <p>Maîtrisez tous les opérateurs PHP pour manipuler vos données efficacement.</p>
        <ul class="topics">
            <li>Opérateurs arithmétiques</li>
            <li>Opérateurs de comparaison</li>
            <li>Opérateurs logiques</li>
            <li>Opérateurs d'assignation</li>
            <li>Opérateurs spéciaux (ternaire, null coalescing)</li>
        </ul>
        <a href="02-operateurs.php" class="chapter-link">Voir les opérateurs</a>
    </div>

    <div class="chapter">
        <h3>🔄 Chapitre 3: Structures de contrôle</h3>
        <p>Apprenez à contrôler le flux d'exécution de vos programmes.</p>
        <ul class="topics">
            <li>Conditions (if, else, switch)</li>
            <li>Boucles (for, while, foreach)</li>
            <li>Break et continue</li>
            <li>Match (PHP 8+)</li>
            <li>Structures alternatives</li>
        </ul>
        <a href="03-structures-controle.php" class="chapter-link">Explorer les structures</a>
    </div>

    <div class="chapter">
        <h3>🔧 Chapitre 4: Fonctions</h3>
        <p>Créez du code réutilisable avec les fonctions PHP.</p>
        <ul class="topics">
            <li>Déclaration et appel de fonctions</li>
            <li>Paramètres et valeurs de retour</li>
            <li>Fonctions anonymes et closures</li>
            <li>Fonctions récursives</li>
            <li>Portée des variables</li>
        </ul>
        <a href="04-fonctions.php" class="chapter-link">Apprendre les fonctions</a>
    </div>

    <div class="chapter">
        <h3>📊 Chapitre 5: Tableaux</h3>
        <p>Manipulez efficacement les collections de données avec les tableaux.</p>
        <ul class="topics">
            <li>Tableaux indexés et associatifs</li>
            <li>Tableaux multidimensionnels</li>
            <li>Fonctions de tableaux</li>
            <li>Tri et recherche</li>
            <li>Filtrage et transformation</li>
        </ul>
        <a href="05-tableaux.php" class="chapter-link">Maîtriser les tableaux</a>
    </div>

    <div class="chapter">
        <h3>📝 Chapitre 6: Chaînes de caractères</h3>
        <p>Manipulez et transformez les chaînes de caractères comme un pro.</p>
        <ul class="topics">
            <li>Création et concaténation</li>
            <li>Recherche et remplacement</li>
            <li>Formatage et nettoyage</li>
            <li>Expressions régulières</li>
            <li>Encodage et sécurité</li>
        </ul>
        <a href="06-chaines.php" class="chapter-link">Travailler avec les chaînes</a>
    </div>

    <div class="chapter">
        <h3>🏗️ Chapitre 7: Programmation Orientée Objet</h3>
        <p>Découvrez la puissance de la POO en PHP.</p>
        <ul class="topics">
            <li>Classes et objets</li>
            <li>Héritage et polymorphisme</li>
            <li>Interfaces et classes abstraites</li>
            <li>Traits et namespaces</li>
            <li>Méthodes magiques</li>
        </ul>
        <a href="07-poo.php" class="chapter-link">Découvrir la POO</a>
    </div>

    <div class="chapter">
        <h3>📁 Chapitre 8: Gestion des fichiers</h3>
        <p>Lisez, écrivez et manipulez les fichiers sur le serveur.</p>
        <ul class="topics">
            <li>Lecture et écriture de fichiers</li>
            <li>Gestion des dossiers</li>
            <li>Upload de fichiers</li>
            <li>Formats CSV et JSON</li>
            <li>Sécurité des fichiers</li>
        </ul>
        <a href="08-fichiers.php" class="chapter-link">Gérer les fichiers</a>
    </div>

    <div class="chapter">
        <h3>🗄️ Chapitre 9: Base de données (PDO)</h3>
        <p>Connectez-vous aux bases de données et manipulez les données.</p>
        <ul class="topics">
            <li>Connexion avec PDO</li>
            <li>Requêtes CRUD</li>
            <li>Requêtes préparées</li>
            <li>Transactions</li>
            <li>Sécurité et bonnes pratiques</li>
        </ul>
        <a href="09-base-donnees.php" class="chapter-link">Apprendre PDO</a>
    </div>

    <div class="chapter">
        <h3>🔐 Chapitre 10: Sessions et Cookies</h3>
        <p>Gérez l'état et l'authentification de vos applications web.</p>
        <ul class="topics">
            <li>Sessions PHP</li>
            <li>Cookies</li>
            <li>Authentification</li>
            <li>Sécurité des sessions</li>
            <li>Messages flash</li>
        </ul>
        <a href="10-sessions-cookies.php" class="chapter-link">Sessions et cookies</a>
    </div>

    <div class="footer">
        <h3>🎯 Objectifs du cours</h3>
        <p>À la fin de ce cours, vous maîtriserez :</p>
        <ul style="text-align: left; display: inline-block;">
            <li>Les fondamentaux de PHP</li>
            <li>La programmation orientée objet</li>
            <li>La gestion des bases de données</li>
            <li>La sécurité web</li>
            <li>Les bonnes pratiques de développement</li>
        </ul>
        <p><strong>Bonne formation ! 🚀</strong></p>
    </div>

    <script>
        // Animation de la barre de progression
        window.addEventListener('load', function() {
            const progressBar = document.getElementById('progressBar');
            const chapters = document.querySelectorAll('.chapter');
            const progress = Math.min(100, (chapters.length / 10) * 100);
            
            setTimeout(() => {
                progressBar.style.width = progress + '%';
            }, 500);
        });

        // Animation au survol des chapitres
        document.querySelectorAll('.chapter').forEach(chapter => {
            chapter.addEventListener('mouseenter', function() {
                this.style.borderLeft = '5px solid #3498db';
            });
            
            chapter.addEventListener('mouseleave', function() {
                this.style.borderLeft = '1px solid #dee2e6';
            });
        });
    </script>
</body>
</html>