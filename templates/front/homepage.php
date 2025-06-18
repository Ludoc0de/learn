<?php ob_start(); ?>
<div>
    <h1>Ici on s'initie à la Cyber!</h1>
    <div class="flex flex-row">
        <?php foreach (
            $availableTutorials as $tutorial
        ) { ?>
        <div class="flex flex-1 card w-96 bg-base-200 rounded-sm card-md shadow-sm m-10">
            <div class="card-body">
                <h2 class="card-title"> <?php echo $tutorial['title']; ?></h2>
                <a> <?php echo $tutorial['link']; ?></a>
                <div class="justify-end card-actions">
                    <i>Par <?php echo getAuthors($tutorial['author']); ?></i>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- <?php foreach (
                    $availableTutorials as $tutorial
                ) { ?>
            <div class="flex flex-col flex-1 bg-base-300 rounded-sm m-2 p-4">
                <h5 class="flex">
                <?php echo $tutorial['title']; ?>
            </h5>
            <a>
                <?php echo $tutorial['link']; ?>
            </a>
            <i>by <?php echo getAuthors($tutorial['author']); ?> </i>
        </div>
        <?php } ?> -->
    </div>
    <!-- <h1>Ici on s'initie à la Cyber!</h1>
    <?php foreach (
        $availableTutorials as $tutorial
    ) { ?>
    <h5>
        <?php echo $tutorial['title']; ?>
    </h5>
    <a>
        <?php echo $tutorial['link']; ?>
    </a>
    </br>
    <i>by <?php echo getAuthors($tutorial['author']); ?></i>
        <?php } ?> -->
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>