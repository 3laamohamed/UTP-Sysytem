
<!-- Start Partner Fixed -->
@if(isset($about->image))
  <img src="{{asset('Admin/About/'.$about->image)}}" class="partener-fixed" alt="Partner">
@endif
<!-- Start Partner Fixed -->
<!-- Start Navbar -->
<nav class="navbar navbar-expand-md">
  <div class="container">
    <a class="navbar-brand" href="#">
      @if(isset($about->logo))
      <img src="{{asset('Admin/About/'.$about->logo)}}" alt="" width="100" height="90">
      @endif
    </a>
    <button id="open-nav" class="navbar-toggler" type="button" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <div class="navbar-collapse">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <div class="close-nav d-block d-md-none" id="close-nav">
          <span></span>
          <span></span>
        </div>
        <li class="nav-item">
          <a class="nav-link" href="{{Route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{Route('about')}}">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./services.html">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./projects.html">Projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{Route('contact')}}">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
