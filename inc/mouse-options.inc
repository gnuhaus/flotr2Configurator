<? 
$trackTrue = $mouseTrack ? 'selected="selected"' : '';
$trackFalse = !$mouseTrack ? 'selected="selected"' : '';
?>

<label for="mouseTrack">track: </label>
<select id="mouseTrack">
<option value="true" <? echo $trackTrue; ?>>true</option>
<option value="false" <? echo $trackFalse; ?>>false</option>
</select>
<br>

<label for="trackDecimals">trackDecimals: </label><input type="text" value="0" id="trackDecimals" size="3" /><br>

<label for="relative">relative: </label>
<select id="relative">
<option value="true">true</option>
<option value="false" selected="selected">false</option>
</select>
<br>

<label for="mousePosition">position: </label><input type="text" value="se" id="mousePosition" size="3" /><br>

<label for="lineColor">lineColor: </label><input class="color" type="text" value="#ffff00" id="lineColor" size="7" /><br>

<label for="sensibility">sensibility: </label><input type="text" value="2" id="sensibility" size="3" /><br>

<label for="trackY">trackY: </label>
<select id="trackY">
<option value="true" selected="selected">true</option>
<option value="false">false</option>
</select>
<br>

<label for="mouseMargin">mouseMargin: </label><input type="text" value="5" id="mouseMargin" size="3" /><br>

<label for="radius">radius: </label><input type="text" value="3" id="radius" size="3" /><br>

<label for="mouseTextColor">mouseTextColor: </label><input class="color" type="text" value="#ffffff" id="mouseTextColor" size="7" /><br>

<label for="mouseBGColor">mouseBGColor: </label><input class="color" type="text" value="#000000" id="mouseBGColor" size="7" /><br>

<label for="boxAlpha">boxAlpha: </label><input type="text" value="0.8" id="boxAlpha" size="3" /><br>

<label for="fillColor">fillColor: </label><input class="color" type="text" value="null" id="fillColor" size="7" /><br>

<label for="fillOpacity">fillOpacity: </label><input type="text" value="0.8" id="fillOpacity" size="3" /><br>
