<?php
$dsn = "mysql:host=localhost;dbname=YOUR_DB_NAME;charset=utf8mb4";
$user = "root";
$pass = "YOUR_PASSWORD";

$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
  $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
  die("Database connection failed.");
}
