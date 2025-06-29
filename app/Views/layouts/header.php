<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="avion (1).png">
    <title><?= $title ?? 'Airline Travel' ?></title>
    <link rel="stylesheet" href="style.css">
    <?= $additionalCSS ?? '' ?>
</head>
<body>
    <header>
        <div class="logo">
            <img src="avion (1).png" alt="Logo du site" width="30px" height="30px">
            <a href="/">airline<span>TRAVEL</span></a>
        </div>
        <nav>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/services">Services</a></li>
                <?php if (isset($_SESSION['user'])): ?>
                    <li><a href="/dashboard">Tableau de bord</a></li>
                    <li><a href="/logout">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="/login">Connexion</a></li>
                <?php endif; ?>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/about">À propos</a></li>
            </ul>
        </nav>
    </header>