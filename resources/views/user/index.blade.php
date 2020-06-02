@extends('layouts.app')

@section('content')
<div class="container">
    <books-component :books="{{ $userBooks }}"></books-component>
</div>
@endsection