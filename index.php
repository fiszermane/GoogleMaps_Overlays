<!DOCTYPE html>
<html>
<head>
<script
src="http://maps.googleapis.com/maps/api/js">
</script>
<script>
function ClearFields() {

     document.getElementById("comment2").value = "";
}

var amsterdam=new google.maps.LatLng(52.395715,4.888916);
function initialize()
{
var mapProp = {
  center:amsterdam,
  zoom:7,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var myCity = new google.maps.Circle({
  center:amsterdam,
  radius:20000,
  strokeColor:"#0000FF",
  strokeOpacity:0.8,
  strokeWeight:2,
  fillColor:"#0000FF",
  fillOpacity:0.4
  });

myCity.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>
Upload Radii to Draw Coverage
<div id="googleMap" style="width:1000px;height:700px;"></div><br><br>
<form action="upload2.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
</form><br><br>

Radii to Draw Coverage
<form action="text2.php" method="post" id="textform">
    <input type="submit">
    <textarea id="comment2" name="comment" form="textform" rows="6" cols="50" onclick="ClearFields();">Format: 11.22,11.23,10000</textarea>
</form><br><br>

Lines to Draw POL/POD
<form action="linea2.php" method="post" id="jorge">
    <textarea id="lineasTexto" name="lineas" rows="6" cols="50">Format: 11.22,11.23_12.24,12.29</textarea>
    <input type="submit">
</form><br><br>

</body>
</html>
