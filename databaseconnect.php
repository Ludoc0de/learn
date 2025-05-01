<?php
require_once __DIR__ . '/configuration/mysql.php';

try {
    $mysqlClient = new PDO(
        "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_NAME . ";port=" . MYSQL_PORT . ";charset=utf8",
        MYSQL_USER,
        MYSQL_PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}