@extends('layout.uapp')
<!-- home section -->
@section('content')
    <section class="container mt-5 py-5">
        <div class="row">
        

            <div class="row">
                <div class="row justify-content-center">
                    <div class="col-md-5 bg-white p-5">
                        <form action="{{ route('registeraction') }}" method="POST">
                            @csrf
                            <h3>Sign Up</h3>
                        
                            <div class="mb-3">
                                <input type="text" placeholder="Your Name" value="{{ old('name') }}" name="name" class="form-control" required>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <input type="number" placeholder="Your Number" value="{{ old('phone') }}" name="phone" class="form-control" required>
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <input type="email" placeholder="Your Email" name="email" value="{{ old('email') }}" class="form-control" required>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <input type="password" placeholder="Enter Password" name="password" id="password" class="form-control" required>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <button type="submit" class="btn btn-dark">Sign Up</button>
                            </div>
                        
                            <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection






<script src="js/script.js"></script>
</body>

</html>
