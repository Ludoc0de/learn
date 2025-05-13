<?php
session_start();
// require_once(__DIR__ . '/variables.php');
require('src/model.php');

$availableTutorials = getTutorials();

// $getAll = getAllTutorials($tutorials);

require('templates/homepage.php');