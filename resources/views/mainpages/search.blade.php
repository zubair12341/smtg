@extends('layout.master')
@section('title', 'Find Places')
@section('content')

<section class="inner-banner-wrap">
    <div class="inner-baner-container" style="background-image: url({{ asset('assets/images/inner-banner.jpg') }});">
       <div class="container">
          <div class="inner-banner-content">
             <h1 class="inner-title">Find Places</h1>
          </div>
       </div>
    </div>
    <div class="inner-shape"></div>
 </section>
 <!-- Inner Banner html end-->
  <!-- Home search field html start -->
  <div class="trip-search-section shape-search-section">
    <div class="slider-shape"></div>
    <div class="container">
       <form action="{{ route('search') }}">
       <div class="trip-search-inner white-bg d-flex">
            <div class="input-group">
               <label> Search Destination* </label>
               <input type="text" name="query" placeholder="Enter Destination" @if(isset($_GET['query'])&&$_GET['query']!='') value="{{$_GET['query']}}" @endif>
            </div>
            <div class="input-group">
               <label> Pax Number* </label>
               <input type="text" name="no_of_guests" placeholder="No.of People" @if(isset($_GET['no_of_guests'])&&$_GET['no_of_guests']!='') value="{{$_GET['no_of_guests']}}" @endif>
            </div>
            <div class="input-group width-col-3">
               <label> Checkin Date* </label>
               <i class="far fa-calendar"></i>
               <input class="input-date-picker" type="text" name="checkin_date" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly" @if(isset($_GET['checkin_date'])&&$_GET['checkin_date']!='') value="{{$_GET['checkin_date']}}" @endif>
            </div>
            <div class="input-group width-col-3">
               <label> Checkout Date* </label>
               <i class="far fa-calendar"></i>
               <input class="input-date-picker" type="text" name="checkout_date" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly" @if(isset($_GET['checkout_date'])&&$_GET['checkout_date']!='') value="{{$_GET['checkout_date']}}" @endif>
            </div>
            <div class="input-group width-col-3">
               <label class="screen-reader-text"> Search </label>
               <input type="submit" name="travel-search" value="INQUIRE NOW">
            </div>
         </div>
         </form>
    </div>
 </div>
 <!-- search search field html end -->
 <!-- about section html start -->
 <section class="about-section about-page-section" id="search_data">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Search Results</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 records">
            </div>
        </div>
    </div>
 </section>
@endsection

@push('scripts')
<script>
function searchPlaces(apiKey, query, type = null) {
    const baseUrl = "https://maps.googleapis.com/maps/api/place/textsearch/json";

    let url = new URL(baseUrl);
    url.searchParams.append('key', apiKey);
    url.searchParams.append('query', query);
    url.searchParams.append('type','point_of_interest');

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

// Example usage
const apiKey = "{{config('app.google_map_api_key')}}";
const userQuery = $(document).find('input[name=query]').val(); 
const no_of_guests = $(document).find('input[name=no_of_guests]').val(); 
const checkin_date = $(document).find('input[name=checkin_date]').val(); 
const checkout_date = $(document).find('input[name=checkout_date]').val(); 
const placesPromise = searchPlaces(apiKey, userQuery);
let html = 'No Resut Found';
placesPromise.then(places => {
    if (places) {
        html = "";
        console.log('places',places);
        places.forEach(place => {
            var photos = place.photos;
            if(photos){
                photos =  photos[0];
            }
            let rating_html = '';
            let rating = place.rating.toFixed(1);
            let rating_split = rating.split('.');
            if(rating_split[0]){
                let rating_0 = rating_split[0];
                for (let index = 0; index < rating_0; index++) {
                    rating_html+=' <i class="fas fa-star"></i> ';
                }
            }
            if(rating_split[1]){
                if(rating_split[1]>0&&rating_split[1]<=9){
                    rating_html+=' <i class="fas fa-star-half-alt"></i> ';
                }
            }
            let hotels_url = `{{route('hotels')}}`;
            hotels_url = new URL(hotels_url);
            hotels_url.searchParams.append('place', place.name);
            hotels_url.searchParams.append('no_of_guests', no_of_guests);
            hotels_url.searchParams.append('checkin_date',checkin_date);
            hotels_url.searchParams.append('checkout_date',checkout_date);
            console.log('hotels_url',hotels_url.href);
            html+=`<div class="card my-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <label class="text-bold">${place.name}</label>
                                <div><span>${rating}</span> ${rating_html} (${place.user_ratings_total})</div>
                                <div class="address"> <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> ${place.formatted_address}</div>
                                <div class="description">
                                    Vast mountainous area home to leopards, wolves & ibex, with trails for motorbikes & 4x4 vehicles.
                                </div>
                                <a href="${hotels_url.href}" class="btn btn-primary btn-sm">Select</a>
                            </div>
                            <div class="col-lg-4 text-lg-right">
                                
                                
                                <img src="${photos?'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference='+photos.photo_reference+'&sensor=false&key='+apiKey:''}" class="img-fluid" style="height: 140px">
                            </div>
                        </div>
                    </div>
                </div>`;
        });
    }
    $(document).find('#search_data .records').html(html);
});
</script>
@endpush
