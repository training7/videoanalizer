<!DOCTYPE html>
<html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="html2canvas.js"></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
    <title>Word Cloud Example</title>
</head>

<body>

<div id="html-content-holder" class="word-cloud"></div>
<form id="form">

<div style="text-align: center">
  <div id="presets"></div>
  <div id="custom-area">
    <p><label for="text">Paste your text below!</label>
    <p><textarea id="text"></textarea>
    <button type="button"  id="btn-Preview-Image" onClick="createWordCloud()">Go!</button>
  </div>
</div>


</form>
<!--<input type="button" value="Preview"/>-->
    <a id="btn-Convert-Html2Image" href="#">Download</a>
    <br/>
   <!--  <h3>Preview :</h3>
   <div id="previewImage">
    </div>-->


<script>
$(document).ready(function(){
        $("#html-content-holder").css("backgroundColor","white");
	
var element = $("#html-content-holder"); // global variable
var getCanvas; // global variable
 
    $("#btn-Preview-Image").on('click', function () {
         html2canvas(element, {
         onrendered: function (canvas) {
                $("#previewImage").append(canvas);
                             getCanvas = canvas;
             }
         });
    });

	$("#btn-Convert-Html2Image").on('click', function () {
    var imgageData = getCanvas.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
    $("#btn-Convert-Html2Image").attr("download", "your_pic_name.png").attr("href", newData);
	});

});

</script>
<script src="//d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script src="d3.layout.cloud.js"></script>
<script src="cloud.js"></script>
</body>



</html>
