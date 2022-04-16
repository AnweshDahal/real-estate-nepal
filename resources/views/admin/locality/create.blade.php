@extends ('layouts.admin.app')

@section('title')
    {{ 'Create Locality | Real Estate Nepal' }}
@endsection

@section('contents')
    <div class="card m-auto mb-3">
        <div class="card-body">
            <h1 class="card-title">Localities</h1>
            <h6 class="card-subtitle mb-2 text-muted">Add a new Locality</h6>
            <hr>
            <form action="{{ route('admin.locality.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="locality_name">Locality Name</label>
                    <input type="text" name="locality_name" id="locality_name" class="form-control">
                </div>
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="map-container">
                            <div class="map" id="map"></div>
                        </div>
                    </div>
                </div>
                <div class="form-gtoup mt-3">
                    <input type="submit" value="Submit" class="btn btn-dark">
                </div>
            </form>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Script for leaflet.js
        // Setting the center of the map according to the selected locality
        var map = L.map('map').setView({
            lon: 85.300140,
            lat: 27.700769
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
    </script>
@endsection
