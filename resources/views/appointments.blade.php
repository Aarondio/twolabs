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

                        <div class="row">


                            <div class="col-md-6 mt-3">
                                <a href="#" class="text-muted text-decoration-none fw-medium">
                                    <div class="alert alert-warning py-3 px-4 rounded-3">
                                        <h4>{{ $pending_total }}</h4>
                                        Pending appointments

                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mt-3">
                                <a href="#" class="text-muted text-decoration-none fw-medium">
                                    <div class="alert-primary alert py-3 px-4 rounded-3">
                                        <h4>{{ $all_appointment }}</h4>
                                        All booked appointments
                                    </div>
                                </a>
                            </div>


                        </div>


                        <div class="row">
                            <div class="col-md-6 mt-3">

                                <h6>{{ ' Pending appointments' }}</h6>
                                @if ($pending->isEmpty())
                                    <div class="alert alert-danger">
                                        <p class="m-0">{{ 'No pending appointments' }}</p>
                                    </div>
                                @else
                                    @foreach ($pending as $appointment)
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
                                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-dark btn-sm">Approve</button>
                                                </form>

                                                <form action="{{ route('decline') }}" method="POST" class="ms-2">
                                                    @csrf
                                                    <input type="text" value="{{ $appointment->id }}" name="id"
                                                        hidden>
                                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Decline</button>
                                                </form>

                                            </div>
                                        </div>
                                    @endforeach
                                @endif


                            </div>
                            <div class="col-md-6 mt-3">

                                <h6>{{ 'Approved Appointments' }}</h6>
                                @if ($approved->isEmpty())
                                    <div class="alert alert-danger">
                                        <p class="m-0">{{ 'No approved appointments' }}</p>
                                    </div>
                                @else
                                    @foreach ($approved as $appointment)
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
        {{-- @endif --}}


    </main>
@endsection
