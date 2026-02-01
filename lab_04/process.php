<?php require "includes/header.php"; ?>

<?php

$firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
$lastName  = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
$email     = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$items = $_POST['items'] ?? [];
$comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_SPECIAL_CHARS);

$errors = [];


if (!$firstName) {
  $errors[] = "First name is required.";
}

if (!$lastName) {
  $errors[] = "Last name is required.";
}

if (!$email) {
  $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = "Please enter a valid email.";
}


$orderedItems = [];

foreach ($items as $item => $qty) {
  if (filter_var($qty, FILTER_VALIDATE_INT) !== false && $qty > 0) {
    $orderedItems[$item] = $qty;
  }
}

if (count($orderedItems) === 0) {
  $errors[] = "Please order at least one treat.";
}
?>

<main>

<?php if (!empty($errors)) : ?>

  <h2>Something went wrong 😬</h2>
  <ul>
    <?php foreach ($errors as $error) : ?>
      <li><?php echo $error; ?></li>
    <?php endforeach; ?>
  </ul>

<?php else : ?>

  <h2>Thanks for your order, <?php echo $firstName; ?>! 🎉</h2>

  <p>We’ve received the following items:</p>

  <ul>
    <?php foreach ($orderedItems as $item => $qty) : ?>
      <li><?php echo ucfirst($item); ?> × <?php echo $qty; ?></li>
    <?php endforeach; ?>
  </ul>

  <?php if ($comments) : ?>
    <p><strong>Notes:</strong> <?php echo $comments; ?></p>
  <?php endif; ?>

<?php endif; ?>

</main>

<?php require "includes/footer.php"; ?>
