@extends('layout.master')
@section('title', 'Home')
@section('content')
    <section class="home-slider-section">

        <div class="home-slider">
            <div class="home-banner-items">
                <div class="banner-inner-wrap"
                    style="background-image: url({{ asset('assets/images/slider-banner-1.jpg') }});"></div>
                <div class="banner-content-wrap">
                    <div class="container">
                        <div class="banner-content text-center">
                            <h2 class="banner-title">STG Explorer: Your Smart Tour Guide</h2>
                            <p>Embark on seamless adventures with STG Explorer - Register now to unlock the smart way to
                                plan your personalized tours</p>
                            <a href="#" class="button-primary">CONTINUE READING</a>
                        </div>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
            <div class="home-banner-items">
                <div class="banner-inner-wrap"
                    style="background-image: url({{ asset('assets/images/slider-banner-2.jpg') }});"></div>
                <div class="banner-content-wrap">
                    <div class="container">
                        <div class="banner-content text-center">
                            <h2 class="banner-title">STG Explorer: Craft Your Journey</h2>
                            <p>Join us to register and design your unique travel itinerary. Your adventure, your plan – only
                                with Smart Tour Guide.</p>
                            <a href="#" class="button-primary">CONTINUE READING</a>
                        </div>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
        </div>
    </section>
    <!-- slider html start -->
    <!-- Home search field html start -->
    {{-- <div class="trip-search-section shape-search-section">
    <div class="slider-shape"></div>
    <div class="container">
       <div class="trip-search-inner white-bg d-flex">
          <div class="input-group">
             <label> Search Destination* </label>
             <input type="text" name="s" placeholder="Enter Destination">
          </div>
          <div class="input-group">
             <label> Pax Number* </label>
             <input type="text" name="s" placeholder="No.of People">
          </div>
          <div class="input-group width-col-3">
             <label> Checkin Date* </label>
             <i class="far fa-calendar"></i>
             <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
          </div>
          <div class="input-group width-col-3">
             <label> Checkout Date* </label>
             <i class="far fa-calendar"></i>
             <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
          </div>
          <div class="input-group width-col-3">
             <label class="screen-reader-text"> Search </label>
             <input type="submit" name="travel-search" value="INQUIRE NOW">
          </div>
       </div>
    </div>
 </div> --}}
    <!-- search search field html end -->
    <br><br>
    <section class="destination-section">
        <div class="container">
            <div class="section-heading">
                <div class="row align-items-end">
                    <div class="col-lg-7">
                        <h5 class="dash-style">POPULAR DESTINATION</h5>
                        <h2>TOP NOTCH DESTINATION</h2>
                    </div>
                    <div class="col-lg-5">
                        <div class="section-disc">
                            Aperiam sociosqu urna praesent, tristique, corrupti condimentum asperiores platea ipsum ad arcu.
                            Nostrud. Aut nostrum, ornare quas provident laoreet nesciunt.
                        </div>
                    </div>
                </div>
            </div>
            <div class="destination-inner destination-three-column">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="desti-item overlay-desti-item">
                                    <figure class="desti-image">
                                        <img src="{{ asset('assets/images/img1.jpg') }}" alt="">
                                    </figure>
                                    <div class="meta-cat bg-meta-cat">
                                        <a href="#">Kashmir</a>
                                    </div>
                                    <div class="desti-content">
                                        <h3>
                                            <a href="#">Ratti Gali Lake</a>
                                        </h3>
                                        <div class="rating-start" title="Rated 5 out of 4">
                                            <span style="width: 53%"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="desti-item overlay-desti-item">
                                    <figure class="desti-image">
                                        <img src="{{ asset('assets/images/img2.jpg') }}" alt="">
                                    </figure>
                                    <div class="meta-cat bg-meta-cat">
                                        <a href="#">Gilgit Baltistan</a>
                                    </div>
                                    <div class="desti-content">
                                        <h3>
                                            <a href="#">Rama Lake</a>
                                        </h3>
                                        <div class="rating-start" title="Rated 5 out of 5">
                                            <span style="width: 100%"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <div class="col-md-6 col-xl-12">
                                <div class="desti-item overlay-desti-item">
                                    <figure class="desti-image">
                                        <img src="{{ asset('assets/images/img3.jpg') }}" alt="">
                                    </figure>
                                    <div class="meta-cat bg-meta-cat">
                                        <a href="#">Swat KPK</a>
                                    </div>
                                    <div class="desti-content">
                                        <h3>
                                            <a href="#">Mahodand Lake</a>
                                        </h3>
                                        <div class="rating-start" title="Rated 5 out of 5">
                                            <span style="width: 100%"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-12">
                                <div class="desti-item overlay-desti-item">
                                    <figure class="desti-image">
                                        <img src="{{ asset('assets/images/img4.jpg') }}" alt="">
                                    </figure>
                                    <div class="meta-cat bg-meta-cat">
                                        <a href="#">Upper Deer</a>
                                    </div>
                                    <div class="desti-content">
                                        <h3>
                                            <a href="#">Kumrat Valley</a>
                                        </h3>
                                        <div class="rating-start" title="Rated 5 out of 4">
                                            <span style="width: 60%"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Home packages section html start -->

    <!-- packages html end -->
    <!-- Home callback section html start -->

    <!-- callback html end -->
    <!-- Home activity section html start -->
    <section class="activity-section">
        <div class="container">
            <div class="section-heading text-center">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h5 class="dash-style">TRAVEL BY ACTIVITY</h5>
                        <h2>ADVENTURE & ACTIVITY</h2>
                        <p>Login and register to the platform and plan your own tour iternity with our advance feature to
                            make your tour well managed and organized.</p>
                    </div>
                </div>
            </div>
            <div class="activity-inner row">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <a href="#">
                                <img src="{{ asset('assets/images/icon6.png') }}" alt="">
                            </a>
                        </div>
                        <div class="activity-content">
                            <h4>
                                <a href="#">Adventure</a>
                            </h4>
                            <p>15 Destination</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <a href="#">
                                <img src="{{ asset('assets/images/icon10.png') }}" alt="">
                            </a>
                        </div>
                        <div class="activity-content">
                            <h4>
                                <a href="#">Trekking</a>
                            </h4>
                            <p>12 Destination</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <a href="#">
                                <img src="{{ asset('assets/images/icon9.png') }}" alt="">
                            </a>
                        </div>
                        <div class="activity-content">
                            <h4>
                                <a href="#">Camp Fire</a>
                            </h4>
                            <p>7 Destination</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <a href="#">
                                <img src="{{ asset('assets/images/icon8.png') }}" alt="">
                            </a>
                        </div>
                        <div class="activity-content">
                            <h4>
                                <a href="#">Off Road</a>
                            </h4>
                            <p>15 Destination</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <a href="#">
                                <img src="{{ asset('assets/images/icon7.png') }}" alt="">
                            </a>
                        </div>
                        <div class="activity-content">
                            <h4>
                                <a href="#">Camping</a>
                            </h4>
                            <p>13 Destination</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <a href="#">
                                <img src="{{ asset('assets/images/icon11.png') }}" alt="">
                            </a>
                        </div>
                        <div class="activity-content">
                            <h4>
                                <a href="#">Exploring</a>
                            </h4>
                            <p>25 Destination</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- activity html end -->
    <!-- Home special section html start -->

    <!-- special html end -->
    <!-- Home special section html start -->
    <section class="best-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-heading">
                        <h5 class="dash-style">OUR TOUR GALLERY</h5>
                        <h2>BEST TRAVELER'S SHARED PHOTOS</h2>
                        <p>Join our vibrant community of explorers and share your unforgettable moments with STG Explorer.
                            Your experiences not only enrich our platform but inspire fellow travelers on their own
                            extraordinary journeys.</p>
                    </div>
                    <figure class="gallery-img">
                        <img src="{{ asset('assets/images/img12.jpg') }}" alt="">
                    </figure>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-sm-6">
                            <figure class="gallery-img">
                                <img src="{{ asset('assets/images/img13.jpg') }}" alt="">
                            </figure>
                        </div>
                        <div class="col-sm-6">
                            <figure class="gallery-img">
                                <img src="{{ asset('assets/images/img14.jpg') }}" alt="">
                            </figure>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <figure class="gallery-img">
                                <img src="{{ asset('assets/images/img15.jpg') }}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="activity-section">
        <div class="container">
            <div class="section-heading text-center">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h5 class="dash-style">Reviews by our clients</h5>

                    </div>
                </div>
            </div>

            <div class="activity-inner row">
                @foreach (\App\Models\Rating::limit(4)->get() as $rating)
                    @php
                        $user = \App\Models\User::find($rating->user_id);
                        $trip = \App\Models\Trip::find($rating->trip_id);
                    @endphp
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="activity-item">
                            <div class="activity-icon">
                                <a href="#">
                                    <img style="width: 100%" src="{{ $rating->image }}" alt="">
                                </a>
                            </div>
                            <div class="activity-content">
                                <p>{{ $rating->message }}</p>
                                <hr>
                                <h6>
                                    {{ $user->name . ' (' . $trip->departure . '-' . $trip->destination.')' }}
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>


    <!-- best html end -->
    <!-- Home client section html start -->

    <!-- client html end -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
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
