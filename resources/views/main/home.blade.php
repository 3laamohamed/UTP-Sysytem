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
            <a href="./about.html" class="main-btn d-inline-block py-2 px-4 fs-4">More About Us</a>
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
        <div class="col-xl-3 col-lg-4 col-md-6 my-5">
          <div class="service-box">
            <div class="service-image">
              <img src="./images/services/01.png" alt="service">
            </div>
            <h3 class="service-title">Database</h3>
            <p>UTP provides all Oracle database administration services including standalone, oracle
              restart</p>
            <a href="#" class="box-footer">
              <span>Read More</span>
              <i class="fa-solid fa-arrow-right-long"></i>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 my-5">
          <div class="service-box">
            <div class="service-image">
              <img src="./images/services/02.png" alt="service">
            </div>
            <h3 class="service-title">Oracle EBS Application</h3>
            <p>UTP provides all versions of oracle E-Business suite application services (Installing, Patching, Cloning,
              upgrading, and Administration).</p>
            <a href="#" class="box-footer">
              <span>Read More</span>
              <i class="fa-solid fa-arrow-right-long"></i>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 my-5">
          <div class="service-box">
            <div class="service-image">
              <img src="./images/services/03.png" alt="service">
            </div>
            <h3 class="service-title">MS Windows Server OS</h3>
            <p>UTP provides Microsoft Windows Server OS administration services (administration, installation,
              maintaining, upgrade, migration, upgrade, and troubleshooting services) for all versions.
            </p>
            <a href="#" class="box-footer">
              <span>Read More</span>
              <i class="fa-solid fa-arrow-right-long"></i>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 my-5">
          <div class="service-box">
            <div class="service-image">
              <img src="./images/services/04.png" alt="service">
            </div>
            <h3 class="service-title">Exadata Administration</h3>
            <p>UTP provides all Exadata versions administration services for all Exadata types whether bare-metal or
              virtualized for Eighth, quarter, half, or full Exadata RAC (administration, Issues Investigation,
              Performance tuning, re-imaging, and patching).</p>
            <a href="#" class="box-footer">
              <span>Read More</span>
              <i class="fa-solid fa-arrow-right-long"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Services -->

  <!-- Start Partner -->
  <section class="partner py-5 position-relative">
    <div class="container">
      <h2 class="special-title">Partner</h2>
      <div class="row align-items-center">
        <div class="col-md-6">
          <p class="lead lh-lg">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe voluptates sint omnis corporis, aspernatur
            iste illum rerum accusamus, pariatur obcaecati quo est numquam deleniti, odit aut dolores impedit sit? Nemo.
            aspernatur
            iste illum rerum accusamus, pariatur obcaecati quo est numquam deleniti, odit aut dolores impedit sit? Nemo.
          </p>
        </div>
        <div class="col-md-6">
          <img src="./images/Oracle-Gold-Partner.png" alt="Partner" class="img-fluid">
        </div>
      </div>
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
            <div class="accordion-item">
              <h2 class="accordion-header" id="faq_headOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq_one"
                        aria-expanded="false" aria-controls="faq_one">
                  question One
                </button>
              </h2>
              <div id="faq_one" class="accordion-collapse collapse show" aria-labelledby="faq_headOne">
                <div class="accordion-body">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore repellat dicta officiis voluptates
                  quas et enim facilis
                  voluptatum esse cumque amet beatae assumenda, in, consequatur eos eius, eveniet temporibus asperiores?
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="faq_headTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq_two" aria-expanded="false" aria-controls="faq_two">
                  question Two
                </button>
              </h2>
              <div id="faq_two" class="accordion-collapse collapse" aria-labelledby="faq_headTwo">
                <div class="accordion-body">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore repellat dicta officiis voluptates
                  quas et enim facilis
                  voluptatum esse cumque amet beatae assumenda, in, consequatur eos eius, eveniet temporibus asperiores?
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="faq_headThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq_three" aria-expanded="false" aria-controls="faq_three">
                  question Three
                </button>
              </h2>
              <div id="faq_three" class="accordion-collapse collapse" aria-labelledby="faq_headThree">
                <div class="accordion-body">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore repellat dicta officiis voluptates
                  quas et enim facilis
                  voluptatum esse cumque amet beatae assumenda, in, consequatur eos eius, eveniet temporibus asperiores?
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="faq_headFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq_four" aria-expanded="true" aria-controls="faq_four">
                  question Four
                </button>
              </h2>
              <div id="faq_four" class="accordion-collapse collapse " aria-labelledby="faq_headFour">
                <div class="accordion-body">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore repellat dicta
                </div>
              </div>
            </div>
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
        <div class="item">
          <img src="./images/clients/client1.png" alt="clients">
        </div>
        <div class="item">
          <img src="./images/clients/client2.png" alt="clients">
        </div>
        <div class="item">
          <img src="./images/clients/client3.png" alt="clients">
        </div>
        <div class="item">
          <img src="./images/clients/client4.png" alt="clients">
        </div>
        <div class="item">
          <img src="./images/clients/client5.png" alt="clients">
        </div>
        <div class="item">
          <img src="./images/clients/client6.png" alt="clients">
        </div>
        <div class="item">
          <img src="./images/clients/client7.png" alt="clients">
        </div>
        <div class="item">
          <img src="./images/clients/client8.png" alt="clients">
        </div>
        <div class="item">
          <img src="./images/clients/client9.png" alt="clients">
        </div>
        <div class="item">
          <img src="./images/clients/client10.png" alt="clients">
        </div>
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
