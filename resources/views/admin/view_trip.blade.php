@extends('layout.master')
@section('title', 'View Trip')
@section('content')
    @push('styles')
        <style>
            @media only screen and (max-width: 767px) {
                #mobileNavigationLink {
                    display: block;
                }
            }

            .modal-header {
                background: #f56960;
            }

            .point_of_interest {
                max-height: 500px;
                overflow-y: auto;
            }

            .h-label {
                font-weight: 700;
                font-size: 28px;
            }

            .itinery-title {
                font-weight: 700;
                font-size: 16px;
                text-transform: capitalize;
            }

            .itinery-details {
                display: flex;
                flex-direction: column
            }

            .itinery-details a {
                padding: 10px;
                box-shadow: 2px 2px 10px #00000042;
                margin: 10px 0;
                border-radius: 8px;
                color: #8d8d8d;
            }

            .itinery-details a:hover {
                color: #0e0e0e;
                box-shadow: none;
                box-shadow: 2px 2px 8px #00000042;
            }

            .modal-body {
                padding: 20px 20px;
            }

            .modal-body p#driverName {
                padding: 15px 10px;
                color: #f56960;
                font-size: 16px;
                border: 2px solid #f56960;
            }

            .modal-body p.car {
                padding: 15px 10px;
                color: #f56960;
                font-size: 16px;
                border: 2px solid #f56960;
            }

            .modal-body p#driverPhone {
                /* background: #f56960; */
                color: #f56960;
                padding: 15px 10px;
                border: 2px solid #f56960;
            }

            .modal-header h5#driverDetailsModalLabel {
                color: #fff;
                font-size: 20px;
            }
        </style>
    @endpush
    <section class="inner-banner-wrap">
        <div class="inner-baner-container" style="background-image: url({{ asset('assets/images/inner-banner.jpg') }});">
            <div class="container">
                <div class="inner-banner-content">
                    <h1 class="inner-title">View Trip</h1>
                </div>
            </div>
        </div>
        <div class="inner-shape"></div>
    </section>
    <section class="inner-banner-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Trip Details</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {{-- map --}}
                    <div id="map" style="height: 400px;"></div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="mb-0">{{ $trip->destination }}</h4>
                            <div class="dates">
                                {{ Carbon\Carbon::parse($trip->start_date)->format('jS, M Y') }} <span
                                    style="font-weight: 700;font-size:14px">-</span>
                                {{ Carbon\Carbon::parse($trip->end_date)->format('jS, M Y') }}
                            </div>
                        </div>
                    </div>
                    <hr>
                    @if ($trip->itineries)
                        <div class="row">
                            @foreach ($trip->itineries as $itinery)
                                <div class="col-12">
                                    <label for=""
                                        class="itinery-title">{{ str_replace('_', ' ', $itinery->key) }}</label>
                                    @php
                                        $values = explode(',', $itinery->value);
                                    @endphp
                                    <div class="itinery-details">
                                        @foreach ($values as $value)
                                            @if ($itinery->key == 'driver')
                                                @php
                                                    $driver = \App\Models\User::find($value);
                                                @endphp
                                                @if ($driver)
                                                    @php
                                                        $driver_details = \App\Models\DriverDetail::where('user_id', $value)->first();
                                                    @endphp
                                                    <a href="javascript:void(0)" class="show_driv"
                                                        data-age={{ $driver_details->age }}
                                                        data-price="{{ $driver_details->price_per_day }}"
                                                        data-model="{{ $driver_details->model }}"
                                                        data-ctype="{{ $driver_details->vehicle_type }}"
                                                        data-manufacturer="{{ $driver_details->manufacturer }}"
                                                        data-end="{{ $driver->id }}" data-name="{{ $driver->name }}"
                                                        data-phone="{{ $driver->phone }}" data-bs-toggle="modal"
                                                        data-bs-target="#driverDetailsModal">{{ $driver->name }}</a>
                                                @else
                                                    <span class="text-danger">User not found for ID:
                                                        {{ $value }}</span>
                                                @endif
                                            @else
                                                <a href="javascript:void(0)" class="show_route"
                                                    data-end="{{ $value }}">{{ $value }}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>


    <!-- Replace your existing Modal HTML with this -->
    <div id="driverDetailsModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="driverDetailsModalLabel">Driver Details</h5>
                    <button class="btn-close btn btn-danger">Close</button>
                </div>
                <div class="modal-body">
                    <!-- Display driver details here -->
                    <label for="">Personal Info:</label><br>
                    <p id="driverName"></p>
                    <p id="driverPhone"></p>
                    <p id="age" class="car"></p>
                    <label for="">Car Details:</label>
                    <p id="manufacturer" class="car"></p>
                    <p id="type" class="car"></p>
                    <p id="model" class="car"></p>
                    <p id="price" class="car"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn-close btn btn-danger">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        @if (session('error'))
            swal({
                title: "Error",
                text: "{{ session('error') }}",
                icon: "error",
                button: "OK",
            });
        @endif
        @if (session('success'))
            swal({
                title: "Success",
                text: "{{ session('success') }}",
                icon: "success",
                button: "OK",
            });
        @endif
    </script>
