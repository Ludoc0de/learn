<?php
require_once('src/model.php');

function addTutorial()
{
    $alertMessage = null;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $postData = $_POST;
        if (
            !isset($postData['title'])
            || !isset($postData['link'])
            || empty($postData['title'])
            || empty($postData['link'])
        ) {
            $alertMessage = 'Il faut renseigner le formulaire pour le soumettre.';
        } else {
            $title = $postData['title'];
            $link = $postData['link'];
            $author =  $_SESSION["LOGGED_USER"]["email"];
            $is_enabled = isset($postData['is_enabled']) ? 1 : 0;
            createTutorials($title,  $link, $author, $is_enabled);
        }
    }
    require('templates/back/create_tutorial.php');
}