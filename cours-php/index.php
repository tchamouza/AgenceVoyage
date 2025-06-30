<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours PHP Complet - De Débutant à Expert</title>
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            margin-bottom: 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .header h1 {
            color: #667eea;
            font-size: 3rem;
            margin-bottom: 15px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .header p {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 20px;
        }
        
        .progress-bar {
            background: #e0e0e0;
            border-radius: 10px;
            height: 8px;
            margin: 20px 0;
            overflow: hidden;
        }
        
        .progress-fill {
            background: linear-gradient(45deg, #667eea, #764ba2);
            height: 100%;
            width: 0%;
            transition: width 2s ease;
            border-radius: 10px;
        }
        
        .course-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .course-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .course-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(45deg, #667eea, #764ba2);
        }
        
        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }
        
        .course-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            display: block;
        }
        
        .course-title {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        .course-description {
            color: #666;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        
        .course-topics {
            list-style: none;
            margin-bottom: 25px;
        }
        
        .course-topics li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 25px;
        }
        
        .course-topics li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #667eea;
            font-weight: bold;
        }
        
        .course-link {
            display: inline-block;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-align: center;
            width: 100%;
        }
        
        .course-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }
        
        .difficulty {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .difficulty.beginner {
            background: #e8f5e9;
            color: #2e7d32;
        }
        
        .difficulty.intermediate {
            background: #fff3e0;
            color: #f57c00;
        }
        
        .difficulty.advanced {
            background: #ffebee;
            color: #c62828;
        }
        
        .footer {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            margin-top: 30px;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 15px;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #667eea;
            display: block;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }
            
            .course-grid {
                grid-template-columns: 1fr;
            }
            
            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🚀 Cours PHP Complet</h1>
            <p>Maîtrisez PHP de A à Z : Programmation Procédurale, POO et Architecture MVC</p>
            <div class="progress-bar">
                <div class="progress-fill" id="progressFill"></div>
            </div>
            <p><strong>De Débutant à Expert en PHP</strong></p>
        </div>

        <div class="stats">
            <div class="stat-item">
                <span class="stat-number">8</span>
                <span class="stat-label">Parties Complètes</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">50+</span>
                <span class="stat-label">Heures de Contenu</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">200+</span>
                <span class="stat-label">Exemples Pratiques</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">100%</span>
                <span class="stat-label">Gratuit</span>
            </div>
        </div>

        <div class="course-grid">
            <!-- Partie 1: Fondamentaux -->
            <div class="course-card">
                <div class="difficulty beginner">Débutant</div>
                <span class="course-icon">📚</span>
                <h3 class="course-title">Partie 1: Fondamentaux PHP</h3>
                <p class="course-description">
                    Découvrez les bases essentielles de PHP : syntaxe, variables, opérateurs et structures de contrôle.
                </p>
                <ul class="course-topics">
                    <li>Introduction et installation</li>
                    <li>Variables et types de données</li>
                    <li>Opérateurs arithmétiques et logiques</li>
                    <li>Structures conditionnelles</li>
                    <li>Boucles et itérations</li>
                </ul>
                <a href="partie1-fondamentaux.php" class="course-link">Commencer les fondamentaux</a>
            </div>

            <!-- Partie 2: Programmation Procédurale -->
            <div class="course-card">
                <div class="difficulty beginner">Débutant</div>
                <span class="course-icon">⚙️</span>
                <h3 class="course-title">Partie 2: Programmation Procédurale</h3>
                <p class="course-description">
                    Maîtrisez la programmation procédurale avec les fonctions, tableaux et manipulation de chaînes.
                </p>
                <ul class="course-topics">
                    <li>Fonctions définies par l'utilisateur</li>
                    <li>Tableaux indexés et associatifs</li>
                    <li>Manipulation de chaînes</li>
                    <li>Gestion des fichiers</li>
                    <li>Formulaires et validation</li>
                </ul>
                <a href="partie2-procedurale.php" class="course-link">Apprendre la programmation procédurale</a>
            </div>

            <!-- Partie 3: POO Fondamentaux -->
            <div class="course-card">
                <div class="difficulty intermediate">Intermédiaire</div>
                <span class="course-icon">🏗️</span>
                <h3 class="course-title">Partie 3: POO - Fondamentaux</h3>
                <p class="course-description">
                    Introduction à la Programmation Orientée Objet : classes, objets, propriétés et méthodes.
                </p>
                <ul class="course-topics">
                    <li>Concepts de base de la POO</li>
                    <li>Classes et objets</li>
                    <li>Propriétés et méthodes</li>
                    <li>Constructeurs et destructeurs</li>
                    <li>Visibilité (public, private, protected)</li>
                </ul>
                <a href="partie3-poo-fondamentaux.php" class="course-link">Découvrir la POO</a>
            </div>

            <!-- Partie 4: POO Avancée -->
            <div class="course-card">
                <div class="difficulty intermediate">Intermédiaire</div>
                <span class="course-icon">🔧</span>
                <h3 class="course-title">Partie 4: POO - Concepts Avancés</h3>
                <p class="course-description">
                    Approfondissez la POO avec l'héritage, le polymorphisme, les interfaces et les traits.
                </p>
                <ul class="course-topics">
                    <li>Héritage et polymorphisme</li>
                    <li>Classes abstraites</li>
                    <li>Interfaces</li>
                    <li>Traits</li>
                    <li>Méthodes magiques</li>
                </ul>
                <a href="partie4-poo-avancee.php" class="course-link">Maîtriser la POO avancée</a>
            </div>

            <!-- Partie 5: Base de Données -->
            <div class="course-card">
                <div class="difficulty intermediate">Intermédiaire</div>
                <span class="course-icon">🗄️</span>
                <h3 class="course-title">Partie 5: Base de Données avec PDO</h3>
                <p class="course-description">
                    Connectez-vous aux bases de données et manipulez les données avec PDO de manière sécurisée.
                </p>
                <ul class="course-topics">
                    <li>Introduction à PDO</li>
                    <li>Connexion et configuration</li>
                    <li>Requêtes CRUD</li>
                    <li>Requêtes préparées</li>
                    <li>Transactions et sécurité</li>
                </ul>
                <a href="partie5-base-donnees.php" class="course-link">Apprendre PDO</a>
            </div>

            <!-- Partie 6: Architecture MVC -->
            <div class="course-card">
                <div class="difficulty advanced">Avancé</div>
                <span class="course-icon">🏛️</span>
                <h3 class="course-title">Partie 6: Architecture MVC</h3>
                <p class="course-description">
                    Découvrez l'architecture Model-View-Controller pour structurer vos applications PHP.
                </p>
                <ul class="course-topics">
                    <li>Concepts de l'architecture MVC</li>
                    <li>Modèles (Models)</li>
                    <li>Vues (Views)</li>
                    <li>Contrôleurs (Controllers)</li>
                    <li>Routage et organisation</li>
                </ul>
                <a href="partie6-architecture-mvc.php" class="course-link">Comprendre MVC</a>
            </div>

            <!-- Partie 7: Sécurité et Bonnes Pratiques -->
            <div class="course-card">
                <div class="difficulty advanced">Avancé</div>
                <span class="course-icon">🔐</span>
                <h3 class="course-title">Partie 7: Sécurité et Bonnes Pratiques</h3>
                <p class="course-description">
                    Sécurisez vos applications PHP et appliquez les meilleures pratiques de développement.
                </p>
                <ul class="course-topics">
                    <li>Validation et filtrage des données</li>
                    <li>Protection contre les injections SQL</li>
                    <li>Gestion des sessions sécurisées</li>
                    <li>Authentification et autorisation</li>
                    <li>Bonnes pratiques de codage</li>
                </ul>
                <a href="partie7-securite.php" class="course-link">Sécuriser ses applications</a>
            </div>

            <!-- Partie 8: Projet Complet -->
            <div class="course-card">
                <div class="difficulty advanced">Avancé</div>
                <span class="course-icon">🚀</span>
                <h3 class="course-title">Partie 8: Projet Complet</h3>
                <p class="course-description">
                    Mettez en pratique toutes vos connaissances en créant une application web complète.
                </p>
                <ul class="course-topics">
                    <li>Planification du projet</li>
                    <li>Architecture et structure</li>
                    <li>Développement étape par étape</li>
                    <li>Tests et débogage</li>
                    <li>Déploiement et maintenance</li>
                </ul>
                <a href="partie8-projet-complet.php" class="course-link">Créer un projet complet</a>
            </div>
        </div>

        <div class="footer">
            <h3>🎯 Objectifs du Cours</h3>
            <p>À la fin de ce cours complet, vous serez capable de :</p>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin: 20px 0; text-align: left;">
                <div>
                    <h4>✅ Programmation Procédurale</h4>
                    <ul style="margin-left: 20px;">
                        <li>Créer des fonctions réutilisables</li>
                        <li>Manipuler les tableaux et chaînes</li>
                        <li>Gérer les fichiers et formulaires</li>
                    </ul>
                </div>
                <div>
                    <h4>✅ Programmation Orientée Objet</h4>
                    <ul style="margin-left: 20px;">
                        <li>Concevoir des classes et objets</li>
                        <li>Utiliser l'héritage et le polymorphisme</li>
                        <li>Implémenter des interfaces et traits</li>
                    </ul>
                </div>
                <div>
                    <h4>✅ Architecture MVC</h4>
                    <ul style="margin-left: 20px;">
                        <li>Structurer une application MVC</li>
                        <li>Séparer la logique métier</li>
                        <li>Créer un système de routage</li>
                    </ul>
                </div>
                <div>
                    <h4>✅ Développement Professionnel</h4>
                    <ul style="margin-left: 20px;">
                        <li>Sécuriser les applications</li>
                        <li>Appliquer les bonnes pratiques</li>
                        <li>Déployer en production</li>
                    </ul>
                </div>
            </div>
            <p style="margin-top: 30px;"><strong>🚀 Commencez votre parcours PHP dès maintenant !</strong></p>
        </div>
    </div>

    <script>
        // Animation de la barre de progression
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.getElementById('progressFill').style.width = '100%';
            }, 1000);
        });

        // Animation des cartes au scroll
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

        document.querySelectorAll('.course-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>