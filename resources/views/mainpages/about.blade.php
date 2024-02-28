@extends('layout.master')
@section('title', 'About')
@section('content')

<section class="inner-banner-wrap">
    <div class="inner-baner-container" style="background-image: url({{ asset('assets/images/inner-banner.jpg') }});">
       <div class="container">
          <div class="inner-banner-content">
             <h1 class="inner-title">About us</h1>
          </div>
       </div>
    </div>
    <div class="inner-shape"></div>
 </section>
 <!-- Inner Banner html end-->
 <!-- about section html start -->
 <section class="about-section about-page-section">
    <div class="about-service-wrap">
       <div class="container">
          <div class="section-heading">
             <div class="row align-items-end">
                <div class="col-lg-6">
                   <h5 class="dash-style">STG Explorer:</h5>
                   <h2>Your Smart Tour Guide</h2>
                </div>
                <div class="col-lg-6">
                   <div class="section-disc">
                      <p>At STG, we don't just curate journeys; we design experiences that linger in the tapestry of your memories. Our story is woven with passion, dedication, and an unwavering commitment to redefine the art of travel. Every adventure begins with a vision, and ours is to be the architects of unforgettable journeys that transcend the ordinary. We are more than a travel agency; we are your companions in exploration, your guides to the extraordinary.</p>
                      <p>From the moment you step into our world, you're not just a traveler; you become part of a narrative where each destination is a chapter waiting to be written. Join us on this odyssey, where your dreams take flight, and every step is a testament to the extraordinary tales we craft together.</p>
                   </div>
                </div>
             </div>
          </div>

       </div>
    </div>
    <!-- client section html start -->

    <!-- client html end -->
    <!-- callback section html start -->
    <!-- callback html end -->
 </section>



@endsection
