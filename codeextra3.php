<!DOCTYPE HTML>
<html>
<head>
	<title> (Youn Lee) Code Extra Homework 3 </title>
	<style type="text/css">	
		h1 {
			font-family: Futura, sans-serif;
        	font-size: 28px;
        	color: white;
        	width: auto;
        	margin: auto;
        	padding: 10px;
        	background: #FFA500; 
        	text-align: left;}
        .box_1 {
        	width: auto; 
        	height: 80px;
        	margin: 20px;
        	vertical-align: middle;
        	padding-left: 10px;}
        img.middle {
			vertical-align: middle;}
    	body {
			font-family: Roboto, sans-serif;
        	font-size: 20px;
        	color: #a6a6a6; 
        	line-height: 1.5;}
        .box_2 {
			position: absolute; 
			margin-left: 400px; 
    		width: auto;
    		padding: 20px;
    		text-align: left;}
		table {
			position: absolute;
  			width: auto;
  			margin-left: 20px;}
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
  			background-color: #e5e5e5}
  		footer {
			position: absolute;
			width: auto; 
			margin-top: 400px; 
			padding: 10px;  
			text-align: left; 
  			font-family: "Andale mono", sans-serif;
        	font-size: 14px;
        	color: gray; }
        a {
        	color: gray; }
  	</style>
</head>
<body>

<h1> Roll the Dice </h1>

<?php

$dice_num = 6; //number of side of a dice 

dice($dice_num); 

// dice function 
function dice($dice_num){ 
	echo '<div class = "box_1">';
	echo '<a href = "webdevdbcourses.prattsi.org/~ylee60/codeextra3.php"><img class="middle" src="https://webdevdbcourses.prattsi.org/~ylee60/dice.jpg" alt="dice" height="80" /></a>';

	$rolled_1 = rand(1,$dice_num); 
	$rolled_2 = rand(1,$dice_num);
	$case = 0; // to count # of cases, which the sum of two numbers equal to the sum of two rolled die 

	// error message for 1
		if ($dice_num == 1) {
			echo "&nbsp; &nbsp; Error! the number should be more than 1 <br>"; 
		}

		else {
	// intro
			echo "&nbsp; &nbsp; Rolling two ". $dice_num . "-sided die: "; 
			echo "<font color = #FFA500><b> You rolled a " . $rolled_1 . " and a " . $rolled_2 . "!</font></b><br><br>"; 
			echo '</div>';

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
					echo "<td><font color = #FFA500><b>" . "(" . $i. "," .$j. ")" . "</b></font></td>";
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
	echo '<div class = "box_2"> An '. $rolled_1 . " and ". $rolled_2 . " are rolled,
	      which is a sum of <font color = #FFA500><b>". ($rolled_1 + $rolled_2) . "</b></font>. <br> 
	      There are <font color = #FFA500><b>" . $case . " ways </b></font> to obtain a sum of " . ($rolled_1 + $rolled_2) . 
	      ": rolling one of <font color = #FFA500><b>" . join($red) . 
	      "</b></font>. <br> So there are " . $case . " possibilities out of a total of " . ($dice_num * $dice_num) . " possible outcomes, 
	       i.e. " . "$case / " . ($dice_num * $dice_num) . " = <font color = #FFA500><b> a probability of " .  round(($case / ($dice_num * $dice_num)),5) . 
	      "</b></font> of obtaining a sum of " . ($rolled_1 + $rolled_2) . 
	      ". </div><br>";
	}
}
?>
</body>
<footer>
CREATED BY <a href=https://github.com/yjbunny/LIS638Homework/blob/master/codeextra3.php>Youn Lee</a>, March 2017
</footer>
</html>