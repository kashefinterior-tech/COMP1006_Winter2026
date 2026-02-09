<?php
require "includes/db.php";

// prepared SELECT 
$sql = "SELECT id, email, first_name, created_at
        FROM subscribers
        ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$subscribers = $stmt->fetchAll();
?>

<h2>Subscriber List</h2>

<?php if (count($subscribers) === 0): ?>
  <p>No subscribers yet.</p>
<?php else: ?>
  <table border="1" cellpadding="8">
    <thead>
      <tr>
        <th>ID</th>
        <th>Email</th>
        <th>First Name</th>
        <th>Joined</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($subscribers as $s): ?>
        <tr>
          <td><?= htmlspecialchars($s["id"]) ?></td>
          <td><?= htmlspecialchars($s["email"]) ?></td>
          <td><?= htmlspecialchars($s["first_name"] ?? "") ?></td>
          <td><?= htmlspecialchars($s["created_at"]) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>
