<!-- header.php -->
<nav>
    <div>
        <a href="index.php">Site d'initiation</a>
        <button type="button">
            <span></span>
        </button>
        <div>
            <ul>
                <li>
                    <a href="index.php">Accueil</a>
                </li>
                <li>
                    <a href="contact.php">Contact</a>
                </li>
                <?php if (isset($_SESSION["LOGGED_USER"])) { ?>
                <li>
                    <a href="logout.php">Déconnecté</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>