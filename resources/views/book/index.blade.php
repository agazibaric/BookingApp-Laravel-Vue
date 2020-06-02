@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="inline-block">Books</div>
                    <div>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Home</a>

                    </div>
                </div>

                <div class="card-body">
                    @foreach ($books as $book)
                    <h1>{{ $book->title }}</h1>
                    @endforeach
                    <example-component></example-component>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection