<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/css/bootstrap.css') }}">
    
    <link rel="stylesheet" href="{{ asset('vendor/modules/toastify/toastify.css') }}">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/modules/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/modules/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/modules/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom_style.css') }}">

    <link rel="shortcut icon" href="{{ asset('vendor/images/favicon.svg') }}" type="image/x-icon">
</head>
<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{ url('/home') }}">
                                <img src="{{ asset('img/logos.png') }}" alt="Logo" srcset="">
                            </a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item 
                            {{ Request::path() ==  'home' ? 'active' : ''  }}">
                            <a href="{{ url('/home') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <!-- Student Routes -->
                        @if (Auth::user() && Auth::user()->is_student)
                        <li class="sidebar-item
                            {{ Request::path() ==  'student/compound' ? 'active' : ''  }}">
                            <a href="{{ route('student.viewCompound') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Compounds</span>
                            </a>
                        </li>
                        <li class="sidebar-item 
                            {{ Request::path() ==  'student/merit' ? 'active' : ''  }}">
                            <a href="{{ route('student.viewMerit') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Submit Merit</span>
                            </a>
                        </li>

                        <!-- Lecturer Routes -->
                        @elseif (Auth::user() && Auth::user()->is_lecturer)
                        <li class="sidebar-item 
                            {{ Request::path() ==  'lecturer/compound/new' ? 'active' : ''  }}">
                            <a href="{{ route('lecturer.newCompound') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Submit Compound</span>
                            </a>
                        </li>
                        <li class="sidebar-item 
                        {{ Request::path() ==  'lecturer/compound' ? 'active' : ''  }}"">
                            <a href="{{ route('lecturer.viewCompound') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>View Compounds</span>
                            </a>
                        </li>
                        @endif

                    </ul>
                    <ul class="menu">
                        <li class="sidebar-title">Settings</li>

                        <li class="sidebar-item ">
                            <a href="{{ route('logout') }}" class='sidebar-link'
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Log Out</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; PUO Merit System</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <script src="{{ asset('vendor/modules/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('vendor/modules/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('vendor/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('vendor/js/main.js') }}"></script>
</body>


{{-- <body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-blue-900 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/home') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ config('app.name', 'PUO Merit System') }}
                    </a>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    <!-- Student Routes -->
                    @if (Auth::user() && Auth::user()->is_student)
                    <a class="no-underline hover:underline" href="{{ route('student.viewCompound') }}">Compounds</a>
                    <a class="no-underline hover:underline" href="{{ route('student.viewMerit') }}">Submit Merit</a>

                    <!-- Lecturer Routes -->
                    @elseif (Auth::user() && Auth::user()->is_lecturer)
                    <a class="no-underline hover:underline" href="{{ route('lecturer.viewCompound') }}">Submit Compound</a>
                    <a class="no-underline hover:underline" href="{{ route('lecturer.newCompound') }}">View Compound</a>
                    @endif
                </nav>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <span>{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        @yield('content')
    </div>
</body> --}}


</html>
