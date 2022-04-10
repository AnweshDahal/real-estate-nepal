@extends ('layouts.admin.app')

@section('title')
    {{ 'Create Locality | Real Estate Nepal' }}
@endsection

@section('contents')
    <div class="card m-auto">
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
                <div class="form-group mt-3">
                    <label for="latitude">Latitude</label>
                    <input type="text" name="latitude" id="latitude" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="longitude">Longitude</label>
                    <input type="text" name="longitude" id="longitude" class="form-control">
                </div>
                <div class="form-gtoup mt-3">
                    <input type="submit" value="Submit" class="btn btn-dark">
                </div>
            </form>
        </div>
    </div>
@endsection
