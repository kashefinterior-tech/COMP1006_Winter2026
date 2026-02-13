<?php
require_once __DIR__ . '/../includes/config.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog CMS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 m-0">All Posts</h1>
    <a class="btn btn-primary" href="create.php">+ Add New Post</a>
  </div>

  <?php
  $stmt = $pdo->query("SELECT id, title, post_date, category, created_at FROM posts ORDER BY id DESC");
  $posts = $stmt->fetchAll();
  ?>

  <?php if (!$posts): ?>
    <div class="alert alert-info">No posts yet. Click “Add New Post” to create your first one.</div>
  <?php else: ?>
    <div class="table-responsive">
      <table class="table table-striped table-bordered bg-white align-middle">
        <thead class="table-dark">
          <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Category</th>
            <th>Created</th>
            <th style="width:160px;">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($posts as $p): ?>
            <tr>
              <td><?= htmlspecialchars($p['title']) ?></td>
              <td><?= htmlspecialchars($p['post_date']) ?></td>
              <td><?= htmlspecialchars($p['category']) ?></td>
              <td><?= htmlspecialchars($p['created_at']) ?></td>
              <td>
                <a class="btn btn-sm btn-outline-secondary" href="edit.php?id=<?= (int)$p['id'] ?>">Edit</a>
                <a class="btn btn-sm btn-outline-danger"
                   href="delete.php?id=<?= (int)$p['id'] ?>"
                   onclick="return confirm('Delete this post?');">
                   Delete
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>

</body>
</html>
