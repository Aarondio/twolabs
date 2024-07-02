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
                        <div class="row">
                            @if ($orders->isEmpty())
                                <div class="alert alert-danger">
                                    <p class="text-danger">{{ 'No order has been placed' }}</p>
                                </div>
                            @else
                                @foreach ($orders as $order)
                                    <div class="col-md-12 col-lg-8 col-12   mb-3">
                                        <a href="{{ route('order-details', $order->order_number) }}" class="text-decoration-none text-dark">
                                            <div class="bg-white p-3 rounded-3 d-flex justify-content-between">
                                                <div class="d-flex">
                                                    <img src="{{ asset('assets/images/order.png') }}" height="60px"
                                                        width="60px" alt="">
                                                    <div class="ms-3">
                                                        <h6 class="text-muted">Order Number: <span class="small">
                                                                {{ $order->order_number }}</span></h6>
                                                        <p class=" fw-semibold m-0">Order Cost:
                                                            ₦{{ number_format($order->cost) }}</p>
                                                    </div>
                                                </div>

                                              <div class="align-self-center">
                                                <p class="m-0 text-muted">Ordered On</p>
                                                <p class="m-0">{{ $order->created_at->format('Y m d') }}</p>

                                              </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
      

    </main>
@endsection
