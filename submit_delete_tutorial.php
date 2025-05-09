<?php
session_start();
require_once __DIR__ . '/databaseconnect.php';
require_once(__DIR__ . '/functions.php');

$postData = $_POST;

if (
    !isset($postData['id'])
) {
    echo ('Il manque des informations dans le formulaire pour le soumettre.');
    return;
}

$id = $postData['id'];

$deleteTutorial = $mysqlClient->prepare(
    'DELETE FROM tutorials WHERE tutorial_id=:id'
);
$deleteTutorial->execute([
    'id' => $id,
]);

redirectToUrl('index.php');