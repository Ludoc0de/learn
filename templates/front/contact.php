<?php ob_start(); ?>
<div class="container">
    <h1>Contactez nous</h1>
    <form action="/learn/index.php?action=contact" method="POST">
        <?php
        if ($contactMessage) {
        ?>
            <div class="alert alert-danger">
                <?= $contactMessage ?>
            </div>
        <?php
        }
        ?>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" aria-describedby="email-help">
            <div id="email-help" class="form-text">Nous ne revendrons pas votre email.</div>
        </div>
        <div>
            <label>Votre message</label>
            <textarea placeholder="Exprimez vous" id="message" name="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <br />
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>