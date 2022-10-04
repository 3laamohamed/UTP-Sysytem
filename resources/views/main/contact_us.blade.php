@php
  $title = 'Contact';
@endphp
@extends('layouts.main')
@section('content')
<!-- Start Map Section -->
<div class="mapouter">
  <div class="gmap_canvas">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.1231679264115!2d31.210473099999998!3d30.0333241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145846d1379c9623%3A0xb1b1afcba8f6f1a2!2s20%20Ahmed%20Al%20Shatouri%2C%20Ad%20Doqi%2C%20Dokki%2C%20Giza%20Governorate%203750232!5e0!3m2!1sen!2seg!4v1664479803689!5m2!1sen!2seg"
      width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>
<!-- End Map Section -->

<!-- Start Contact Us Section -->
<section class="contact-us pb-4">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="contact-info">
          <h4 class="my-4 main-color fw-bold">Contact Info</h4>
          <ul class="contact-us p-0">
            <li class="py-2">
              @if(!empty($social->whats))
              <a href="tel:+{{$social->whats}}" class=" text-muted">
                <i class="px-2 fa-solid fa-phone text-muted"></i>
                  <span>{{$social->whats}}</span>
              </a>
              @endif
            </li>
            <li class="py-2">
              <a href="mailto:Sales@utpsys.com" class=" text-muted">
                <i class="px-2 fa-solid fa-envelope text-muted"></i>
                <span>Sales@utpsys.com</span>
              </a>
            </li>
            <li class="py-2">
              <a href="https://maps.app.goo.gl/ciDkUnNm3E6iZ7Cx8" class="text-muted" target="_blank">
                <i class="px-2 fa-solid fa-map-location-dot text-muted"></i>
                <span>20 Ahmed Al Shatouri, Ad Doqi, Dokki, Giza Governorate 3750232</span>
              </a>
            </li>
          </ul>
          <h4 class="my-4 main-color fw-bold"> Get Social </h4>
          <div class="contact-social">
            @if(!empty($social->facebook))
              <a href="{{$social->facebook}}" class="text-muted facebook"><i class="fa-brands fa-facebook-f fa-fw fa-lg"></i></a>
            @endif
            @if(!empty($social->twitter))
              <a href="{{$social->twitter}}" class="text-muted twitter"><i class="fa-brands fa-twitter fa-fw fa-lg"></i></a>
            @endif
            @if(!empty($social->linkedin))
              <a href="{{$social->linkedin}}" class="text-muted linkedin"><i class="fa-brands fa-linkedin-in fa-fw fa-lg"></i></a>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="contact-form">
          <form>
            <h4 class="my-4 main-color fw-bold">Contact With Us</h4>
            <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi, sunt non. Natus
              quis, officiis illo facere deleniti unde quo laboriosam.</p>
            <div class="form-group mb-2">
              <label for="name" class="control-label mb-1">Your Name</label>
              <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group mb-2">
              <label for="email" class="control-label mb-1">Your Email</label>
              <input type="text" id="email" name="email" class="form-control">
            </div>
            <div class="form-group mb-2">
              <label for="message" class="control-label mb-1">Your Message</label>
              <textarea id="message" name="message" class="form-control" rows="5"></textarea>
            </div>
            <button class="main-btn py-2 px-4 rounded-2" type="submit">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Contact Us Section -->
@stop
