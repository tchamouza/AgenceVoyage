# Airline Travel - Architecture MVC

## Structure du projet

```
/
├── config/
│   └── config.php          # Configuration de la base de données
├── controllers/
│   ├── BaseController.php  # Contrôleur de base
│   ├── HomeController.php  # Contrôleur pour les pages d'accueil
│   ├── AuthController.php  # Contrôleur d'authentification
│   ├── UserController.php  # Contrôleur utilisateur
│   ├── ReservationController.php # Contrôleur de réservation
│   └── ContactController.php # Contrôleur de contact
├── models/
│   ├── User.php           # Modèle utilisateur
│   ├── Reservation.php    # Modèle réservation
│   └── Contact.php        # Modèle contact
├── views/
│   ├── layouts/
│   │   ├── header.php     # En-tête commun
│   │   └── footer.php     # Pied de page commun
│   ├── home/
│   │   ├── index.php      # Page d'accueil
│   │   ├── services.php   # Page services
│   │   └── about.php      # Page à propos
│   ├── auth/
│   │   ├── login.php      # Page de connexion
│   │   └── register.php   # Page d'inscription
│   ├── user/
│   │   ├── dashboard.php  # Tableau de bord
│   │   └── profile.php    # Profil utilisateur
│   ├── reservation/
│   │   ├── index.php      # Liste des réservations
│   │   ├── create.php     # Créer une réservation
│   │   └── confirmation.php # Confirmation
│   ├── contact/
│   │   └── index.php      # Page de contact
│   └── errors/
│       └── 404.php        # Page d'erreur 404
├── uploads/               # Dossier pour les images
├── pages/image/          # Images existantes
├── index.php             # Point d'entrée et routeur
├── .htaccess            # Configuration Apache
├── style.css            # Styles CSS
├── scripts.js           # Scripts JavaScript
└── travel.sql           # Base de données
```

## Routes disponibles

- `/` ou `/home` - Page d'accueil
- `/services` - Page des services
- `/about` - Page à propos
- `/contact` - Page de contact
- `/register` - Inscription
- `/login` - Connexion
- `/logout` - Déconnexion
- `/dashboard` - Tableau de bord (authentifié)
- `/profile` - Profil utilisateur (authentifié)
- `/reservation` - Créer une réservation (authentifié)
- `/reservations` - Mes réservations (authentifié)
- `/confirmation` - Confirmation de réservation (authentifié)

## Fonctionnalités préservées

✅ Toutes les fonctionnalités existantes ont été préservées :
- Système d'authentification complet
- Gestion des profils utilisateurs
- Système de réservation de vols
- Formulaire de contact
- Upload d'images de profil
- Validation des données
- Sécurité des sessions
- Responsive design

## Installation

1. Importez la base de données `travel.sql`
2. Configurez les paramètres dans `config/config.php`
3. Assurez-vous que le dossier `uploads/` est accessible en écriture
4. Activez mod_rewrite sur Apache pour les URLs propres

## Architecture MVC

- **Models** : Gèrent les données et la logique métier
- **Views** : Gèrent l'affichage et la présentation
- **Controllers** : Gèrent la logique de contrôle et les interactions

Cette architecture améliore la maintenabilité, la réutilisabilité et la séparation des responsabilités du code.