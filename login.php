<?php

$postData = $_POST;
if (
    !isset($postData['email'])
    || !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)
    || empty($postData['password'])
    || trim($postData['password']) === ''
) {
    $errorMessage = "Complétez votre email et mdp svp";
} else {
    foreach ($users as $user) {
        if (
            $user['email'] === $postData['email'] &&
            $user['password'] === $postData['password']
        ) {
            $authenticatedUser = [
                'full_name' => $user['full_name'],
            ];
        }
    }
    if (!isset($authenticatedUser)) {
        $errorMessage = "mail et mot de passe invalide!, ressayer svp";
    }
}
?>

<?php if (!isset($authenticatedUser)) { ?>
<h1>Connectez vous</h1>
<form action="index.php" method="POST">
    <!-- si message d'erreur on l'affiche -->
    <?php if (isset($errorMessage)) { ?>
    <div>
        <?php echo $errorMessage; ?>
    </div>
    <?php } ?>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" aria-describedby="email-help">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Connecter</button>
</form>
<?php } else { ?>
<div>
    <h3>
        Bienvennue <?php echo $authenticatedUser['full_name']; ?> sur le site!
    </h3>
</div>
<?php }; ?>