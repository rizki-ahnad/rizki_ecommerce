@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Show Product') }}</div>

                <div class="d-flex justify-content-center p-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ url('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                          <h5 class="card-title">{{ $product->name }}</h5>
                          <p class="card-text">Description Product : {{ $product->description }}</p>
                          <p class="card-text">Stock : {{ $product->stock }}</p>
                          <p class="card-text">Price : IDR. {{ $product->price }}</p>
                          <form action="{{ route('edit_product', $product) }}" method="get">
                              <button type="submit" class="btn btn-primary ">Update</button>
                          </form>
                            @if(!Auth::user()->is_admin)
                                <form action="{{ route('add_to_cart', $product) }}" method="post">
                                    @csrf
                                    <div class="input-group mb-3 mt-2">
                                        <input type="number" class="form-control"  aria-label="Recipient's username" aria-describedby="button-addon2" name="amount" value=1>
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Add Cart</button>
                                    </div>
                                </form>
                            @endif
                
                            @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                            @endif
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
