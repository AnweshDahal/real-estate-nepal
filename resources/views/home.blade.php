@extends('layouts.app')

@section('title')
    {{ 'Home | ' }}{{ config('app.name') }}
@endsection

@section('content')
    <div class="search-section">
        <h1 class="section-title semi bold text-light text-center mb-3">Find a Home that Suits you!</h1>
        <form action="." method="post">
            <div class="searchbar">
                <input type="text" name="search" id="search" class="searchbar-text" placeholder="Select a City">
                <button class="searchbar-btn text-theme-blue"><i class="bi bi-search"></i></button>
            </div>
        </form>
    </div>
    <div class="property-index-container">
        <div class="card w-100 border-0">
            <div class="card-body">
                <div class="row">
                    @foreach ($properties as $property)
                        <div class="col-12 col-md-12 col-lg-3 mb-3">
                            @include('partials.propertyCard', $property)
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
