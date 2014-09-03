<? 
$gridLinesTrue = $gridLines ? 'selected="selected"' : '';
$gridLinesFalse = !$gridLines ? 'selected="selected"' : '';
?>

<label for="gridColor">gridColor: </label><input class="color" type="text" value="#545454" id="gridColor" size="7" /><br>

<label for="gridBGColor">gridBGColor: </label><input class="color" type="text" value="null" id="gridBGColor" size="7" /><br>

<label for="gridBGImage">gridBGImage: </label><input  type="text" value="null" id="gridBGImage" size="7" /><br>

<label for="watermarkAlpha">watermarkAlpha: </label><input type="text" value="0.4" id="watermarkAlpha" size="3" /><br>

<label for="tickColor">tickColor: </label><input class="color" type="text" value="#DDDDDD" id="tickColor" size="7" /><br>

<label for="labelMargin">labelMargin: </label><input type="text" value="3" id="labelMargin" size="3" /><br>

<label for="verticalLines">verticalLines: </label>
<select id="verticalLines">
<option value="true" <? echo $gridLinesTrue; ?>>true</option>
<option value="false" <? echo $gridLinesFalse; ?>>false</option>
</select>
<br>

<label for="horizontalLines">horizontalLines: </label>
<select id="horizontalLines">
<option value="true" <? echo $gridLinesTrue; ?>>true</option>
<option value="false" <? echo $gridLinesFalse; ?>>false</option>
</select>
<br>

<label for="outlineWidth">outlineWidth: </label><input type="text" value="0" id="outlineWidth" size="3" /><br>

<label for="outline">outline: </label><input type="text" value="nsew" id="outline" size="3" /><br>

<label for="circular">circular: </label>
<select id="circular">
<option value="true">true</option>
<option value="false" selected="selected">false</option>
</select>
<br>

