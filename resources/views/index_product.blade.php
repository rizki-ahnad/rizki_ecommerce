@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
        @foreach ($products as $product)
            <div class="col-md-3 mb-3">
                <div class="card" style="width: 15rem;">
                    <img src="{{ url('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->price }}</p>
                    <form action="{{ route('show_product', $product)}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary">Remore</button>
                    </form>
                        @if(Auth::check() && Auth::user()->is_admin)
                            <form action="{{ route('delete_product', $product) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger mt-2">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
