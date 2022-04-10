@extends('layouts.app')

@section('title')
    {{ 'Home | ' }}{{ config('app.name') }}
@endsection

@section('content')
    @include('partials.search', $localities)
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
