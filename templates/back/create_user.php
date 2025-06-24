<?php ob_start(); ?>
<div class="hero bg-base-200 min-h-screen">
    <div class="hero-content flex-col lg:flex-row-reverse">
        <div class="text-center lg:text-left">
            <h1 class="text-5xl font-bold">S'enregistrer!</h1>
            <p class="py-6">
                Bienvennue sur l'ajout d'utilisateur! <br>
                Ajouter vos Identifiants afin d'ajouter un utilisateur pour accéder à l'administration.
            </p>
        </div>
        <form action="/learn/index.php?action=createUser" method="POST">
            <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
                <div class="card-body">
                    <fieldset class="fieldset">
                        <label class="label">Nom</label>
                        <input type="text" id="full_name" name="full_name" class="input" placeholder="Nom" />
                        <label class="label">Email</label>
                        <input type="email" id="email" name="email" class="input" placeholder="Email" />
                        <label class="label">Mot de passe</label>
                        <input type="password" id="password" name="password" class="input" placeholder="Password" />
                        <!-- if error message we can see -->
                        <?php
                        if ($alertMessage) {
                        ?>
                        <div class="alert alert-danger">
                            <?= $alertMessage ?>
                        </div>
                        <?php
                        }
                        ?>
                        <button type="submit" class="btn btn-primary mt-4">enregistré</button>
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>