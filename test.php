<?php
$users = [
    [
        'full_name' => 'Lisa J',
        'email' => 'lisa.j@exemple.com',
        'age' => 34,
    ],
    [
        'full_name' => 'Ludo C',
        'email' => 'ludo.c@exemple.com',
        'age' => 34,
    ],
    [
        'full_name' => 'Laurène Castor',
        'email' => 'laurene.castor@exemple.com',
        'age' => 28,
    ],
];

for($lines=0; $lines <= 2 ; $lines++){
     echo $users[$lines]['full_name'] . ' ' . $users[$lines]['email'] . '<br />';
}

$videos = [
    [
        'title' => 'Introduction à la Cyber',
        'link' => 'https://www.google.com',
        'author' => 'lisa.j@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Équipe bleu!',
        'link' => 'https://www.blueteam.com',
        'author' => 'lisa.j@exemple.com',
        'is_enabled' => false,
    ],
    [
       'title' => 'Équipe rouge!',
        'link' => 'https://www.redteam.com',
        'author' => 'ludo.c@exemple.com',
        'is_enabled' => true,
    ],
];

function isValidVideo(array $video) : bool
{

    if(array_key_exists("is_enabled", $video)){
            $isAvailable = $video["is_enabled"];
    } else {
            $isAvailable = false;
    }

    return $isAvailable;

}


function getVideos(array $videos) : array
{
    $availableVideos = [];
    foreach($videos as $video){
        if(isValidVideo($video)){
                $availableVideos[] = $video;
        }
    }

    return $availableVideos;

}

function getAuthors(string $authorEmail, array $users): string
{
    foreach($users as $user){
        if ($authorEmail === $user['email']) {
            return $user['full_name'];
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ici on s'initie à la Cyber!</h1>
    <?php foreach(getVideos($videos) as $video){ ?>
    <h3>
        <?php echo $video['title']; ?>
    </h3>
    <a>
        <?php echo $video['link']; ?>
    </a>
    </br>
    <i> by <?php echo getAuthors($video['author'], $users); ?></i>
    <?php }?>

</body>

</html>