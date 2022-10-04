@php
  $title = 'Services';
@endphp
@extends('layouts.main')
@section('content')
  <!-- Start Team Section -->
  <section class="py-5">
    @foreach($groups as $group)
    @if(count($group->services) != 0)
    <div class="container">
      <h2 class="special-title">{{$group->group}}</h2>
      <div class="row">
        @foreach($group->services as $service)
        <div class="col-xl-3 col-lg-4 col-md-6 my-5">
          <div class="service-box">
            <div class="service-image">
              <img src="{{asset('Admin/Services/' . $service->image)}}" alt="service">
            </div>
            <h3 class="service-title">{{$service->title}}</h3>
            <p>{{$service->disc}}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
      @endif
    @endforeach
  </section>
  <!-- End Team Section -->
@stop
