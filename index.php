<?php
/*

Copyright (c) 2014 K2inno.

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

*/

define('NUMBER_SCORE', 1);
define('ANONYMOUS_SCORE', 2);
define('ANONYMOUS_DISPLAYTEXT', 'Anonymous');
define('LLAMA_SCORE', 4);
define('LLAMA_DISPLAYTEXT', 'Llama');
define('ERROR_DISPLAYTEXT', 'Error');
define('LINE_BREAK', "<br />");

?>

<html>
	<head>
		<title>K2inno | AnonymousLlama</title>
	</head>

	<body>

<?php

//Main
$printouts = getNumSeriesArray(1, 100);
foreach($printouts AS $p){

	$score = isNumber($p) + isAnonymous($p) + isLlama($p);
	
	switch($score){
		case 1:
			echo $p . LINE_BREAK;
			break;
		case 3:
			echo ANONYMOUS_DISPLAYTEXT . LINE_BREAK;
			break;
		case 5:
			echo LLAMA_DISPLAYTEXT . LINE_BREAK;
			break;
		case 7:
			echo ANONYMOUS_DISPLAYTEXT . LLAMA_DISPLAYTEXT . LINE_BREAK;
			break;
		default:
			echo ERROR_DISPLAYTEXT . LINE_BREAK;
			break;	
	}
		
}

?>
	
	</body>
</html>

<?php 

//All function start below.

function isNumber($n){
	return (is_numeric($n)) * NUMBER_SCORE;
}

function isAnonymous($n){
	return ($n % 3 == 0) * ANONYMOUS_SCORE;
}

function isLlama($n){
	return ($n % 5 == 0) * LLAMA_SCORE;
}

function getNumSeriesArray($start, $end, $inclusive=true){
	
	$numArray = array();
	if(!$inclusive){
		$start++;
		$end--;
	}
	
	for($i = $start; $i <= $end; $i++){
		$numArray[] = $i;
	}
	
	return $numArray;

}

?>