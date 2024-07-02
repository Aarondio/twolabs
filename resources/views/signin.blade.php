@extends('layout.uapp')
<!-- home section -->
@section('content')
    <section class="container mt-5 py-5">
        <div class="row justify-content-center">

            <div class="col-md-5 ">
                <div class=" bg-white p-5 rounded-2">
                    <form action="{{ route('loginaction') }}" method="POST">
                        @csrf
                        <h3>Sign In</h3>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" placeholder="Your email" name="email" value="{{ old('email') }}"
                                class="form-control">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" placeholder="Enter password" name="password" id="password"
                                class="form-control">
                            @if (session('error'))
                                <div class="alert alert-danger mt-2">
                                    <p class="text-danger m-0">
                                        {{ session('error') }}
                                    </p>
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-dark">Sign In</button>
                        <p class="mt-3">Don't have an Account? <a href="{{ route('register') }}">Register</a></p>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
