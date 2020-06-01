@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="inline-block">Dashboard</div>
                    <div>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Home</a>

                    </div>
                </div>

                <div class="card-body">
                    Add new book

                    <form action="{{ route('book.store') }}" method="POST">
                        @csrf
                        <div class="form-group mt-4">
                            <label for="book">Title</label>
                            <input type="text" class="form-control" name="title">
                            @error('title')
                            <div class="error text-danger">{{ $message }}</div>
                            @enderror

                            <label for="book">Author</label>
                            <input type="text" class="form-control" name="author">
                            @error('author')
                            <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Create new book</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection