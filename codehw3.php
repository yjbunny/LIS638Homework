<!DOCTYPE HTML>
<html>
<head>
	<title> (Youn Lee) Code HW 3 </title>
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
  		table, th, td {
	   		border-style: solid;
	   		border-color: #a2abb1;
	   		border-width: 1px;
	   		cellpadding = 0;
	   		border-collapse: collapse;
	   		font-size: 12px}
		table {
  			width: 940px;
  			margin: auto;}
		th, td {
			padding: 10px 10px 10px 10px;
			text-align: left;}
		th {
			text-transform: uppercase;
   			letter-spacing: 0.05em;
  			border-bottom: 2px solid #65737e;
  			background-color: #d0d5d8}

  		.box {
  			background: #a2abb1;
  			width: auto;
  			height: auto;
  			margin: auto;
  			padding: 10px;
  			color: white;
  			font-weight: 700;
  			font-family: "Courier new";
  			font-size: 20px}

	</style>
</head>
<body>

<div class = "center">
<h1> Book Lists </h1>

<?php
// Challenge 1. Book lists 

$bookdata = array (
	array ("PHP and MySQL Web Development", "Luke", "Welling", 144, "Paperback", 31.63), 
	array ("Web Design with HTML, CSS, JavaScript and jQuery", "Jon", "Duckett", 135, "Paperback", 41.23), 
	array ("PHP Cookbook: Solutions & Examples for PHP Programmers", "David", "Sklar", 14, "Paperback", 40.88), 
	array ("JavaScript and JQuery: Interactive Front-End Web Development", "Jon", "Duckett", 251, "Paperback", 22.09), 
	array ("Modern PHP: New Features and Good Practices", "Josh", "Lockhart", 7, "Paperback", 28.49), 
	array ("Programming PHP", "Kevin", "Tatroe", 26, "Paperback", 28.96)
);


echo "<table border = 1>
<tr>
<th> Title </th>
<th> First Name </th>
<th> Last Name </th>
<th> Number of Pages </th>
<th> Type </th>
<th> Price ($) </th>
</tr>";


$column = 0;

foreach ($bookdata as $row => $book) {
	echo "<tr>"; 
	foreach ($book as $key => $info) {
		echo "<td>". $info . "</td>"; 
	}
	echo "</tr>";
}

echo "</table><br><br>";


$sum = 0; // total price 

for ($i = 0; $i < 6; $i++) {
	$sum += $bookdata[$i][5]; 
}
echo '<div class = "box"> Your Total Price is <br>';
echo "$".$sum. '</div>'; 

?>
</div>

<br><br>

<div class = "center">
<h1> Coin Toss </h1>
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
// Challenge 2. Coin Toss
// 0 - tail, 1 - head

$num = 3;  // the number of heads in a row 

echo "Beginning the coin flipping... <br><br>"; 
echo coinToss($num);
echo "<br><br> Flipped ". $num . " heads in a row, in " . $i . " flips! <br>"; 

function coinToss($num) {

	global $i;// to use $i outside of the function 
	$i = 0; // to count flips 
	$b = 0; // to compare
	$j = 1; // to count consecutive heads. Start with 1 to compare the actual number of heads in a row 

	if ($num == 1) { // in case the number of heads you'd like to flip is 1 
		while (TRUE) {
			$a = mt_rand (0,1); 
			if ($a == 0) {
			echo '<img src="https://webdevdbcourses.prattsi.org/~ylee60/tail.png" alt="Tail" width="60" height="60" />'; 
			$i++; 
			}
	
			if ($a == 1) {
				echo '<img src="https://webdevdbcourses.prattsi.org/~ylee60/head.png" alt="Head" width="60" height="60" /> ';
				$i++;
				break;
			}
		}
	}

	else {
		while (TRUE) {
			$a = mt_rand (0,1); 
	
			if ($a == 0) {
				echo '<img src="https://webdevdbcourses.prattsi.org/~ylee60/tail.png" alt="Tail" width="60" height="60" /> ';
				$b = $a; 
				$i++; 
				$j = 1; // reset j 
			}
			elseif ($a == 1) {  		
				if ($a != $b) { // to count 1st 1 
					echo '<img src="https://webdevdbcourses.prattsi.org/~ylee60/head.png" alt="Head" width="60" height="60" /> ';
					$b = $a; 
					$i++;  
				}
				elseif ($a == $b) {
					echo '<img src="https://webdevdbcourses.prattsi.org/~ylee60/head.png" alt="Head" width="60" height="60" /> ';
					$b = $a;
					$i++;
					$j++;
					if ($j == $num){
					break;
					}
				}
			}
		}
	}
} // close function 


?>
</div>
</body>
</html>