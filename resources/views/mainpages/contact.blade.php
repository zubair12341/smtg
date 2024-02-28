@extends('layout.master')
@section('title', 'Contact us')
@section('content')

<section class="inner-banner-wrap">
    <div class="inner-baner-container" style="background-image: url({{ asset('assets/images/inner-banner.jpg') }});">
       <div class="container">
          <div class="inner-banner-content">
             <h1 class="inner-title">Contact us</h1>
          </div>
       </div>
    </div>
    <div class="inner-shape"></div>
 </section>
 <!-- Inner Banner html end-->
 <!-- contact form html start -->
 <div class="contact-page-section">
    <div class="contact-form-inner">
       <div class="container">
          <div class="row">
             <div class="col-md-6">
                <div class="contact-from-wrap">
                   <div class="section-heading">
                      <h5 class="dash-style">GET IN TOUCH</h5>
                      <h2>CONTACT US TO GET MORE INFO</h2>
                      <p>Aperiam sociosqu urna praesent, tristique, corrupti condimentum asperiores platea ipsum ad arcu. Nostrud. Esse? Aut nostrum, ornare quas provident laoreet nesciunt odio voluptates etiam, omnis.</p>
                   </div>
                   <form class="contact-from">
                      <p>
                         <input type="text" name="name" placeholder="Your Name*">
                      </p>
                      <p>
                         <input type="email" name="email" placeholder="Your Email*">
                      </p>
                      <p>
                         <textarea rows="8" placeholder="Your Message*"></textarea>
                      </p>
                      <p>
                         <input type="submit" name="submit" value="SUBMIT MESSAGE">
                      </p>
                   </form>
                </div>
             </div>
             <div class="col-md-6">
                <div class="contact-detail-wrap">
                   <h3>Need help ?? Feel free to contact us !</h3>
                   <p>Penatibus numquam? Non? Aliqua tempore est deserunt sequi itaque, nascetur, consequuntur conubianigp, explicabo? Primis convallis ullam. Egestas deserunt eius molestias app incididunt.</p>
                   <p>Nostra doloribus blandit et semper ultrices, quibusdam dignissimos! Netus recusandae, rerum cupidatat. Perferendis aptent wisi.</p>
                   <div class="details-list">
                      <ul>
                         <li>
                            <span class="icon">
                               <i class="fas fa-map-signs"></i>
                            </span>
                            <div class="details-content">
                               <h4>Location Address</h4>
                               <span>Iqra University North Campus</span>
                            </div>
                         </li>
                         <li>
                            <span class="icon">
                               <i class="fas fa-envelope-open-text"></i>
                            </span>
                            <div class="details-content">
                               <h4>Email Address</h4>
                               <span>iqra@iqra.edu.pk</span>
                            </div>
                         </li>
                         <li>
                            <span class="icon">
                               <i class="fas fa-phone-volume"></i>
                            </span>
                            <div class="details-content">
                               <h4>Phone Number</h4>
                               <span>Telephone: +92 (111) 1111 11 / Mobile: +92 (111) 1111 11</span>
                            </div>
                         </li>
                      </ul>
                   </div>
                   <div class="contct-social social-links">
                      <h3>Follow us on social media..</h3>
                      <ul>
                         <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                         <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                         <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                         <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                      </ul>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="map-section">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317838.95217734354!2d-0.27362819527326965!3d51.51107287614788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604c7c7eb9be3%3A0x3918653583725b56!2sRiverside%20Building%2C%20County%20Hall%2C%20Westminster%20Bridge%20Rd%2C%20London%20SE1%207JA%2C%20UK!5e0!3m2!1sen!2snp!4v1632135241093!5m2!1sen!2snp" height="400" allowfullscreen="" loading="lazy"></iframe>
    </div>
 </div>
 <!-- contact form html end -->

@endsection
