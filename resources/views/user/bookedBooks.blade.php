@extends('layouts.app')

@section('content')
<div class="container">
    <books-component :books="{{ $bookedBooks }}"></books-component>
</div>
@endsection