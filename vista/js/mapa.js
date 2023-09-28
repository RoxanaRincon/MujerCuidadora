
$(function(){
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


var marker = L.marker([4.590322969137869, -74.09791318650694], {icon: greenIcon}).addTo(map).bindPopup("<b>Entidad Ancla </b><br>Codigo:234567<br>Localidad:Santa Fe<br>");

var marker = L.marker([4.629531954416187, -74.07322412883565], {icon: greenIcon}).addTo(map).bindPopup("<b>Casa de la participacion </b><br>Codigo:56432<br>Localidad:Chapinero<br>");

var marker = L.marker([4.617838199078608, -74.1239310495157], {icon: greenIcon}).addTo(map).bindPopup("<b>CDC Jose Antonio Galan</b><br>Codigo:234567<br>Localidad: San Cristobal<br>");

var marker = L.marker([4.755291784099477, -74.11342462883565], {icon: greenIcon}).addTo(map).bindPopup("<b>CEFE Fontanar del Rio </b><br>Codigo:234567<br>Localidad:Usme<br>");

var marker = L.marker([4.6837717924878834, -74.14169944845952], {icon: greenIcon}).addTo(map).bindPopup("<b>Campo Verde </b><br>Codigo:234567<br>Localidad:Bosa<br>");

var marker = L.marker([4.635154887984382, -74.05814752408034], {icon: greenIcon}).addTo(map).bindPopup("<b>CDC Bellavista </b><br>Codigo:234567<br>Localidad:Kennedy<br>");


function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
}

map.on('click', onMapClick);
    listarMapa();

    function listarMapa(){
        var objData = new FormData();
        objData.append("listarManzanas", "ok");
        $.ajax({
            url: "../controlador/mapaControlador.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (respuesta) {
            console.log(respuesta);
        })
    }
})
