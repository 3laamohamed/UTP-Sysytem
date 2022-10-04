@extends('layouts.main')
@section('content')
  <!-- Start Header -->
  <header class="check-scroll" id='Home'>
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
          <div class="text-contant">
            <h1>
              @if(isset($about->name)){{$about->name}}@endif <br />
              <span>@if(isset($about->sub_title)){{$about->sub_title}}@endif</span>
            </h1>
            <p class="lead mb-3 fs-4">@if(isset($about->disc)){{$about->disc}}@endif</p>
            <a href="{{Route('about')}}" class="main-btn d-inline-block py-2 px-4 fs-4">More About Us</a>
          </div>
        </div>
        <div class="col-md-6">
          <img src="{{asset('global/images/header.png')}}" alt="Header" class="img-fluid w-100">
        </div>
      </div>
    </div>
  </header>
  <!-- End Header -->
  <!-- Start About -->
  <section class="about py-5 position-relative">
    <div class="container">
      <h2 class="special-title">About</h2>
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset('global/images/about.png')}}" alt="About" class="img-fluid">
        </div>
        <div class="col-md-6">
          <p class="lead">
            @if(isset($about->about))
                {{$about->about}}
            @endif
          </p>
        </div>
      </div>
    </div>
    <div class="shapes circle-shape first"></div>
    <div class="shapes dots-shape"></div>
    <div class="shapes triangle-shape"></div>
    <div class="shapes circle-shape last"></div>
  </section>
  <!-- End About -->

  <!-- Start Services -->
  <section class="services py-5 position-relative">
    <div class="container">
      <h2 class="special-title">Our Services</h2>
      <div class="row">
        @foreach($servicesGroups as $group)
        <div class="col-xl-3 col-lg-4 col-md-6 my-5">
          <div class="service-box">
            <div class="service-image">
              <img src="{{asset('Admin/Services/' . $group->image)}}" alt="service">
            </div>
            <h3 class="service-title">{{$group->group}}</h3>
            <p>{{$group->disc}}</p>
            <a href="#" class="box-footer">
              <span>Read More</span>
              <i class="fa-solid fa-arrow-right-long"></i>
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- End Services -->

  <!-- Start Partner -->
  <section class="partner py-5 position-relative">
    <div class="container">
      <h2 class="special-title">Partner</h2>
      @foreach($partners as $partner)
      <div class="row align-items-center">
        <div class="col-md-6">
          <p class="lead lh-lg">
            {{$partner->disc}}
          </p>
        </div>
        <div class="col-md-6">
          <img src="{{asset('Admin/Partners/'. $partner->image)}}" alt="Partner" class="img-fluid">
        </div>
      </div>
      @endforeach
    </div>
  </section>
  <!-- End Partner -->

  <!-- Start FAQ -->
  <section class="faq py-5 position-relative">
    <div class="container">
      <h2 class="special-title">FAQ</h2>
      <div class="row">
        <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
          <div class="accordion">
            @foreach($faqs as $faq)
            <div class="accordion-item">
              <h2 class="accordion-header" id="faq_headOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq_one"
                        aria-expanded="false" aria-controls="faq_one">
                 {{$faq->question}}
                </button>
              </h2>
              <div id="faq_one" class="accordion-collapse collapse show" aria-labelledby="faq_headOne">
                <div class="accordion-body">
                  {{$faq->answer}}
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End FAQ -->

  <!-- Start Clients -->
  <section class="clients  py-5 position-relative">
    <h2 class="special-title">Our Clients</h2>
    <div class="container">
      <div class="owl-carousel clients-carousel">
        @foreach($clients as $client)
        <div class="item">
          <img src="{{asset('Admin/Clients/'.$client->image)}}" alt="clients">
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- End Clients -->

  <!-- Start Contact -->
  <section class="contact py-5 position-relative">
    <div class="container">
      <h2 class="special-title">Contact</h2>
      <div class="row align-items-center">
        <div class="col-md-8 mb-3">
          <div class="row">
            <div class="col-12">
              <div class="mb-3">
                <label for="user_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="user_name" placeholder="please Enter Your Name">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="user_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="user_email" placeholder="please Enter Your Email">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="user_phone" class="form-label">Phone</label>
                <input type="text" maxlength="11" class="form-control" id="user_phone"
                       placeholder="please Enter Your Phone">
              </div>
            </div>
            <div class="col-12">
              <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" rows="8" placeholder="please Enter Your Message"></textarea>
              </div>
            </div>
            <div class="d-grid gap-2 col-12 col-lg-4 col-md-6 mx-auto">
              <button class="main-btn p-2 fs-4" id="save_message" type="button">Send</button>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <a href="mailto:Sales@utpsys.com"
             class="d-flex align-items-center justify-content-start flex-column gap-1 mb-5">
            <i class="fa-solid fa-envelope fa-4x fa-fw"></i>
            <span class="fs-4 text-dark">Sales@utpsys.com</span>
          </a>
          <a href="https://maps.app.goo.gl/ciDkUnNm3E6iZ7Cx8" target="_blank"
             class="d-flex align-items-center justify-content-start flex-column gap-1 mb-5">
            <i class="fa-solid fa-location-dot fa-4x fa-fw"></i>
            <span class="fs-4 text-dark text-center">20 Ahmed Al Shatouri, Ad Doqi, Dokki, Giza Governorate
              3750232</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact -->
@stop
