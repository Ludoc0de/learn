<?php ob_start(); ?>
<div>
    <h1>Ici on s'initie à la Cyber!</h1>
    <?php foreach ($allTutorials as $tutorial) { ?>
    <h5>
        <?php echo $tutorial['title']; ?>
    </h5>
    <a>
        <?php echo $tutorial['link']; ?>
    </a>
    </br>
    <i> by <?php echo getAuthors($tutorial['author']); ?></i>

    <div>
        <ul>
            <!-- add a condition only for admin acces  -->
            <?php if (isset($_SESSION["LOGGED_USER"])) { ?>
            <li>
                <a href="/learn/index.php?action=updateTutorial">Éditer</a>
                <!-- <a href="update_tutorial.php?id=<?php echo ($tutorial['tutorial_id']); ?>">Éditer</a> -->
            </li>
            <li>
                <a href=" delete_tutorial.php?id=<?php echo ($tutorial['tutorial_id']); ?>">Supprimer</a>
            </li>
            <?php } ?>
        </ul>
    </div>

    <?php } ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>