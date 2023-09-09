@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="container">
            <x-post :post="$post"/>
        </div>
    </div>
@endsection
