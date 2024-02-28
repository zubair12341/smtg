@extends('layout.master')
@section('title', 'Create Trip')
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
                    <h1 class="inner-title">Create Trip</h1>
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
                    {{-- <h4>Your trip budget only cover your hotel expense, Driver and car expense.</h4> --}}
                </div>
            </div>
            <form action="{{ route('store_trip') }}" method="POST">
                <input type="hidden" name="geoId">
                @csrf
                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="form-label">Point of departure <span
                                    style="color: red">*</span></label>
                            <select name="departure" id="start-city-input" required onchange="enableDesField()">
                                <option value="" disabled selected>Select The City</option>
                                <option value="Islamabad">Islamabad</option>
                                <option value="" disabled>Punjab Cities</option>
                                {{-- <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
                            <option value="Ahmadpur East">Ahmadpur East</option>
                            <option value="Ali Khan Abad">Ali Khan Abad</option>
                            <option value="Alipur">Alipur</option>
                            <option value="Arifwala">Arifwala</option>
                            <option value="Attock">Attock</option>
                            <option value="Bhera">Bhera</option>
                            <option value="Bhalwal">Bhalwal</option>
                            <option value="Bahawalnagar">Bahawalnagar</option> --}}
                                <option value="Bahawalpur">Bahawalpur</option>
                                {{-- <option value="Bhakkar">Bhakkar</option>
                            <option value="Burewala">Burewala</option>
                            <option value="Chillianwala">Chillianwala</option>
                            <option value="Chakwal">Chakwal</option>
                            <option value="Chichawatni">Chichawatni</option>
                            <option value="Chiniot">Chiniot</option>
                            <option value="Chishtian">Chishtian</option>
                            <option value="Daska">Daska</option>
                            <option value="Darya Khan">Darya Khan</option>
                            <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                            <option value="Dhaular">Dhaular</option>
                            <option value="Dina">Dina</option>
                            <option value="Dinga">Dinga</option>
                            <option value="Dipalpur">Dipalpur</option>
                            <option value="Faisalabad">Faisalabad</option>
                            <option value="Ferozewala">Ferozewala</option>
                            <option value="Fateh Jhang">Fateh Jang</option>
                            <option value="Ghakhar Mandi">Ghakhar Mandi</option>
                            <option value="Gojra">Gojra</option> --}}
                                <option value="Gujranwala">Gujranwala</option>
                                {{-- <option value="Gujrat">Gujrat</option>
                            <option value="Gujar Khan">Gujar Khan</option>
                            <option value="Hafizabad">Hafizabad</option>
                            <option value="Haroonabad">Haroonabad</option>
                            <option value="Hasilpur">Hasilpur</option>
                            <option value="Haveli Lakha">Haveli Lakha</option>
                            <option value="Jatoi">Jatoi</option>
                            <option value="Jalalpur">Jalalpur</option>
                            <option value="Jattan">Jattan</option>
                            <option value="Jampur">Jampur</option>
                            <option value="Jaranwala">Jaranwala</option>
                            <option value="Jhang">Jhang</option>
                            <option value="Jhelum">Jhelum</option>
                            <option value="Kalabagh">Kalabagh</option>
                            <option value="Karor Lal Esan">Karor Lal Esan</option>
                            <option value="Kasur">Kasur</option>
                            <option value="Kamalia">Kamalia</option>
                            <option value="Kamoke">Kamoke</option>
                            <option value="Khanewal">Khanewal</option>
                            <option value="Khanpur">Khanpur</option>
                            <option value="Kharian">Kharian</option>
                            <option value="Khushab">Khushab</option>
                            <option value="Kot Addu">Kot Addu</option>
                            <option value="Jauharabad">Jauharabad</option> --}}
                                <option value="Lahore">Lahore</option>
                                {{-- <option value="Lalamusa">Lalamusa</option>
                            <option value="Layyah">Layyah</option>
                            <option value="Liaquat Pur">Liaquat Pur</option>
                            <option value="Lodhran">Lodhran</option>
                            <option value="Malakwal">Malakwal</option>
                            <option value="Mamoori">Mamoori</option>
                            <option value="Mailsi">Mailsi</option>
                            <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                            <option value="Mian Channu">Mian Channu</option> --}}
                                <option value="Mianwali">Mianwali</option>
                                <option value="Multan">Multan</option>
                                <option value="Murree">Murree</option>
                                {{-- <option value="Muridke">Muridke</option>
                            <option value="Mianwali Bangla">Mianwali Bangla</option>
                            <option value="Muzaffargarh">Muzaffargarh</option>
                            <option value="Narowal">Narowal</option>
                            <option value="Nankana Sahib">Nankana Sahib</option>
                            <option value="Okara">Okara</option>
                            <option value="Renala Khurd">Renala Khurd</option>
                            <option value="Pakpattan">Pakpattan</option>
                            <option value="Pattoki">Pattoki</option>
                            <option value="Pir Mahal">Pir Mahal</option>
                            <option value="Qaimpur">Qaimpur</option>
                            <option value="Qila Didar Singh">Qila Didar Singh</option>
                            <option value="Rabwah">Rabwah</option>
                            <option value="Raiwind">Raiwind</option>
                            <option value="Rajanpur">Rajanpur</option>
                            <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                            <option value="Rawalpindi">Rawalpindi</option>
                            <option value="Sadiqabad">Sadiqabad</option>
                            <option value="Safdarabad">Safdarabad</option>
                            <option value="Sahiwal">Sahiwal</option>
                            <option value="Sangla Hill">Sangla Hill</option>
                            <option value="Sarai Alamgir">Sarai Alamgir</option> --}}
                                <option value="Sargodha">Sargodha</option>
                                {{-- <option value="Shakargarh">Shakargarh</option>
                            <option value="Sheikhupura">Sheikhupura</option> --}}
                                <option value="Sialkot">Sialkot</option>
                                {{-- <option value="Sohawa">Sohawa</option>
                            <option value="Soianwala">Soianwala</option>
                            <option value="Siranwali">Siranwali</option>
                            <option value="Talagang">Talagang</option>
                            <option value="Taxila">Taxila</option>
                            <option value="Toba Tek Singh">Toba Tek Singh</option>
                            <option value="Vehari">Vehari</option>
                            <option value="Wah Cantonment">Wah Cantonment</option> --}}
                                <option value="Wazirabad">Wazirabad</option>
                                <option value="" disabled>Sindh Cities</option>
                                {{-- <option value="Badin">Badin</option>
                            <option value="Bhirkan">Bhirkan</option>
                            <option value="Rajo Khanani">Rajo Khanani</option>
                            <option value="Chak">Chak</option>
                            <option value="Dadu">Dadu</option>
                            <option value="Digri">Digri</option>
                            <option value="Diplo">Diplo</option>
                            <option value="Dokri">Dokri</option>
                            <option value="Ghotki">Ghotki</option>
                            <option value="Haala">Haala</option> --}}
                                <option value="Hyderabad">Hyderabad</option>
                                {{-- <option value="Islamkot">Islamkot</option>
                            <option value="Jacobabad">Jacobabad</option>
                            <option value="Jamshoro">Jamshoro</option>
                            <option value="Jungshahi">Jungshahi</option>
                            <option value="Kandhkot">Kandhkot</option>
                            <option value="Kandiaro">Kandiaro</option> --}}
                                <option value="Karachi">Karachi</option>
                                {{-- <option value="Kashmore">Kashmore</option>
                            <option value="Keti Bandar">Keti Bandar</option>
                            <option value="Khairpur">Khairpur</option>
                            <option value="Kotri">Kotri</option>
                            <option value="Larkana">Larkana</option>
                            <option value="Matiari">Matiari</option>
                            <option value="Mehar">Mehar</option> --}}
                                <option value="Mirpur Khas">Mirpur Khas</option>
                                {{-- <option value="Mithani">Mithani</option>
                            <option value="Mithi">Mithi</option>
                            <option value="Mehrabpur">Mehrabpur</option>
                            <option value="Moro">Moro</option>
                            <option value="Nagarparkar">Nagarparkar</option>
                            <option value="Naudero">Naudero</option>
                            <option value="Naushahro Feroze">Naushahro Feroze</option>
                            <option value="Naushara">Naushara</option> --}}
                                <option value="Nawabshah">Nawabshah</option>
                                {{-- <option value="Nazimabad">Nazimabad</option>
                            <option value="Qambar">Qambar</option>
                            <option value="Qasimabad">Qasimabad</option>
                            <option value="Ranipur">Ranipur</option>
                            <option value="Ratodero">Ratodero</option> --}}
                                <option value="Rohri">Rohri</option>
                                {{-- <option value="Sakrand">Sakrand</option>
                            <option value="Sanghar">Sanghar</option>
                            <option value="Shahbandar">Shahbandar</option>
                            <option value="Shahdadkot">Shahdadkot</option>
                            <option value="Shahdadpur">Shahdadpur</option>
                            <option value="Shahpur Chakar">Shahpur Chakar</option>
                            <option value="Shikarpaur">Shikarpaur</option> --}}
                                <option value="Sukkur">Sukkur</option>
                                {{-- <option value="Tangwani">Tangwani</option>
                            <option value="Tando Adam Khan">Tando Adam Khan</option>
                            <option value="Tando Allahyar">Tando Allahyar</option>
                            <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
                            <option value="Thatta">Thatta</option>
                            <option value="Umerkot">Umerkot</option>
                            <option value="Warah">Warah</option> --}}
                                <option value="" disabled>Khyber Cities</option>
                                <option value="Abbottabad">Abbottabad</option>
                                {{-- <option value="Adezai">Adezai</option>
                            <option value="Alpuri">Alpuri</option>
                            <option value="Akora Khattak">Akora Khattak</option>
                            <option value="Ayubia">Ayubia</option>
                            <option value="Banda Daud Shah">Banda Daud Shah</option>
                            <option value="Bannu">Bannu</option>
                            <option value="Batkhela">Batkhela</option>
                            <option value="Battagram">Battagram</option>
                            <option value="Birote">Birote</option>
                            <option value="Chakdara">Chakdara</option>
                            <option value="Charsadda">Charsadda</option>
                            <option value="Chitral">Chitral</option>
                            <option value="Daggar">Daggar</option>
                            <option value="Dargai">Dargai</option>
                            <option value="Darya Khan">Darya Khan</option>
                        
                            <option value="Doaba">Doaba</option>
                            <option value="Dir">Dir</option>
                            <option value="Drosh">Drosh</option>
                            <option value="Hangu">Hangu</option>
                            <option value="Haripur">Haripur</option>
                            <option value="Karak">Karak</option>
                            <option value="Kohat">Kohat</option>
                            <option value="Kulachi">Kulachi</option>
                            <option value="Lakki Marwat">Lakki Marwat</option>
                            <option value="Latamber">Latamber</option>
                            <option value="Madyan">Madyan</option>
                        
                            <option value="Mardan">Mardan</option>
                            <option value="Mastuj">Mastuj</option>
                            <option value="Mingora">Mingora</option>
                            <option value="Nowshera">Nowshera</option>
                            <option value="Paharpur">Paharpur</option>
                            <option value="Pabbi">Pabbi</option> --}}
                                <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                                <option value="Mansehra">Mansehra</option>
                                <option value="Peshawar">Peshawar</option>
                                {{-- <option value="Saidu Sharif">Saidu Sharif</option>
                            <option value="Shorkot">Shorkot</option>
                            <option value="Shewa Adda">Shewa Adda</option>
                            <option value="Swabi">Swabi</option>
                            <option value="Swat">Swat</option>
                            <option value="Tangi">Tangi</option>
                            <option value="Tank">Tank</option>
                            <option value="Thall">Thall</option>
                            <option value="Timergara">Timergara</option>
                            <option value="Tordher">Tordher</option> --}}
                                <option value="" disabled>Balochistan Cities</option>
                                {{-- <option value="Awaran">Awaran</option>
                            <option value="Barkhan">Barkhan</option>
                            <option value="Chagai">Chagai</option>
                            <option value="Dera Bugti">Dera Bugti</option> --}}
                                <option value="Gwadar">Gwadar</option>
                                {{-- <option value="Harnai">Harnai</option>
                            <option value="Jafarabad">Jafarabad</option>
                            <option value="Jhal Magsi">Jhal Magsi</option>
                            <option value="Kacchi">Kacchi</option>
                            <option value="Kalat">Kalat</option>
                            <option value="Kech">Kech</option>
                            <option value="Kharan">Kharan</option>
                            <option value="Khuzdar">Khuzdar</option>
                            <option value="Killa Abdullah">Killa Abdullah</option>
                            <option value="Killa Saifullah">Killa Saifullah</option>
                            <option value="Kohlu">Kohlu</option>
                            <option value="Lasbela">Lasbela</option>
                            <option value="Lehri">Lehri</option>
                            <option value="Loralai">Loralai</option>
                            <option value="Mastung">Mastung</option>
                            <option value="Musakhel">Musakhel</option>
                            <option value="Nasirabad">Nasirabad</option>
                            <option value="Nushki">Nushki</option>
                            <option value="Panjgur">Panjgur</option>
                            <option value="Pishin Valley">Pishin Valley</option> --}}
                                <option value="Quetta">Quetta</option>
                                {{-- <option value="Sherani">Sherani</option>
                            <option value="Sibi">Sibi</option>
                            <option value="Sohbatpur">Sohbatpur</option>
                            <option value="Washuk">Washuk</option>
                            <option value="Zhob">Zhob</option> --}}
                                <option value="Ziarat">Ziarat</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="form-label">Budget</label>
                            <input name="budget" type="number" placeholder="Enter Budget" required
                                onchange="enableDesField(),getEstimatedAmount()">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="form-label">Start Date <span style="color: red">*</span></label>
                            <input name="start_date" type="date" placeholder="Start Date" required
                                onchange="enableDesField(),getEstimatedAmount()">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="" class="form-label">End Date <span style="color: red">*</span></label>
                            <input name="end_date" type="date" placeholder="End Date" required
                                onchange="enableDesField(),getEstimatedAmount()">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label">Destination City</label>
                            <input id="city-input" name="destination" type="text" placeholder="Enter a city" required
                                disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
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
                            <h4>Select Hotel</h4>
                            <div class="point_of_interest" id="list_hotels">
                                <!-- The hotels will be displayed here -->
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <h4>Select Point of Interest</h4>
                            <div class="point_of_interest" id="point_of_interest">

                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <h4>Select Driver (Choose Point of departure)</h4>
                            <div class="point_of_interest" id="drivers-list">
                                <!-- Drivers will be displayed here -->
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <h4>Select Food and Experices</h4>
                            <div class="point_of_interest" id="foods">

                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-12">
                        <h4>Weather Recommendation</h4>
                        <div id="weather-recommendation"></div>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="button-primary">Create Trip</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script>
        $(document).ready(function() {
            // Listen for the change event on the departure dropdown
            $('#start-city-input').change(function() {
                var selectedCity = $(this).val();

                // Make an AJAX request to fetch drivers based on the selected city
                $.ajax({
                    url: '/fetch-driver',
                    method: 'GET',
                    data: {
                        city: selectedCity
                    },
                    success: function(response) {
                        // Clear previous content
                        $('#drivers-list').empty();
                        // console.log(response);

                        // Generate radio buttons and driver information
                        $.each(response.drivers, function(index, driverData) {
                            console.log('Driver Data Object:', driverData);

                            var pricePerDay = driverData.drivers.length > 0 ? driverData
                                .drivers[0].price_per_day : 'N/A';

                            var radioButton = '<div class="card my-1">' +
                                '<div class="card-body">' +
                                '<div class="row">' +
                                '<div class="col-lg-8">' +
                                '<div class="form-check">' +
                                '<input class="form-check-input" type="radio" id="flexCheckDefault' +
                                driverData.id + '" name="driver" value="' + driverData
                                .id + '" data-price="' + driverData.drivers.price_per_day +
                                '" onchange="getEstimatedAmount()">' +
                                '<label class="form-check-label" for="flexCheckDefault' +
                                driverData.id + '">' +
                                driverData.name + ' (per day price: Rs' +  driverData.drivers.price_per_day+')'+
                                '</label>' +
                                '</div>' +
                                '<div>';


                            // Display specific properties from the main object
                            var mainPropertiesToDisplay = ['name', 'email', 'city',
                                'state', 'phone', 'age',  'price_per_day', 'vehicle_type',
                                        'availability', 'model',
                                        'manufacturer'
                            ];

                            // Add an inner loop for the nested driver details
                            if (driverData.hasOwnProperty('drivers') && Array.isArray(
                                    driverData.drivers)) {
                                $.each(driverData.drivers, function(nestedIndex,
                                    nestedDriver) {
                                    // Display specific properties from the nested driver object
                                    var nestedPropertiesToDisplay = ['address',
                                        'driver_personal_info',
                                        'price_per_day', 'vehicle_type',
                                        'availability', 'model',
                                        'manufacturer'
                                    ];

                                    $.each(nestedPropertiesToDisplay, function(
                                        nestedPropIndex, nestedPropKey
                                        ) {
                                        var nestedLowercaseKey =
                                            nestedPropKey.toLowerCase();

                                        if (nestedLowercaseKey in
                                            nestedDriver) {
                                            radioButton += '<strong>' +
                                                nestedPropKey.replace(
                                                    /_/g, ' ') +
                                                ':</strong> ' +
                                                nestedDriver[
                                                    nestedLowercaseKey
                                                    ] + '<br>';
                                        }
                                    });
                                });
                            }

                            // Display properties from the main object
                            $.each(mainPropertiesToDisplay, function(mainIndex,
                            mainKey) {
                                var mainLowercaseKey = mainKey.toLowerCase();

                                if (mainLowercaseKey in driverData) {
                                    radioButton += '<strong>' + mainKey.replace(
                                            /_/g, ' ') + ':</strong> ' +
                                        driverData[mainLowercaseKey] + '<br>';
                                }
                            });

                            radioButton += '</div>' +
                                '</div>' +
                                '<div class="col-lg-4 text-lg-right">' +
                                // Add an image source here if needed
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>';

                            $('#drivers-list').append(radioButton);
                        });




                    },
                    error: function(error) {
                        console.error('Error fetching drivers:', error);
                    }
                });
            });
        });
    </script>
    <script>
        const apiKey = "{{ config('app.google_map_api_key') }}";
        const weatherApiKey = "382f41dbc0d4a3122776f36830f11614";
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_map_api_key') }}&libraries=places">
    </script>
    <script>
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

                        html += `<div class="card my-1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="flexCheckDefault${place.name}" name="point_of_interest[]" value="${place.name}">
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

                        html += `<div class="card my-1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" id="flexCheckDefault${place.name}" name="hotel" value="${place.name}" data-price="4000" onchange="getEstimatedAmount()">
                                        <label class="form-check-label" for="flexCheckDefault${place.name}">
                                            ${place.name} - PKR 4,000
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

                        html += `<div class="card my-1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="${place.name}" id="flexCheckDefault${place.name}" name="foods[]">
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


        // Example usage
        const userQuery = $(document).find('input[name=place]').val();

        function initAutocomplete() {
            var input = document.getElementById('city-input');
            var autocomplete = new google.maps.places.Autocomplete(input, {
                types: ['(cities)'],
                componentRestrictions: {
                    country: 'PK'
                } // 'PK' is the ISO 3166-1 alpha-2 country code for Pakistan
            });

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                localStorage.setItem('destinaition', place)
                showPointOfInterest(apiKey, place.name);
                showHotels(apiKey, place.name);
                showFoods(apiKey, place.name);

                updateWeatherRecommendation(place.name);

                // fetch the geolocation id
                // var geoId = null;
                // var myHeaders = new Headers();
                // myHeaders.append("X-RapidAPI-Key", "fab8861b1fmshad0a73ec647ea64p1d7b9fjsne90aeb42946c");
                // myHeaders.append("X-RapidAPI-Host", "tripadvisor16.p.rapidapi.com");

                // var requestOptions = {
                // method: 'GET',
                // headers: myHeaders,
                // redirect: 'follow'
                // };
                // let fetchLocationUrl = encodeURI("https://tripadvisor16.p.rapidapi.com/api/v1/hotels/searchLocation?query="+place.name);
                // console.log('fetchLocationUrl',fetchLocationUrl);
                // fetch(fetchLocationUrl, requestOptions)
                // .then(response => response.text())
                // .then(result => {
                //     result = JSON.parse(result);
                //     console.log('result',result);
                //     console.log('status',result.status);
                //     console.log('data',result.data[0].geoId);
                //     if(result.status){
                //         let data = result.data[0]??null;
                //         if(data&&data.geoId){
                //             $('input[name="geoId"]').val(data.geoId);
                //             geoId = data.geoId;
                //             showHotels2(geoId);
                //         }
                //     }
                // })
                // .catch(error => console.log('error', error));


            });
        }

        function enableDesField() {
            if ($.trim($('select[name="departure"]').val()) != '' && $.trim($('input[name="budget"]').val()) != '' &&
                $.trim($('input[name="start_date"]').val()) != '' &&
                $.trim($('input[name="end_date"]').val()) != '') {
                $('input[name="destination"]').attr('disabled', false)
            } else {
                $('input[name="destination"]').attr('disabled', true)
            }
        }

        function showHotels2(geoId) {
            console.log('showHotels2');
            var myHeaders = new Headers();
            myHeaders.append("X-RapidAPI-Key", "fab8861b1fmshad0a73ec647ea64p1d7b9fjsne90aeb42946c");
            myHeaders.append("X-RapidAPI-Host", "tripadvisor16.p.rapidapi.com");

            var requestOptions = {
                method: 'GET',
                headers: myHeaders,
                redirect: 'follow'
            };

            fetch("https://tripadvisor16.p.rapidapi.com/api/v1/hotels/searchHotels?geoId=" + geoId +
                    "&checkIn=2024-01-18&checkOut=2024-01-31&pageNumber=1&currencyCode=PKR", requestOptions)
                .then(response => response.text())
                .then(result => {

                    result = JSON.parse(result);
                    var data = result.data.data;
                    console.log('data', data)
                    let html = '';
                    data.forEach(place => {
                        let rating_html = '';
                        let rating = place.bubbleRating.rating;
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
                        let hotelPhoto = place.cardPhotos[0] ?? null;
                        let updatedUrlUpdated = undefined;
                        if (hotelPhoto) {
                            hotelPhoto = hotelPhoto.sizes.urlTemplate;
                            // Replace placeholders with the values 300
                            let updatedUrlUpdated = hotelPhoto.replace("{width}", "300").replace("{height}",
                                "300");
                            console.log('updatedUrlUpdated', updatedUrlUpdated);
                            html += `<div class="card my-1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" id="flexCheckDefault${place.title}" name="hotel" value="${place.title}" data-price="4000">
                                        <label class="form-check-label" for="flexCheckDefault${place.title}">
                                            ${place.title} - PKR 4,000
                                        </label>
                                        </div>
                                        <div><span>${place.bubbleRating.rating}</span> ${rating_html} (${place.bubbleRating.count})</div>
                                        <div class="address"> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>${place.primaryInfo} - ${place.primaryInfo} - ${place.priceForDisplay}</div>
                                    </div>
                                    <div class="col-lg-4 text-lg-right">
                                        <img src="${updatedUrlUpdated}" class="img-fluid" style="height: 140px">
                                    </div>
                                </div>
                            </div>
                        </div>`;
                        }
                    });
                    $(document).find('#list_hotels').html(html);
                })
                .catch(error => console.log('error', error));
        }

        function getEstimatedAmount() {
            let estimatedAmount = 0;
            let selectedHotel = $('input[name="hotel"]:checked');
            let selectedDriver = $('input[name="driver"]:checked');
            let perDayPrice = selectedHotel.attr('data-price');
            let driverDayPrice = selectedDriver.attr('data-price');
            var startDate = moment($('input[name="start_date"]').val());
            var endDate = moment($('input[name="end_date"]').val());
            const numberOfDays = endDate.diff(startDate, 'days');
            let hotelCost = 0;
            let driverCost = 0;
            if (numberOfDays > 0 && perDayPrice > 0) {
                hotelCost = numberOfDays * perDayPrice;
            }
            if (numberOfDays > 0 && driverDayPrice > 0) {
                driverCost = numberOfDays * driverDayPrice;
            }
            estimatedAmount = hotelCost + driverCost;
            estimatedAmount = parseFloat(estimatedAmount);
            $('input[name="estimated_amount"]').val(estimatedAmount)
            setTimeout(() => {
                let budgetAount = parseFloat($('input[name="budget"]').val());
                console.log('budgetAount', budgetAount);
                if (estimatedAmount > budgetAount || isNaN(budgetAount) || budgetAount == 0) {
                    $('.estimated_amount_message').addClass('text-danger').removeClass('text-success').text(
                        'Budget is not enough for this trip');
                    $('button[type="submit"]').attr('disabled', true);
                } else {
                    $('.estimated_amount_message').addClass('text-success').removeClass('text-danger').text(
                        'All good');
                    $('button[type="submit"]').attr('disabled', false);
                }
            }, 100);
        }
    </script>
@endpush
