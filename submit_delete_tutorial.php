<?php
session_start();
require_once __DIR__ . '/databaseconnect.php';
require_once(__DIR__ . '/functions.php');

$postData = $_POST;

if (
    !isset($postData['id'])
    // || !isset($postData['title'])
    // || !isset($postData['link'])
) {
    echo ('Il manque des informations dans le formulaire pour le soumettre.');
    return;
}

$id = $postData['id'];
// $title = $postData['title'];
// $link = $postData['link'];
// $author =  $_SESSION["LOGGED_USER"]["email"];
// $is_enabled = isset($postData['is_enabled']) ? 1 : 0;

$deleteTutorial = $mysqlClient->prepare(
    'DELETE FROM tutorials WHERE tutorial_id=:id'
    // 'UPDATE tutorials SET title = :title, link = :link, is_enabled=:is_enabled WHERE tutorial_id = :id'
);
$deleteTutorial->execute([
    'id' => $id,
    // 'title' => $title,
    // 'link' => $link,
    // 'is_enabled' => $is_enabled,
]);

redirectToUrl('index.php');