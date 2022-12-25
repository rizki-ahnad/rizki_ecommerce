@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Profile  ') }}{{ $user->name }}</div>
                <div class="card-body">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    @endif
                    <p>Name : {{ $user->name }}</p>
                    <p>Status : {{ $user->is_admin ? 'Admin' : 'Member' }}</p>

                    <div class="d-flex justify-content-center">
                        <form action="{{ route('edit_profile') }}" method="post">
                            @csrf
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <label>Password Confrimed</label>
                            <input type="password" name="password_confirmation" class="form-control">
                            <button type="submit" class="btn btn-primary mt-2">update profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
