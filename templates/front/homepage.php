<?php ob_start(); ?>
<div>
    <div class="hero bg-base-200 rounded-sm min-h-screen">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold">Ici on s'initie à la Cyber!</h1>
                <p class="py-6">
                    "Mieux comprendre la cybers sécurité, c'est mieux protéger son identité numérique."
                </p>
                <a href="index.php?action=login" class=" btn btn-primary">Se connecter

                </a>
            </div>
        </div>
        <img src="public/images/arrow.svg" alt="flèche" class="relative top-50 left-32 animate-pulse">
    </div>
    <div class="flex flex-wrap gap-6 justify-start my-10 lg:flex-row">
        <?php foreach (
            $availableTutorials as $tutorial
        ) { ?>
        <div class="card w-96 bg-base-200 rounded-sm card-md shadow-sm my-6 lg:my-0">
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