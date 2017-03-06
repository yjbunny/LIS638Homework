<!DOCTYPE HTML>
<html>
<head>
	<title> (Youn Lee) Code Extra Homework 3 </title>
	<style type="text/css">	
		h1 {
        	font-family: Roboto, sans-serif;
        	font-size: 28px;
        	color: #65737e;}
    	body {
			font-family: Roboto, sans-serif;
        	font-size: 16px;
        	color: #4f5b66; 
        	text-align: center;
        	line-height: 1.5;}
		.center {
    		margin: auto;
    		width: 640px;
    		border: 1px solid #c0c5ce;
    		padding: 20px;
    		text-align: left;}
		.button {
      		display: inline-block;
			position: relative;
			padding: 5px 32px;
			width: 480px;
			height: auto;
			line-height: 28px;
			border: 12px;
			font-size: 12pt;
			background-color: #c0c5ce;
			color: #FFFFFF;
			cursor: pointer;}
		table {
  			width: auto;
  			margin: auto;}
	   	table, th, td {
	   		border-style: solid;
	   		border-color: #a2abb1;
	   		border-width: 1px;
	   		cellpadding = 0;
	   		border-collapse: collapse;
	   		font-size: 15px}
		th, td {
			width: 40px;
			height: 40px; 
			padding: 5px 5px 5px 5px;
			text-align: center;}
		th {
			text-transform: uppercase;
   			letter-spacing: 0.05em;
  			background-color: #d0d5d8}
  	</style>
</head>
<body>

<h1> Roll the Dice </h1>

<!-- Button to refresh -->
<form>
<input class="button" TYPE="button" onClick="history.go(0)" VALUE="Click here to roll the dice!">
<br><br>
</form>

<?php

$dice_num = 6; //number of side of a dice 

dice($dice_num); 

// dice function 
function dice($dice_num){ 
	$rolled_1 = rand(1,$dice_num); 
	$rolled_2 = rand(1,$dice_num);
	$case = 0; // to count # of cases, which the sum of two numbers equal to the sum of two rolled die 

// error message for 1
	if ($dice_num == 1) {
	echo "Error! the number should be more than 1 <br>"; 
	}

	else {
// intro
	echo "Rolling two ". $dice_num . "-sided die: "; 
	echo "You rolled a " . $rolled_1 . " and a " . $rolled_2 . "!<br><br>"; 
	
// 1st row of the table 
	echo "<table><tr><th></th>"; 	
	for ($i = 1; $i <= $dice_num; $i++) {
		echo "<th> $i </th>"; 
	}
	echo "</tr>";

// from 2nd row to the end of the table
	for ($i = 1; $i <= $dice_num; $i++) { // i for the number of 1st dice 
		echo "<tr>"; 
		echo "<th> $i </th>"; 
		for ($j = 1; $j <= $dice_num; $j++) { // j for the number of 2nd dice
			if (($i + $j) == ($rolled_1 + $rolled_2)) { // to highlight 
				echo "<td><font color = 'red'><b>" . "(" . $i. "," .$j. ")" . "</b></font></td>";
				$red[$case] = "($i, $j) ";  // array to save highlighted cases 
				$case++; 
			}
			else { 
				echo "<td>"."(".$i.",".$j.")"."</td>"; 			
			}
		}
	echo "</tr>"; 
	}
	echo "</table>"; 

	
// sum, probability, etc. 
	echo "<br>"; 
	echo '<div class = "center"> An '. $rolled_1 . " and ". $rolled_2 . " are rolled,
	      which is a sum of ". ($rolled_1 + $rolled_2) . ". <br> 
	      There are " . $case . " ways to obtain a sum of " . ($rolled_1 + $rolled_2) . 
	      ": rolling one of " . join($red) . 
	      ". <br> So there are " . $case . " possibilities out of a total of " . ($dice_num * $dice_num) . " possible outcomes, 
	       i.e. " . "$case / " . ($dice_num * $dice_num) . " = a probability of " .  round(($case / ($dice_num * $dice_num)),5) . 
	      " of obtaining a sum of " . ($rolled_1 + $rolled_2) . 
	      ". </div><br>";
}
}
?>
</body>
</html>