<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Planner</title>
    <style>
        /* Add your custom styling for the form here */
        form {
            max-width: 600px;
            margin: 50px auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <form method="post" action="{{ route('tour_planner.plan') }}">
        @csrf

        <label for="origin">Origin:</label>
        <input type="text" name="start_address" id="origin-input" required>

        <label for="destination">Destination:</label>
        <input type="text" name="end_address" id="destination-input" required>

        <button type="submit">Plan My Tour</button>
    </form>

    <!-- Include the Google Places Autocomplete API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDs_GJ-jYuHEQI7Gp0SmiqozELvV9mSsY&libraries=places&callback=initAutocomplete" async defer></script>

    <script>
        function initAutocomplete() {
            var originInput = document.getElementById('origin-input');
            var destinationInput = document.getElementById('destination-input');

            var options = {
                componentRestrictions: { country: 'pk' } // Restrict results to Pakistan
            };

            var autocompleteOrigin = new google.maps.places.Autocomplete(originInput, options);
            var autocompleteDestination = new google.maps.places.Autocomplete(destinationInput, options);
        }
    </script>

</body>
</html>
