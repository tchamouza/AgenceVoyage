<?php 
$title = 'Modifier Profil - Airline Travel';
include 'views/layouts/header.php'; 
?>

<style>
    .form-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-section {
        margin-bottom: 30px;
    }

    .form-section h2 {
        color: midnightblue;
        border-bottom: 2px solid midnightblue;
        padding-bottom: 5px;
        margin-bottom: 15px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .current-image {
        margin: 15px 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .current-image img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid midnightblue;
    }

    .btn-submit {
        background: black;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: background 0.3s;
    }

    .btn-submit:hover {
        background:rgba(214, 153, 40, 0.932);
    }

    .alert {
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 4px;
    }

    .alert-error {
        background: #ffebee;
        color: #c62828;
        border-left: 4px solid #c62828;
    }

    .alert-success {
        background: #e8f5e9;
        color: #2e7d32;
        border-left: 4px solid #2e7d32;
    }

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

    label {
        display: block;
        margin-bottom: 5px;
        font-size: 1rem;
        color: #555;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
        outline: none;
        transition: border-color 0.3s ease;
    }

    input:focus {
        border-color: black;
    }
</style>

<header>
    <nav class="navigation">
        <a href="/dashboard">Tableau de bord</a>
        <a href="/logout">Déconnexion</a>
    </nav>
</header>

<div class="form-container">
    <h1 style="color: midnightblue; text-align: center;">Modifier mon profil</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-error">
            <?php foreach ($errors as $error): ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <div class="alert alert-success">
            <p><?= htmlspecialchars($success) ?></p>
        </div>
    <?php endif; ?>

    <div class="form-section">
        <h2>Informations personnelles</h2>
        <form method="POST" enctype="multipart/form-data" autocomplete="off" action="/profile">
            <div class="form-group">
                <?php if (!empty($utilisateur['image']) && file_exists('uploads/' . $utilisateur['image'])): ?>
                    <div class="current-image">
                        <span>Profil actuelle :</span>
                        <img src="uploads/<?= htmlspecialchars($utilisateur['image']) ?>" alt="Photo de profil">
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($utilisateur['nom']) ?>" required>
            </div>

            <div class="form-group">
                <label for="prenoms">Prénoms</label>
                <input type="text" id="prenoms" name="prenoms" value="<?= htmlspecialchars($utilisateur['prenoms']) ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($utilisateur['email']) ?>" required>
            </div>

            <div class="form-group">
                <label for="date_naissance">Date de naissance</label>
                <input type="date" id="date_naissance" name="date_naissance" value="<?= htmlspecialchars($utilisateur['age']) ?>" required>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="tel" id="telephone" name="telephone" value="<?= htmlspecialchars($utilisateur['telephone']) ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Photo de profil</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <div style="text-align: center; margin-top: 25px;">
                <button type="submit" class="btn-submit">Enregistrer les modifications</button>
            </div>
        </form>
    </div>

    <div class="form-section">
        <h2>Changer le mot de passe</h2>

        <?php if (!empty($password_errors)): ?>
            <div class="alert alert-error">
                <?php foreach ($password_errors as $error): ?>
                    <p><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($password_success)): ?>
            <div class="alert alert-success">
                <p><?= htmlspecialchars($password_success) ?></p>
            </div>
        <?php endif; ?>

        <form method="POST" action="/profile">
            <input type="hidden" name="change_password" value="1">

            <div class="form-group">
                <label for="current_password">Mot de passe actuel</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>

            <div class="form-group">
                <label for="new_password">Nouveau mot de passe (4-8 caractères)</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirmer le nouveau mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <div style="text-align: center; margin-top: 25px;">
                <button type="submit" class="btn-submit">Changer le mot de passe</button>
            </div>
        </form>
    </div>
</div>

<?php include 'views/layouts/footer.php'; ?>