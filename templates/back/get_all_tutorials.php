<?php ob_start(); ?>
<div>
    <div class="text-center lg:text-left">
        <h1 class="text-5xl font-bold">Administrer les tutoriels</h1>
        <p class="py-6">
            Editer les tutoriels ici, soit modifier ou supprimer.
        </p>
    </div>
    <div class=" flex flex-wrap gap-6 justify-start my-10 lg:flex-row">
        <?php foreach (
            $allTutorials as $tutorial
        ) { ?>
        <div class="card w-96 bg-base-200 rounded-sm card-md shadow-sm my-6 lg:my-0">
            <div class="card-body">
                <h2 class="card-title"> <?php echo $tutorial['title']; ?></h2>
                <a> <?php echo $tutorial['link']; ?></a>
                <div class="justify-end card-actions">
                    <i>Par <?php echo getAuthors($tutorial['author']); ?></i>
                </div>
                <div class="justify-end card-actions">
                    <ul class="text-sm text-right space-y-1">
                        <!-- add a condition only for admin acces  -->
                        <?php if (isset($_SESSION["LOGGED_USER"])) { ?>
                        <li class="my-2">
                            <a href=" /learn/index.php?action=getTutorialId&id=<?php echo ($tutorial['tutorial_id']); ?>"
                                class="link link-hover text-blue-600">Éditer</a>
                        </li>
                        <li class="my-2">
                            <a href="/learn/index.php?action=deleteTutorial&id=<?php echo ($tutorial['tutorial_id']); ?>"
                                onclick="return confirm('attention suppression définitive !')"
                                class="link link-hover text-red-500">Supprimer</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <!--  -->
    <h1>Administrer les tutoriels</h1>
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
                <a href="/learn/index.php?action=getTutorialId&id=<?php echo ($tutorial['tutorial_id']); ?>">Éditer</a>
            </li>
            <li>
                <a href="/learn/index.php?action=deleteTutorial&id=<?php echo ($tutorial['tutorial_id']); ?>"
                    onclick="return confirm('attention suppression définitive !')">Supprimer</a>
            </li>
            <?php } ?>
        </ul>
    </div>

    <?php } ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>