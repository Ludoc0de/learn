<!-- header.php -->
<nav>
    <div>
        <a href="/learn/index.php?action=homePage">Site d'initiation</a>
        <button type="button">
            <span></span>
        </button>
        <div>
            <ul>
                <li>
                    <a href="/learn/index.php?action=homePage">Accueil</a>
                </li>
                <!-- add a condition only for admin acces  -->
                <?php if (isset($_SESSION["LOGGED_USER"])) { ?>
                <li>
                    <a href="/learn/index.php?action=addTutorial">Creation de tutoriel</a>
                </li>
                <li>
                    <a href="/learn/index.php?action=tutorials">Editer tutoriels</a>
                </li>
                <?php } ?>
                <li>
                    <a href="/learn/index.php?action=contact">Contact</a>
                </li>
                <?php if (isset($_SESSION["LOGGED_USER"])) { ?>
                <li>
                    <a href="/learn/logout.php">Déconnecté</a>
                </li>
                <?php } else { ?>
                <li>
                    <a href="/learn/index.php?action=login">Se connecter</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>