@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cart') }}</div>

                <div class="p-3">
                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                    @endif
                    @php
                        $total_price = 0;
                    @endphp
                        <div class="container">
                            <div class="row">
                                @foreach ($carts as $cart)
                                <div class="col-md-12">
                                    <div class="card p-2 mb-2">
                                        <div class="d-flex justify-content-start ms-3" style="width: 50px;">
                                            <img src="{{ url('storage/' . $cart->product->image) }}" class="card-img-top" alt="{{ $cart->product->name }}" height="50px">
                                            </div>
                                            <div class="card-body">
                                            <h5 class="card-title">{{ $cart->product->name }}</h5>
                                            <p class="card-text">Bayar Rp. {{ $cart->product->price * $cart->amount }}</p>
                                            <div class="d-flex">
                                                <form action="{{ route('update_cart', $cart) }}" method="post">
                                                @method('patch')
                                                @csrf
                                                <div class="input-group me-2">
                                                    <input type="number" class="form-control"  aria-label="Recipient's username" aria-describedby="button-addon2" name="amount" value={{ $cart->amount }}>
                                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Update Amount</button>
                                                </div>
                                                </form>
                                                <form action="{{ route('delete_cart', $cart) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger ms-2">Delete</button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @php
                                    $total_price += $cart->product->price * $cart->amount;
                                @endphp
                                </div>
                            @endforeach
                            <div class="d-flex flex-column justify-content-end p-2 align-items-end">
                                <h5>Total Price : Rp. {{ $total_price }}</h5>
                                <form action="{{ route('checkout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Checkout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
