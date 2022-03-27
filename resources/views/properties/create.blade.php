@extends('layouts.app')

@section('title')
    {{ 'Create a New Property Listing | ' }}{{ config('app.name') }}
@endsection

@section('content')
    <div class="login-container d-flex align-items-center justify-content-center">
        <div class="container d-flex flex-column align-items-center justify-content-center">
            <div class="card create-listing-card w-100">
                <div class="row m-0">
                    <div class="col-12 col-md-12 col-lg-6 create-listing">
                        <div class="form-title semi-bold mb-3 condensed-4">Create a Listing of Your Property</div>
                        <form method="POST" action="{{ route('property.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="listingType" class="semi-bold mb-1">I want to</label><br />
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="listing_type"
                                        id="listingTypeRadioButton1" value="{{ App\Models\Property::LISTING_TYPES['SALE'] }}
                                                                                        ">
                                    <label class="form-check-label">Sell</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="listing_type"
                                        id="listingTypeRadioButton2"
                                        value="{{ App\Models\Property::LISTING_TYPES['RENT'] }}">
                                    <label class="form-check-label">Rent</label>
                                </div>
                                @error('listing_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="propertyCategory" class="semi-bold mb-1">Property Category</label><br />
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="property_category" value="{{ App\Models\Property::PROPERTY_CATEGORY['LAND'] }}
                                                                                        ">
                                    <label class="form-check-label">Land</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="property_category"
                                        value="{{ App\Models\Property::PROPERTY_CATEGORY['HOUSE'] }}">
                                    <label class="form-check-label" for="inlineRadio2">House</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="property_category" value="{{ App\Models\Property::PROPERTY_CATEGORY['APARTMENT'] }}
                                                                                        ">
                                    <label class="form-check-label" for="inlineRadio1">Apartment</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="property_category"
                                        value="{{ App\Models\Property::PROPERTY_CATEGORY['ROOM'] }}">
                                    <label class="form-check-label">Room</label>
                                </div>
                                @error('listing_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <hr>
                            <div class="form-group mb-3">
                                <p class="semi-bold m-0 p-0">Address</p>
                            </div>
                            {{-- Select bar for locality --}}
                            <div class="form-group mb-3">
                                <select class="form-select" id="locality_id" name="locality_id"
                                    aria-label="Default select example">
                                    <option selected disabled>Select a Locality</option>
                                    @foreach ($localities as $locality)
                                        <option value="{{ $locality->id }}" data-latitude="{{ $locality->latitude }}"
                                            data-longitude="{{ $locality->longitude }}">{{ $locality->locality_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('locality_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- Input for property address --}}
                            <div class="form-group mb-3">
                                <label for="address" class="regular mb-1">Address</label>
                                <input type="text" name="address" id="address" class="form-control" required>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Latitude and Longitude --}}
                            <div class="form-group mb-3 d-none">
                                <label for="" class="regular mb-1">Latitude and Longitude</label>

                                <div class="input-group">
                                    <input type="text" aria-label="Latitude" name="latitude" id="latitude"
                                        class="form-control" placeholder="Latitude">
                                    <input type="text" name="longitude" aria-label="Longitude" id="longitude"
                                        class="form-control" placeholder="Longitude">
                                </div>
                                @error('latitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @error('longitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- Property Name --}}
                            <div class="form-group mb-3">
                                <label for="property_name" class="regular mb-1">Property Name</label>
                                <input type="text" name="property_name" id="property_name" class="form-control">
                                @error('property_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- Property Size --}}
                            <div class="form-group mb-3">
                                <label for="property_size" class="regular mb-1">Property Size</label>
                                <input type="text" name="property_size" id="property_size" class="form-control">
                                @error('property_size')
                                    <span class="invalid-feedback" role="alert">
                                        qwqwqw
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- Property Price --}}
                            <div class="form-group mb-3">
                                <label for="piceAddon" class="regular mb-1">Property Price</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="priceAddon">Rs.</span>
                                    </div>
                                    <input type="number" class="form-control" name="price" aria-label="propertyPrice"
                                        aria-describedby="priceAddon">
                                </div>
                            </div>
                            {{-- Property Description --}}
                            <div class="form-group mb-3">
                                <label for="description" class="regular mb-1">Description</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Description of the property"
                                    rows="5"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- Property Images --}}
                            <div id="imagesPreview" class="images-preview">
                                <img src="" alt="" id="thumbnail" class="thumbnail">
                            </div>
                            <div class="form-group mb-3">
                                <label for="thumbnail" class="regular mb-1">Upload a thumbnail for the property</label>
                                <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                @error('thumbnail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-custom-success semi-bold w-100 mb-2">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6 p-3 ">
                        <div class="form-group map-container">
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
            lon: {{ $localities->first()->longitude }},
            lat: {{ $localities->first()->latitude }}
        }, 16);
        var marker = null;
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>',
            maxZoom: 50,
        }).addTo(map);

        map.on('click', function(e) {

            if (marker != null) map.removeLayer(marker);

            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;

            marker = L.marker({
                lon: e.latlng.lng,
                lat: e.latlng.lat
            }).bindPopup('Home').addTo(map);

        });

        // Getting the select element
        var localitySelect = document.getElementById('locality_id');

        localitySelect.addEventListener('change', (e) => {
            let element = e.target || e.srcElement;
            let selectedOption = element.options[element.selectedIndex];
            let latitude = selectedOption.getAttribute('data-latitude');
            let longitude = selectedOption.getAttribute('data-longitude');
            map.panTo(new L.LatLng(latitude, longitude));
        });
    </script>
@endsection
