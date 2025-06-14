<?php
session_start();
require_once('src/controllers/front.php');
require_once('src/controllers/back.php');
// require_once('src/controllers/submit_login.php');
try {
    //code...
    if (isset($_GET['action']) && $_GET['action'] !== "") {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'home') {
                homepage();
            } elseif ($_GET['action'] == 'login') {
                login();
            } elseif ($_GET['action'] == 'contact') {
                contact();
            }
            // ADMIN
            // access only if connected
            elseif ($_GET['action'] == 'admin') {
                if (!isset($_SESSION['LOGGED_USER'])) {
                    redirectToUrl('index.php?action=login');
                }
                adminPage();
            } elseif ($_GET['action'] == 'createTutorial') {
                if (!isset($_SESSION['LOGGED_USER'])) {
                    redirectToUrl('index.php?action=login');
                }
                createTutorial();
            } elseif ($_GET['action'] == 'tutorials') {
                if (!isset($_SESSION['LOGGED_USER'])) {
                    redirectToUrl('index.php?action=login');
                }
                tutorials();
            } elseif ($_GET['action'] == 'getTutorialId') {
                if (!isset($_SESSION['LOGGED_USER'])) {
                    redirectToUrl('index.php?action=login');
                } elseif (isset($_GET['id']) && $_GET['id'] > 0) {
                    $tutorialId = (int) $_GET['id'];
                    getTutorialById($tutorialId);
                } else {
                    throw new Exception('Identifiant de tutoriel manquant ou invalide.');
                }
            } elseif ($_GET['action'] == 'updateTutorial') {
                if (!isset($_SESSION['LOGGED_USER'])) {
                    redirectToUrl('index.php?action=login');
                } elseif (isset($_GET['id']) && $_GET['id'] > 0) {
                    $tutorialId = (int) $_GET['id'];
                    updateTutorial($tutorialId);
                } else {
                    throw new Exception('Identifiant de tutoriel manquant ou invalide.');
                }
            } elseif ($_GET['action'] == 'deleteTutorial') {
                if (!isset($_SESSION['LOGGED_USER'])) {
                    redirectToUrl('index.php?action=login');
                } elseif (isset($_GET['id']) && $_GET['id'] > 0) {
                    $tutorialId = (int) $_GET['id'];
                    deleteTutorial($tutorialId);
                } else {
                    throw new Exception('Identifiant de tutoriel manquant ou invalide.');
                }
            } elseif ($_GET['action'] == 'logout') {
                logout();
            } else {
                throw new Exception("Cette page n'existe pas.");
            }
        }
    } else {
        if (isset($_SESSION['LOGGED_USER'])) {
            adminPage();
        } else {
            homepage();
        }
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
// f