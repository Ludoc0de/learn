<?php
session_start();
require_once(__DIR__ . '/functions.php');
session_destroy();
$_SESSION = [];
redirectToUrl('index.php');