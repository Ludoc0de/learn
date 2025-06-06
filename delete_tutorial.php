<?php
session_start();
require_once __DIR__ . '/databaseconnect.php';
$getData = $_GET;

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    echo ('Il faut un identifiant de tutoriel pour la modifier.');
    return;
}

$retrieveTutorialStatement = $mysqlClient->prepare('SELECT * FROM tutorials WHERE tutorial_id = :id');
$retrieveTutorialStatement->execute([
    'id' => (int)$getData['id'],
]);
$tutorial = $retrieveTutorialStatement->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber pour les mioches</title>
</head>

<body>
    <div class="container">
        <?php require_once(__DIR__ . '/header.php'); ?>
        <h1>Mettre à jour un tutoriel</h1>
        <form action="submit_delete_tutorial.php" method="POST">
            <div>
                <label for="id">Identifiant du tutoriel</label>
                <input type="hidden" id="id" name="id" value="<?php echo ($getData['id']); ?>">
            </div>
            <div>
                <label for="title">Titre du tutoriel : <?php echo htmlspecialchars($tutorial['title']); ?></label>
            </div>
            <button type=" submit" class="btn btn-primary">Supprimer définitivement!</button>
        </form>
        <br />
    </div>
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>


</html>