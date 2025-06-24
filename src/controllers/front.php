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
        $success = checkLoginUser($email, $password);
        if ($success) {
            header("Location: index.php?action=tutorials");
            exit;
        } else {
            $alertMessage = "Identifiant ou mot de passe incorrect.";
        }
    }
    require('templates/front/login.php');
}

function contact()
{
    $alertMessage = null;
    // safe input, avoid space, check if data define else get ''
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $postData = $_POST;
    if (empty($email) || empty($message)) {
        $alertMessage = "Merci de renseigner tous les champs.";
    }
    require('templates/front/contact.php');
}