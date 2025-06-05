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
    // safe input, avoid space, check if data define else get ''
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $alertMessage = null;

    if (empty($email) || empty($password)) {
        $alertMessage = "Merci de renseigner tous les champs.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $alertMessage = "Format d'email invalide.";
    } else {
        checkLoginUser($email, $password);
        $alertMessage = "Identifiant ou mot de passe incorrect.";
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