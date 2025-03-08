<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    @vite(['resources/js/admin/passwords/index.js'])
    @vite(['resources/js/admin/passwords/show.js'])
    @vite(['resources/js/admin/favourites/index.js'])
    @vite(['resources/js/admin/dashboard.js'])
</head>

<body>
    <div id="app">
        <header class="navbar navbar-dark sticky-top bg-black flex-md-nowrap p-2 shadow" style="height: 80px;">
            <nav class="navbar navbar-expand-lg navbar-dark bg-black">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">iLock</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-regular fa-user fs-5"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="container-fluid" style="height: 100vh">
            <div class="row h-100">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-black navbar-dark sidebar collapse">
                    <div class="position-fixed">
                        <ul class="nav nav-underline d-flex flex-column justify-content-evenly">
                            <li class="nav-item" id="navbar">
                                <a class="nav-link text-white fs-5 {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-sharp fa-solid fa-house fs-4 me-1"></i> HomePage
                                </a>
                            </li>
                            <li class="nav-item text-light" id="navbar">
                                <a class="nav-link text-white fs-5 {{ Route::currentRouteName() == 'admin.passwords.index' ? 'active' : '' }}" href="{{ route('admin.passwords.index') }}">
                                    <i class="fa-solid fa-box-archive fs-4 me-2"></i> Passwords
                                </a>
                            </li>
                            <li class="nav-item" id="navbar">
                                <a class="nav-link text-white fs-5 {{ Route::currentRouteName() == 'admin.passwords.create' ? 'active' : '' }}" href="{{ route('admin.passwords.create') }}">
                                    <i class="fa-solid fa-square-plus fs-4 me-2"></i> New Password
                                </a>
                            </li>
                            <li class="nav-item" id="navbar">
                                <a class="nav-link text-white fs-5 {{ Route::currentRouteName() == 'admin.favourites.index' ? 'active' : '' }}" href="{{ route('admin.favourites.index') }}">
                                    <i class="fa-solid fa-star fs-4 me-1"></i> Favourites
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>
