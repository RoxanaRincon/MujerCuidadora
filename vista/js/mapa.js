var map = L.map('map').setView([4.642832837652756, -74.11994579368523], 12);


L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);



var greenIcon = L.icon({
    iconUrl: '../vista/imagenes/iconomanzana.svg',
    iconSize:     [65, 65], // size of the icon
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});


var marker = L.marker([4.590322969137869, -74.09791318650694], {icon: greenIcon}).addTo(map).bindPopup("<b>hola soy una manzana 1!</b><br>I am a popup.");

var marker = L.marker([4.629531954416187, -74.07322412883565], {icon: greenIcon}).addTo(map).bindPopup("<b>hola soy una manzana 2!</b><br>I am a popup.");

var marker = L.marker([4.617838199078608, -74.1239310495157], {icon: greenIcon}).addTo(map).bindPopup("<b>hola soy una manzana 2!</b><br>I am a popup.");

var marker = L.marker([4.755291784099477, -74.11342462883565], {icon: greenIcon}).addTo(map).bindPopup("<b>hola soy una manzana 2!</b><br>I am a popup.");

var marker = L.marker([4.6837717924878834, -74.14169944845952], {icon: greenIcon}).addTo(map).bindPopup("<b>hola soy una manzana 2!</b><br>I am a popup.");

var marker = L.marker([4.635154887984382, -74.05814752408034], {icon: greenIcon}).addTo(map).bindPopup("<b>hola soy una manzana 2!</b><br>I am a popup.");


function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
}

map.on('click', onMapClick);