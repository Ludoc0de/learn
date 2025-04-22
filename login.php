<?php

$postData = $_POST;
$foundUser = false;
if (
    !isset($postData['email'])
    || !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)
    || empty($postData['password'])
    || trim($postData['password']) === ''
) {
    $errorMessage = "Complétez votre email et mdp svp";
} else {
    foreach ($users as $user) {
        if (($user['email'] === $postData['email']) && ($user['password'] === $postData['password'])) {
            $foundUser = true;
            return $errorMessage = "connecté";
        }
    }
    if (!$foundUser) {
        $errorMessage = "mail et mot de passe invalide!, ressayer svp";
    }
}

?>
<div>
    <h2>Connectez vous</h2>
    <?php if (!$foundUser) { ?>
    <form action="index.php" method="POST">
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
    <p>
        <?php echo $errorMessage; ?>
    </p>
    <?php }; ?>
    <br />
</div>
<h3>