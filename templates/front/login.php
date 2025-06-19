<?php ob_start();
if (!isset($_SESSION["LOGGED_USER"])) { ?>
<div class="hero bg-base-200 min-h-screen">
    <div class="hero-content flex-col lg:flex-row-reverse">
        <div class="text-center lg:text-left">
            <h1 class="text-5xl font-bold">Se connecter!</h1>
            <p class="py-6">
                Bienvennue sur l'espace d'authentification! <br>
                Ajouter vos Identifiants afin de vous connecter en tant qu'utilisateur enregistré à notre platforme.
            </p>
        </div>
        <form action="/learn/index.php?action=login" method="POST">
            <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
                <div class="card-body">
                    <fieldset class="fieldset">
                        <label class="label">Email</label>
                        <input type="email" id="email" name="email" class="input" placeholder="Email" />
                        <label class="label">Mot de passe</label>
                        <input type="password" id="password" name="password" class="input" placeholder="Password" />
                        <!-- si message d'erreur on l'affiche -->
                        <?php
                            if ($alertMessage) {
                            ?>
                        <div class="alert alert-danger">
                            <?= $alertMessage ?>
                        </div>
                        <?php
                            }
                            ?>
                        <button type="submit" class="btn btn-neutral mt-4">Se connecter</button>
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
</div>
<?php } else { ?>
<div class="hero bg-base-200 min-h-screen">
    <div class="hero-content flex-col lg:flex-row-reverse">
        <div>
            <h1 class="text-5xl font-bold">Bienvennue <?php echo $_SESSION["LOGGED_USER"]["full_name"]; ?> sur le site!
            </h1>
            <p class="py-6 text-2xl">
                Tu es déjà connecté!
            </p>
            <a href="/learn/index.php?action=admin" class="link text-xl">Retour sur la page Admin</a>
        </div>
    </div>
</div>

<?php };
$content = ob_get_clean();
require('layout.php') ?>