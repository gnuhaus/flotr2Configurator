<?php

 error_reporting(E_ALL);
 ini_set('display_errors', '1');


$graphTitle = "Lines";
$graphSubtitle = "with their silly equations";
$selected=1;

$gridLines = true;
$mouseTrack = true;

$colorFeed = 'inc/colors.csv';

// Function to convert CSV into associative array
function csvToArray($file, $delimiter) { 
  if (($handle = fopen($file, 'r')) !== FALSE) { 
    $i = 0; 
    while (($lineArray = fgetcsv($handle, 4000, $delimiter, '"')) !== FALSE) { 
      for ($j = 0; $j < count($lineArray); $j++) { 
        $arr[$i][$j] = $lineArray[$j]; 
      } 
      $i++; 
    } 
    fclose($handle); 
  } 
  return $arr; 
} 

// Do it
$colorData = csvToArray($colorFeed, ',');

?>


<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>
      Configurator for Flotr2 Line Graph
    </title>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/charts.css">

   </head>
  <body id="linegraph">
<div id="wrapper" style="width: 720px;">

<? include 'inc/nav.inc'; ?>

    <div id="bargraph" style="width: 400px; height: 400px; background-color: #f9f9f9; float: left; border-radius: 8px;"></div>

<form method="post" name="formOptions" id="formOptions" action="#">


<fieldset id="generalOpts" class="show">
<legend>
General Options
</legend>

<? include 'inc/general-options.inc'; ?>
</fieldset>

<fieldset id="paletteChooser" class="hide">
<legend>Color Palette Chooser</legend>

<? include 'inc/palette-chooser.php'; ?>
</fieldset>

<fieldset id="chartOpts" class="hide">
<legend>
Line Graph Options
</legend>

<? include 'inc/line-options.inc'; ?>
</fieldset>

<fieldset id="xAxisOpts" class="hide">
<legend>
X-Axis Options
</legend>

<? include 'inc/x-axis-options.inc'; ?>
</fieldset>

<fieldset id="yAxisOpts" class="hide">
<legend>
Y-Axis Options
</legend>

<? include 'inc/y-axis-options.inc'; ?>
</fieldset>

<fieldset id="gridOpts" class="hide">
<legend>
Grid Options
</legend>

<? include 'inc/grid-options.inc'; ?>
</fieldset>

<fieldset id="mouseOpts" class="hide">
<legend>
Mouse Options
</legend>

<? include 'inc/mouse-options.inc'; ?>
</fieldset>

<fieldset id="legendOpts" class="hide">
<legend>
Legend Options
</legend>

<? include 'inc/legend-options.inc'; ?>
</fieldset>

<fieldset id="divOpts" class="hide">
<legend>
DIV Options
</legend>

<? include 'inc/div-options.inc'; ?>
</fieldset>

<p class="small">
<input type="checkbox" checked id="colorToggle" /><label for="colorToggle"> Show Color Pickers</label><br>
</p>



</form>

<div id="opts">
<button name="Create PNG" id="makeImage">Create PNG</button>

title: '<span id="graphTitle-opts"><? echo $graphTitle; ?></span>',
subtitle: '<span id="graphSubtitle-opts"><? echo $graphSubtitle; ?></span>',
shadowSize: <span id="shadowSize-opts">4</span>,
HtmlText: <span id="HtmlText-opts">false</span>,
resolution: <span id="resolution-opts">2</span>,
fontSize: <span id="fontSize-opts">7.5</span>,
fontColor: '<span id="fontColor-opts">#000000</span>',
colors: [<span id="colors-opts">'#ff0000', '#008000', '#0000ff',
'#ffa500', '#800080', '#ffff00'</span>],
lines: {
   show: <span id="lineShow-opts">true</span>,
   lineWidth: <span id="lineWidth-opts">2</span>,
   fill: <span id="lineFill-opts">false</span>,
   fillBorder: <span id="lineFillBorder-opts">false</span>,
   fillColor: <span id="lineFillColor-opts">null</span>,
   fillOpacity: <span id="lineFillOpacity-opts">0.4</span>,
   steps: <span id="lineSteps-opts">false</span>,
   stacked: <span id="lineStacked-opts">false</span>,
   },
