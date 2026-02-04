<?php
//connect to the db and create new PDO
require "includes/connect.php";  

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request');
}

//sanitize input 
// trim() removes extra whitespace at the start/end of user input.
// filter_input() helps sanitize incoming form data.
$firstName = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS));
$lastName  = trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS));
$email     = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone     = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS));
$address   = trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS));
$comments  = trim(filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_SPECIAL_CHARS));

// Item quantities come in as an array only if your form uses names like:
// name="items[chaos_croissant]" etc.
$items = $_POST['items'] ?? [];

//server-side validation 
$errors = [];

// Required fields
if ($firstName === null || $firstName === '') {
    $errors[] = "First Name is required.";
}

if ($lastName === null || $lastName === '') {
    $errors[] = "Last Name is required.";
}

// Email: required + format check
if ($email === null || $email === '') {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email must be a valid email address.";
}

// Phone: required + simple regex format check
if ($phone === null || $phone === '') {
    $errors[] = "Phone number is required.";
} elseif (!filter_var($phone, FILTER_VALIDATE_REGEXP, [
    'options' => ['regexp' => '/^[0-9\-\+\(\)\s]{7,25}$/']
])) {
    $errors[] = "Phone number format is invalid.";
}

// Address: required
if ($address === null || $address === '') {
    $errors[] = "Address is required.";
}

// Validate order quantities
// We only accept items with an integer quantity > 0.
$itemsOrdered = [];

foreach ($items as $item => $quantity) {
    if (filter_var($quantity, FILTER_VALIDATE_INT) !== false && $quantity > 0) {
        $itemsOrdered[$item] = $quantity;
    }
}

// Require at least one item to be ordered
if (count($itemsOrdered) === 0) {
    $errors[] = "Please order at least one item.";
}

// If there are errors, show them and stop the script before inserting to the DB
if (!empty($errors)) {
    require "includes/header.php"; 
    echo "<div class='alert alert-danger'>";
    echo "<h2>Please fix the following:</h2>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul>";
    echo "</div>";

    require "includes/footer.php";
    exit;
}


/* 
INSERT THE ORDER USING A PREPARED STATEMENT
*/

//set up the query 
$sql="INSERT INTO orders(first_name, last_name, phone, address, email, chaos_croissant, midnight_muffin, extintial_eclair, procrastion_cookie, final_week_brownie, victory_cinnomon_roll, comments) values (:first_name, :last_name, :phone , :address, :email, :chaos_croissant,:midnight_muffin, :extintial_eclair, :procrastion_cookie, :final_week_brownie, :victory_cinnomon_roll, :comments";

//prepare the query 

$stmt=$pdo->prepare($sql);

$chaosCroissant=$itemsOrdered['chaos_croissant']??0;
$midnightMuffin=$itemsOrdered['midnight_muffin']??0;
$extintialEclair=$itemsOrdered['extintial_eclair']??0;
$procrastionCookie=$itemsOrdered['procrastion_cookie']??0;
$finalWeekBrownie=$itemsOrdered['final_week_brownie']??0;
$victoryCinnomonRoll=$itemsOrdered['victory_cinnomon_roll']??0;






$stm->bindPram(':$first_name', $firstName);
$stm->bindPram(':$last_name', $lastName);
$stm->bindPram(':phone', $phone);
$stm->bindPram(':address', $address);
$stm->bindPram(':$email', $email);
$stm->bindPram(':$', $email);
$stm->bindPram(':comments', $comments);


$stm->bindPram(':chaos_croissant', $chaosCroissant);
$stm->bindPram(':midnight_muffin', $midnightMuffin);
$stm->bindPram(':extintial_eclair', $extintialEclair);
$stm->bindPram(':procrastion_cookie', $procrastionCookie);
$stm->bindPram(':final_week_brownie', $finalWeekBrownie);
$stm->bindPram(':victory_cinnomon_roll', $victoryCinnomonRoll);


//execute -i.e run the query 
$stm->execute();


//pull from $itemOrdered and store in variables 

?>

<!--Confirmation Message -->
<?php require "includes/header.php"; ?> 
<div class="alert alert-success">
    <h1>Thank you for your order, <?= htmlspecialchars($firstName) ?>!</h1>
    <p>
        We’ve received your order and will contact you at
        <strong><?= htmlspecialchars($email) ?></strong>.
    </p>
</div>

<?php require "includes/footer.php"; ?>