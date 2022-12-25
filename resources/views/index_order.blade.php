@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Order Product') }}</div>

                <div class="card">
                    @foreach ($orders as $order)
                        <div class="card p-3">
                            <table>
                                <tr>
                                    <td>User Order</td>
                                    <td>:</td>
                                    <td> {{ $order->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Order</td>
                                    <td>:</td>
                                    <td> {{ $order->created_at }}</td>
                                </tr>
                            </table>

                            @if(Auth::user()->is_admin)
                                @if($order->is_paid == true)
                                    <a href="#" class="btn btn-primary">Sudah Diconfirme</a>
                                @else
                                    @if($order->payment_receipt == null)
                                    <p>Payment receipet belum di upload/belum bayar</p>
                                    @else
                                        <a href="{{ url('storage/' . $order->payment_receipt) }}">show payment</a>
                                        <form action="{{ route('confirme_payment', $order) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Confirme</button>
                                        </form>
                                    @endif
                                @endif
                            @else
                                <div class="d-flex justify-content-start">
                                    <a href="{{ url('order/' . $order->id) }}" class="btn btn-primary">Bayar Sekarang</a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
