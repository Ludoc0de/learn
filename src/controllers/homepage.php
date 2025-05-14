<?php
session_start();
require('src/model.php');
function homepage()
{
    $availableTutorials = getTutorials();
    require('templates/homepage.php');
}