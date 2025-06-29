<?php 
$title = 'Mes Réservations - Airline Travel';
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

<div class="reservations-container">
    <h1 class="page-title">Mes Réservations</h1>

    <?php if (empty($reservations)): ?>
        <div class="no-reservations">
            <p>Vous n'avez aucune réservation pour le moment.</p>
        </div>
    <?php else: ?>
        <?php foreach ($reservations as $reservation): ?>
            <div class="reservation-card">
                <div class="reservation-header">
                    <span class="flight-number">Vol <?= htmlspecialchars($reservation['numerodevol']) ?></span>
                    <span class="reservation-date">Réservé le <?= date('d/m/Y', strtotime($reservation['date'])) ?></span>
                </div>

                <div class="reservation-body">
                    <div>
                        <div class="route">
                            <span class="departure"><?= htmlspecialchars($reservation['depart']) ?></span>
                            <span class="arrow">→</span>
                            <span class="arrival"><?= htmlspecialchars($reservation['arrive']) ?></span>
                        </div>

                        <div class="info-group">
                            <span class="info-label">Date de vol</span>
                            <p><?= date('d/m/Y', strtotime($reservation['date'])) ?></p>
                        </div>

                        <div class="info-group">
                            <span class="info-label">Passager</span>
                            <p><?= htmlspecialchars($reservation['name']) ?></p>
                        </div>
                    </div>

                    <div>
                        <div class="info-group">
                            <span class="info-label">Référence</span>
                            <p><?= htmlspecialchars($reservation['numerodevol']) ?></p>
                        </div>

                        <div class="info-group">
                            <span class="info-label">Contact</span>
                            <p><?= htmlspecialchars($reservation['email']) ?></p>
                            <p><?= htmlspecialchars($reservation['phone']) ?></p>
                        </div>

                        <div class="price">
                            <?= htmlspecialchars($reservation['tarif']) ?> €
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="expiry-info">
            <p>Les réservations sont automatiquement supprimées après 30 jours.</p>
        </div>
    <?php endif; ?>

    <div class="action-buttons">
        <a href="/reservation" class="btn btn-primary">Faire une réservation</a>
    </div>
</div>

<?php include 'views/layouts/footer.php'; ?>