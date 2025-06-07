<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber pour les mioches</title>
</head>

<body>
    <nav>
        <div>
            <a href="/learn/index.php?action=admin">Site d'initiation</a>
            <button type="button">
                <span></span>
            </button>
            <div>
                <ul>
                    <li>
                        <a href="/learn/index.php?action=admin">Accueil admin</a>
                    </li>
                    <!-- add a condition only for admin acces  -->
                    <?php if (isset($_SESSION["LOGGED_USER"])) { ?>
                    <li>
                        <a href="/learn/index.php?action=createTutorial">Creation de tutoriel</a>
                    </li>
                    <li>
                        <a href="/learn/index.php?action=tutorials">Editer tutoriels</a>
                    </li>
                    <li>
                        <a href="/learn/index.php?action=logout">Déconnecté</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <?= $content ?>
    <footer>
        <div>
            © 2025 Copyright:
            <a class="text-dark" href="index.php">La cyber pour les mioches</a>
        </div>
    </footer>
</body>

</html>