grid: {
   color: '<span id="gridColor-opts">#545454</span>',      
   backgroundColor: <span id="gridBGColor-opts">null</span>, 
   backgroundImage: <span id="gridBGImage-opts">null</span>, 
   watermarkAlpha: <span id="watermarkAlpha-opts">0.4</span>,  
   tickColor: '<span id="tickColor-opts">#DDDDDD</span>',  
   labelMargin: <span id="labelMargin-opts">3</span>,        
   verticalLines: <span id="verticalLines-opts">true</span>,   
   horizontalLines: <span id="horizontalLines-opts">true</span>, 
   outlineWidth: <span id="outlineWidth-opts">0</span>,       
   outline : '<span id="outline-opts">nsew</span>',      
   circular: <span id="circular-opts">false</span>        
   },
xaxis : {
    showLabels: <span id="xShowLabels-opts">true</span>,
    showMinorLabels: <span id="xShowMinorLabels-opts">false</span>,
    labelsAngle: <span id="xLabelsAngle-opts">0</span>,
    title: '<span id="xTitle-opts">X axis</span>',
    titleAngle: '<span id="xTitleAngle-opts">0</span>',
   },
yaxis : {
    showLabels: <span id="yShowLabels-opts">true</span>,
    showMinorLabels: <span id="yShowMinorLabels-opts">false</span>,
    labelsAngle: <span id="yLabelsAngle-opts">0</span>,
    title: '<span id="yTitle-opts">Y axis</span>',
    titleAngle: '<span id="yTitleAngle-opts">90</span>',
   },
    mouse : { track : <span id="mouseTrack-opts">true</span>,
   trackFormatter: function (e){return e.y;},
   trackDecimals: <span id="trackDecimals-opts">0</span>,
   relative: <span id="relative-opts">false</span>,
   position: '<span id="mousePosition-opts">se</span>',
   lineColor: '<span id="lineColor-opts">#ffff00</span>',
   sensibility: <span id="sensibility-opts">2</span>,
   trackY: <span id="trackY-opts">true</span>,
   radius: <span id="radius-opts">3</span>,
   margin: <span id="mouseMargin-opts">5</span>,
   mouseTextColor: '<span id="mouseTextColor-opts">#ffffff</span>',
   mouseBGColor: '<span id="mouseBGColor-opts">#000000</span>',
   boxAlpha: '<span id="boxAlpha-opts">0.8</span>',
   fillColor: <span id="fillColor-opts">null</span>,
   fillOpacity: <span id="fillOpacity-opts">0.8</span>
   },
legend : {
   show: <span id="legendShow-opts">true</span>,
   position: '<span id="position-opts">nw</span>',
   labelBoxBorderColor: '<span id="labelBoxBorderColor-opts">#cccccc</span>',
   labelBoxWidth: <span id="labelBoxWidth-opts">14</span>,
   labelBoxHeight: <span id="labelBoxHeight-opts">10</span>,
   labelBoxMargin: <span id="labelBoxMargin-opts">5</span>,
   margin: <span id="legendMargin-opts">5</span>,
   backgroundColor: '<span id="backgroundColor-opts">#fff8b8</span>',
   backgroundOpacity: <span id="legendBgOpacity-opts">0.85</span>,
   }
</div>
</div>

   <!--[if IE]>
    <script type="text/javascript" src="js/excanvas.compiled.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/jscolor.js"></script>
    <script type="text/javascript" src="js/flotr2.js"></script>
    <script type="text/javascript">

var
     opt = document.getElementById("formOptions"),
     colorClasses = document.getElementsByClassName("color"),
     divOpts = document.getElementById("divOpts"),
     opts = document.getElementById("opts"),
     colors = [],
     graph;

for (var i=1;i<7;i++) {
	var c=document.getElementById("color"+i).value;
	colors.push(c);
	}
     
