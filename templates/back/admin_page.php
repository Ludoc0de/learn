<?php ob_start(); ?>
<div>
    <div class="hero bg-base-200 rounded-sm min-h-screen">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold">Page administrateur!</h1>
                <p class="py-6">
                    "Mieux comprendre la cybers sécurité, c'est mieux protéger son identité numérique."
                </p>
                <a href="index.php?action=createTutorial" class=" btn btn-primary">Créer un tutoriel!

                </a>
            </div>
        </div>
        <img src="public/images/arrow.svg" alt="flèche" class="relative top-50 left-32 animate-pulse">
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>