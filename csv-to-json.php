<?php

date_default_timezone_set('America/Phoenix');

/*
 * Converts CSV to JSON
 * Example uses Google Spreadsheet CSV feed
 * csvToArray function I think I found on php.net
 */

// header('Content-type: application/json');


/**
 * This file is part of the array_column library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) 2013 Ben Ramsey <http://benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 */


// Set your CSV feed
$feed = 'inc/mob-os.csv';

// Arrays we'll use later
$keys = array();
$newArray = array();

// Function to convert CSV into associative array
// function csvToArray($file, $delimiter) { 
//   if (($handle = fopen($file, 'r')) !== FALSE) { 
//     $i = 0; 
//     while (($lineArray = fgetcsv($handle, 4000, $delimiter, '"')) !== FALSE) { 
//       for ($j = 0; $j < count($lineArray); $j++) { 
//         $arr[$i][$j] = $lineArray[$j]; 
//       } 
//       $i++; 
//     } 
//     fclose($handle); 
//   } 
//   return $arr; 
// } 

// Do it
$data = csvToArray($feed, ',');

// Set number of elements (minus 1 because we shift off the first row)
$count = count($data) - 1;
// echo "Count: $count
// 
// ";
//Use first row for names  
$labels = array_shift($data);  
// echo 'Data sans labels: ' . json_encode($data);
// echo "
// 
// Data[2]: " . json_encode($data[2]) . "
// 
// ";
// 
// echo 'Labels: ' . json_encode($labels);
// echo '
// 
// ';

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
	
// foreach ($labels as $label) {
//   $keys[] = $label;
// }
// Add Ids, just in case we want them later
// $keys[] = 'id';
// 
// for ($i = 0; $i < $count; $i++) {
//   $data[$i][] = $i;
// }
  
// Bring it all together
// for ($j = 0; $j < $count; $j++) {
//   $d = array_combine($keys, $data[$j]);
//   $newArray[$j] = $d;
// }
// 
// Print it out as JSON
// echo 'All together now: ' . json_encode($newArray);


?>