function handleDiv(e) {
	var
		wrapper=320;
		prop = document.getElementById(e.target.id).id,
		value = document.getElementById(e.target.id).value;
		prop = prop.split("div")[1];
		if(prop === "width"){
			wrapper=parseInt(wrapper)+parseInt(value);
			wrapper+="px";
			document.getElementById("wrapper").style["width"]=wrapper;
			} 
		if(prop === "width" || prop === "height"){value += "px";}
 	document.getElementById("bargraph").style[prop]=value;
};

opts.addEventListener("click",function(e) {
	if (e.target.id == "makeImage") {
		makeImage();
		}
	});

opt.addEventListener("click",function(e) {
	if (document.getElementById(e.target.parentNode.id) != null) {
	var targ=document.getElementById(e.target.parentNode.id);
	(targ.className === "show" && e.target.nodeName==="LEGEND") ? targ.className="hide" : targ.className="show";
	}
	});

opt.addEventListener("keyup",function(e) {
	if ( e.target.id.match(/color[1-6]/) ) {
		updatePaletteChooser();
		}
	if (document.getElementById(e.target.id).parentNode.id && document.getElementById(e.target.id).parentNode.id === "divOpts") {
		handleDiv(e);
		} else {
	handleColor(e);}
	basic_bar(document.getElementById("bargraph"));
});

opt.addEventListener("change",function(e) {
	if ( e.target.id.match(/color[1-6]/) ) {
		updatePaletteChooser();
		}
	if(e.target.nodeName == "SELECT"){document.getElementById(e.target.id + "-opts").innerHTML = e.target.value;}
	if(e.target.id == "colorToggle"){ 
	for (var i=0;i<colorClasses.length;i++) {
		document.getElementById(colorClasses[i].id).color.pickerOnfocus = e.target.checked;
	}
}
	if (document.getElementById(e.target.id).parentNode.id && document.getElementById(e.target.id).parentNode.id === "divOpts") {
		handleDiv(e);
		} 
	if (e.target.type == "radio") {
		handlePalette(e);
		}
		else {
	handleColor(e);}
	basic_bar(document.getElementById("bargraph"));
});

function updatePaletteChooser() {
	var i, length = document.getElementById("paletteChooser").getElementsByTagName('input').length;
	for (i=0;i<length;i++) {
document.getElementById("paletteChooser").getElementsByTagName('input')[i].checked = false;
		}
	}

function handlePalette(e) {
	var 
	<? echo $palette; ?>
	scheme = e.target.value,
	colors = palette[scheme],
	textString = "";
for (var i = 0; i< colors.length ; i++) {
	textString += i+1===3 ? "'"+colors[i]+"',\n" : i+1===colors.length ? "'"+colors[i]+"'" : "'"+colors[i]+"', ";
	document.getElementById("color"+(i+1)).color.fromString(colors[i]);
	e.target.checked = true;
	}
document.getElementById("colors-opts").innerHTML = textString;
}


function handleColor(e) {
	var pattern = /\bcolor/;
	e.target.id.match(pattern) != null && e.target.id.match(pattern)[0] === "color" ? updateColors() : document.getElementById(e.target.id + "-opts").innerHTML = e.target.value;
	}


function updateColors() {
var
	 textString="",
     colors = [];

for (var i=1;i<7;i++) {
	var c=document.getElementById("color"+i).value;
	colors.push(c);
	}

for (var i = 0; i< colors.length ; i++) {
	textString += i+1===3 ? "'"+colors[i]+"',\n" : i+1===colors.length ? "'"+colors[i]+"'" : "'"+colors[i]+"', ";
	}
document.getElementById("colors-opts").innerHTML = textString;
}

