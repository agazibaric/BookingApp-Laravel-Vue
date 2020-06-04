@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="inline-block">Change password</div>
                </div>

                <div class="card-body mb-5">
                    <!-- Error info -->
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form action="{{ route('updatePassword') }}" method="POST">
                        @csrf
                        <div class="form-group mt-4">

                            <div>
                                <label for="book">Current password</label>
                                <input type="password" class="form-control" name="old_password">
                                @error('old_password')
                                <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="book">New password</label>
                                <input type="password" class="form-control" name="new_password">
                                @error('new_password')
                                <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="book">Re-enter password</label>
                                <input type="password" class="form-control" name="confirm_password">
                                @error('confirm_password')
                                <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <button type="submit" class="btn btn-danger">Change password</button>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection