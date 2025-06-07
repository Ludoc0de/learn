<?php ob_start(); ?>
<div>
    <h1>Page administrateur!</h1>
    <?php foreach (
        $availableTutorials as $tutorial
    ) { ?>
        <h5>
            <?php echo $tutorial['title']; ?>
        </h5>
        <a>
            <?php echo $tutorial['link']; ?>
        </a>
        </br>
        <i>by <?php echo getAuthors($tutorial['author']); ?>
        <?php } ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>