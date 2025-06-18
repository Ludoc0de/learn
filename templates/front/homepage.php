<?php ob_start(); ?>
<div class="px-5">
    <div class="hero bg-base-200 rounded-sm min-h-screen">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold">Ici on s'initie à la Cyber!</h1>
                <p class="py-6">
                    "Mieux comprendre la cybers sécurité, c'est mieux protéger son identité numérique."
                </p>
                <a class="btn btn-primary">Se connecter</a>
            </div>
        </div>
    </div>
    <div class="flex flex-row justify-between my-10">
        <?php foreach (
            $availableTutorials as $tutorial
        ) { ?>
        <div class="card w-96 bg-base-200 rounded-sm card-md shadow-sm">
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