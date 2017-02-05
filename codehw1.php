<!DOCTYPE html>
<html>
<head>
</head>

<body>
<h1> Challenge 1: Correct Changes </h1>
<?php 
$money = 2567; //unit: cents 
$originalMoney = $money; // A variable 'money' changes over each step, so store the original value in another variable 'originalMoney'

$dollar = (int)($money/100);
$money %= 100; 

$quarter = (int)($money/25);
$money %= 25;

$dime = (int)($money/10);
$money %= 10;

$nickel = (int)($money/5);
$money %= 5; 

$penny = $money;


/*final output*/ 
echo "You are due $originalMoney cents back in change total.<br>"; 
echo "Your change is: $dollar dollar(s), $quarter quarter(s), $dime dime(s), $nickel nickel(s), and $penny pennies."; 
?>

<br>

<h1> Challenge 2: 99 Bottles of Beer </h1> 
<?php

$beer = 9;

do { 
	echo "$beer bottles of beer on the wall, $beer bottles of beer.<br>";
	$beer--; // decrementing 
	echo "Take one down, pass it around, $beer bottles of beer on the wall.<br>";
	echo "<br>";
} while ($beer >= 1);


?>
</body>
</html>