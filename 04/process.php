<?php
include "header.php";

if ($hasErrors){
    echo "<p>Please fix the errors.<p>";
}else{
    include "send_email.php";
    echo "<h2>Thank you!</h2>";
    echo "<p>Your message was received.</p.";
}

include "footer.php";