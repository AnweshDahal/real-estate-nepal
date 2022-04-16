@extends ('layouts.admin.app')

@section('title')
    {{ 'All Properties | Real Estate Nepal' }}
@endsection

@section('contents')
    <div class="card m-auto">
        <div class="card-body">
            <h1 class="card-title">Properties</h1>
                <h6 class="card-subtitle mb-2 text-muted">View all properties listed in the system</h6>
                <hr>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="column">ID</th>
                            <th scope="column">Property Name</th>
                            <th scope="column">Listing Type</th>
                            <th scope="column">Category</th>
                            <th scope="column">Uploader</th>
                            <th scope="column">Locality</th>
                            <th scope="column">Address</th>
                            <th scope="column">Price (Rs.)</th>
                            <th scope="column">Size</th>
                            <th scope="column">Description</th>
                            <th scope="column"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties as $property)
                            <tr>
                                <td scope="row">{{ $property->id ?? '-' }}</td>
                                <td><a href="{{ route('property.show', $property->id) }}"
                                        class="link">{{ $property->property_name ?? '-' }}</a></td>
                                <td style="">{{ App\Models\Property::LISTING_TYPES[$property->listing_type] ?? '-' }}</td>
                                <td>{{ App\Models\Property::PROPERTY_CATEGORY[$property->property_category] ?? '-' }}</td>
                                <td>{{ $property->user->fullName() ?? '-' }}</td>
                                <td>{{ $property->locality->locality_name ?? '-' }}</td>
                                <td>{{ $property->address }}</td>
                                <td>{{ $property->priceForHumans() }}</td>
                                <td>{{ $property->property_size }} {{ App\Models\Property::UNITS[$property->unit] }}</td>
                                <td>{{ $property->description }}</td>
                                <td>
                                    <form action="{{ route('admin.property.destroy', $property->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@endsection
