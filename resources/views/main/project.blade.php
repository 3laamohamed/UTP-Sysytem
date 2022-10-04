@php
  $title = 'Projects';
@endphp
@extends('layouts.main')
@section('content')
  <!-- Start Team Section -->
  <section class="Team py-5 position-relative">
    <div class="container">
      <h2 class="special-title">Our Projects</h2>
      <div class="row">
        @foreach($projects as $project)
        <div class="col-md-6 mb-3">
          <div class="card h-100">
            <div class="project-image">
              <img src="{{asset('Admin/Projects/' . $project->image)}}" class="card-img-top" alt="Project">
            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold">{{$project->title}}</h5>
              <p class="project-text">{{$project->disc}}</p>
              <button class="main-btn px-4 py-2 mt-2 show-project">Show More</button>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- End Team Section -->
@stop
