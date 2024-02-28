@extends('layout.master')
@section('title', 'Edit Trip')
@section('content')
    @push('styles')
        <style>
            .point_of_interest {
                max-height: 500px;
                overflow-y: auto;
            }

            .h-label {
                font-weight: 700;
                font-size: 28px;
            }
        </style>
    @endpush
    <section class="inner-banner-wrap">
        <div class="inner-baner-container" style="background-image: url({{ asset('assets/images/inner-banner.jpg') }});">
            <div class="container">
                <div class="inner-banner-content">
                    <h1 class="inner-title">Edit Trip</h1>
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
            <form action="{{ route('update_trip', ['id' => $trip->id]) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <input type="hidden" id="my_city" value="{{ $trip->destination }}">
                        <div class="form-group">
                            <label for="" class="form-label">Departure City</label>
                            <input id="departure-input" readonly name="departure" type="text" placeholder="Enter a city"
                                required value="{{ $trip->departure }}">
                        </div>

                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="form-label">Budget</label>
                            <input name="budget" value="{{ $trip->budget }}" id="budgetInput" onchange="getEstimatedAmount()" type="number"
                                placeholder="Enter Budget" required>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="form-label">Start Date</label>
                            <input name="start_date" onchange="getEstimatedAmount()" type="date" placeholder="Start Date"
                                required value="{{ $trip->start_date }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="form-label">End Date</label>
                            <input name="end_date" onchange="getEstimatedAmount()" type="date" placeholder="End Date"
                                required value="{{ $trip->end_date }}">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="form-label">Destination City</label>
                            <input id="city-input" name="destination" type="text" placeholder="Enter a city" required>
                        </div>

                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="" class="form-label">Estimated Amount<span
                                    style="color: red">*</span></label>
                            <input name="estimated_amount" type="text" placeholder="Estimated" required value="0"
                                disabled>
                            <span class="estimated_amount_message"></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="" class="form-label h-label">Select Point of Interest</label>
                            <div class="point_of_interest" id="point_of_interest">

                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="" class="form-label h-label">Select Hotel</label>
                            <div class="point_of_interest" id="list_hotels">

                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="" class="form-label h-label">Select Food and Experices</label>
                            <div class="point_of_interest" id="foods">

                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @if ($trip->status_by_driver == 'rejected')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <h4>Select Driver </h4>
                                <div class="point_of_interest" id="drivers-list">
                                    @foreach ($user as $u)
                                        <div class="card my-1">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="radio" id="{{ $u->name }}" name="driver"
                                                                onchange="getEstimatedAmount()"
                                                                data-price-per-day="{{ $u->drivers->price_per_day }}"
                                                                value="{{ $u->id }}"><label
                                                                class="form-check-label"
                                                                for="{{ $u->name }}">{{ $u->name }}</label>
                                                        </div>
                                                        <div>
                                                            <strong>address:</strong>{{ $u->drivers->address }}<br><strong>driver
                                                                personal info:</strong>
                                                            {{ $u->drivers->driver_personal_info }}<br><strong>price per
                                                                day:</strong>
                                                            {{ $u->drivers->price_per_day }}<br><strong>vehicle
                                                                type:</strong>
                                                            {{ $u->drivers->vehicle_type }}<br><strong>availability:</strong>
                                                            {{ $u->drivers->availibility }}<br><strong>model:</strong>
                                                            {{ $u->drivers->model }}<br><strong>manufacturer:</strong>
                                                            {{ $u->drivers->manufacturer }}<br><strong>name:</strong>
                                                            {{ $u->name }}<br><strong>email:</strong>
                                                            {{ $u->email }}<br><strong>city:</strong>
                                                            {{ $u->city }}<br><strong>state:</strong>
                                                            {{ $u->state }}<br><strong>phone:</strong>
                                                            {{ $u->phone }}<br></div>
                                                    </div>
                                                    <div class="col-lg-4 text-lg-right"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @else
                    <input type="hidden" name="driver" value="{{ $trip->driver_id }}">
                @endif
                <hr>
                <div class="row">

                    <div class="col-12">
                        <h4>Weather Recommendation</h4>
                        <input type="hidden" value="{{ $trip->destination }}" id="design_city">
                        <div id="weather-recommendation"></div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="button-primary">Edit Trip</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        const apiKey = "{{ config('app.google_map_api_key') }}";


        const weatherApiKey = "382f41dbc0d4a3122776f36830f11614";
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_map_api_key') }}&libraries=places">
    </script>
    <script>
       function getEstimatedAmount() {
        var selectedDriverId = document.querySelector('input[name="driver"]:checked').id;
        var selectedDriver = document.getElementById(selectedDriverId);
        var driverPricePerDay = selectedDriver.getAttribute('data-price-per-day');
        var startDate = new Date(document.querySelector('input[name="start_date"]').value);
        var endDate = new Date(document.querySelector('input[name="end_date"]').value);
        var budget = parseFloat(document.getElementById('budgetInput').value);

        // Calculate the number of days
        var timeDiff = endDate.getTime() - startDate.getTime();
        var numOfDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

        // Calculate the estimated amount
        var estimatedAmount = parseFloat(driverPricePerDay) * numOfDays;

        // Check if estimated amount exceeds budget
        if (estimatedAmount > budget) {
            document.querySelector('input[name="estimated_amount"]').value = "Estimated amount exceeds budget";
        } else {
            document.querySelector('input[name="estimated_amount"]').value = estimatedAmount.toFixed(2);
        }
    }
    window.onload = function() {
        getEstimatedAmount();
        document.querySelectorAll('input[name="driver"]').forEach(function(driverInput) {
            driverInput.addEventListener('change', getEstimatedAmount);
        });
    };
        let selected_interest = "{{ $trip->itineries()->where('key', 'point_of_interest')->first()->value ?? '' }}";
        if (selected_interest) {
            selected_interest = selected_interest.split(',');
        }
        let selected_hotel = "{{ $trip->itineries()->where('key', 'hotel')->first()->value ?? '' }}";
        if (selected_hotel) {
            selected_hotel = selected_hotel.split(',');
        }
        let selected_food = "{{ $trip->itineries()->where('key', 'foods')->first()->value ?? '' }}";
        if (selected_food) {
            selected_food = selected_food.split(',');
        }
        $(document).ready(function() {
            initAutocomplete();
        });

        function searchPlaces(apiKey, query, type = null) {
            const baseUrl = "https://maps.googleapis.com/maps/api/place/textsearch/json";

            let url = new URL(baseUrl);
            url.searchParams.append('key', apiKey);
            url.searchParams.append('query', query);
            // url.searchParams.append('type','point_of_interest');

            if (type) {
                url.searchParams.append('type', type);
            }

            return fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'OK') {
                        return data.results;
                    } else {
                        console.error(`Error: ${data.status}`);
                        return null;
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    return null;
                });
        }

        // show point of interest
        function showPointOfInterest(apiKey, destination) {
            const placesPromise = searchPlaces(apiKey, "Iconic places in " + destination, "point_of_interest");
            let html = 'No Resut Found';
            placesPromise.then(places => {
                if (places) {
                    html = "";
                    console.log('places', places);
                    places.forEach(place => {
                        var photos = place.photos;
                        if (photos) {
                            photos = photos[0];
                        }
                        let rating_html = '';
                        let rating = place.rating;
                        if (rating) {
                            rating = rating.toFixed(1);
                            let rating_split = rating.split('.') ?? [];
                            if (rating_split[0]) {
                                let rating_0 = rating_split[0];
                                for (let index = 0; index < rating_0; index++) {
                                    rating_html += ' <i class="fas fa-star"></i> ';
                                }
                            }
                            if (rating_split[1]) {
                                if (rating_split[1] > 0 && rating_split[1] <= 9) {
                                    rating_html += ' <i class="fas fa-star-half-alt"></i> ';
                                }
                            }
                        }
                        let hotels_url = `{{ route('hotels') }}`;
                        hotels_url = new URL(hotels_url);
                        hotels_url.searchParams.append('place', place.name);
                        let checked = false;
                        if (selected_interest.includes(place.name)) {
                            checked = true;
                        }

                        html += `<div class="card my-1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="flexCheckDefault${place.name}" name="point_of_interest[]" value="${place.name}" ${checked?'checked':''}>
                                        <label class="form-check-label" for="flexCheckDefault${place.name}">
                                            ${place.name}
                                        </label>
                                        </div>
                                        <div><span>${rating}</span> ${rating_html} (${place.user_ratings_total})</div>
                                        <div class="address"> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> ${place.formatted_address}</div>
                                    </div>
                                    <div class="col-lg-4 text-lg-right">
                                        <img src="${photos?'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference='+photos.photo_reference+'&sensor=false&key='+apiKey:''}" class="img-fluid" style="height: 140px">
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    });
                }
                $(document).find('#point_of_interest').html(html);
            });
        }

        // show hotels
        function showHotels(apiKey, destination) {
            const placesPromise = searchPlaces(apiKey, "hotels in " + destination, "point_of_interest");
            let html = 'No Resut Found';
            placesPromise.then(places => {
                if (places) {
                    html = "";
                    console.log('places', places);
                    places.forEach(place => {
                        var photos = place.photos;
                        if (photos) {
                            photos = photos[0];
                        }
                        let rating_html = '';
                        let rating = place.rating;
                        if (rating) {
                            rating = rating.toFixed(1);
                            let rating_split = rating.split('.') ?? [];
                            if (rating_split[0]) {
                                let rating_0 = rating_split[0];
                                for (let index = 0; index < rating_0; index++) {
                                    rating_html += ' <i class="fas fa-star"></i> ';
                                }
                            }
                            if (rating_split[1]) {
                                if (rating_split[1] > 0 && rating_split[1] <= 9) {
                                    rating_html += ' <i class="fas fa-star-half-alt"></i> ';
                                }
                            }
                        }
                        let hotels_url = `{{ route('hotels') }}`;
                        hotels_url = new URL(hotels_url);
                        hotels_url.searchParams.append('place', place.name);
                        let checked = false;
                        if (selected_hotel.includes(place.name)) {
                            checked = true;
                        }

                        html += `<div class="card my-1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" id="flexCheckDefault${place.name}" name="hotel" value="${place.name}" ${checked?'checked':''}>
                                        <label class="form-check-label" for="flexCheckDefault${place.name}">
                                            ${place.name}
                                        </label>
                                        </div>
                                        <div><span>${rating}</span> ${rating_html} (${place.user_ratings_total})</div>
                                        <div class="address"> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> ${place.formatted_address}</div>
                                    </div>
                                    <div class="col-lg-4 text-lg-right">
                                        <img src="${photos?'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference='+photos.photo_reference+'&sensor=false&key='+apiKey:''}" class="img-fluid" style="height: 140px">
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    });
                }
                $(document).find('#list_hotels').html(html);
            });
        }
        // function enableDesField() {
        //     if ($.trim($('select[name="departure"]').val()) != '' && $.trim($('input[name="budget"]').val()) != '' &&
        //         $.trim($('input[name="start_date"]').val()) != '' &&
        //         $.trim($('input[name="end_date"]').val()) != '') {
        //         $('input[name="destination"]').attr('disabled', false)
        //     } else {
        //         $('input[name="destination"]').attr('disabled', true)
        //     }
        // }

        // function getEstimatedAmount() {
        //     let estimatedAmount = 0;
        //     let selectedHotel = $('input[name="hotel"]:checked');
        //     let selectedDriver = $('input[name="driver"]:checked');
        //     let perDayPrice = selectedHotel.attr('data-price');
        //     let driverDayPrice = selectedDriver.attr('data-price');
        //     var startDate = moment($('input[name="start_date"]').val());
        //     var endDate = moment($('input[name="end_date"]').val());
        //     const numberOfDays = endDate.diff(startDate, 'days');
        //     let hotelCost = 0;
        //     let driverCost = 0;
        //     if (numberOfDays > 0 && perDayPrice > 0) {
        //         hotelCost = numberOfDays * perDayPrice;
        //     }
        //     if (numberOfDays > 0 && driverDayPrice > 0) {
        //         driverCost = numberOfDays * driverDayPrice;
        //     }
        //     estimatedAmount = hotelCost + driverCost;
        //     estimatedAmount = parseFloat(estimatedAmount);
        //     $('input[name="estimated_amount"]').val(estimatedAmount)
        //     setTimeout(() => {
        //         let budgetAount = parseFloat($('input[name="budget"]').val());
        //         console.log('budgetAount', budgetAount);
        //         if (estimatedAmount > budgetAount || isNaN(budgetAount) || budgetAount == 0) {
        //             $('.estimated_amount_message').addClass('text-danger').removeClass('text-success').text(
        //                 'Budget is not enough for this trip');
        //             $('button[type="submit"]').attr('disabled', true);
        //         } else {
        //             $('.estimated_amount_message').addClass('text-success').removeClass('text-danger').text(
        //                 'All good');
        //             $('button[type="submit"]').attr('disabled', false);
        //         }
        //     }, 100);
        // }
        // show foods
        function showFoods(apiKey, destination) {
            const placesPromise = searchPlaces(apiKey, "foods in " + destination, "foods");
            let html = 'No Resut Found';
            placesPromise.then(places => {
                if (places) {
                    html = "";
                    console.log('places', places);
                    places.forEach(place => {
                        var photos = place.photos;
                        if (photos) {
                            photos = photos[0];
                        }
                        let rating_html = '';
                        let rating = place.rating;
                        if (rating) {
                            rating = rating.toFixed(1);
                            let rating_split = rating.split('.') ?? [];
                            if (rating_split[0]) {
                                let rating_0 = rating_split[0];
                                for (let index = 0; index < rating_0; index++) {
                                    rating_html += ' <i class="fas fa-star"></i> ';
                                }
                            }
                            if (rating_split[1]) {
                                if (rating_split[1] > 0 && rating_split[1] <= 9) {
                                    rating_html += ' <i class="fas fa-star-half-alt"></i> ';
                                }
                            }
                        }
                        let hotels_url = `{{ route('hotels') }}`;
                        hotels_url = new URL(hotels_url);
                        hotels_url.searchParams.append('place', place.name);
                        let checked = false;
                        if (selected_food.includes(place.name)) {
                            checked = true;
                        }
                        html += `<div class="card my-1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="${place.name}" id="flexCheckDefault${place.name}" name="foods[]" ${checked?'checked':''}>
                                        <label class="form-check-label" for="flexCheckDefault${place.name}">
                                            ${place.name}
                                        </label>
                                        </div>
                                        <div><span>${rating}</span> ${rating_html} (${place.user_ratings_total})</div>
                                        <div class="address"> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> ${place.formatted_address}</div>
                                    </div>
                                    <div class="col-lg-4 text-lg-right">
                                        <img src="${photos?'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference='+photos.photo_reference+'&sensor=false&key='+apiKey:''}" class="img-fluid" style="height: 140px">
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    });
                }
                $(document).find('#foods').html(html);
            });
        }

        // Example usage
        const userQuery = $(document).find('input[name=place]').val();

        function initAutocomplete() {
            let destination = "{{ $trip->destination }}";
            showPointOfInterest(apiKey, destination);
            showHotels(apiKey, destination);
            showFoods(apiKey, destination);
            var input = document.getElementById('city-input');
            input.value = destination
            var autocomplete = new google.maps.places.Autocomplete(input, {
                types: ['(cities)'],
                componentRestrictions: {
                    country: 'PK'
                } // 'PK' is the ISO 3166-1 alpha-2 country code for Pakistan
            });

            // $(document).find('input[ name="destination"]').val("{{ $trip->destination }}").trigger('place_changed');
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                showPointOfInterest(apiKey, place.name);
                showHotels(apiKey, place.name);
                showFoods(apiKey, place.name);
            });

        }

        var city = $('#my_city').val();


        function updateWeatherRecommendation(city) {
            getWeatherData(city)
                .then(temperature => {
                    if (temperature !== null) {
                        const recommendation = getWeatherRecommendation(temperature);
                        const weatherRecommendationDiv = $('#weather-recommendation');
                        weatherRecommendationDiv.text(recommendation);

                    }
                });
        }

        function getWeatherRecommendation(temperature) {
            if (temperature > 25) {
                return `It's a warm day (${temperature}°C)! Pack light and stay hydrated.`;
            } else if (temperature > 10) {
                return `The weather is moderate (${temperature}°C). Bring a jacket just in case.`;
            } else {
                return `It's a cold day (${temperature}°C). Make sure to bundle up.`;
            }
        }


        function getWeatherData(city) {
            const weatherUrl =
                `http://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${weatherApiKey}&units=metric`;

            return fetch(weatherUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.main && data.main.temp) {
                        return data.main.temp;
                    } else {
                        console.error('Error fetching weather data:', data);
                        return null;
                    }
                })
                .catch(error => {
                    console.error('Error fetching weather data:', error);
                    return null;
                });
        }

        // Function to update weather recommendation on the page
        function updateWeatherRecommendation(city) {
            getWeatherData(city)
                .then(temperature => {
                    if (temperature !== null) {
                        const recommendation = getWeatherRecommendation(temperature);
                        const weatherRecommendationDiv = $('#weather-recommendation');
                        weatherRecommendationDiv.text(recommendation);
                    }
                });
        }
        document.addEventListener('DOMContentLoaded', function() {
            updateWeatherRecommendation(city);

        });
    </script>
@endpush
