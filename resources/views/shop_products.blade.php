@extends('layout.uapp')
@section('content')
    <main>



        <section class="">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-xl-2 col-lg-12 col-md-12 mt-3">
                        <x-sidebar />
                        <div class="tpshop__widget">
                            <div class="tpshop__sidbar-thumb mt-35">
                                <img src="assets/img/shape/sidebar-product-1.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-12 col-md-12 mt-3">
                        @if ($products->isEmpty())
                            <div class="alert alert-danger">
                                <p class="text-danger m-0">
                                    No product has been added
                                </p>
                            </div>
                          <div class="d-flex justify-content-center">
                            <a href="{{ route('add') }}" class="btn btn-success">Add Product</a>
                          </div>
                        @else
                            <div class="row">

                                @foreach ($products as $product)
                                    <div class="col-md-4 col-lg-3 col-12">
                                     
                                            <div class="card border-0 rounded-3 shadow-sm">
                                                <img src="{{ asset($product->image) }}" class="card-img"
                                                    height="240px" width="100%" alt="">
                                                    
                                                <div class="card-body ">
                                                    <h6 class="mt-2">{{ $product->name }}</h6>
                                                    <div class="d-flex justify-content-between">
                                                        <p class=" fw-semibold align-self-center m-0 p-0 text-danger">₦{{ number_format($product->price) }}</p>
                                                        <a href="{{ route('edit-product',$product->id) }}" class="btn btn-dark btn-sm align-self-center">
                                                            <i class="fas fa-pencil-alt  "></i>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                      
                                    </div>
                                @endforeach

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
