<?php
// What I learned: Using arrays + loops + a single template page makes the site easier to maintain.
// I’ll apply this in Course Project Phase One instead of duplicating pages.

require_once __DIR__ . '/header.php';

$pages = [
  'home' => ['title' => 'Home', 'content' => 'Welcome to my PHP page.'],
  'about' => ['title' => 'About', 'content' => 'This is the About section.'],
  'contact' => ['title' => 'Contact', 'content' => 'This is the Contact section.'],
];

$current = $_GET['page'] ?? 'home';
if (!isset($pages[$current])) {
  $current = 'home';
}
?>

<nav>
  <ul>
    <?php foreach ($pages as $key => $page): ?>
      <li><a href="index.php?page=<?= $key ?>"><?= $page['title'] ?></a></li>
    <?php endforeach; ?>
  </ul>
</nav>

<h2><?= $pages[$current]['title'] ?></h2>
<p><?= $pages[$current]['content'] ?></p>

<?php require_once __DIR__ . '/footer.php'; ?>
