<?php
session_start();
require('src/model.php');
session_destroy();
$_SESSION = [];
redirectToUrl('index.php');