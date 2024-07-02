@extends('layout.uapp')

@section('content')
    <div class="container">
        <h3 class="my-4">Eyeglass & Frames</h3>
        <div class="row">

            @if ($products->isEmpty())
                <div class="alert alert-danger">
                    <p class="text-danger m-0">
                        No product available at the moment
                    </p>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('add') }}" class="btn btn-success">Add Product</a>
                </div>
            @else
                @foreach ($products as $product)
                    <div class="col-md-4 col-lg-3 col-12 mt-3">
                        <a href="{{ route('product', $product->id) }}" class="text-decoration-none text-dark">
                            <div class="card border-0 rounded-3 shadow-sm">
                                <img src="{{ asset($product->image) }}" class="card-img" height="240px" width="100%"
                                    alt="">

                                <div class="card-body ">
                                    <h6 class="mt-2">{{ $product->name }}</h6>
                                    <div class="d-flex justify-content-between">
                                        <p class=" fw-semibold align-self-center m-0 p-0 text-danger">
                                            ₦{{ number_format($product->price) }}</p>

                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
