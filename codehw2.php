<!DOCTYPE html>
<html>
<head>
	<title> (Youn Lee) Code HW 2 </title>
	<style type="text/css">
		h1 {
        	font-family: "Courier new", sans-serif;
        	font-size: 28px;
        	color: #65737e;}
		body {
			font-family: “Century Gothic”, CenturyGothic, AppleGothic, sans-serif;
        	font-size: 16px;
        	color: #4f5b66; 
        	text-align: center;}

		.center {
    		margin: auto;
    		width: 940px;
    		border: 2px solid #c0c5ce;
    		padding: 20px;}

		.button {
      		display: inline-block;
			position: relative;
			padding: 5px 32px;
			width: auto;
			height: auto;
			line-height: 28px;
			border: 12px;
			font-size: 12pt;
			background-color: #c0c5ce;
			color: #FFFFFF;
			cursor: pointer;}
		img.middle {
			vertical-align: middle;}
	</style>
</head>

<body>

<div class = "center">
<h1> ISBN Validation </h1>

<?php

$isbn = "1501141511"; //ISBN-10 number 

echo "<br>";

echo "Your ISBN number is $isbn. <br>"; 

if (ISBN_Validator($isbn) == TRUE) {
	echo "This is a valid ISBN. <br>";
}
else {
	echo "This is NOT a valid ISBN. <br>";
}

function ISBN_Validator($isbn) // Validate ISBN
{
	$count = 0; //count digit of ISBN 
	$validator = 10; //number to be multiplied by each digit of ISBN 
	$sum = 0; //sum total 
	$sub_sum = 0; // sub total 
	
	while (($count <= 8) && ($validator >= 2)) {
		$sub_sum += substr($isbn, $count, 1) * $validator ;
		$count++; 
		$validator--; 
	}
	
	if ((substr($isbn, $count, 1) == "x") || (substr($isbn, $count, 1) == "X")) {
		$sum = $sub_sum + 10; 
	}
	else {
		$sum = $sub_sum + substr($isbn, $count, 1);
	}
	
	if (($sum %= 11) == 0) {
		return TRUE;
	}
	else {
		return FALSE;
	}
	
}


?>
</div>

<br>

<div class = "center">
<h1> Coin Toss </h1>
<br>

<p> This side is heads. &nbsp <img class="middle" src="https://webdevdbcourses.prattsi.org/~ylee60/head.png" alt="Head" width="60" height="60" /> 
&nbsp and this side is tales. &nbsp <img class="middle" src="https://webdevdbcourses.prattsi.org/~ylee60/tail.png" alt="Tail" width="60" height="60" /> 
</p>

<br>

<!-- Button to refresh -->
<form>
<input class="button" TYPE="button" onClick="history.go(0)" VALUE="Click here to toss the coins!">
</form>

<br>

<?php
// 0 - tail, 1 - head
// 2-a) 
for ($loop = 1; $loop <= 9; $loop +=2) { // $loop to count cases (1,3,5,7,and 9) 
	echo "Flipping a coin ". $loop . " times <br>";
	
	for ($coins = 1; $coins <= $loop; $coins += 1) { //$coins for the number of coins
		$img = mt_rand(0,1); // $img to get a random value 
		if ($img == 0) 
			echo '<img src="https://webdevdbcourses.prattsi.org/~ylee60/tail.png" alt="Tail" width="60" height="60" /> ';

		elseif ($img ==1) 
			echo '<img src="https://webdevdbcourses.prattsi.org/~ylee60/head.png" alt="Head" width="60" height="60" /> ';
	}
	echo "<br><br>"; 

}
echo "<br><br>";

// 2-b)

$i = 0; // to count
$b = 0; // to compare

echo "Beginning the coin flipping... <br>"; 

while (TRUE) {
	$a = mt_rand (0,1); 
	if ($a == 0) {
		echo '<img src="https://webdevdbcourses.prattsi.org/~ylee60/tail.png" alt="Tail" width="60" height="60" /> ';
		$b = $a;
		$i++; 
	}
	elseif ($a == 1) {  
		if ($a != $b) { // to count 1st 1 
			echo '<img src="https://webdevdbcourses.prattsi.org/~ylee60/head.png" alt="Head" width="60" height="60" /> ';
			$b = $a; 
			$i++;  
		}
		elseif ($a == $b) {
			echo '<img src="https://webdevdbcourses.prattsi.org/~ylee60/head.png" alt="Head" width="60" height="60" /> ';
			$i++;
			break; //stop after 2 consecutive heads 
		}

	}

}
echo "<br>"; 
echo "Flipped two heads in a row, in " . $i . " filps! <br>"; 

?>
</div>
</body>
</html>