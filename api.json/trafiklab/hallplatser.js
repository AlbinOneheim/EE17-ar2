/* Mapbox inställningara */
mapboxgl.accessToken = 'pk.eyJ1Ijoia2FyeWUiLCJhIjoiY2pwOXRtbWc1MGdmNjNwc2JmdGxzeDR5byJ9.whp8f2Ttws57ctAf_stuag';

/* Start position: NTI */
var latNTI = 59.336885;
var lonNTI = 18.048323;

/* Skapa kartan */
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v9',
    center: [lonNTI, latNTI],
    zoom: 15 
});

/* Hämta användarens position */
getLocation();

/* Om vi får avläsa positionen, kör igång */
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);

    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}

/* Visa användarens latitude och longitude */
function showPosition(position) {
    var latHem = position.coords.latitude;
    var lonHem = position.coords.longitude;
    console.log("Latitude: " + latHem +
    "\nLongitude: " + lonHem);

    /* Infoga en marker på karatan */
    var marker = new mapboxgl.Marker()
    .setLngLat([lonHem, latHem])
    .addTo(map);
    

    /* Packa in latHem och lonHem till ett POST-packet */
    var postData = new FormData();
    postData.append("lat", latHem);
    postData.append("lon", lonHem);

    /* Skicka lat och lon till php-skriptet mha ajax */
    var ajax = new XMLHttpRequest();

    ajax.open("POST", "http://localhost:8080/api/trafiklab/trafiklab.php    ", true);
    ajax.send(postData);

    ajax.addEventListener("loadend", function() {
        console.log(this.responseText);

        /* Infoga alal hållplatser i kartan */
        var hållplatser = JSON.parse(this.responseText);

        hållplatser.forEach(function (hållplats) {
            console.log(hållplats.name, hållplats.lat, hållplats.lon);
            var buss = document.createElement('div');
            buss.className = 'buss';

        var popup = new mapboxgl.Popup({offset: 25})
            .setText(hållplats.name);

        new mapboxgl.Marker(buss)
            .setLngLat([hållplats.lon, hållplats.lat])
            .setPopup(popup)
            .addTo(map);
        });   
    });
}