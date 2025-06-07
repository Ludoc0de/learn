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
            <a href="/learn/index.php?action=home">Site d'initiation</a>
            <button type="button">
                <span></span>
            </button>
            <div>
                <ul>
                    <li>
                        <a href="/learn/index.php?action=home">Accueil</a>
                    </li>
                    <li>
                        <a href="/learn/index.php?action=contact">Contact</a>
                    </li>
                    <li>
                        <a href="/learn/index.php?action=login">Se connecter</a>
                    </li>
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