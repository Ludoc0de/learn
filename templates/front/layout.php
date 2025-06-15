<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber pour les mioches</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <nav>
        <div>
            <!-- <a href="/learn/index.php?action=home">Site d'initiation</a>
            <button type="button">
                <span></span>
            </button> -->
            <div>
                <!--  -->
                <div class="navbar bg-base-100 shadow-sm">
                    <div class="dropdown">
                        <div class="flex-none">
                            <button class="btn btn-square btn-ghost">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="inline-block h-5 w-5 stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                            <ul tabindex="0"
                                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                                <li><a href="/learn/index.php?action=home">Accueil</a></li>
                                <li><a href="/learn/index.php?action=contact">Contact</a></li>
                                <li><a href="/learn/index.php?action=login">Se connecter</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex-1">
                        <a class="btn btn-ghost text-xl  href=/learn/index.php?action=home">Site d'initiation</a>
                    </div>
                </div>
                <!--  -->
                <!-- <ul>
                    <li>
                        <a href="/learn/index.php?action=home">Accueil</a>
                    </li>
                    <li>
                        <a href="/learn/index.php?action=contact">Contact</a>
                    </li>
                    <li>
                        <a href="/learn/index.php?action=login">Se connecter</a>
                    </li>
                </ul> -->
            </div>
        </div>
    </nav>
    <?= $content ?>
    <footer class="footer sm:footer-horizontal footer-center bg-base-300 text-base-content p-4">
        <aside>
            <p>Copyright © {new Date().getFullYear()} - Tout les droits réserver pour La cyber pour les mioches</p>
        </aside>
    </footer>
    <!-- <footer>
        <div>
            © 2025 Copyright:
            <a class="text-dark" href="index.php">La cyber pour les mioches</a>
        </div>
    </footer> -->
</body>

</html>