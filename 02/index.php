<?php
declare (strict_types=1);

//1. Set Up & Start 


//2. Code Commenting
//inline comment --
$firstName ="Melika"; //string
$lastName="Kashef";//string
$age=40;//int
$isInstructor=true; //boolean;

echo "<p>Hello there , my name is ".$firstName."".$lastName."</p>";

if ($isInstructor){
    echo"<p> I am your teacher </p>";
}
else{
    echo "<p> Opps, teach didn't show! </p>";
}

$num1=1;
$num2=10;

function add(int $num1, int $num2) {
    return $num1+$num2;
}

echo "<p>" .add($num1,$num2). "</p>";
//3. Variables, Data Tyoes, Concatenation, Conditional Statements & Echo


//4. Loosely Typed Language Demo


//5. Strict Types & Types Hints


//6. OOP with PHP 

