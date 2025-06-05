<?php
require_once('src/model.php');

function addTutorial()
{
    $alertMessage = null;
    // safe input, avoid space, check if data define else get ''
    $title = trim($_POST['title'] ?? '');
    $link = trim($_POST['link'] ?? '');
    $author =  $_SESSION["LOGGED_USER"]["email"];
    $is_enabled = isset($_POST['is_enabled']) ? 1 : 0;
    if (empty($title) || empty($link)) {
        $alertMessage = "Merci de renseigner tous les champs.";
    } else {
        createTutorials($title,  $link, $author, $is_enabled);
    }
    require('templates/back/create_tutorial.php');
}

function tutorials()
{
    $allTutorials = getAllTutorials();
    require('templates/back/get_all_tutorials.php');
}
//
function getTutorialById()
{
    $alertMessage = null;
    $getData = $_GET;
    if (!isset($getData['id']) || !is_numeric($getData['id'])) {
        $alertMessage = 'Il faut un identifiant de tutoriel pour la modifier.';
        return;
    }
    $id = $getData['id'];
    $tutorial = getTutorialByIdInDB($id);

    require('templates/back/update_view_tutorial.php');
}
//
function updateTutorial()
{
    $alertMessage = null;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $postData = $_POST;
        if (
            !isset($postData['title']) || trim($postData['title']) === '' ||
            !isset($postData['link']) || trim($postData['link']) === ''
        ) {
            $alertMessage = 'Il manque des informations dans le formulaire pour le soumettre.';
            return;
        }
        $id = $postData['id'];
        $title = $postData['title'];
        $link = $postData['link'];
        $author =  $_SESSION["LOGGED_USER"]["email"];
        $is_enabled = isset($postData['is_enabled']) ? 1 : 0;

        updateTutorialInDB($id, $title,  $link, $is_enabled);
    }

    redirectToUrl('index.php?action=tutorials');
}

function deleteTutorial()
{
    $alertMessage = null;
    $getData = $_GET;

    if (!isset($getData['id']) || !is_numeric($getData['id'])) {
        $alertMessage = 'Il faut un identifiant de tutoriel pour supprimer.';
        return;
    }
    $id = $getData['id'];
    deleteTutorialInDB($id);
    redirectToUrl('index.php?action=tutorials');
}

function logout()
{
    session_destroy();
    $_SESSION = [];
    redirectToUrl('index.php');
}