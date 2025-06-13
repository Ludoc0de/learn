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

// function getAllTutorials(array $tutorials): array
// {
//     $getAll = [];
//     foreach ($tutorials as $tutorial) {
//         $getAll[] = $tutorial;
//     }
//     return $getAll;
// }

function getAllTutorials()
{
    $mysqlClient = dbConnect();
    $sqlQuery = "SELECT * FROM tutorials";
    $tutorialsStatement = $mysqlClient->prepare($sqlQuery);
    $tutorialsStatement->execute();
    $tutorials = $tutorialsStatement->fetchAll();

    $allTutorials = [];
    foreach ($tutorials as $tutorial) {
        $allTutorials[] = $tutorial;
    }
    return $allTutorials;
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

function createTutorialInDB(string $title, string $link, string $author, int $is_enabled)
{
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

function checkLoginUser($email, $password)
{
    $users = getUsersFromDB();
    foreach ($users as $user) {
        if (
            $user['email'] === $email &&
            $user['password'] === $password
        ) {
            $_SESSION["LOGGED_USER"] = [
                'full_name' => $user['full_name'],
                'email' => $user['email'],
                'user_id' => $user['users_id'],
            ];
            return true;
        }
    }
    return false;
}

function getTutorialByIdInDB($tutorialId)
{
    $mysqlClient = dbConnect();
    $getTutorialId = "SELECT * FROM tutorials WHERE tutorial_id = :id";
    $retrieveTutorialStatement = $mysqlClient->prepare($getTutorialId);
    $retrieveTutorialStatement->execute([
        'id' => $tutorialId,
    ]);
    $tutorial = $retrieveTutorialStatement->fetch(PDO::FETCH_ASSOC);
    return $tutorial;
}


function updateTutorialInDB(int $id, string $title, string $link, int $is_enabled)
{
    $mysqlClient = dbConnect();
    $updateTutorial = $mysqlClient->prepare(
        'UPDATE tutorials SET title = :title, link = :link, is_enabled=:is_enabled WHERE tutorial_id = :id'
    );
    $updateTutorial->execute([
        'id' => $id,
        'title' => $title,
        'link' => $link,
        'is_enabled' => $is_enabled,
    ]);
    return $updateTutorial;
}

function deleteTutorialInDB(int $id)
{
    $mysqlClient = dbConnect();
    $deleteTutorial = $mysqlClient->prepare(
        'DELETE FROM tutorials WHERE tutorial_id=:id'
    );
    $deleteTutorial->execute([
        'id' => $id,
    ]);
    return $deleteTutorial;
}

function dbConnect()
{
    // try {
    $mysqlClient = new PDO(
        "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_NAME . ";port=" . MYSQL_PORT . ";charset=utf8",
        MYSQL_USER,
        MYSQL_PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
    return $mysqlClient;
    // } catch (Exception $e) {
    //     die('Erreur : ' . $e->getMessage());
    // }
}