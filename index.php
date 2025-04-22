<?php
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber pour les mioches</title>
</head>

<body>
    <?php require_once(__DIR__ . '/header.php'); ?>
    <?php require_once(__DIR__ . '/login.php'); ?>
    <?php if ($foundUser) { ?>
    <div>
        <h1>Ici on s'initie à la Cyber!</h1>
        <?php foreach (getVideos($videos) as $video) { ?>
        <h3>
            <?php echo $video['title']; ?>
        </h3>
        <a>
            <?php echo $video['link']; ?>
        </a>
        </br>
        <i> by <?php echo getAuthors($video['author'], $users); ?></i>
        <?php } ?>
    </div>
    <?php } ?>
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>

</html>