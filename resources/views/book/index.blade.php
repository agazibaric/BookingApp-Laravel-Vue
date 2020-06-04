@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col">
            <div class="card border-dark">
                <div class="card-header">
                    <div class="inline-block">{{ $title }}</div>
                </div>

                <div class="card-body">
                    <books-component :loggeduser="{{ $loggedUser }}" :books="{{ $books }}">
                    </books-component>
                </div>

                <div class="card-footer text-muted">

                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection