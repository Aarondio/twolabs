@extends('layout.uapp')
@section('content')
    <main>


        <!-- cart area -->
        <section class="cart-area pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if (session('success'))
                            <div class="alert alert-success">
                                <h5 class="text-success text-center p-1 fw-normal">{{ session('success') }}</h5>
                            </div>
                        @endif
                        @if ($carts->isEmpty())
                            <div class="alert alert-danger">
                                <h3 class="text-danger text-center p-5 fw-normal">Cart is empty</h3>
                            </div>
                            <div class=" d-flex justify-content-center">
                                <a href="{{ route('services') }}" class="btn btn-success">Shop now</a>
                            </div>
                        @else
                            <div class="table-responsive bg-white mb-3 p-3 rounded-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Images</th>
                                            <th>Name</th>
                                            <th>U.Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($carts as $cart)
                                            @php
                                                $total += $cart->product->price * $cart->quantity;
                                            @endphp
                                            <tr>
                                                <td>
                                                    <a href="{{ route('product', $cart->product->id) }}">
                                                        <img src="{{ $cart->product->image }}" height="80" width="80"
                                                            alt="">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('product', $cart->product->id) }}"
                                                        class="text-decoration-none text-dark">{{ $cart->product->name }}</a>
                                                </td>
                                                <td>
                                                    <span class="amount">{{ number_format($cart->product->price) }}</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex">

                                                        <form action="{{ route('cartminus') }}" method="POST">
                                                            @csrf
                                                            <input type="text" name="product_id"
                                                                value="{{ $cart->product->id }}" hidden>
                                                            <input type="text" name="cart_id" value="{{ $cart->id }}"
                                                                hidden>


                                                            <button type="submit"
                                                                class=" btn btn-outline-secondary {{ $cart->quantity < 2 ? 'disabled' : '' }}">-</button>

                                                        </form>
                                                        <div class="align-self-center mx-2">
                                                            <input class="border-0 text-center" style="width: 60px"
                                                                type="text" value="{{ $cart->quantity }}" readonly>
                                                        </div>

                                                        <form action="{{ route('cartplus') }}" method="POST">
                                                            @csrf
                                                            <input type="text" name="product_id"
                                                                value="{{ $cart->product->id }}" hidden>
                                                            <input type="text" name="cart_id"
                                                                value="{{ $cart->id }}" hidden>
                                                            <button type="submit"
                                                                class=" btn btn-outline-secondary {{ $cart->quantity > 9 ? 'disabled' : '' }}">+</button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span
                                                        class="amount">{{ number_format($cart->product->price * $cart->quantity) }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('deleteCart', $cart->id) }}"
                                                        onclick="return confirm('Do you want to delete')"><i
                                                            class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                            <div class="row justify-content-end">
                                <div class="col-md-5">
                                    <div class="bg-white p-4 rounded-2">
                                        <h5>Cart totals</h5>
                                        <ul class="list-group">
                                            <li class="list-group-item">Subtotal <span> {{ number_format($total) }}</span>
                                            </li>
                                            <li class="list-group-item">V.A.T <span>250.00</span></li>
                                            <li class="list-group-item">Total
                                                <span>{{ number_format($total + 250) }}</span></li>
                                        </ul>

                                        <form action="{{ route('checkout') }}" method="POST">
                                            @csrf
                                            <button class="btn btn-dark mt-3">Check out</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
