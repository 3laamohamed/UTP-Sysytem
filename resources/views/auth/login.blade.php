@extends('layouts.app')
@php
    $title = 'Login';
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <img src="{{asset('Admin/images/logo.png')}}" alt="LOGO" width="300px" class="d-block mx-auto">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="row mb-3">
                <label class="col-12" for="email">{{ __('Email Address') }}</label>
                <div class="col-12">
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-12">{{ __('Password') }}</label>

                <div class="col-12">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0 align-items-center">
              <div class="col-sm-8">
                <button type="submit" class="btn btn-primary w-100">
                  {{ __('Login') }}
                </button>
                <!-- @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
                @endif -->
              </div>
              <div class="col-sm-4 text-sm-end text-center mt-2">
                <a href="{{Route('home')}}" class="fs-5">Go Home</a>
              </div>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
