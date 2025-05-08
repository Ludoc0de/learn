<?php
session_start();
require_once __DIR__ . '/databaseconnect.php';

$postData = $_POST;

if (
    !isset($postData['id'])
    || !isset($postData['title'])
    || !isset($postData['link'])
) {
    echo ('Il manque des informations dans le formulaire pour le soumettre.');
    return;
}

$id = $postData['id'];
$title = $postData['title'];
$link = $postData['link'];
$author =  $_SESSION["LOGGED_USER"]["email"];
$is_enabled = isset($postData['is_enabled']) ? 1 : 0;

$insertTutorial = $mysqlClient->prepare(
    'UPDATE tutorials SET title = :title, link = :link, is_enabled=:is_enabled WHERE tutorial_id = :id'
);
$insertTutorial->execute([
    'id' => $id,
    'title' => $title,
    'link' => $link,
    'is_enabled' => $is_enabled,
]);

?>

<!-- Header -->
<?php require_once(__DIR__ . '/header.php'); ?>

<h1>Formulaire ajout de tutoriel bien reçu !</h1>

<div>
    <div>
        <h5>Rappel de vos informations</h5>
        <p><b>Titre</b> : <?php echo htmlspecialchars($postData['title']); ?></p>
        <p><b>Liens vidéo</b> : <?php echo htmlspecialchars($postData['link']); ?></p>
        <p><b>Auteur</b> : <?php echo ($author); ?></p>
        <p><b>Tutoriel visible ?</b> : <?php echo ($is_enabled ? 'oui' : 'non'); ?></p>
    </div>
</div>