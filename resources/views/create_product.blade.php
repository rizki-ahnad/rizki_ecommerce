@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Product') }}</div>

                <div class="card p-4">
                    <form action="{{ route('store_product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nameProduct" class="form-label">Name Product</label>
                            <input type="text" class="form-control" id="nameProduct" name="name">
                          </div>
                          <div class="mb-3">
                              <label for="description" class="form-label">Description Product</label>
                              <input type="text" class="form-control" id="description" name="description">
                          </div>
                          <div class="mb-3">
                              <label for="price" class="form-label">Price</label>
                              <input type="number" class="form-control" id="price" name="price">
                          </div>
                          <div class="mb-3">
                              <label for="stock" class="form-label">Stock</label>
                              <input type="number" class="form-control" id="stock" name="stock">
                          </div>
                          <div class="mb-3">
                              <label for="image" class="form-label">Change Image</label>
                              <input type="file" class="form-control" id="image" name="image">
                          </div>
                          <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
