<?php 
$title = 'Réservation de vol - Airline Travel';
include 'views/layouts/header.php'; 
?>

<style>
    nav.navigation{
        width: 50%;
        margin-left:50%;
        display: inline;
        padding:10px 0;
    }
    nav.navigation a{
        text-decoration:none;
        border:10px;
        color:white;
        padding:10px;
        font-family: arial;
        border-radius: 10px;
    }
    nav.navigation a:hover{
        background-color:rgba(214, 153, 40, 0.932);
    }
</style>

<header>
    <nav class="navigation">
        <a href="/dashboard">Tableau de bord</a>
        <a href="/logout">Déconnexion</a>
    </nav>
</header>

<section>
    <form class="reservation" action="/reservation" method="POST" autocomplete="off">
        <h1 style="color: midnightblue;">Réservation de Vol</h1>

        <?php if (!empty($errors)): ?>
            <p style="color:red"><?= implode('<br>', $errors) ?></p>
        <?php endif; ?>

        <label for="name">Nom &amp prenoms<span>*</span></label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($utilisateur['nom']) ?>" required>

        <label for="email">Email<span>*</span></label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($utilisateur['email']) ?>" required>

        <label for="phone">Téléphone<span>*</span></label>
        <input type="tel" id="phone" name="phone" placeholder="Votre numéro" required>

        <label for="departure">Lieu de départ<span>*</span></label>
        <input type="text" id="departure" name="departure" required>

        <label for="arrival">Lieu d'arrivée<span>*</span></label>
        <input type="text" id="arrival" name="arrival" required>

        <label for="date">Date de départ<span>*</span></label>
        <input type="date" id="date" name="date" required>

        <label for="tarif">Tarif (€)<span>*</span></label>
        <input type="text" id="tarif" name="tarif" required>

        <button type="submit">Réserver</button>
    </form>
</section>

<?php include 'views/layouts/footer.php'; ?>