<?php
$to="test@example.com";
$subject="New Contact From Message";

$body="Name: $firstName $lastName\n";
$body .="Email: $email\n\n";
$body .="Message:\n $message";

$headers="From: noreply@bakery.com";

mail($to, $subject, $body, $headers);