<?
// $count = count($colorData);
// 
// $selected = (!isset($selected) || is_null($selected) || $selected >= $count) ? 0 : $selected; 
$palette = "palette = {
	";
for ($j=0;$j<$count;$j++) {
 	$palette .= "\"scheme$j\" : [";
 	$colors = $colorData[$j];
 	$colorCount = count($colors);
  	$checked = $j==$selected ? "checked" : "";
 	echo "<input type=\"radio\" name=\"colors\" id=\"scheme$j\" value=\"scheme$j\" $checked>
";
 	for ($i=0;$i<$colorCount;$i++) {
 		$palette .= "\"$colors[$i]\"";
	 	$palette .= $i+1 === $colorCount ? '' : ',';
 		echo "<div class=\"chip\" style=\"background-color: $colors[$i]\" title=\"$colors[$i]\"></div>
 ";
 		}
 	$palette .= "]";
 	$palette .= $j+1 === $count ? '
 	' : ',
 	';
 	echo "<br style=\"clear: left;\"><br>

";
	}
$palette .= "},
"
?>
