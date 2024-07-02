<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprehensive Eye Clinic</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- css -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
</head>

<body class="bg-light">
    <!-- header section -->
    <nav class="header mb-5 navbar navbar-expand-lg bg-white">
        <div class="container">
            <a href="/" class="brand-logo fw-bold text-decoration-none text-dark"> <i class="fas fa-eye"></i>
                TWOLABS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    @if (Auth::check())
                        <li class="navbar-item"><a class="nav-link" href="{{ route('user_dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="navbar-item"><a class="nav-link" href="/">home</a></li>
                    @endif
                    <li class="navbar-item"><a class="nav-link" href="{{ route('services') }}">Services</a></li>
                    @if (!Auth::check())
                        <li class="navbar-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    @endif

                    <li class="navbar-item"><a class="nav-link" href="/#doctors">Doctors</a></li>
                    <li class="navbar-item"><a class="nav-link" href="{{ route('book') }}">Book</a></li>
                    <li class="navbar-item"><a class="nav-link" href="/#review">Review</a></li>

                    @if (Auth::check())
                        <li class="navbar-item"><a class="nav-link" href="{{ route('cart') }}">Cart <span
                                    class=" text-success fw-bold  rounded-2 p-1">
                                    {{ \App\Models\Cart::where('user_id', Auth::id())->where('completed', '0')->count() }}</span></a>
                        </li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-link text-decoration-none text-danger">Logout</button>
                        </form>
                        {{-- <li class="navbar-item"><a class="nav-link text-danger" href="{{ route('user_dashboard') }}">Logout</a>
                        </li> --}}
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of header -->

    @yield('content')
    <!-- footer section -->

    <!-- end of footer section -->

    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
</body>

</html>
