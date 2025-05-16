<?php
require_once('src/model.php');
function homepage()
{
    $availableTutorials = getTutorials();
    require('templates/homepage.php');
}