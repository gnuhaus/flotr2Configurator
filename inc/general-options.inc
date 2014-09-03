<? 
$count = count($colorData);

$selected = (!isset($selected) || is_null($selected) || $selected >= $count) ? 0 : $selected; 
?>

<label for="graphTitle">title: </label><input type="text" value="<? echo $graphTitle; ?>" id="graphTitle" size="25" /><br>

<label for="graphSubtitle">subtitle: </label><input type="text" value="<? echo $graphSubtitle; ?>" id="graphSubtitle" size="25" /><br>

<label for="shadowSize">shadowSize: </label><input type="text" value="4" id="shadowSize" size="2" /><br>

<label for="HtmlText">HtmlText: </label>
<select id="HtmlText">
<option value="true">true</option>
<option value="false" selected="selected">false</option>
</select>
<br>

<label for="resolution">Resolution: </label><input type="text" value="2" id="resolution" size="1" /><br>

<label for="fontSize">fontSize: </label><input type="text" value="7.5" id="fontSize" size="3" /><br>

<label for="fontColor">fontColor: </label><input class="color" type="text" value="#000000" id="fontColor" size="7" /><br>

<label for="color1">color1: </label><input id="color1" class="color" value="<? echo $colorData[$selected][0]; ?>" size="7">

<label for="color2">color2: </label><input id="color2" class="color" value="<? echo $colorData[$selected][1]; ?>" size="7"><br>

<label for="color3">color3: </label><input id="color3" class="color" value="<? echo $colorData[$selected][2]; ?>" size="7">

<label for="color4">color4: </label><input id="color4" class="color" value="<? echo $colorData[$selected][3]; ?>" size="7"><br>

<label for="color5">color5: </label><input id="color5" class="color" value="<? echo $colorData[$selected][4]; ?>" size="7">

<label for="color6">color6: </label><input id="color6" class="color" value="<? echo $colorData[$selected][5]; ?>" size="7">

