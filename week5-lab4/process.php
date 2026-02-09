<?php
require "includes/db.php";

$email = trim($_POST["email"] ?? "");
$firstName = trim($_POST["first_name"] ?? "");

$errors = [];

// basic validation
if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = "Please enter a valid email address.";
}

if (!empty($errors)) {
  // show errors  
  foreach ($errors as $msg) {
    echo "<p>" . htmlspecialchars($msg) . "</p>";
  }
  exit;
}

// insert using PDO prepared statement
$sql = "INSERT INTO subscribers (email, first_name) VALUES (:email, :first_name)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
  ":email" => $email,
  ":first_name" => $firstName
]);

// confirm
header("Location: subscribers.php");
exit;
