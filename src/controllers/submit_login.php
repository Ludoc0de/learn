<?php
require_once('src/model.php');
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
    require('templates/login.php');
    // redirectToUrl('index.php');
}