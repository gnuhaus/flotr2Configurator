<?php

 error_reporting(E_ALL);
 ini_set('display_errors', '1');


$graphTitle = "Choices";
$graphSubtitle = "by %";
$selected=6;

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
      Configurator for Flotr2 Bar Graph
    </title>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/charts.css">

   </head>
  <body id="barchart">
<div id="wrapper" style="width: 720px;">

<?php include 'inc/nav.inc'; ?>

    <div id="bargraph" style="width: 400px; height: 400px; background-color: #f9f9f9; float: left; border-radius: 8px;"></div>

<form method="post" name="formOptions" id="formOptions" action="#">


<fieldset id="generalOpts" class="show">
<legend>
General Options
</legend>

<?php include 'inc/general-options.inc'; ?>
</fieldset>


<fieldset id="paletteChooser" class="hide">
<legend>Color Palette Chooser</legend>

<?php include 'inc/palette-chooser.php'; ?>
</fieldset>

<fieldset id="chartOpts" class="hide">
<legend>
Bar Graph Options
</legend>

<?php include 'inc/bar-graph-options.inc'; ?>
</fieldset>

<fieldset id="xAxisOpts" class="hide">
<legend>
X-Axis Options
</legend>

<?php include 'inc/x-axis-options.inc'; ?>
</fieldset>

<fieldset id="yAxisOpts" class="hide">
<legend>
Y-Axis Options
</legend>

<?php include 'inc/y-axis-options.inc'; ?>
</fieldset>

<fieldset id="gridOpts" class="hide">
<legend>
Grid Options
</legend>

<?php include 'inc/grid-options.inc'; ?>
</fieldset>

<fieldset id="mouseOpts" class="hide">
<legend>
Mouse Options
</legend>

<?php include 'inc/mouse-options.inc'; ?>
</fieldset>

<fieldset id="legendOpts" class="hide">
<legend>
Legend Options
</legend>

<?php include 'inc/legend-options.inc'; ?>
</fieldset>

<fieldset id="divOpts" class="hide">
<legend>
DIV Options
</legend>

<?php include 'inc/div-options.inc'; ?>
</fieldset>

<p class="small">
<input type="checkbox" checked id="colorToggle" /><label for="colorToggle"> Show Color Pickers</label><br>
</p>



</form>

<div id="opts">
<button name="Create PNG" id="makeImage">Create PNG</button>

title: '<span id="graphTitle-opts"><?php echo $graphTitle; ?></span>',
subtitle: '<span id="graphSubtitle-opts"><?php echo $graphSubtitle; ?></span>',
shadowSize: <span id="shadowSize-opts">4</span>,
HtmlText: <span id="HtmlText-opts">false</span>,
resolution: <span id="resolution-opts">2</span>,
fontSize: <span id="fontSize-opts">7.5</span>,
fontColor: '<span id="fontColor-opts">#000000</span>',
colors: [<span id="colors-opts">'#bb5643', '#33c2ff', '#089938',
'#dc9b3e', '#ffff9f', '#4d8ea6'</span>],
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
bars: {
   show: <span id="barsShow-opts">true</span>,
   lineWidth: <span id="barsLineWidth-opts">2</span>,
   barWidth: <span id="barsBarWidth-opts">0.4</span>,
   fill: <span id="barsFill-opts">true</span>,
   fillColor: <span id="barsFillColor-opts">null</span>,
   fillOpacity: <span id="barsFillOpacity-opts">0.8</span>,
   horizontal: <span id="barsHorizontal-opts">false</span>,
   stacked: <span id="barsStacked-opts">false</span>,
   centered: <span id="barsCentered-opts">true</span>,
   topPadding: <span id="barsTopPadding-opts">0.1</span>,
   grouped: <span id="barsGrouped-opts">false</span>
   },
    mouse : { track : <span id="mouseTrack-opts">true</span>,
   trackFormatter: function (e){return e.y + '%'},
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
	<?php echo $palette; ?>
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
    d2012 = [[0.75,1580/169.73],[1.75,2580/169.73],[2.75,4243/169.73],[3.75,3561/169.73],[4.75,1898/169.73],[5.75,889/169.73],[6.75,158/169.73]],
    d2013 = [[1.2,2049/204.11],[2.2,3137/204.11],[3.2,4253/204.11],[4.2,3862/204.11],[5.2,2829/204.11],[6.2,2179/204.11],[7.2,442/204.11]],

    graphTitle = document.getElementById("graphTitle").value,
    graphSubtitle = document.getElementById("graphSubtitle").value,
    shadowSize = document.getElementById("shadowSize").value,
    HtmlText = document.getElementById("HtmlText").value,
    res = document.getElementById("resolution").value,
    fontSize = parseFloat(document.getElementById("fontSize").value),
    fontColor = document.getElementById("fontColor").value,
    colors = [],

   barsShow = document.getElementById("barsShow").value,
   barsLineWidth = document.getElementById("barsLineWidth").value,
   barsBarWidth = parseFloat(document.getElementById("barsBarWidth").value),
   barsFill = document.getElementById("barsFill").value,
   barsFillColor = document.getElementById("barsFillColor").value,
   barsFillOpacity = parseFloat(document.getElementById("barsFillOpacity").value),
   barsHorizontal = document.getElementById("barsHorizontal").value,
   barsStacked = document.getElementById("barsStacked").value,
   barsCentered = document.getElementById("barsCentered").value,
   barsTopPadding = parseFloat(document.getElementById("barsTopPadding").value),
   barsGrouped = document.getElementById("barsGrouped").value,

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

for (var i=1;i<7;i++) {
	var c=document.getElementById("color"+i).value;
	colors.push(c);
	}

	mouseTrack = mouseTrack==="false" ? false : true;
	HtmlText = HtmlText==="false" ? false : true;
	barsShow = barsShow==="false" ? false : true;
	barsFill = barsFill==="false" ? false : true;
	barsHorizontal = barsHorizontal==="false" ? false : true;
	barsStacked = barsStacked==="false" ? false : true;
	barsCentered = barsCentered==="false" ? false : true;
	barsGrouped = barsGrouped==="false" ? false : true;
	verticalLines = verticalLines==="false" ? false : true;
	horizontalLines = horizontalLines==="false" ? false : true;
	circular = circular==="false" ? false : true;
	relative = relative==="false" ? false : true;
	trackY = trackY==="false" ? false : true;
	legendShow = legendShow==="false" ? false : true;
	xShowLabels = xShowLabels==="false" ? false : true;
	xShowMinorLabels = xShowMinorLabels==="false" ? false : true;
	yShowLabels = yShowLabels==="false" ? false : true;
	yShowMinorLabels = yShowMinorLabels==="false" ? false : true;

	xTitle = xTitle==="null" ? null : xTitle;
	yTitle = yTitle==="null" ? null : yTitle;
	barsFillColor = barsFillColor==="null" ? null : barsFillColor;
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
    [ {data: d2012, label: '2012'}, 
      {data: d2013, label: '2013'}
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

  bars: {
    show: barsShow,
    lineWidth: barsLineWidth,
    barWidth: barsBarWidth,
    fill: barsFill,
    fillColor: barsFillColor,
    fillOpacity: barsFillOpacity,
    horizontal: barsHorizontal,
    stacked: barsStacked,
    centered: barsCentered,
    topPadding: barsTopPadding,
    grouped: barsGrouped
  },
mouse : { 
   track : mouseTrack,
   trackFormatter: function (e){return e.y + '%'},
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
        min : 0.5,
        max: 7.5,
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
        min : 0,
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