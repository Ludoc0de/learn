<?php if (!isset($_SESSION["LOGGED_USER"])) { ?>
<h1>Connectez vous</h1>
<form action="/learn/index.php?action=login" method="POST">
    <!-- si message d'erreur on l'affiche -->
    <?php
        if ($alertMessage) {
        ?>
    <div class="alert alert-danger">
        <?= $alertMessage ?>
    </div>
    <?php
        }
        ?>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" aria-describedby="email-help">
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Connecter</button>
</form>
<?php } else { ?>
<div>
    <h3>
        Bienvennue <?php echo $_SESSION["LOGGED_USER"]["full_name"]; ?> sur le site!
    </h3>
</div>
<?php }; ?>