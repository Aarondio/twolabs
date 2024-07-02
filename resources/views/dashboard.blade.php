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
                    <div class="col-xl-10 col-lg-12 col-md-12">
                        @if (session('product_success'))
                            <div class="alert alert-success ">
                                <p class="text-success mb-0">{{ session('product_success') }}</p>
                            </div>
                        @endif
                        <div class="row">

                            <div class="col-md-3 mt-3">
                                <a href="#" class="text-muted text-decoration-none fw-medium">
                                    <div class="alert-success alert py-3 px-4 rounded-3">
                                        <h4>{{ number_format($total_products) }}</h4>

                                        Products

                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 mt-3">
                                <a href="#" class="text-muted text-decoration-none fw-medium">
                                    <div class="alert alert-warning py-3 px-4 rounded-3">
                                        <h4>{{ number_format($income) }}</h4>

                                        Income

                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 mt-3">
                                <a href="#" class="text-muted text-decoration-none fw-medium">
                                    <div class="alert-primary alert py-3 px-4 rounded-3">
                                        <h4>{{ $pending_orders }}</h4>

                                        Pending Order

                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 mt-3">
                                <a href="#" class="text-muted text-decoration-none fw-medium">
                                    <div class="alert alert-secondary py-3 px-4 rounded-3">
                                        <h4>{{ $pending_appointments }}</h4>

                                        Pending Appointments

                                    </div>
                                </a>
                            </div>

                        </div>
                        @if (session('success'))
                            <div class="alert alert-success mb-3">
                                <p class="text-success m-0 p-0">{{ session('success') }}</p>
                            </div>
                        @endif
                        <div class="row mb-5">
                            <div class="col-md-6 mt-3">

                                <h6>{{ ' Pending appointments' }}</h6>
                                @if ($appointments->isEmpty())
                                    <div class="alert alert-danger">
                                        <p class="m-0">{{ 'No pending appointments' }}</p>
                                    </div>
                                @else
                                    @foreach ($appointments as $appointment)
                                        <div class="bg-white mt-2 p-3 rounded-3 d-flex justify-content-between">

                                            <div class="d-flex">
                                                <img src="{{ asset('assets/images/app.jpg') }}" class="rounded-3"
                                                    height="60px" width="60px" alt="">
                                                <div class="ms-3">
                                                    <h6 class="text-muted m-0"> <span class="">Date:
                                                            {{ $appointment->app_date }}</span></h6>
                                                    <p class=" fw-semibold m-0">Time:
                                                        {{ $appointment->app_time->format('H i A') }}</p>
                                                    <p
                                                        class="m-0 alert p-1 badge badge-pill @if ($appointment->status == 'Pending') alert-warning text-warning @else alert-success text-success @endif ">
                                                        {{ $appointment->status }}</p>
                                                </div>
                                            </div>

                                            <div class="align-self-center d-flex">


                                                <form action="{{ route('approve') }}" method="POST">
                                                    @csrf
                                                    <input type="text" value="{{ $appointment->id }}" name="id"
                                                        hidden>
                                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                                        class="btn btn-dark btn-sm">Approve</button>
                                                </form>

                                                <form action="{{ route('decline') }}" method="POST" class="ms-2">
                                                    @csrf
                                                    <input type="text" value="{{ $appointment->id }}" name="id"
                                                        hidden>
                                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                                        class="btn btn-danger btn-sm">Decline</button>
                                                </form>

                                            </div>
                                        </div>
                                    @endforeach
                                @endif



                            </div>
                            <div class="col-md-6 mt-3">

                                <h6>{{ 'Pending Orders' }}</h6>

                                @if ($orders->isEmpty())
                                    <div class="alert alert-danger">
                                        <p class="text-danger m-0 p-0">{{ 'No pending order' }}</p>
                                    </div>
                                @else
                                    @foreach ($orders as $order)
                                        <div class="col-md-12 col-lg-12 col-12   mb-3">
                                            <a href="{{ route('order-details', $order->order_number) }}"
                                                class="text-decoration-none text-dark">
                                                <div class="bg-white p-3 rounded-3 d-flex justify-content-between">

                                                    <div class="d-flex">
                                                        <img src="{{ asset('assets/images/order.png') }}" height="60px"
                                                            width="60px" alt="">
                                                        <div class="ms-3">
                                                            <h5 class="text-muted">Order Number: <span class="small">
                                                                    {{ $order->order_number }}</span></h5>
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
        {{-- @endif --}}


    </main>
@endsection
