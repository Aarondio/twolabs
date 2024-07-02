@extends('layout.uapp')
@section('content')
    <main>



        <section class="">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-md-6 col-lg-3 mt-3">
                        <a href="#" class="text-muted text-decoration-none fw-medium">
                            <div class="alert-success alert py-3 px-4 rounded-3">
                                <h4>{{ number_format($approved_count) }}</h4>

                                Approved Appointment

                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3 mt-3">
                        <a href="#" class="text-muted text-decoration-none fw-medium">
                            <div class="alert alert-warning py-3 px-4 rounded-3">
                                <h4>{{ number_format($order_count) }}</h4>

                                Pending Order

                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3 mt-3">
                        <a href="#" class="text-muted text-decoration-none fw-medium">
                            <div class="alert-primary alert py-3 px-4 rounded-3">
                                <h4>{{ $all_order }}</h4>

                                Order History

                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3 mt-3">
                        <a href="#" class="text-muted text-decoration-none fw-medium">
                            <div class="alert alert-secondary py-3 px-4 rounded-3">
                                <h4>{{ number_format($app_count) }}</h4>

                                Pending Appointments

                            </div>
                        </a>
                    </div>

                </div>
                @if (session('success'))
                    <div class="alert alert-success my-3">
                        <p class="text-success m-0 p-0">{{ session('success') }}</p>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12 col-lg-6 my-3">
                        <div class="bg-white p-3 rounded-3">
                            <h5>Approved Orders</h5>
                            @if ($approved_orders->isEmpty())
                                <div class="alert alert-danger">
                                    <p class="m-0">{{ 'No approved orders' }}</p>
                                </div>
                            @else
                                @foreach ($approved_orders as $order)
                                    <a href="{{ route('user-order-details', $order->order_number) }}"
                                        class="text-decoration-none text-dark">
                                        <div class="bg-light mt-2 p-3 rounded-3 d-flex justify-content-between">

                                            <div class="d-flex">
                                                <img src="{{ asset('assets/images/order.png') }}" height="60px"
                                                    width="60px" alt="">
                                                <div class="ms-3">
                                                    <h5 class="text-muted">Order Number: <span class="small">
                                                            {{ $order->order_number }}</span></h5>
                                                    <p class="  m-0">Order Cost:
                                                        ₦{{ number_format($order->cost) }}</p>
                                                </div>
                                            </div>

                                            <div class="align-self-center">
                                                <p
                                                    class="m-0 alert p-1 badge badge-pill @if ($order->approval == 'Pending') alert-warning text-warning @else alert-success text-success @endif ">
                                                    {{ $order->approval }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <div class="bg-white p-3 rounded-3 mt-3">
                            <h5>Pending Orders</h5>
                            @if ($orders->isEmpty())
                                <div class="alert alert-danger">
                                    <p class="m-0">{{ 'No pending orders' }}</p>
                                </div>
                            @else
                                @foreach ($orders as $order)
                                    <a href="{{ route('user-order-details', $order->order_number) }}"
                                        class="text-decoration-none text-dark">
                                        <div class="bg-light mt-2 p-3 rounded-3 d-flex justify-content-between">

                                            <div class="d-flex">
                                                <img src="{{ asset('assets/images/order.png') }}" height="60px"
                                                    width="60px" alt="">
                                                <div class="ms-3">
                                                    <h5 class="text-muted">Order Number: <span class="small">
                                                            {{ $order->order_number }}</span></h5>
                                                    <p class=" m-0">Order Cost:
                                                        ₦{{ number_format($order->cost) }}</p>
                                                </div>
                                            </div>

                                            <div class="align-self-center">
                                                <p
                                                    class="m-0 alert p-1 badge badge-pill @if ($order->approval == 'Pending') alert-warning text-warning @else alert-success text-success @endif ">
                                                    {{ $order->approval }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 mt-3">
                        <div class="bg-white p-3 rounded-3">
                            <h5>Approved Appointment</h5>
                            @if ($approved_appointments->isEmpty())
                                <div class="alert alert-danger">
                                    <p class="m-0">{{ 'No pending appointments' }}</p>
                                </div>
                            @else
                                @foreach ($approved_appointments as $appointment)
                                    <div class="bg-light mt-2 p-3 rounded-3 d-flex justify-content-between">

                                        <div class="d-flex">
                                            <img src="{{ asset('assets/images/app.jpg') }}" class="rounded-3"
                                                height="60px" width="60px" alt="">
                                            <div class="ms-3">
                                                <h6 class="text-muted m-0"> <span class="">
                                                    Date:     {{ $appointment->app_date }}</span></h6>
                                                <p class="m-0">Time:
                                                    {{ $appointment->app_time->format('H:i A') }}</p>
                                                    <p
                                                    class="m-0 alert p-1 badge badge-pill @if ($appointment->status == 'Pending') alert-warning text-dark @else alert-success text-success @endif ">
                                                    {{ $appointment->status }}</p>
                                            </div>
                                        </div>
                                        <div class="align-self-center d-flex">

                                            <form action="{{ route('decline') }}" method="POST" class="ms-2">
                                                @csrf
                                                <input type="text" value="{{ $appointment->id }}" name="id"
                                                    hidden>
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Cancel</button>
                                            </form>

                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="bg-white p-3 rounded-3 mt-3">
                            <h5>Pending Appointments</h5>
                            @if ($appointments->isEmpty())
                                <div class="alert alert-danger">
                                    <p class="m-0">{{ 'No pending appointments' }}</p>
                                </div>
                            @else
                                @foreach ($appointments as $appointment)
                                    <div class="bg-light mt-2 p-3 rounded-3 d-flex justify-content-between">

                                        <div class="d-flex">
                                            <img src="{{ asset('assets/images/app.jpg') }}" class="rounded-3"
                                                height="60px" width="60px" alt="">
                                            <div class="ms-3">
                                                <h6 class="text-muted m-0"> <span class="">
                                                    Date:     {{ $appointment->app_date }}</span></h6>
                                                <p class="m-0">Time:
                                                    {{ $appointment->app_time->format('H:i A') }}</p>
                                                    <p
                                                    class="m-0 alert p-1 badge badge-pill @if ($appointment->status == 'Pending') alert-warning text-dark @else alert-success text-success @endif ">
                                                    {{ $appointment->status }}</p>
                                            </div>
                                        </div>
                                        <div class="align-self-center d-flex">

                                            <form action="{{ route('decline') }}" method="POST" class="ms-2">
                                                @csrf
                                                <input type="text" value="{{ $appointment->id }}" name="id"
                                                    hidden>
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Cancel</button>
                                            </form>

                                        </div>
                                        
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
