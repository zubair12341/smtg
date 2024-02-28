@extends('layout.master')
@section('title', 'Gallery')
@section('content')

<!-- Inner Banner html start-->
<section class="inner-banner-wrap">
    <div class="inner-baner-container" style="background-image: url({{ asset('assets/images/inner-banner.jpg') }});">
       <div class="container">
          <div class="inner-banner-content">
             <h1 class="inner-title">Gallery</h1>
          </div>
       </div>
    </div>
    <div class="inner-shape"></div>
 </section>
 <!-- Inner Banner html end-->
 <!-- gallery section html start -->
 <div class="gallery-section">
    <div class="container">
       <div class="gallery-outer-wrap">
          <div class="gallery-inner-wrap gallery-container grid">
             <div class="single-gallery grid-item">
                <figure class="gallery-img">
                   <img src="{{ asset('assets/images/gallery-1.jpg') }}" alt="">
                   <div class="gallery-title">
                      <h3>
                         <a href="{{ asset('assets/images/gallery-1.jpg') }}" data-lightbox="lightbox-set">
                            Santorini Island
                         </a>
                      </h3>
                   </div>
                </figure>
             </div>
             <div class="single-gallery grid-item">
                <figure class="gallery-img">
                   <img src="{{ asset('assets/images/gallery-2.jpg') }}" alt="">
                   <div class="gallery-title">
                      <h3>
                         <a href="{{ asset('assets/images/gallery-2.jpg') }}" data-lightbox="lightbox-set">
                            Malaysia Beach
                         </a>
                      </h3>
                   </div>
                </figure>
             </div>
             <div class="single-gallery grid-item">
                <figure class="gallery-img">
                   <img src="{{ asset('assets/images/gallery-3.jpg') }}" alt="">
                   <div class="gallery-title">
                      <h3>
                         <a href="{{ asset('assets/images/gallery-3.jpg') }}" data-lightbox="lightbox-set">
                            Tibet Mountain
                         </a>
                      </h3>
                   </div>
                </figure>
             </div>
             <div class="single-gallery grid-item">
                <figure class="gallery-img">
                   <img src="{{ asset('assets/images/gallery-4.jpg') }}" alt="">
                   <div class="gallery-title">
                      <h3>
                         <a href="{{ asset('assets/images/gallery-4.jpg') }}" data-lightbox="lightbox-set">
                            Arizona Desert
                         </a>
                      </h3>
                   </div>
                </figure>
             </div>
             <div class="single-gallery grid-item">
                <figure class="gallery-img">
                   <img src="{{ asset('assets/images/gallery-5.jpg') }}" alt="">
                   <div class="gallery-title">
                      <h3>
                         <a href="{{ asset('assets/images/gallery-5.jpg') }}" data-lightbox="lightbox-set">
                            Burj Khalifa (Dubai)
                         </a>
                      </h3>
                   </div>
                </figure>
             </div>
             <div class="single-gallery grid-item">
                <figure class="gallery-img">
                   <img src="{{ asset('assets/images/gallery-6.jpg') }}" alt="">
                   <div class="gallery-title">
                      <h3>
                         <a href="{{ asset('assets/images/gallery-6.jpg') }}" data-lightbox="lightbox-set">
                            Oxolotan Island
                         </a>
                      </h3>
                   </div>
                </figure>
             </div>
             <div class="single-gallery grid-item">
                <figure class="gallery-img">
                   <img src="{{ asset('assets/images/gallery-7.jpg') }}" alt="">
                   <div class="gallery-title">
                      <h3>
                         <a href="{{ asset('assets/images/gallery-7.jpg') }}" data-lightbox="lightbox-set">
                            Narita Airport
                         </a>
                      </h3>
                   </div>
                </figure>
             </div>
             <div class="single-gallery grid-item">
                <figure class="gallery-img">
                   <img src="{{ asset('assets/images/gallery-8.jpg') }}" alt="">
                   <div class="gallery-title">
                      <h3>
                         <a href="{{ asset('assets/images/gallery-8.jpg') }}" data-lightbox="lightbox-set">
                            Thailand Temple
                         </a>
                      </h3>
                   </div>
                </figure>
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- gallery section html end -->
 <div class="bg-color-callback">
    <div class="container">
       <div class="row align-items-center justify-content-between">
          <div class="col-lg-9 col-md-8">
             <div class="callback-content">
                <h2>LET'S JOIN US FOR MORE UPDATE & INFO !!</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. orem ipsum dolor sit amet, consectetur adipiscing elit.</p>
             </div>
          </div>
          <div class="col-lg-3 col-md-4">
             <div class="button-wrap">
                <a href="#" class="button-primary">LEARN MORE</a>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
