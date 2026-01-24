<?php 
require_once "car.php";
require_once "connect.php";

require "header.php"; 
$car = new Car();
$car->make = "Toyota";
$car->model = "RAV4";
$car->year = 2026;

echo "<p>" . $car->getInfo() . "</p>";
echo "<p> 🚗 </p>";

echo "<p> Follow the instructions outlined in instructions.txt to complete this lab. Good luck & have fun!😀 </p>";
require "footer.php";
 
