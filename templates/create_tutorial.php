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
        <h1>Ajoutez un tutoriel</h1>
        <form action="submit_tutorial.php" method="POST">
            <div>
                <label for="title">Titre du tutoriel</label>
                <input type="text" id="title" name="title">
            </div>
            <div>
                <label for="link">liens de la video</label>
                <input type="text" id="link" name="link">
            </div>
            <div>
                <label for="is_enabled">Rendre visible</label>
                <input type="checkbox" name="is_enabled" value="activé">
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <br />
    </div>
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>


</html>