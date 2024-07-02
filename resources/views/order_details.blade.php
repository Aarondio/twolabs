@extends('layout.uapp')
@section('content')
    <main>

        <section class="">
            <div class="container">
                <button onclick="history.back()" class="btn btn-sm btn-outline-dark align-self-start">Back</button>
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
                        @if (session('success'))
                            <div class="alert alert-success">
                                <p class="text-success">{{ session('success') }}</p>
                            </div>
                        @endif
                        <div class="row justify-content-center">
                            @if ($carts->isEmpty())
                                <div class="alert alert-danger">
                                    <p class="text-danger m-0">{{ 'Order has already been processed' }}</p>
                                </div>
                            @else
                                @foreach ($carts as $cart)
                                    <div class="col-md-12 col-lg-8 col-12   mb-3">

                                        <div class="bg-white p-3 rounded-3 d-flex justify-content-between">

                                            <div class="d-flex">
                                                <img src="{{ asset($cart->product->image) }}" height="60px" width="60px"
                                                    alt="">
                                                <div class="ms-3">
                                                    <h5 class="text-muted">
                                                        {{ $cart->product->name }}</h5>
                                                    <p class=" fw-semibold m-0">
                                                        ₦{{ number_format($cart->product->price * $cart->quantity) . ' (' . $cart->quantity . ')' }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="align-self-center">
                                                <p class="m-0 text-muted">Ordered On</p>
                                                <p class="m-0">{{ $cart->created_at->format('Y m d') }}</p>

                                            </div>
                                        </div>

                                    </div>
                                @endforeach

                                <div class="col-md-12 col-lg-8 col-12 mb-3">
                                    @if ($order->approval =='Pending')
                                        <form action="{{ route('approveOrder') }}" method="POST" class="float-end">
                                            @csrf
                                            <input type="text" name="order_number" value="{{ $order_number }}" hidden>
                                            <button class="btn btn-dark" type="submit">Approve Order</button>
                                        </form>
                                    @else
                                        <button class="btn btn-secondary float-end" type="submit" disabled>Approve has been approved</button>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>
@endsection
