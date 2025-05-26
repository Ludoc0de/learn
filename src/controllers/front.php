<?php
require_once('src/model.php');

function homepage()
{
    $availableTutorials = getTutorials();
    require('templates/front/homepage.php');
}

function login()
{
    $users = getUsersFromDB();
    $postData = $_POST;
    if (
        !isset($postData['email'])
        || !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)
        || empty($postData['password'])
        || trim($postData['password']) === ''
    ) {
        $_SESSION["LOGGIN_ERROR_MESSAGE"] = "Complétez votre email et mdp svp";
    } else {
        foreach ($users as $user) {
            if (
                $user['email'] === $postData['email'] &&
                $user['password'] === $postData['password']
            ) {
                $_SESSION["LOGGED_USER"] = [
                    'full_name' => $user['full_name'],
                    'email' => $user['email'],
                    'user_id' => $user['users_id'],
                ];
                redirectToUrl('index.php');
            }
        }
        if (!isset($_SESSION["LOGGED_USER"])) {
            $_SESSION["LOGGIN_ERROR_MESSAGE"] = "mail et mot de passe invalide, ressayer svp";
        }
    }
    require('templates/front/login.php');
}

function contact()
{
    $contactMessage = null;
    $postData = $_POST;
    if (
        !isset($postData['email'])
        || !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)
        || empty($postData['message'])
        || trim($postData['message']) === ''
    ) {
        $contactMessage = 'Il faut un email et un message valides pour soumettre le formulaire.';
    }
    require('templates/front/contact.php');
}

// function loginPage()
// {
//     $loginMessage = null;

//     if (!empty($_POST['nickname']) && !empty($_POST['pass'])) {
//         checkLogin($_POST['nickname'], $_POST['pass']);
//         $loginMessage = "identifiant ou mot de passe incorrect";
//     } elseif (isset($_POST['nickname']) || isset($_POST['pass'])) {
//         $loginMessage = "merci de renseigner tous les champs";
//     }

//     require 'view\frontend\login.php';
// }