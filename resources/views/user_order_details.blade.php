@extends('layout.uapp')
@section('content')
    <main>



        <section class="">
            <div class="container">
                <button onclick="history.back()" class="btn btn-sm btn-outline-dark align-self-start">Back</button>
                <div class="row justify-content-center">


                    <div class="col-xl-10 col-lg-12 col-md-12 mt-3">

                        @if (session('success'))
                            <div class="alert alert-success">
                                <p class="text-success">{{ session('success') }}</p>
                            </div>
                        @endif
                        <div class="row justify-content-center">
                            @php $total = 0 @endphp
                            @if ($carts->isEmpty())
                                <div class="alert alert-danger">
                                    <p class="text-danger">{{ 'No order has been placed' }}</p>
                                </div>
                            @else
                                @foreach ($carts as $cart)
                                    @php $total += $cart->price @endphp
                                    <div class="col-md-12 col-lg-8 col-12   mb-3">

                                        <div class="bg-white p-3 rounded-3 d-flex justify-content-between">

                                            <div class="d-flex">
                                                <img src="{{ asset($cart->product->image) }}" height="60px" width="60px"
                                                    alt="">
                                                <div class="ms-3">
                                                    <h5 class="text-muted">
                                                        {{ $cart->product->name }}</h5>
                                                    <p class=" fw-semibold m-0">
                                                        ₦{{ number_format($cart->product->price * $cart->quantity) . ' - Qty (' . $cart->quantity . ')' }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="align-self-center">
                                                <p class="m-0 text-muted">Ordered On</p>
                                                <p class="m-0">{{ $cart->created_at->format('Y M d') }}</p>

                                            </div>
                                        </div>

                                    </div>
                                @endforeach

                                <h5 class="text-center">Total price: ₦{{ number_format($total) }}</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>
@endsection
