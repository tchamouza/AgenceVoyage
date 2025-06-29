<?php 
$additionalCSS = '<link rel="stylesheet" href="contact styles.css">';
include 'app/Views/layouts/header.php'; 
?>

<section class="hero">
    <br><br><br>
    <h1>Contactez-nous</h1>
    <p>
        Voulez-vous nous contacter ? Réserver ?<br>
        Remplissez le formulaire ci-dessous, et nous vous répondrons dès que possible.
    </p>
</section>

<?php if (!empty($errors)): ?>
    <div style="color: red; text-align: center; margin: 20px auto; max-width: 600px; padding: 10px; background: #ffebee; border-left: 4px solid #c62828;">
        <?php foreach ($errors as $error): ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div style="color: green; text-align: center; margin: 20px auto; max-width: 600px; padding: 10px; background: #e8f5e9; border-left: 4px solid #2e7d32;">
        <p><?= htmlspecialchars($success) ?></p>
    </div>
<?php endif; ?>

<section class="contact-form">
    <form action="/contact" method="post">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>

        <label for="message">Message :</label>
        <textarea id="message" name="message" rows="7" required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>

        <button type="submit">Envoyer</button>
    </form>
</section>

<?php include 'app/Views/layouts/footer.php'; ?>