function basic_bar(container) {

  var

    graphTitle = document.getElementById("graphTitle").value,
    graphSubtitle = document.getElementById("graphSubtitle").value,
    shadowSize = document.getElementById("shadowSize").value,
    HtmlText = document.getElementById("HtmlText").value,
    res = document.getElementById("resolution").value,
    fontSize = parseFloat(document.getElementById("fontSize").value),
    fontColor = document.getElementById("fontColor").value,
    colors = [],
     d1 = [],
     d2 = [],
     d3 = [],
     i,

   gridColor = document.getElementById("gridColor").value,
   gridBGColor = document.getElementById("gridBGColor").value,
   gridBGImage = document.getElementById("gridBGImage").value,
   watermarkAlpha = parseFloat(document.getElementById("watermarkAlpha").value),
   tickColor = document.getElementById("tickColor").value,
   labelMargin = parseFloat(document.getElementById("labelMargin").value)
   verticalLines = document.getElementById("verticalLines").value,
   horizontalLines = document.getElementById("horizontalLines").value,
   outlineWidth = parseFloat(document.getElementById("outlineWidth").value),
   outline = document.getElementById("outline").value,
   circular = document.getElementById("circular").value,

   lineShow = document.getElementById("lineShow").value,
   lineWidth = document.getElementById("lineWidth").value,
   lineFill = document.getElementById("lineFill").value,
   lineFillBorder = document.getElementById("lineFillBorder").value,
   lineFillColor = document.getElementById("lineFillColor").value,
   lineFillOpacity = document.getElementById("lineFillOpacity").value,
   lineSteps = document.getElementById("lineSteps").value,
   lineStacked = document.getElementById("lineStacked").value,

   xShowLabels = document.getElementById("xShowLabels").value,
   xShowMinorLabels = document.getElementById("xShowMinorLabels").value,
   xLabelsAngle = parseFloat(document.getElementById("xLabelsAngle").value),
   xTitle = document.getElementById("xTitle").value,
   xTitleAngle = parseFloat(document.getElementById("xTitleAngle").value),

   yShowLabels = document.getElementById("yShowLabels").value,
   yShowMinorLabels = document.getElementById("yShowMinorLabels").value,
   yLabelsAngle = parseFloat(document.getElementById("yLabelsAngle").value),
   yTitle = document.getElementById("yTitle").value,
   yTitleAngle = parseFloat(document.getElementById("yTitleAngle").value),

    mouseTrack = document.getElementById("mouseTrack").value,
   trackDecimals = parseFloat(document.getElementById("trackDecimals").value),
   relative = document.getElementById("relative").value,
   mousePosition = document.getElementById("mousePosition").value,
   lineColor = document.getElementById("lineColor").value,
   sensibility = parseFloat(document.getElementById("sensibility").value),
   trackY = document.getElementById("trackY").value,
   mouseMargin = parseFloat(document.getElementById("mouseMargin").value),
   radius = parseFloat(document.getElementById("radius").value),
   mouseTextColor = document.getElementById("mouseTextColor").value,
   mouseBGColor = document.getElementById("mouseBGColor").value,
   boxAlpha = document.getElementById("boxAlpha").value,
   fillColor = document.getElementById("fillColor").value,
   fillOpacity = parseFloat(document.getElementById("fillOpacity").value),

   legendShow = document.getElementById("legendShow").value
   position = document.getElementById("position").value,
   backgroundColor = document.getElementById("backgroundColor").value,
   labelBoxBorderColor = document.getElementById("labelBoxBorderColor").value, 
   labelBoxWidth = parseFloat(document.getElementById("labelBoxWidth").value),
   labelBoxHeight = parseFloat(document.getElementById("labelBoxHeight").value),
   labelBoxMargin = parseFloat(document.getElementById("labelBoxMargin").value),
   legendMargin = parseFloat(document.getElementById("legendMargin").value), 
   legendBgOpacity  = parseFloat(document.getElementById("legendBgOpacity").value)
  
;

for (i=1;i<7;i++) {
	var c=document.getElementById("color"+i).value;
	colors.push(c);
	}

  for (var j = 0; j < 10.5; j += 0.1) {
    d1.push([j, j*j]);
    d2.push([j, 3*j+Math.sin(2*j)*5 - 5]);
    d3.push([j, j*3 - 5])
  }

	mouseTrack = mouseTrack==="false" ? false : true;
	HtmlText = HtmlText==="false" ? false : true;
	verticalLines = verticalLines==="false" ? false : true;
	horizontalLines = horizontalLines==="false" ? false : true;
	circular = circular==="false" ? false : true;
	relative = relative==="false" ? false : true;
	trackY = trackY==="false" ? false : true;
	legendShow = legendShow==="false" ? false : true;
	lineShow = lineShow==="false" ? false : true;
	lineFill = lineFill==="false" ? false : true;
	lineFillBorder = lineFillBorder==="false" ? false : true;
	lineSteps = lineSteps==="false" ? false : true;
	lineStacked = lineStacked==="false" ? false : true;
	xShowLabels = xShowLabels==="false" ? false : true;
	xShowMinorLabels = xShowMinorLabels==="false" ? false : true;
	yShowLabels = yShowLabels==="false" ? false : true;
	yShowMinorLabels = yShowMinorLabels==="false" ? false : true;

	lineFillColor = lineFillColor==="null" ? null : lineFillColor;
	xTitle = xTitle==="null" ? null : xTitle;
	yTitle = yTitle==="null" ? null : yTitle;
	gridBGColor = gridBGColor==="null" ? null : gridBGColor;
	gridBGImage = gridBGImage==="null" ? null : gridBGImage;
	fillColor = fillColor==="null" ? null : fillColor;


var markerFormatter = function(obj){
// return obj.y.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
return ' '+(obj.y).toFixed(0) + '%';
}

  // Draw the graph
  graph = Flotr.draw(
    container,
    [ {data: d1, label: 'y=x^2'}, 
      {data: d3, label: 'y=3x+5'},
      {data: d2, label: 'y=3x+5sin(2x)+5'}
	],
    {
      title: graphTitle,
      subtitle: graphSubtitle,
   shadowSize: shadowSize,
   HtmlText: HtmlText,
   resolution: res,
   fontSize: fontSize,
   fontColor: fontColor,
   colors: colors,

      color: '#000000',

lines: {
    show: lineShow,
    lineWidth: lineWidth,
    fill: lineFill,
    fillBorder: lineFillBorder,
    fillColor: lineFillColor,
    fillOpacity: lineFillOpacity,
    steps: lineSteps,
    stacked: lineStacked
   },

    mouse : { track : mouseTrack,
   trackFormatter: function (e){return e.y},
   trackDecimals: trackDecimals,
   relative: relative,
   position: mousePosition,
   lineColor: lineColor,
   sensibility: sensibility,
   trackY: trackY,
   margin: mouseMargin,
   radius: radius,
   mouseTextColor: mouseTextColor,
   mouseBGColor: mouseBGColor,
   boxAlpha: boxAlpha,
   fillColor: fillColor,
   fillOpacity: fillOpacity

   },
xaxis : {
    	showLabels: xShowLabels,
    	showMinorLabels: xShowMinorLabels,
        autoscaleMargin : 1,
        tickDecimals: 0,
        noTicks: 10,
    	labelsAngle: xLabelsAngle,
        title: xTitle,
        color: null,
        titleAngle: xTitleAngle
      },
      yaxis : {
        showLabels: yShowLabels,
    	showMinorLabels: xShowMinorLabels,
    	labelsAngle: yLabelsAngle,
        autoscaleMargin : 1,
        tickDecimals: 0,
        title: yTitle,
        titleAngle: yTitleAngle
      },
grid: {
   color: gridColor,      
   backgroundColor: gridBGColor, 
   backgroundImage: gridBGImage, 
   watermarkAlpha: watermarkAlpha,  
   tickColor: tickColor,  
   labelMargin: labelMargin,        
   verticalLines: verticalLines,   
   horizontalLines: horizontalLines, 
   outlineWidth: outlineWidth,       
   outline : outline,      
   circular: circular        
   },
legend : {
   show: legendShow,
   position : position,
   backgroundColor : backgroundColor,
   labelBoxBorderColor: labelBoxBorderColor, 
   labelBoxWidth: labelBoxWidth,
   labelBoxHeight: labelBoxHeight,
   labelBoxMargin: labelBoxMargin,
   margin: legendMargin, 
   backgroundOpacity: legendBgOpacity 
   }
}
  );

}

function makeImage() {
var format="png";
if (Flotr.isIE && Flotr.isIE < 9) {
  alert(
	"Your browser doesn't allow you to get a bitmap image from the plot, " +
	"you can only get a VML image that you can use in Microsoft Office.<br />"
  );
}
  graph.download.saveImage(format);
  }
  
basic_bar(document.getElementById("bargraph"));
</script>
  </body>
</html>