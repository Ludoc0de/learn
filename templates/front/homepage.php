<?php ob_start(); ?>
<div>
    <h1>Ici on s'initie à la Cyber!</h1>
    <div class="flex flex-row">
        <?php foreach (
            $availableTutorials as $tutorial
        ) { ?>
        <div class="flex flex-1 card w-96 bg-base-200 rounded-sm card-md shadow-sm m-10">
            <div class="card-body">
                <h2 class="card-title"> <?php echo $tutorial['title']; ?></h2>
                <a> <?php echo $tutorial['link']; ?></a>
                <div class="justify-end card-actions">
                    <i>Par <?php echo getAuthors($tutorial['author']); ?></i>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>