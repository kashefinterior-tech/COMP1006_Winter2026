<?php
require "includes/db.php";

// PDO prepared SELECT
$sql = "SELECT id, email FROM subscribers ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$subscribers = $stmt->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Subscribers</title>
</head>
<body>

  <h1>Subscriber List</h1>

  <?php if (count($subscribers) === 0): ?>
    <p>No subscribers yet.</p>
  <?php else: ?>
    <table border="1" cellpadding="8">
      <thead>
        <tr>
          <th>ID</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($subscribers as $s): ?>
          <tr>
            <td><?= htmlspecialchars($s["id"]) ?></td>
            <td><?= htmlspecialchars($s["email"]) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>

  <p><a href="index.php">Back to form</a></p>

</body>
</html>
