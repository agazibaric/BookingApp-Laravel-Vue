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
                    <form action="{{ route('updatePassword') }}" method="POST">
                        @csrf
                        <div class="form-group mt-4">

                            <div>
                                <label for="book">Current password</label>
                                <input type="text" class="form-control" name="old_password">
                                @error('password')
                                <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="book">New password</label>
                                <input type="text" class="form-control" name="new_password">
                                @error('newPassword')
                                <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="book">Re-enter password</label>
                                <input type="text" class="form-control" name="confirm_password">
                                @error('rePassword')
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