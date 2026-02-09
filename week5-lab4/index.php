<?php

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lab 4 - Subscribe</title>
</head>
<body>

  <h1>Email Subscription</h1>

  <form action="process.php" method="post">
    <label for="email">Email:</label>
    <input id="email" name="email" type="email" required>

    <button type="submit">Subscribe</button>
  </form>

  <p><a href="subscribers.php">View Subscribers</a></p>

</body>
</html>
