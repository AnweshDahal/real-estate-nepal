@extends('layouts.app')

@section('title')
    {{ 'Buy, Sell, & Rent Real Estate | ' }}{{ config('app.name') }}
@endsection

@section('content')
    <h1>Real Estate Nepal</h1>
    @foreach ($properties as $property)
        @include('partials.propertyCard',  $property )
    @endforeach
@endsection
