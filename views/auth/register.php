<?php 
$title = 'Inscription - Airline Travel';
$additionalCSS = '<style>label { display: block; margin-bottom: 5px; font-weight: bold; color: midnightblue; }</style>';
include 'views/layouts/header.php'; 
?>

<form action="/register" class="reservation" method="POST" enctype="multipart/form-data" autocomplete="off">
    <h1 style="color: midnightblue;">Inscription</h1>

    <?php if (!empty($errors)): ?>
        <p style="color:red"><?= implode('<br>', $errors) ?></p>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <p style="color:green"><?= $success ?></p>
    <?php endif; ?>

    <label for="name">Nom<span>*</span></label>
    <input type="text" id="name" name="name" placeholder="Entrez votre nom" required>

    <label for="prenoms">Prénoms<span>*</span></label>
    <input type="text" id="prenoms" name="prenoms" placeholder="Entrez vos prénoms" required>

    <label for="date">Date de naissance<span>*</span></label>
    <input type="date" id="date" name="date" required>

    <label for="email">Email<span>*</span></label>
    <input type="email" id="email" name="email" placeholder="Entrez votre email" required>

    <label for="phone">Téléphone<span>*</span></label>
    <input type="tel" id="phone" name="phone" placeholder="Entrez votre numéro de téléphone" required>

    <label for="image">Photo de profil<span>*</span></label>
    <input type="file" name="image" accept="image/*" id="image" required class="box">

    <label for="motdepasse">Mot de passe<span>*</span></label>
    <input type="password" id="motdepasse" name="motdepasse" placeholder="Entrez votre mot de passe" required>

    <label for="confirmemotdepasse">Confirmer mot de passe<span>*</span></label>
    <input type="password" id="confirmemotdepasse" name="confirmemotdepasse" placeholder="Confirmez votre mot de passe" required>

    <p style="font-family: century; text-align:center;">Vous avez fini l'inscription ?
        <a style="text-decoration: none; color:midnightblue" href="/login">Connectez-vous</a>
    </p><br>

    <button type="submit">S'inscrire</button>
</form>

<?php include 'views/layouts/footer.php'; ?>