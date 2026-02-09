<?php
require "includes/db.php";

$email = trim($_POST["email"] ?? "");

if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  die("Please enter a valid email.");
}

// PDO prepared INSERT
$sql = "INSERT INTO subscribers (email) VALUES (:email)";
$stmt = $pdo->prepare($sql);
$stmt->execute([":email" => $email]);

header("Location: subscribers.php");
exit;
