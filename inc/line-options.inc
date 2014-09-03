<?
$fill = isSet($lineFill) ? $lineFill : false;
$opacity = isSet($lineFillOpacity) ? $lineFillOpacity : 0.4;

$lineFillTrue = $fill ? 'selected="selected"' : '';
$lineFillFalse = !$fill ? 'selected="selected"' : '';

?>

<label for="lineShow">show: </label>
<select id="lineShow">
<option value="true" selected="selected">true</option>
<option value="false">false</option>
</select>
<br>

<label for="lineWidth">lineWidth: </label><input type="text" value="2" id="lineWidth" size="1" /><br>

<label for="lineFill">fill: </label>
<select id="lineFill">
<option value="true" <? echo $lineFillTrue; ?>>true</option>
<option value="false" <? echo $lineFillFalse; ?>>false</option>
</select>
<br>

<label for="lineFillBorder">fillBorder: </label>
<select id="lineFillBorder">
<option value="true">true</option>
<option value="false" selected="selected">false</option>
</select>
<br>

<label for="lineFillColor">fillColor: </label><input class="color" type="text" value="null" id="lineFillColor" size="7" /><br>

<label for="lineFillOpacity">fillOpacity: </label><input type="text" value="<? echo $opacity; ?>" id="lineFillOpacity" size="1" /><br>

<label for="lineSteps">steps: </label>
<select id="lineSteps">
<option value="true">true</option>
<option value="false" selected="selected">false</option>
</select>
<br>

<label for="lineStacked">stacked: </label>
<select id="lineStacked">
<option value="true">true</option>
<option value="false" selected="selected">false</option>
</select>
<br>