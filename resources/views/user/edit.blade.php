@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="inline-block">Edit user settings</div>
                    <div>
                        <a href="{{ route('changePassword') }}" class="btn btn-danger">Change password</a>
                    </div>
                </div>

                <div class="card-body mb-5">
                    <form action="{{ route('updateUser') }}" method="POST">
                        @csrf
                        <div class="form-group mt-4">
                            <label for="book">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            @error('name')
                            <div class="error text-danger">{{ $message }}</div>
                            @enderror

                            <label for="book">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                            @error('email')
                            <div class="error text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection