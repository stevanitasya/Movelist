<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- <script src="{{ asset('/js/app.js')}}"></script> --}}
    <link rel="stylesheet" href="{{ asset ('/style.css')}}" >
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <script src="https://kit.fontawesome.com/aa4fd34be7.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #323233;">
        <div class="logo">
            <p class="logo-start">Movie<span class="logo-end">List</span></p>
        </div>
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="{{url('/home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{url('/movie')}}">Movie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{url('/actor')}}">Actors</a>
                    </li>

                    @auth
                    @if (Auth::user()->role == 'member')
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{url('/watchlist')}}">My Watchlist</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown-center">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user fa-lg"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{url('/profile')}}">Profile</a></li>
                              <li><a class="dropdown-item" href="{{url('/logout')}}">Log Out</a></li>
                            </ul>
                          </div>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <div class="dropdown-center">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user fa-lg"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{url('/logout')}}">Log Out</a></li>
                            </ul>
                          </div>
                    </li>
                    @endif
                    @else
                    <a href="{{url('register')}}">
                    <button type="button" class="btn btn-outline-primary me-2">Register</button>
                    </a>
                    <a href="{{url('/')}}">
                    <button type="button" class="btn btn-outline-primary me-2 active">LogIn</button>
                    </a>
                    @endauth

                </ul>
            </div>
        </div>
      </nav>

    <div class="content">
        @yield('content')
        @yield('page-title')
      </div>
</body>

<footer>
    <div class="foot-logo">
        <p class="foot-logo-start">Movie<span class="foot-logo-end">List</span></p>
    </div>
    <div class="logo2">
        <p class="logo2-start">Movie<span class="logo2-end">List</span><span class="logo-desc text-white"> is a Website that contains list of movie</span></p>
    </div>

    <div class="sosmed">
        <a class="badge bg-secondary text-wrap rounded-circle"  href="#">
            <i class="fa-brands fa-twitter fa-lg"></i>
        </a>
        <a class="badge bg-secondary rounded-circle" href="#">
            <i class="fa-brands fa-instagram fa-lg"></i>
        </a>
        <a class="badge bg-secondary rounded-circle" href="#">
            <i class="fa-brands fa-facebook-f fa-lg"></i>
        </a>
        <a class="badge bg-secondary rounded-circle" href="#">
            <i class="fa-brands fa-reddit-alien fa-lg"></i>
        </a>
        <a class="badge bg-secondary rounded-circle" href="#">
            <i class="fa-brands fa-youtube fa-lg"></i>
        </a>
    </div>

    <div class="foot-desc">
        <a class="navbar-brand text-white" href="#">Privacy Policy | </a>
        <a class="navbar-brand text-white" href="#">Terms of Service | </a>
        <a class="navbar-brand text-white" href="#">Contact Us | </a>
        <a class="navbar-brand text-white" href="#">About Us</a>
    </div>

    <div class="logo2">
        <p class="logoo"> <span class="logo-desc text-white"> Copyright &copy; 2021 </span><span class="logo2-start">Movie</span><span class="logo2-end">List </span><span class="logo-desc text-white"> All Rights Reserved</span></p>
    </div>
    
</footer>
</html>