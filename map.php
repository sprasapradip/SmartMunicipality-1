<!DOCTYPE html>
<html>
<head>
    <title>Current Location Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    <style>
        #map {
            height: 400px;
            
        }
    </style>
</head>
<body>
    <h1>Current Location Map</h1>
    <div id="map"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <script>
        // Create a map centered on a default location
        var map = L.map('map').setView([0, 0], 13);

        // Add the OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Get the current location of the user
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showLocation);
        } else {
            alert('Geolocation is not supported by your browser.');
        }

        // Callback function to show the current location on the map
        function showLocation(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            // Create a marker with the current location
            var marker = L.marker([latitude, longitude]).addTo(map);
            marker.bindPopup('You are here.');


            var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
}

map.on('click', onMapClick);

            // Update the map view to center on the current location
            map.setView([latitude, longitude], 13);
        }
    </script>
</body>
</html>
