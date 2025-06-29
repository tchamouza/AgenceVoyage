<?php include 'app/Views/layouts/header.php'; ?>

<section class="titre">
    <h2>Bienvenue sur airlineTRAVEL</h2>
    <p>Vous voulez voyager en toute sécurité et aisance ? Vous êtes à la bonne adresse.</p>

    <div class="bouton">
        <a href="/services" class="btn">Visiter</a>
        <a href="/login" class="btn">Connectez-vous</a>
    </div>

    <div class="find-trip">
        <form action="">
            <div>
                <label>Pays</label>
                <input type="text" placeholder="Entrez un pays">
            </div>
            <div>
                <label>Destination</label>
                <input type="text" placeholder="Entrez une destination">
            </div>
            <div>
                <label>Voyageurs</label>
                <input type="text" placeholder="Entrez le nombre de voyageurs">
            </div>
            <input type="submit" value="Rechercher">
        </form>
    </div>
</section>

<?php include 'app/Views/layouts/footer.php'; ?>