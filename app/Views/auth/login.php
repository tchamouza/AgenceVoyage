<?php include 'app/Views/layouts/header.php'; ?>

<section>
    <form action="/login" class="reservation" method="POST" autocomplete="off">
        <h1 style="color: midnightblue;">Connexion</h1>

        <?php if (!empty($errors)): ?>
            <div style="color: red; margin-bottom: 15px;">
                <?php foreach ($errors as $error): ?>
                    <p><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <label for="email">Email<span>*</span></label>
        <input type="email" id="email" name="email" placeholder="Entrez votre email" required>

        <label for="motdepasse">Mot de passe<span>*</span></label>
        <input type="password" id="motdepasse" name="motdepasse" placeholder="Entrez votre mot de passe" required>
        <br><br>

        <p style="font-family: century; text-align:center;">
            Pas de compte ?
            <a style="text-decoration: none; color:midnightblue" href="/register">Inscrivez-vous</a>
        </p><br>

        <button type="submit">Connexion</button>
    </form>
</section>

<?php include 'app/Views/layouts/footer.php'; ?>