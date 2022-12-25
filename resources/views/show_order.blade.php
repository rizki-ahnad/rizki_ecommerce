@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Show Order') }}</div>

                <div class="p-3 text-uppercase">
                    <input type="hidden" value={{ $order->id }}>
                    {{ $order->user->name }}
                </div>
                @php
                    $total_price = 0;
                @endphp
                @foreach ($order->transactions as $transaction)
                <div class="p-3"> 
                        <a href="/product/{{ $transaction->product_id }}">Show Product</a>
                        <input type="text" class="form-control" id="image" name="name" value="{{ $transaction->product->name }}" disabled>
                        <input type="number" class="form-control" id="image" name="amount" value="{{ $transaction->amount }}" disabled>
                    </div>
                    @php
                        $total_price += $transaction->product->price * $transaction->amount;
                    @endphp
                @endforeach
                    <div class="ms-3">
                        <h4>Total Price: Rp. {{ $total_price }}</h4>
                    </div>
                @if($order->is_paid == false && $order->payment_receipt == null)
                    <form action="{{ route('submit_payment_receipt', $order) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2 p-3">
                            <label for="image" class="form-label">Upload your Payment Receipt</label>
                           <div class="d-flex">
                                <input type="file" class="form-control" id="image" name="payment_receipt">
                                <button type="submit" class="btn btn-primary">Upload</button>
                           </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
