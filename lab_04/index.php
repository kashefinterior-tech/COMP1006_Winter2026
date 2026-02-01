<?php include "includes/header.php"; ?>

<main>
  <h2>Contact our Bakery</h2>

  <form action="process.php" method="post">
    <fieldset>
      <legend>Your Information</legend>

      <label for="first_name">First name</label>
      <input type="text" name="first_name" id="first_name" required>

      <label for="last_name">Last name</label>
      <input type="text" name="last_name" id="last_name" required>

      <label for="email">Email</label>
      <input type="email" name="email" id="email" required>

      <label for="message">Message</label>
      <textarea name="message" id="message" required></textarea>
    </fieldset>

    <button type="submit">Send Message</button>
  </form>
</main>

<?php include "includes/footer.php"; ?>
