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
        'link' => 'https://www.google.com',
        'author' => 'lisa.j@exemple.com',
        'is_enabled' => false,
    ],
    [
       'title' => 'Équipe rouge!',
        'link' => 'https://www.google.com',
        'author' => 'lisa.j@exemple.com',
        'is_enabled' => true,
    ],
];

foreach($videos as $video){

    if(array_key_exists("is_enabled", $video) && $video["is_enabled"] === true){
         echo "La clé 'is_enabled' se trouve dans '{$video['title']}' !";
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
    <h1>test</h1>
    <p><?php echo "et voila test!" ?></p>
</body>

</html>