# Airline Travel - Architecture MVC PHP Professionnelle

## 🏗️ Structure du Projet

```
/
├── app/
│   ├── Core/                    # Classes de base du framework
│   │   ├── Router.php          # Gestionnaire de routes
│   │   ├── Database.php        # Singleton de base de données
│   │   ├── Controller.php      # Contrôleur de base
│   │   └── Model.php           # Modèle de base
│   ├── Controllers/            # Contrôleurs de l'application
│   │   ├── HomeController.php  # Pages publiques
│   │   ├── AuthController.php  # Authentification
│   │   ├── UserController.php  # Gestion utilisateur
│   │   ├── ReservationController.php # Réservations
│   │   └── ContactController.php # Contact
│   ├── Models/                 # Modèles de données
│   │   ├── User.php           # Modèle utilisateur
│   │   ├── Reservation.php    # Modèle réservation
│   │   └── Contact.php        # Modèle contact
│   └── Views/                 # Vues et templates
│       ├── layouts/           # Templates communs
│       │   ├── header.php     # En-tête
│       │   └── footer.php     # Pied de page
│       ├── home/              # Pages d'accueil
│       ├── auth/              # Authentification
│       ├── user/              # Utilisateur
│       ├── reservation/       # Réservations
│       ├── contact/           # Contact
│       └── errors/            # Pages d'erreur
├── config/                    # Configuration
│   ├── database.php          # Configuration BDD
│   └── app.php               # Configuration application
├── uploads/                  # Fichiers uploadés
├── pages/image/             # Images existantes
├── index.php               # Point d'entrée
├── .htaccess              # Configuration Apache
├── style.css             # Styles CSS
├── scripts.js           # Scripts JavaScript
└── travel.sql          # Base de données
```

## 🚀 Fonctionnalités

### ✅ **Architecture MVC Complète**
- **Models** : Gestion des données avec classe de base
- **Views** : Templates avec layouts réutilisables
- **Controllers** : Logique métier séparée
- **Router** : Système de routage propre
- **Database** : Singleton PDO avec gestion d'erreurs

### ✅ **Fonctionnalités Préservées**
- Système d'authentification sécurisé
- Gestion complète des profils utilisateurs
- Système de réservation de vols
- Formulaire de contact fonctionnel
- Upload et gestion d'images
- Validation des données côté serveur
- Sessions sécurisées
- Design responsive

### ✅ **Améliorations Apportées**
- **Autoloader PSR-4** : Chargement automatique des classes
- **Namespaces** : Organisation claire du code
- **Singleton Database** : Connexion unique et optimisée
- **Validation centralisée** : Méthodes de validation réutilisables
- **Gestion d'erreurs** : Try-catch et messages d'erreur appropriés
- **Sécurité renforcée** : Filtrage et échappement des données
- **Code DRY** : Élimination des répétitions

## 🛠️ Routes Disponibles

### **Routes Publiques**
- `GET /` - Page d'accueil
- `GET /services` - Services
- `GET /about` - À propos
- `GET /contact` - Contact
- `POST /contact` - Envoi message

### **Routes d'Authentification**
- `GET /login` - Formulaire de connexion
- `POST /login` - Traitement connexion
- `GET /register` - Formulaire d'inscription
- `POST /register` - Traitement inscription
- `GET /logout` - Déconnexion

### **Routes Protégées** (Authentification requise)
- `GET /dashboard` - Tableau de bord
- `GET /profile` - Profil utilisateur
- `POST /profile` - Mise à jour profil
- `GET /reservations` - Liste des réservations
- `GET /reservation` - Formulaire de réservation
- `POST /reservation` - Création réservation
- `GET /confirmation` - Confirmation réservation

## 🔧 Installation

1. **Base de données**
   ```sql
   -- Importer travel.sql dans MySQL
   ```

2. **Configuration**
   ```php
   // config/database.php
   return [
       'host' => 'localhost',
       'dbname' => 'travel',
       'username' => 'root',
       'password' => ''
   ];
   ```

3. **Permissions**
   ```bash
   chmod 755 uploads/
   ```

4. **Apache**
   - Activer mod_rewrite
   - Le fichier .htaccess gère les URLs propres

## 📋 Avantages de cette Architecture

### **Maintenabilité**
- Code organisé et modulaire
- Séparation claire des responsabilités
- Facilité de débogage et de test

### **Extensibilité**
- Ajout facile de nouvelles fonctionnalités
- Système de routing flexible
- Classes de base réutilisables

### **Sécurité**
- Validation centralisée
- Protection contre les injections SQL
- Gestion sécurisée des sessions

### **Performance**
- Singleton pour la base de données
- Autoloader optimisé
- Code DRY (Don't Repeat Yourself)

## 🎯 Bonnes Pratiques Appliquées

- **PSR-4** : Standard d'autoloading
- **Namespaces** : Organisation logique
- **Singleton Pattern** : Pour la base de données
- **MVC Pattern** : Séparation des couches
- **DRY Principle** : Code non répétitif
- **SOLID Principles** : Code maintenable

Cette architecture MVC professionnelle transforme votre application en un système robuste, maintenable et évolutif, tout en préservant toutes les fonctionnalités existantes.