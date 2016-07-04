<!DOCTYPE html>
<html>
<head>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB3hJ3XT17p_UyXX7D_Cvb9LrIMsDKVOOQ"></script>
<script>
<?php
$numero = 1;
$color = 20;
$color2 = dechex($color);
$i = 0;
$texto = $_POST["lineas"];
$texto = preg_split('/$\R?^/m', $texto);
$inicio = explode("_", $texto[0]);
?>
var initial=new google.maps.LatLng(<?php echo $inicio[0];?>);
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
  $from_to = explode("_", $texto[$i]);
  //Format: 11.22,11.23_12.24,12.29
  echo "    var cn_" . $numero . "=new google.maps.LatLng(" . $from_to[0] . ");\n";
  echo "    var cnd_" . $numero . "=new google.maps.LatLng(" . $from_to[1] . ");\n";
  echo "    var marker_cnd_" . $numero . "=new google.maps.LatLng(" . $from_to[1] . ");\n";
  echo "    var dupla=[cn_" . $numero . ",cnd_" . $numero ."];\n";
  echo "    var myCity_" . $numero . "= new google.maps.Polyline({\n";
  echo "        path:dupla,\n";
  if($numero % 3 == 0) {
    $color = $color + 40;
    $color2 = dechex($color);
  }
  echo "        strokeColor:\"#". $color2 . "\",\n";
  echo "        strokeOpacity:0.7,\n";
  echo "        strokeWeight:1,\n";
  echo "    });\n";
  echo "    var marker_". $numero . "=new google.maps.Marker({\n";
  echo "        position: marker_cnd_" . $numero . ",";
  echo "        label: \"" . chop($from_to[2]) . "\"\n";
  // echo "        label: \"jorge\"";
  echo "    });";
  echo "    myCity_" . $numero . ".setMap(map);\n";
  echo "    marker_". $numero . ".setMap(map);\n";
  echo "\n";
  echo "    var infowindow_" . $numero ." = new google.maps.InfoWindow({";
  echo "        content: \"" . chop($from_to[2]) . "\"\n";
  echo "    });";
  echo "    infowindow_" . $numero . ".open(map,marker_". $numero .");";
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
