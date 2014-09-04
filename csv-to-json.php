<?php

date_default_timezone_set('America/Phoenix');


// Set your CSV feed
$feed = 'inc/mob-os.csv';

// Do it
$data = csvToArray($feed, ',');

// Set number of elements (minus 1 because we shift off the first row)
$count = count($data) - 1;

//Use first row for names  
$labels = array_shift($data);  

$d1 = "";
$d2 = "";
$d3 = "";
$d4 = "";
$d5 = "";
$d6 = "";


for ($j=0;$j<$count;$j++) {
 	$subData = $data[$j];
 	$sdl = count($subData);
 	$date = strtotime($subData[0])*1000;
 	for ($i=1;$i<$sdl;$i++) {
 		$sumData=0;
 		for ($k=$i;$k<$sdl;$k++) {
 			$sumData = $sumData + $subData[$k];
 			} 		
 		${"d" . $i} .= "[$date,$sumData]";
 		${"d" . $i} .=  $j===$count-1 ? "" : ",";
 		}
	}


 	for ($i=1;$i<7;$i++) {
	echo "
d$i = [${"d" . $i}],
";
	}
	


?>