<!DOCTYPE html>
<html>
<head>
    <title>Tour Results</title>
    <style>
        /* Add your custom styling for the map container here */
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>

<h2>Tour Directions:</h2>
<pre>{{ json_encode($directions, JSON_PRETTY_PRINT) }}</pre>

<!-- Display Google Map -->
<div id="map"></div>

<script>
    function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: {lat: 37.7749, lng: -122.4194}, // Set the default map center
        });

        directionsDisplay.setMap(map);

        var start = "{{ $directions['routes'][0]['legs'][0]['start_address'] }}";
        var end = "{{ $directions['routes'][0]['legs'][0]['end_address'] }}";

        var request = {
            origin: start,
            destination: end,
            travelMode: 'DRIVING'
        };

        directionsService.route(request, function(result, status) {
            if (status == 'OK') {
                directionsDisplay.setDirections(result);
            }
        });
    }
</script>

<!-- Include the Google Maps JavaScript API -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDs_GJ-jYuHEQI7Gp0SmiqozELvV9mSsY&callback=initMap"></script>

</body>
</html>
