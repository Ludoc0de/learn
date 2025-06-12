<?php
require_once('src/model.php');

function adminPage()
{
    $availableTutorials = getTutorials();
    require('templates/back/admin_page.php');
}

function createTutorial()
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
        createTutorialInDB($title,  $link, $author, $is_enabled);
    }
    require('templates/back/create_tutorial.php');
}

function tutorials()
{
    $allTutorials = getAllTutorials();
    require('templates/back/get_all_tutorials.php');
}

function getTutorialById($tutorialId)
{
    $alertMessage = null;
    if ($tutorialId <= 0) {
        $alertMessage = 'Il faut un identifiant de tutoriel pour la modifier.';
        return;
    }
    $tutorial = getTutorialByIdInDB($tutorialId);
    if (!$tutorial) {
        $alertMessage = "Le tutoriel n'existe pas ou a été supprimé.";
        require('templates/back/update_view_tutorial.php');
        return;
    }
    require('templates/back/update_view_tutorial.php');
}

function updateTutorial($tutorialId)
{
    $alertMessage = null;
    // safe input, avoid space, check if data define else get ''
    $id = $tutorialId;
    $title = trim($_POST['title'] ?? '');
    $link = trim($_POST['link'] ?? '');
    $is_enabled = isset($_POST['is_enabled']) ? 1 : 0;
    if (empty($title) || empty($link)) {
        $alertMessage = "Merci de renseigner tous les champs.";
    } else {
        updateTutorialInDB($id, $title,  $link, $is_enabled);
    }
    redirectToUrl('index.php?action=tutorials');
}


function deleteTutorial($tutorialId)
{
    $alertMessage = null;
    $id = $tutorialId;
    if ($id <= 0) {
        $alertMessage = 'Il faut un identifiant de tutoriel pour le supprimer.';
        return;
    }
    deleteTutorialInDB($id);
    header("Location: index.php?action=tutorials");
    exit;
}

function logout()
{
    session_destroy();
    $_SESSION = [];
    redirectToUrl('index.php?action=home');
}