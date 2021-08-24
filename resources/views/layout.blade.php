<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('title','Inventory App - 2242742')</title>
    <!-- Favicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <meta name="theme-color" content="#7952b3">
    
</head>
<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="{{ url('/') }}" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                {{ config('app.name', 'Inventory') }}
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                @guest
                @else
                    <a href="#" class="nav-link px-2 text-white">{{ __('You are logged in!') }} {{ Auth::user()->email }}</a>
                @endguest
            </ul>
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
              <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                @guest
                    <a class="btn btn-outline-light me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <a class="btn btn-warning" href="{{ route('register') }}">{{ __('Register') }}</a>
                @else
                    <a class="btn btn-warning" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                @endguest
            </div>
          </div>
        </div>
    </header>
    {{-- <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">s
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ url('/') }}">{{ config('app.name', 'Inventory') }}</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        @guest
            <ul class="navbar-nav mr-auto">
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            </ul>
        @else
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">

                    {{ session('status')}}
                </div>
            @endif
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ __('You are logged in!') }} {{ Auth::user()->email }}
            </a>
        </div>
        <div class="navbar-nav">
          <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" >{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </div>
        </div>
        @endguest
      </header> --}}
      <div class="container-fluid">
        <div class="row">
            @guest
            @else
          <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/">
                    <span data-feather="home"></span>
                    Inicio
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/products">
                    <span data-feather="shopping-cart"></span>
                    Products
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/brands">
                      <span data-feather="shopping-cart"></span>
                      Brands
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/categorias">
                      <span data-feather="shopping-cart"></span>
                      Categorias
                    </a>
                  </li>
              </ul>
            </div>
          </nav>
        @endguest
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @guest
            @else
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Dashboard</h1>
              <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>

                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('file-export') }}">Export</a>

                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                  <span data-feather="calendar"></span>
                  This week
                </button>
              </div>
            </div>
            @endguest
            <div class="container2">
                <h1 style="background-color: #32c3e7; text-align: center; padding-bottom: 10px;">@yield('encabezado','Inventory App')</h1>
                @yield('content')
            </div>
        </main>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
</body>
</html>
