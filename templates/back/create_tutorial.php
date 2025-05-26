<?php ob_start(); ?>
<div class="container">
    <?php require_once(__DIR__ . '/header.php'); ?>
    <h1>Ajoutez un tutoriel</h1>
    <form action="/learn/index.php?action=addTutorial" method="POST">
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
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>