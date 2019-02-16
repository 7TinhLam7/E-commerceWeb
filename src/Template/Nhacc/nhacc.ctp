<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>

<p id="getLocation()">

</p>

<script type="text/javascript">
var x = 99999;
// var x = document.getElementById("demo");
</script>
<?php
function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2){
$theta = $longitude1 - $longitude2;
$miles = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
$miles = acos($miles);
$miles = rad2deg($miles);$miles = $miles * 60 * 1.1515;
$feet = $miles * 5280;
$yards = $feet / 3;
$kilometers = $miles * 1.609344;
$meters = $kilometers * 1000;
return compact('meters');
};

$point1 = array('lat' => 10.7861501, 'long' => 106.7049594);//Thảo cầm viên
$point2 = array('lat' => 10.7786746, 'long' => 106.6992025);//Nhà thờ
$distance = getDistanceBetweenPointsNew($point1['lat'], $point1['long'], $point2['lat'], $point2['long']);
foreach ($distance as $unit => $value) {
echo $unit.': '.round($value,2).'<br />';
}

$m = "<script>document.write(x);</script>";
echo '<h1>'.$m.'</h1>';
?>



<script>



function getLocation() {
if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(showPosition);
} else { 
x.innerHTML = "Geolocation is not supported by this browser.";
}
}

function showPosition(position) {


x.innerHTML = position.coords.longitude + position.coords.latitude;
}
</script>