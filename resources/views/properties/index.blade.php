@extends('layouts.app')

@section('title')
    {{ 'Properties for Sale and Rent | ' }}{{ config('app.name') }}
@endsection

@section('content')
    <div class="property-index-container">
        <div class="card mb-3 p-2 border-0">
            <h1 class="section-title thin">Latest Entries</h1>
        </div>
        <div class="card w-100">
            <div class="card-body">
                <div class="row">
                    @foreach ($properties as $property)
                        <div class="col-12 col-md-12 col-lg-4 mb-3">
                            @include('partials.propertyCard', $property)
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
