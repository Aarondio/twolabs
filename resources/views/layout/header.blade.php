<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprehensive Eye Clinic</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <!-- header section -->
    <header class="header">
        <a href="{{ route('index') }}" class="logo"> <i class="fas fa-eye"></i> TWOLABS</a>
        <nav class="navbar">
            @if (Auth::user())
                <a href="{{ route('user_dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('index') }}">home</a>
            @endif
            <a href="{{ route('services') }}">services</a>
            <a href="{{ route('about') }}">about</a>
            <a href="/#doctors">doctors</a>
            <a href="{{ route('book') }}">book</a>
            <a href="/#review">review</a>
            @if (Auth::check())
            <a class="nav-link" href="{{ route('cart') }}">Cart <span
                        class=" text-success fw-bold  rounded-2 p-1">
                        {{ \App\Models\Cart::where('user_id', Auth::id())->where('completed', '0')->count() }}</span></a>
            
            
            {{-- <li class="navbar-item"><a class="nav-link text-danger" href="{{ route('user_dashboard') }}">Logout</a>
            </li> --}}
        @endif
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </header>
    <!-- end of header -->
