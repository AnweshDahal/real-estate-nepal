@extends('layouts.app')

@section('title')
    {{ 'Create a New Property Listing | ' }}{{ config('app.name') }}
@endsection

@section('content')

    <div class="search-container d-flex align-items-center justify-content-center">
        <div class="container d-flex flex-column align-items-center justify-content-center">
            <div class="card search-card w-100">
                <div class="row m-0 fh">
                    <div class="col-12 col-md-12 col-lg-6 create-listing">
                        <div class="form-title semi-bold mb-3 condensed-4">Showing results for
                            {{ $locality->locality_name }}</div>
                        @if (!$properties->isEmpty())
                            @foreach ($properties as $property)
                                <div class="search-result-list-item px-4 py-3">
                                    <div class="row">
                                        <div class="img-col col-2 d-flex align-items-center justify-content-center">
                                            <img class="thumbnail"
                                                src="{{ asset('storage/img/property/' . $property->thumbnail()->first()->file_name) }}"
                                                alt="">
                                        </div>
                                        <div class="info-col col-10 d-flex flex-column">
                                            <p class="light property-title m-0"><a
                                                    href="{{ route('property.show', $property->id) }}">{{ $property->property_name }}</a>
                                            </p>
                                            <p class="regular property-address m-0">{{ $property->address }}</p>
                                            <p class="price medium m-0">
                                                <span class="text-theme-blue">NPR.</span> {{ $property->price }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h2 class="thin">No Result found for {{ $locality->locality_name }}</h2>
                        @endif
                        {{ $properties->links() }}
                    </div>
                    <div class="col-12 col-md-12 col-lg-6 p-3 full-height">
                        <div class="map-container">
                            <div class="map" id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Script for leaflet.js
        // Setting the center of the map according to the selected locality
        var map = L.map('map').setView({
            lon: {{ $locality->longitude }},
            lat: {{ $locality->latitude }}
        }, 16);

        var marker = null;

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>',
            maxZoom: 50,
        }).addTo(map);

        @if (!$properties->isEmpty())
            @foreach ($properties as $property)
                L.marker({
                lat: {{ $property->latitude }},
                lon: {{ $property->longitude }},
                }).bindPopup('<img src="{{ asset('storage/img/property/' . $property->thumbnail()->first()->file_name) }}" style="width: 160px; height: 160px; object-fit:cover;margin:0px;margin-bottom:5px;"><p style="font-family:Inter,sans-serif;font-size:1.25rem;margin:0px;margin-bottom:5px;">{{ $property->property_name }}</p><p style="font-family:Inter;font-size:1rem;font-weight:500;margin:0px;margin-bottom:5px;">NPR. {{ $property->price }}</p>').addTo(map);
            @endforeach
        @endif
    </script>
@endsection
