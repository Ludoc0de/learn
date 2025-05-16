<?php
session_start();
require_once('src/controllers/homepage.php');
require_once('src/controllers/submit_login.php');
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'login') {
        login();
    }
} else {
    homepage();
}