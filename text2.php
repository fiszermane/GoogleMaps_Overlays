<!DOCTYPE html>
<html>
<head>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB3hJ3XT17p_UyXX7D_Cvb9LrIMsDKVOOQ"></script>
<script>
<?php
$numero = 1;
$i = 0;
$texto = $_POST["comment"];
//echo $texto;
$texto = preg_split('/$\R?^/m', $texto);
?>
var initial=new google.maps.LatLng(<?php echo $texto[0];?>);
function initialize()
{
    var mapProp = {
    center:initial,
    mapTypeControl: true,
    zoom:5,
    mapTypeId:google.maps.MapTypeId.ROADMAP,
    draggable: true
    };

    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

<?php

for ($i=0; $i <= sizeof($texto)-1;$i++) {
  $place_radii = explode(",", $texto[$i]);
  echo "    var cn_" . $numero . "=new google.maps.LatLng(" . $place_radii[0] . "," . $place_radii[1] . ");\n";
  echo "    var myCity_" . $numero . "= new google.maps.Circle({\n";
  echo "        center:cn_". $numero . ",\n";
  //If no radii default 10000.
  if(!isset($place_radii[2])) {
    $place_radii[2] = 10000;
  };
  echo "        radius:". $place_radii[2] . ",\n";
  echo "        strokeColor:\"#0000FF\",\n";
  echo "        strokeOpacity:0.8,\n";
  echo "        strokeWeight:2,\n";
  echo "        fillColor:\"#0000FF\",\n";
  echo "        fillOpacity:0.4\n";
  echo "    });\n";
  echo "    myCity_" . $numero . ".setMap(map);\n";
  echo "\n";
  $numero++;
}

?>
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>
<div id="googleMap" style="width:800px;height:800px;"></div><br><br>
</body>
</html>
