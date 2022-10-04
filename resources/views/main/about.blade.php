@php
  $title = 'About';
@endphp
@extends('layouts.main')
@section('content')
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

<!-- Start Team Section -->
<section class="Team py-5 position-relative">
  <div class="container">
    <h2 class="special-title">Our Team</h2>
    <div class="row">
      @foreach($team as $per)
      <div class="col-xl-3 col-lg-4 col-md-6 my-5">
        <div class="team-box">
          <div class="team-image">
            <img src="{{asset('Admin/Team/' . $per->image)}}"alt="team">
          </div>
          <h3 class="team-title">{{$per->name}}</h3>
          <p>{{$per->note}}</p>
          <a href="{{ $per->email }}" target="_blank" class="team-spocail text-center mb-3"><i
              class="fa-brands fa-linkedin fa-fw fa-3x"></i></a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- End Team Section -->
@stop
