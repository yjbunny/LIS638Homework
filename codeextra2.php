<!DOCTYPE html>
<html>
<head>
	<title> (Youn Lee) Code Extra Homework 2 </title>
	<style type="text/css">	
		h1 {
			font-family: Futura, sans-serif;
        	font-size: 28px;
        	color: white;
        	width: auto;
        	margin: auto;
        	padding: 10px;
        	background: linear-gradient(to left, #5db6d6, #ff748c); }
        p {
        	width: 960px;
        	padding: 30px;
        	margin: auto; }
        h2 {
        	font-family: Futura, sans-serif;
        	font-size: 24px;
        	color: black;}
    	body {
			font-family: Roboto, sans-serif;
        	font-size: 16px;
        	color: #000000; 
        	line-height: 1.5;}
        .box_1 {
			border: 0.5px solid #ff748c;
  			width: 960px;
  			height: auto;
  			margin: auto;
  			padding: 10px;
  			color: #000000;}
        .box_2 {
			border: 0.5px solid #5db6d6; 
  			width: 960px;
  			height: auto;
  			margin: auto;
  			padding: 10px;
  			color: #000000;}
  		footer {
			width: auto; 
			margin-top: 100px; 
			padding: 10px;  
			text-align: left; 
  			font-family: "Andale mono", sans-serif;
        	font-size: 14px;
        	color: gray; }
        a {
        	color: gray; }

  			
  		}
  	</style>
</head>
<body>

<h1> Pig Latin </h1>
<p> <font color = #5db6d6> English </font> is translated to <font color = #ff748c> Pig Latin </font> by taking the first letter of every word, moving it to the end of the word and adding ‘ay’.<br>
For example, <font color = #5db6d6>“The quick brown fox”</font> becomes <font color = #ff748c> “Hetay uickqay rownbay oxfay” </font>. </p>

<?php

// Part 1: English to Pig Latin
echo '<div class = "box_1">';
echo "<h2> <font color = #5db6d6> English </font> to <font color = #ff748c> Pig Latin </font> </h2>"; 

$sentence = "Meet the superfans of the World Baseball Classic"; 

echo "Converting the English text <b><font color = #5db6d6>" . $sentence . "</font></b> to Pig Latin <br>"; 
echo "Here is the text in Pig Latin : <b><font color = #ff748c>". toPiglatin($sentence) . "</font></b>"; 
echo '</div>'; 
echo '<br><br>';

// Part 2: Pig Latin to English 
echo '<div class = "box_2">';
echo "<h2> <font color = #ff748c> Pig Latin </font> to <font color = #5db6d6> English </font> </h2>"; 

$piglatin = "Hesay howedsay naay nterestiay niay athmay ndaay ciencesay"; 

echo "Converting the Pig Latin text <b><font color = #ff748c>" . $piglatin . "</font></b> to English <br>"; 
echo "Here is the text in English : <b><font color = #5db6d6>". fromPiglatin($piglatin) . "</font><b>"; 
echo '</div>'; 


function toPiglatin($sentence) {
	$piglatin = " "; 

	$i = $j = $k = 0; // i for count original sentence, j for pig latin sentence, k for initial character 

	$character = str_split($sentence); // each character of the sentence is stored in array $character[]
	$character[strlen($sentence)] = ' '; // cheat code to put a space at the end of the array 

	while($i < strlen($sentence)) {
	
		while (TRUE) { // loop to convert a word to piglatin 
			if ($character[$i+1] != ' ') { 
				$piglatin[$j] = $character[$i+1]; 
				$i++; 
				$j++; 
			}
	
			elseif ($character[$i+1] == ' ') {
				$piglatin[$j] = $character[$k]; 
				$piglatin[$j+1] = 'a'; 
				$piglatin[$j+2] = 'y'; 
				$piglatin[$j+3] = ' ';
				$j += 4; 
				break;
			} 
		}
		$sentence = substr($sentence, $i+2); 
		$character = str_split($sentence); 
		$character[strlen($sentence)] = ' ';
		$i = 0; //reset
	}
	return ucfirst(strtolower($piglatin));
}

function fromPiglatin($piglatin) {
	$sentence = " "; 
	$i = $j = $k = 0; // i for count original sentence, j for pig latin sentence, k for first character of each word 

	$character = str_split($piglatin); // each character of the piglatin is stored in array $character[]
	$character[strlen($piglatin)] = ' '; // cheat code to put a space at the end of the array 

	while ($j < (strlen($piglatin)-3)) { 
		while(True) { // to convert a Pig Latin word in English 
			if ($character[$j+3] != ' ') { 
				$sentence[$i+1] = $character[$j]; 
				$i++;
				$j++;
			}
			elseif ($character[$j+3] == ' ') {
				$sentence[$k] = $character[$j];
				$sentence[$i+1] = ' ';
				$i += 2;
				break;
			}
		}
		$piglatin = substr($piglatin, $j+4); 
		$character = str_split($piglatin); 
		$character[strlen($piglatin)] = ' ';
		$k = $i;
		$j = 0;
	}
	return ucfirst(strtolower($sentence));
}


?>
</body>
<footer>
CREATED BY <a href=https://github.com/yjbunny/LIS638Homework/blob/master/codeextra2.php target = "_blank">Youn Lee</a>, March 2017
</footer>
</html>
