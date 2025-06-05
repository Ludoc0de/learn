<?php
session_start();
require_once('src/controllers/front.php');
require_once('src/controllers/back.php');
// require_once('src/controllers/submit_login.php');
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
        elseif ($_GET['action'] == 'addTutorial') {
            if (!isset($_SESSION['LOGGED_USER'])) {
                redirectToUrl('index.php?action=login');
            }
            addTutorial();
        } elseif ($_GET['action'] == 'tutorials') {
            if (!isset($_SESSION['LOGGED_USER'])) {
                redirectToUrl('index.php?action=login');
            }
            tutorials();
        } elseif ($_GET['action'] == 'getTutorialId') {
            if (!isset($_SESSION['LOGGED_USER'])) {
                redirectToUrl('index.php?action=login');
            }
            // if (isset($_GET['id']) && $_GET['id'] > 0)
            getTutorialById();
        } elseif ($_GET['action'] == 'updateTutorial') {
            if (!isset($_SESSION['LOGGED_USER'])) {
                redirectToUrl('index.php?action=login');
            }
            // if (isset($_GET['id']) && $_GET['id'] > 0)
            updateTutorial();
        } elseif ($_GET['action'] == 'deleteTutorial') {
            if (!isset($_SESSION['LOGGED_USER'])) {
                redirectToUrl('index.php?action=login');
            }
            // if (isset($_GET['id']) && $_GET['id'] > 0)
            deleteTutorial();
        } elseif ($_GET['action'] == 'logout') {
            logout();
        }
    } else {
        echo ("dont exist");
    }
} else {
    homepage();
}
// f