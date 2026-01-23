<?php
/* What's the Problem? 
    - PHP logic + HTML in one file
    - Works, but not scalable
    - Repetition will become a problem

    How can we refactor this code so it’s easier to maintain?
*/

$items = ["Home", "About", "Contact"];

?>



<ul>
<?php foreach ($items as $item): ?>
    echo "<p>$item</p>";
    <li><?= $item ?></li>
<?php endforeach; ?>
</ul>

