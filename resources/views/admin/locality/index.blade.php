@extends ('layouts.admin.app')

@section('title')
    {{ 'All Properties | Real Estate Nepal' }}
@endsection

@section('contents')
    <div class="card m-auto">
        <div class="card-body">
            <h1 class="card-title">Localities</h1>
            <h6 class="card-subtitle mb-2 text-muted">View all localities available in the system</h6>
            <a href="{{ route('admin.locality.create') }}" class="btn btn-dark">Add Locality</a>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="column">ID</th>
                        <th scope="column">Locality Name</th>
                        <th scope="column">Latitude</th>
                        <th scope="column">Longitude</th>
                        <th scope="column"></th>
                        <th scope="column"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($localities as $locality)
                        <tr>
                            <td scope="row">{{ $locality->id ?? '-' }}</td>
                            <td>{{ $locality->locality_name ?? '-' }}</td>
                            <td>{{ $locality->latitude ?? '-' }}</td>
                            <td>{{ $locality->longitude ?? '-' }}</td>
                            <td>
                                <form action="{{ route('admin.locality.destroy', $locality->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('admin.locality.edit', $locality->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
