@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="inline-block">Dashboard</div>
                    <div>
                        <form class="inline-block" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>

                    </div>
                </div>

                <div class="card-body">
                    <div class="d-flex align-items-between">
                        <a class="btn btn-primary w-50" href="{{ route('book.create') }}">Add new book</a>
                        <a class="btn btn-secondary w-50" href="{{ route('book.index') }}">Show books</a>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection