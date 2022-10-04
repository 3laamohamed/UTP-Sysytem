<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @php
        if(isset($title))
        {
        echo 'UTP | ' . $title;
        }
        else{
        echo 'UTP | System';
        }
//        @endphp
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('global/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('Admin/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('Admin/js/touch.js') }}"></script>
    <script src="{{ asset('global/js/sweetalert2@10.js') }}"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Admin/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
      @if(Auth::user())
        <nav class="navbar navbar-light sticky-top shadow-sm px-3">
            <div class="navbar-brand">
                <a href="{{ url('/') }}" class="text-white">
                    <img src="{{ asset('Admin/images/logo.png') }}" alt="Logo" width="100px" height="90px">
                </a>
                <button class="toggle-menu me-2">
                    <i class="fa-solid fa-bars-staggered fa-xl"></i>
                </button>
            </div>
            <div id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    <!-- @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif -->

                    <!-- @if (Route::has('register'))

                        @endif -->
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ URL('Admin/update_user/user=' . Auth::user()->id) }}">
                            {{ __('Profile') }}
                          </a>
                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
      @endif

        <main>
          <!-- side Bar -->
          <aside>
            <span id="close_menu" class="close rounded-3  d-block d-sm-none"> <i class="fa-solid fa-xmark"></i> </span>
            <ul class="">
              @can('about')<li><a href="{{Route('admin.about')}}"><i class="fa-solid fa-address-card fa-xl"></i> <span>about</span> </a></li>@endcan
              @can('groups')<li><a href="{{Route('admin.group')}}"><i class="fa-solid fa-layer-group fa-xl"></i> <span>projects group</span> </a></li>@endcan
              @can('projects')<li><a href="{{Route('admin.project')}}"><i class="fa-solid fa-bars-progress fa-xl"></i> <span>projects</span> </a></li>@endcan
              @can('details')<li><a href="{{Route('admin.details')}}"><i class="fa-solid fa-circle-info fa-xl"></i><span>details</span> </a></li>@endcan
              @can('sort_projects')<li><a href="{{Route('admin.View_sort_projects')}}"> <i class="fa-solid fa-shuffle fa-xl"></i> <span>sort projects</span></a></li>@endcan
              @can('group_services')<li><a href="{{Route('admin.group_services')}}"><i class="fa-solid fa-hard-drive fa-xl"></i> <span>services Group</span> </a></li>@endcan
              @can('services')<li><a href="{{Route('admin.services')}}"><i class="fa-solid fa-server fa-xl"></i> <span>services</span> </a></li>@endcan
              @can('clients')<li><a href="{{Route('admin.clients')}}"><i class="fa-solid fa-users fa-xl"></i> <span>clients</span> </a></li>@endcan
              @can('contact')<li><a href="{{Route('admin.contact')}}"><i class="fa-solid fa-envelope fa-xl"></i> <span>contact</span> </a></li>@endcan
              @can('copyright')<li><a href="{{Route('admin.copyright')}}"><i class="fa-solid fa-copyright fa-xl"></i> <span>copyright</span> </a></li>@endcan
              @can('social')<li><a href="{{Route('admin.general')}}"><i class="fa-solid fa-hashtag fa-xl"></i> <span>Social</span> </a></li>@endcan
              @can('view_data')<li><a href="{{Route('admin.View_data')}}"> <i class="fa-solid fa-table fa-xl"></i> <span>view data</span> </a></li>@endcan
              @can('control_page')<li><a href="{{Route('admin.View_control_page')}}"><i class="fa-solid fa-folder-open fa-xl"></i> <span>control pages</span> </a></li>@endcan
              @can('our_team')<li><a href="{{Route('admin.View_our_team')}}"><i class="fa-solid fa-people-group fa-xl"></i> <span>our team</span> </a></li>@endcan
              @can('partners')<li><a href="{{Route('admin.partners')}}"><i class="fa-solid fa-handshake fa-xl"></i> <span>partners</span> </a></li>@endcan
              @can('faq')<li><a href="{{Route('admin.faq')}}"><i class="fa-solid fa-circle-question fa-xl"></i> <span>FAQ</span> </a></li>@endcan
              @can('role')<li><a href="{{ route('roles.index') }}"><i class="fa-solid fa-user-lock fa-xl"></i><span>Role</span></a></li>@endcan
              @can('user')<li><a href="{{ route('users.index') }}"><i class="fa-solid fa-users fa-xl"></i> <span>Users</span></a></li>@endcan
            </ul>
          </aside>
          <!-- side Bar -->
          <!-- wrraper -->
          <div class="wrapper py-5">
            @yield('content')
          </div>
          <!-- wrraper -->
        </main>
    </div>
    <script src="{{ asset('Admin/js/main.js') }}"></script>

</body>

</html>
