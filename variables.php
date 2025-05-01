<?php
require_once __DIR__ . '/databaseconnect.php';

// On récupère tout le contenu de la table users
$sqlQuery = "SELECT * FROM users";
$usersStatement = $mysqlClient->prepare($sqlQuery);
$usersStatement->execute();
$users = $usersStatement->fetchAll();

// On récupère tout le contenu de la table tutorials
$sqlQuery = "SELECT * FROM tutorials";
$tutorialsStatement = $mysqlClient->prepare($sqlQuery);
$tutorialsStatement->execute();
$tutorials = $tutorialsStatement->fetchAll();

// $users = [
//     [
//         'full_name' => 'Lisa J',
//         'email' => 'lisa.j@exemple.com',
//         'password' => '123',
//     ],
//     [
//         'full_name' => 'Ludo C',
//         'email' => 'ludo.c@exemple.com',
//         'password' => '123',
//     ],
//     [
//         'full_name' => 'Laurène Castor',
//         'email' => 'laurene.castor@exemple.com',
//         'password' => '123',
//     ],
// ];

// $videos = [
//     [
//         'title' => 'Introduction à la Cyber',
//         'link' => 'https://www.google.com',
//         'author' => 'lisa.j@exemple.com',
//         'is_enabled' => true,
//     ],
//     [
//         'title' => 'Équipe bleu!',
//         'link' => 'https://www.blueteam.com',
//         'author' => 'lisa.j@exemple.com',
//         'is_enabled' => false,
//     ],
//     [
//         'title' => 'Équipe rouge!',
//         'link' => 'https://www.redteam.com',
//         'author' => 'ludo.c@exemple.com',
//         'is_enabled' => true,
//     ],
// ];