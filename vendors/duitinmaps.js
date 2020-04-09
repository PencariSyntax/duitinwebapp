var ipPicker = document.getElementById("geoipp").value;
var latPicker = document.getElementById("latp").value;
var longPicker = document.getElementById("longp").value;

var map = L.map('map').setView([latPicker, longPicker], 15);

//console.log(map);

// function onAccuratePositionProgress(e) {
// 	console.log(e.accuracy);
// 	console.log(e.latlng);
// }

// function onAccuratePositionFound(e) {
// 	console.log(e.accuracy);
// 	let ltPicker = e.latlng["lat"];
// 	let lngPicker = e.latlng["lng"];
// 	L.Routing.control({
// 		waypoints: [
// 			L.latLng(latPicker, longPicker), // (darimana) Picker
// 			L.latLng(ltPicker, lngPicker) //(kemana) Object/User
// 		]
// 	}).addTo(map);
// }

// function onAccuratePositionError(e) {
// 	console.log(e.message);
// }

// var estJarak = distance();

// //map.on('accuratepositionprogress', onAccuratePositionProgress);
// map.on("accuratepositionfound", onAccuratePositionFound);
// //map.on('accuratepositionerror', onAccuratePositionError);

// map.findAccuratePosition({
// 	maxWait: 10000, // defaults to 10000
// 	desiredAccuracy: 30 // defaults to 20
// });

L.GeoIP.centerMapOnPosition(map, 15, ipPicker);

L.control.locate().addTo(map);

L.tileLayer(
	'https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=1ObWB7B3EJUmPk0k561X' ,
	{
		attribution:'<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
	}
).addTo(map);
