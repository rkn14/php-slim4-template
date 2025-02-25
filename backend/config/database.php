<?php
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

try {
    $pdo = new PDO(
        "mysql:host=db;dbname=" . $_ENV["MYSQL_DATABASE"] . ";charset=utf8",
        $_ENV["MYSQL_USER"],
        $_ENV["MYSQL_PASSWORD"],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

return $pdo;
