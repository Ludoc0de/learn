<?php
$postData = $_POST;
if(!isset($postData['email'])){
    $userConnected ="email et un message invalides!";
    echo $userConnected;
}
// if (
//     !isset($postData['email'])
//     || !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)
//     || empty($postData['message'])
//     || trim($postData['message']) === ''
// ) {
//     echo('Il faut un email et un message valides pour soumettre le formulaire.');
//     return;
// }
?>
<div>
    <h1>Connectez vous</h1>
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
    <br />
</div>