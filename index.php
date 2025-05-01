<?php
session_start();
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber pour les mioches</title>
</head>

<body>
    <!-- Header -->
    <?php require_once(__DIR__ . '/header.php'); ?>
    <!-- Formulaire de connexion -->
    <?php require_once(__DIR__ . '/login.php'); ?>
    <div>
        <h1>Ici on s'initie à la Cyber!</h1>
        <?php foreach (getTutorials($tutorials) as $tutorial) { ?>
        <h5>
            <?php echo $tutorial['title']; ?>
        </h5>
        <a>
            <?php echo $tutorial['link']; ?>
        </a>
        </br>
        <i> by <?php echo getAuthors($tutorial['author'], $users); ?></i>
        <?php } ?>
    </div>
    <!-- Footer -->
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>

</html>