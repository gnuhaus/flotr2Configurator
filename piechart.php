<?php

 error_reporting(E_ALL);
 ini_set('display_errors', '1');


$graphTitle = "Web App Translations Used";
$graphSubtitle = "mouse over slices for raw numbers";
$selected=4;

$gridLines = false;
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
      Configurator for Flotr2 Pie Chart
    </title>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/charts.css">

   </head>
  <body id="piechart">
<div id="wrapper" style="width: 720px;">

<?php include 'inc/nav.inc'; ?>

    <div id="lm0-pie" style="width: 400px; height: 400px; background-color: #f9f9f9; float: left; border-radius: 8px;"></div>

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
Pie Chart Options
</legend>

<?php include 'inc/pie-chart-options.inc'; ?>
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

graphTitle: '<span id="graphTitle-opts"><?php echo $graphTitle; ?></span>',
graphSubtitle: '<span id="graphSubtitle-opts"><?php echo $graphSubtitle; ?></span>',
shadowSize: <span id="shadowSize-opts">4</span>,
HtmlText: <span id="HtmlText-opts">false</span>,
resolution: <span id="resolution-opts">2</span>,
fontSize: <span id="fontSize-opts">7.5</span>,
fontColor: '<span id="fontColor-opts">#000000</span>',
colors: [<span id="colors-opts">'#482003', '#485a61', '#cb3500',
'#ff7803', '#ffe090', '#449bad'</span>],
  grid: {
    color: '<span id="gridColor-opts">#545454</span>',      
    backgroundColor: <span id="gridBGColor-opts">null</span>, 
    backgroundImage: <span id="gridBGImage-opts">null</span>, 
    watermarkAlpha: <span id="watermarkAlpha-opts">0.4</span>,  
    tickColor: '<span id="tickColor-opts">#DDDDDD</span>',  
    labelMargin: <span id="labelMargin-opts">3</span>,        
    verticalLines: <span id="verticalLines-opts">false</span>,   
    horizontalLines: <span id="horizontalLines-opts">false</span>, 
    outlineWidth: <span id="outlineWidth-opts">0</span>,       
    outline : '<span id="outline-opts">nsew</span>',      
    circular: <span id="circular-opts">false</span>        
  },
    xaxis : { showLabels : false },
    yaxis : { showLabels : false },
    pie : {
      show : <span id="pieshow-opts">true</span>, 
      explode: <span id="explode-opts">0</span>,
      sizeRatio: <span id="sizeRatio-opts">0.7</span>,
      pieFill: <span id="pieFill-opts">true</span>,
      fillOpacity: <span id="pieFillOpacity-opts">0.8</span>,
      lineWidth: <span id="lineWidth-opts">2</span>,
      strokeColor: '<span id="strokeColor-opts">#ffffff</span>',
      startAngle: <span id="startAngle-opts">0.754</span>,
      labelFormatter: function (total, value) {
            return (100 * value / total).toFixed(0)+'%';
            } 
    },
    mouse : { track : <span id="mouseTrack-opts">true</span>,
      trackFormatter: function (e){return '&lt;b&gt;'+e.series.label+':&lt;/b&gt; '+e.y},
      trackDecimals: <span id="trackDecimals-opts">0</span>,
      relative: <span id="relative-opts">false</span>,
      position: '<span id="mousePosition-opts">se</span>',
      lineColor: '<span id="lineColor-opts">#ffff00</span>',
      sensibility: <span id="sensibility-opts">2</span>,
      trackY: <span id="trackY-opts">true</span>,
      radius: <span id="radius-opts">3</span>,
      radius: <span id="mouseMargin-opts">5</span>,
      margin: <span id="mouseBoxMargin-opts">5</span>,
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
 	document.getElementById("lm0-pie").style[prop]=value;
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
	basic_pie(document.getElementById("lm0-pie"));
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
	basic_pie(document.getElementById("lm0-pie"));
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

function basic_pie(container) {

  var

    graphTitle = document.getElementById("graphTitle").value,
    graphSubtitle = document.getElementById("graphSubtitle").value,
    shadowSize = document.getElementById("shadowSize").value,
    HtmlText = document.getElementById("HtmlText").value,
    res = document.getElementById("resolution").value,
    fontSize = parseFloat(document.getElementById("fontSize").value),
    fontColor = document.getElementById("fontColor").value,
    colors = [],
	
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

    pieshow = document.getElementById("pieshow").value,
    explode = document.getElementById("explode").value,
    sizeRatio = document.getElementById("sizeRatio").value,
    pieFill = document.getElementById("pieFill").value,
   pieFillOpacity = parseFloat(document.getElementById("pieFillOpacity").value),
   strokeColor = document.getElementById("strokeColor").value,
    lineWidth = document.getElementById("lineWidth").value,
    startAngle = document.getElementById("startAngle").value,

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

    d1 = [[0, 4]],
    d2 = [[0, 3]],
    d3 = [[0, 1.03]],
    d4 = [[0, 3.5]];

for (var i=1;i<7;i++) {
	var c=document.getElementById("color"+i).value;
	colors.push(c);
	}
     
	mouseTrack = mouseTrack==="false" ? false : true;
	HtmlText = HtmlText==="false" ? false : true;
	relative = relative==="false" ? false : true;
	verticalLines = verticalLines==="false" ? false : true;
	horizontalLines = horizontalLines==="false" ? false : true;
	circular = circular==="false" ? false : true;
	pieshow = pieshow==="false" ? false : true;
	pieFill = pieFill==="false" ? false : true;
	trackY = trackY==="false" ? false : true;
	legendShow = legendShow==="false" ? false : true;

	gridBGColor = gridBGColor==="null" ? null : gridBGColor;
	gridBGImage = gridBGImage==="null" ? null : gridBGImage;

  graph = Flotr.draw(container, [
{ data : [[0,561]], label : 'Spanish' },{ data : [[0,397]], label : 'Polish' },{ data : [[0,341]], label : 'Japanese' },{ data : [[0,58]], label : 'Portuguese' },{ data : [[0,47]], label : 'Slovak' },{ data : [[0,163]], label : 'Other' },   ], {
  title: graphTitle,             // => The graph's title
  subtitle: graphSubtitle,          // => The graph's subtitle
  shadowSize: shadowSize,           // => size of the 'fake' shadow
    HtmlText : HtmlText,
    resolution: res,
    fontSize: fontSize,
  grid: {
    color: gridColor,      // => primary color used for outline and labels
    backgroundColor: gridBGColor, // => null for transparent, else color
    backgroundImage: gridBGImage, // => background image. String or object with src, left and top
    watermarkAlpha: watermarkAlpha,   // => 
    tickColor: tickColor,  // => color used for the ticks
    labelMargin: labelMargin,        // => margin in pixels
    verticalLines: verticalLines,   // => whether to show gridlines in vertical direction
    horizontalLines: horizontalLines, // => whether to show gridlines in horizontal direction
    outlineWidth: outlineWidth,       // => width of the grid outline/border in pixels
    outline : outline,      // => walls of the outline to display
    circular: circular        // => if set to true, the grid will be circular, must be used when radars are drawn
  },
    xaxis : { showLabels : false },
    yaxis : { showLabels : false },
    pie : {
      show : pieshow, 
      explode : explode,
      sizeRatio: sizeRatio,
      fill: pieFill, 
      fillOpacity: pieFillOpacity, 
      lineWidth: lineWidth,
      strokeColor: strokeColor,
      startAngle: startAngle, 
      labelFormatter: function (total, value) {
  return (100 * value / total).toFixed(0)+'%';
} 
    },
    mouse : { track : mouseTrack,
      trackFormatter: function (e){return '<b>'+e.series.label+':</b> '+e.y},
      trackDecimals: trackDecimals,
      relative: relative,
     position: mousePosition,       //  => position of the value box (default south-east).  False disables.
      lineColor: lineColor,
     sensibility: sensibility,        // => the lower this number, the more precise you have to aim to show a value
     trackY: trackY,          // => whether or not to track the mouse in the y axis
      radius: radius,             // => radius of the track point
      margin: mouseMargin,             // => margin in pixels of the valuebox
      mouseTextColor: mouseTextColor, // => text color in Value Box
      mouseBGColor: mouseBGColor, // => background color of Value Box
      boxAlpha: boxAlpha,			// => alpha for Value Box
   fillColor: fillColor,
   fillOpacity: fillOpacity
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
    },
    colors: colors,
    fontColor: fontColor
 });
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
  
basic_pie(document.getElementById("lm0-pie"));
</script>
  </body>
</html>