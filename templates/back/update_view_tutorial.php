<?php ob_start(); ?>
<div class="container">
    <?php require_once(__DIR__ . '/header.php'); ?>
    <h1>Mettre à jour un tutoriel</h1>
    <?php
    if ($alertMessage) {
    ?>
        <div class="alert alert-danger">
            <h3><?= $alertMessage ?></h3>
        </div>
    <?php
    } else { ?>
        <form action="/learn/index.php?action=updateTutorial&id=<?php echo ($tutorial['tutorial_id']); ?>" method="POST">
            <div>
                <label for="id">Identifiant du tutoriel</label>
                <input type="hidden" id="id" name="id" value="<?php echo ($tutorial['tutorial_id']); ?>">
            </div>
            <div>
                <label for="title">Titre du tutoriel</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($tutorial['title']); ?>">
            </div>
            <div>
                <label for="link">liens de la video</label>
                <input type="text" id="link" name="link" value="<?php echo htmlspecialchars($tutorial['link']); ?>">
            </div>
            <div>
                <label for=" is_enabled">Rendre visible</label>
                <input type="checkbox" name="is_enabled" value="activé" value="<?php echo ($tutorial['is_enabled']); ?>">
            </div>
            <button type=" submit" class="btn btn-primary">Envoyer</button>
        </form>
        <br />
</div>
<?php  }
?>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>