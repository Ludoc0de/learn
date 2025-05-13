<?php
require('configuration/mysql.php');

function redirectToUrl(string $url): never
{
    header("Location: {$url}");
    exit();
}

function isValidTutorial(array $tutorial): bool
{

    if (array_key_exists("is_enabled", $tutorial)) {
        $isAvailable = $tutorial["is_enabled"];
    } else {
        $isAvailable = false;
    }

    return $isAvailable;
}

function getAllTutorials(array $tutorials): array
{
    $getAll = [];
    foreach ($tutorials as $tutorial) {
        $getAll[] = $tutorial;
    }
    return $getAll;
}

// function getTutorials(array $tutorials): array
// {
//     $availableTutorials = [];
//     foreach ($tutorials as $tutorial) {
//         if (isValidTutorial($tutorial)) {
//             $availableTutorials[] = $tutorial;
//         }
//     }

//     return $availableTutorials;
// }

function getTutorials()
{
    $mysqlClient = dbConnect();
    $sqlQuery = "SELECT * FROM tutorials";
    $tutorialsStatement = $mysqlClient->prepare($sqlQuery);
    $tutorialsStatement->execute();
    $tutorials = $tutorialsStatement->fetchAll();

    $availableTutorials = [];
    foreach ($tutorials as $tutorial) {
        if (isValidTutorial($tutorial)) {
            $availableTutorials[] = $tutorial;
        }
    }

    return $availableTutorials;
}

function createTutorials(string $title, string $link, string $author, int $is_enabled) {
$mysqlClient = dbConnect();
$insertTutorial = $mysqlClient->prepare(
    'INSERT INTO tutorials(title, link, author, is_enabled)
    VALUE (:title, :link, :author, :is_enabled)'
);
$insertTutorial->execute([
    'title' => $title,
    'link' => $link,
    'author' => $author,
    'is_enabled' => $is_enabled,
]);
return $insertTutorial;
}

// function getAuthors(string $authorEmail, array $users): string
// {
//     foreach ($users as $user) {
//         if ($authorEmail === $user['email']) {
//             return $user['full_name'];
//         }
//     }
// }

function getAuthors($authorEmail)
{
    $mysqlClient = dbConnect();
    $sqlQuery = "SELECT * FROM users";
    $usersStatement = $mysqlClient->prepare($sqlQuery);
    $usersStatement->execute();
    $users = $usersStatement->fetchAll();

    foreach ($users as $user) {
        if ($authorEmail === $user['email']) {
            return $user['full_name'];
        }
    }
}

function getUsersFromDB()
{
    $mysqlClient = dbConnect();
    $sqlQuery = "SELECT * FROM users";
    $usersStatement = $mysqlClient->prepare($sqlQuery);
    $usersStatement->execute();
    $getAllUsers = $usersStatement->fetchAll();

    $users = [];
    foreach ($getAllUsers as $user) {
        $users[] = $user;
    }

    return $users;
}



function dbConnect()
{
    try {
        $mysqlClient = new PDO(
            "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_NAME . ";port=" . MYSQL_PORT . ";charset=utf8",
            MYSQL_USER,
            MYSQL_PASSWORD,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        return $mysqlClient;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}