@endsection

@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_map_api_key') }}&libraries=places">
    </script>
    <script>
        var map;

        // Function to initialize the map with the current location
        function initMap() {
            // Default coordinates (for example, the center of Pakistan)
            var defaultLatLng = {
                lat: 30.3753,
                lng: 69.3451
            };

            // Create a new map centered at the default coordinates
            map = new google.maps.Map(document.getElementById('map'), {
                center: defaultLatLng,
                zoom: 8 // Adjust the zoom level as needed
            });

            // Check if the browser supports geolocation
            if (navigator.geolocation) {
                // Request location permission
                navigator.permissions.query({
                    name: 'geolocation'
                }).then(function(result) {
                    if (result.state === 'granted') {
                        // Permission granted, get current position
                        navigator.geolocation.getCurrentPosition(function(position) {
                            var currentLatLng = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                            };

                            // Center the map at the current location
                            map.setCenter(currentLatLng);

                            // Add a marker at the current location
                            var marker = new google.maps.Marker({
                                position: currentLatLng,
                                map: map,
                                title: 'Current Location'
                            });
                        }, function() {
                            // Handle geolocation error
                            console.error('Error: The Geolocation service failed.');
                        });
                    } else if (result.state === 'prompt') {
                        // Permission not granted, but the user hasn't made a decision yet
                        console.log('Waiting for user decision on geolocation permission.');
                    } else {
                        // Permission denied
                        console.error('Error: Geolocation permission denied.');
                    }
                });
            } else {
                // Browser doesn't support geolocation
                console.error('Error: Your browser doesn\'t support geolocation.');
            }
        }

        // Call the initMap function when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            initMap();
        });

        $(document).on('click', 'a.show_route', function() {
            // Directions service instance
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();
            directionsRenderer.setMap(map);

            let end = $(this).data('end');
            // Get route between two points
            calculateAndDisplayRoute(directionsService, directionsRenderer, end);
        });

        // Function to calculate and display the route
        function calculateAndDisplayRoute(directionsService, directionsRenderer, end) {
            // Try HTML5 geolocation
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var currentLatLng = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    // Set the starting point for directions
                    var start = new google.maps.LatLng(currentLatLng.lat, currentLatLng.lng);

                    // Replace the destination with your desired endpoint
                    // var end = 'Lahore, Pakistan';

                    directionsService.route({
                            origin: start,
                            destination: end,
                            travelMode: 'DRIVING' // You can also use 'WALKING', 'BICYCLING', or 'TRANSIT'
                        },
                        function(response, status) {
                            if (status === 'OK') {
                                directionsRenderer.setDirections(response);
                            } else {
                                console.error('Error:', status);
                            }
                        }
                    );
                }, function() {
                    // Handle geolocation error
                    console.error('Error: The Geolocation service failed.');
                    alert("The Geolocation service failed");
                });
            } else {
                // Browser doesn't support geolocation
                console.error('Error: Your browser doesn\'t support geolocation.');
            }
        }


        document.addEventListener('click', function(event) {
            // Check if the clicked element has the class 'show_driv'
            if (event.target.classList.contains('show_driv')) {
                // Get driver details from the clicked link
                var driverName = event.target.getAttribute('data-name');
                var driverPhone = event.target.getAttribute('data-phone');
                var manufacturer = event.target.getAttribute('data-manufacturer') || 'N/A';
                var type = event.target.getAttribute('data-ctype') || 'N/A';
                var model = event.target.getAttribute('data-model') || 'N/A';
                var price = event.target.getAttribute('data-price') || 'N/A';
                var age = event.target.getAttribute('data-age') || 'N/A';

                // Set driver details in the modal
                document.getElementById('driverName').innerText = 'Name: ' + driverName;
                document.getElementById('driverPhone').innerText = 'Phone: ' + driverPhone;
                document.getElementById('age').innerText = 'Age: ' + age;
                document.getElementById('manufacturer').innerText = 'Car Manufacturer: ' + manufacturer;
                document.getElementById('type').innerText = 'Car Type: ' + type;
                document.getElementById('model').innerText = 'Car Model: ' + model;
                document.getElementById('price').innerText = 'Rent Per Day: ' + price;

                // Show the modal
                document.getElementById('driverDetailsModal').style.display = 'block';
            }
        });

        // Add this script to close the modal when the close button is clicked
        document.addEventListener('click', function(event) {
            // Check if the clicked element has the class 'btn-close'
            if (event.target.classList.contains('btn-close')) {
                // Hide the modal
                document.getElementById('driverDetailsModal').style.display = 'none';
            }
        });
    </script>
@endpush
