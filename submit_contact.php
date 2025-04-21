<?php
$postData = $_POST;

if (
    !isset($postData['email'])
    || !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)
    || empty($postData['message'])
    || trim($postData['message']) === ''
) {
    echo('Il faut un email et un message valides pour soumettre le formulaire.');
    return;
}
?>

<h1>Message bien reçu !</h1>

<div>
    <div>
        <h5>Rappel de vos informations</h5>
        <p><b>Email</b> : <?php echo $postData['email']; ?></p>
        <p><b>Message</b> : <?php echo htmlspecialchars($postData['message']); ?></p>
    </div>
</div>