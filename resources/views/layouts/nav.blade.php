
<!-- Start Partner Fixed -->
@if(isset($about->image))
  <img src="{{asset('Admin/About/'.$about->image)}}" class="partener-fixed" alt="Partner">
@endif
@php
function searchPage($pagesArray,$page)
{
    $flage = false;
    foreach ($pagesArray as $data)
    {
        if ($data['page'] == $page){
            if($data['status'] == 1){
                $flage=true;
            }
        }
    }
    return $flage;
}
@endphp
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

        <li class="nav-item @if(Route::current()->getName() == 'home') active @endif">
          <a class="nav-link" href="{{Route('home')}}">Home</a>
        </li>
        @if(searchPage($pages,'about') == true)
        <li class="nav-item @if(Route::current()->getName() == 'about') active @endif">
          <a class="nav-link" href="{{Route('about')}}">About Us</a>
        </li>
        @endif
        @if(searchPage($pages,'services') == true)
        <li class="nav-item @if(Route::current()->getName() == 'allServices')active @endif">
          <a class="nav-link" href="{{Route('allServices')}}">Services</a>
        </li>
        @endif
        @if(searchPage($pages,'project') == true)
        <li class="nav-item @if(Route::current()->getName() == 'projects') active @endif">
          <a class="nav-link" href="{{Route('projects')}}">Projects</a>
        </li>
        @endif
        @if(searchPage($pages,'contact') == true)
        <li class="nav-item @if(Route::current()->getName() == 'contact') active @endif">
          <a class="nav-link" href="{{Route('contact')}}">Contact Us</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
