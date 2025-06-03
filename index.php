<?php
session_start();
require_once('src/controllers/front.php');
require_once('src/controllers/back.php');
// require_once('src/controllers/submit_login.php');
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'login') {
        login();
    } elseif ($_GET['action'] == 'contact') {
        contact();
    } elseif ($_GET['action'] == 'addTutorial') {
        addTutorial();
    } elseif ($_GET['action'] == 'tutorials') {
        tutorials();
    } elseif ($_GET['action'] == 'getTutorialId') {
        getTutorialById();
    } elseif ($_GET['action'] == 'updateTutorial') {
        updateTutorial();
    } elseif ($_GET['action'] == 'deleteTutorial') {
        deleteTutorial();
    } elseif ($_GET['action'] == 'logout') {
        logout();
    }
} else {
    homepage();
}
// f