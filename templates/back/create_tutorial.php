<?php ob_start(); ?>
<div>
    <div class="text-center lg:text-left">
        <h1 class="text-5xl font-bold">Ajoutez un tutoriel</h1>
        <p class="py-6">
            Ajouter les nouvelles initiaions à la cyber!
        </p>
    </div>
    <form action="/learn/index.php?action=createTutorial" method="POST">
        <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
            <div class="card-body">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Titre du tutoriel</legend>
                    <input type="text" id="title" class="input" name="title" placeholder="Titre ici" />
                    <legend class="fieldset-legend">Liens de la video</legend>
                    <input type="text" id="link" class="input" name="link" placeholder="Liens ici" />
                    <legend class="fieldset-legend">Rendre le lien visible</legend>
                    <label class="label">
                        <input type="checkbox" checked="checked" class="checkbox" name="is_enabled" value="activé" />
                        Visible!
                    </label>
                    <!-- if error message we can see -->
                    <?php
                    if ($alertMessage) {
                    ?>
                    <div class="alert alert-danger mt-4">
                        <?= $alertMessage ?>
                    </div>
                    <?php
                    }
                    ?>
                    <button type="submit" class="btn btn-primary mt-4">Envoyer</button>
                </fieldset>
            </div>
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>