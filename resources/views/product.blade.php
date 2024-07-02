@extends('layout.uapp')

@section('content')
    <div class="container ">

        <div class="row">
            <div class="col-lg-10 col-12 bg-white p-lg-5 rounded-3">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-0 bg-transparent">
                            <img src="{{ $product->image }}" class="rounded-2" height="" alt="">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light p-3 rounded-2">
                            <h3 class="">{{ $product->name }}</h3>
                            <p class="fs-5 fw-bold mt-2 text-danger">₦{{ number_format($product->price) }}</p>

                        </div>
                        <div class="my-4">
                            <p class="text-muted">
                                {{ $product->description }}
                            </p>
                        </div>
                        <div class="mt-3">
                            @if ($product->quantity > 0)

                                @if (isset(Auth::user()->id))
                                    @if (empty($cart))
                                        <form action="{{ route('addToCart') }}" method="POST">
                                            @csrf
                                            <div class="product__details-count mr-10">
                                                <input class="tp-cart-input" type="text"
                                                    value="{{ $cart->quantity ?? 1 }}" name="quantity" hidden>
                                            </div>
                                            <input type="text" name="product_id" value="{{ $product->id }}" hidden>
                                            <input type="text" name="price" value="{{ $product->price }}" hidden>
                                            <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                            <button class="btn btn-success rounded-pill p-2 px-5">Add
                                                to Cart</button>
                                        </form>
                                    @else
                                        <div class="bg-transparent border-0  p-0  input-group ">
                                            {{-- <b class="align-self-center">quantity:</b> --}}
                                            <form action="{{ route('cartminus') }}" method="POST">
                                                @csrf
                                                <input type="text" name="product_id" value="{{ $product->id }}" hidden>
                                                <input type="text" name="cart_id" value="{{ $cart->id }}" hidden>


                                                <button type="submit"
                                                    class="btn btn-secondary rounded-0 {{ $cart->quantity < 2 ? 'disabled' : '' }}">-</i></button>

                                            </form>

                                            <input class="border border-1 bg-transparent text-center" style="width: 40px"
                                                type="text" value="{{ $cart->quantity ?? 0 }}" name="quantity" readonly>

                                            <form action="{{ route('cartplus') }}" method="POST">
                                                @csrf
                                                <input type="text" name="product_id" value="{{ $product->id }}" hidden>
                                                <input type="text" name="cart_id" value="{{ $cart->id }}" hidden>
                                                <button type="submit"
                                                    class=" btn btn-success rounded-0 {{ $cart->quantity > 9 ? 'disabled' : '' }}">+</i></button>
                                            </form>


                                            <span class="align-self-center ms-3">({{ $cart->quantity }}
                                                item(s)
                                                added)</span>

                                        </div>
                                        <div class="mt-5">
                                            <a href="{{ route('cart') }}" class="btn btn-dark btn-sm">Checkout</a>
                                            <a href="{{ route('services') }}" class="btn btn-primary btn-sm">Continue shopping</a>
                                        </div>
                                    @endif
                                @else
                                    <div class="">
                                        <a href="{{ route('login') }}" class="btn btn-danger px-5 rounded-pill py-2">Sign
                                            in to add to cart</a>
                                    </div>
                                @endif
                            @else
                                <div class="d-grid">
                                    <a href="{{ route('cart') }}" class="btn btn-outline-danger rounded-pill disabled ">Out
                                        of Stock</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="my-3">Related Product</h3>
        <div class="row mb-5 ">
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
