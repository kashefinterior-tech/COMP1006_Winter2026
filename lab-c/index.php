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
      <input type="email" id="email" name="email" required>
    </fieldset>

    <fieldset>
      <legend>Pick Treats</legend>

      <table border="1" cellpadding="8" cellspacing="0">
        <thead>
          <tr>
            <th scope="col">Treat</th>
            <th scope="col">Qty</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Croissant 🥐</th>
            <td><input type="number" name="items[croissant]" min="0" max="24" value="0"></td>
          </tr>
          <tr>
            <th scope="row">Muffin 🌙</th>
            <td><input type="number" name="items[muffin]" min="0" max="24" value="0"></td>
          </tr>
          <tr>
            <th scope="row">Eclair 🤔</th>
            <td><input type="number" name="items[eclair]" min="0" max="24" value="0"></td>
          </tr>
        </tbody>
      </table>
    </fieldset>

    <fieldset>
      <legend>Notes (optional)</legend>
      <label for="comments">Comments</label>
      <textarea id="comments" name="comments" rows="3" placeholder="Allergies, delivery notes..."></textarea>
    </fieldset>

    <p>
      <button type="submit">Submit Order</button>
    </p>

  </form>
</main>

<?php require "includes/footer.php"; ?>
