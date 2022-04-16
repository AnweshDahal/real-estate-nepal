@extends ('layouts.admin.app')

@section('contents')
    <h1 class="fw-light">Real Estate Nepal Admin Dashboard</h1>
    <div class="row mt-3">
        <div class="col-2">
            <div class="card d-flex bg-primary text-light">
                <div class="card-body">
                    <h2 class="mb-0">{{ $users->count() }}</h2>
                    <p class="mb-0">Users</p>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card d-flex bg-success text-light">
                <div class="card-body">
                    <h2 class="mb-0">{{ $properties->count() }}</h2>
                    <p class="mb-0">Properties</p>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card d-flex bg-danger text-light">
                <div class="card-body">
                    <h2 class="mb-0">{{ $localities->count() }}</h2>
                    <p class="mb-0">Localities</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <h2 class="fw-light mb-0">Infographics</h2>
        </div>
        <div class="row mt-3 d-flex justify-content-between align-items-start">
            <div class="col-4">
                {{-- Listing Types --}}
                <h3 class="text-center">Listings According to Type </h3>
                <canvas id="listing-types-pie" style="width: 100%; height: 400px;"></canvas>
            </div>
            <div class="col-6">
                {{-- Property Category --}}
                <h3 class="text-center">Properteis according to Categories</h3>
                <canvas id="category-bar" style="width: 100%; height: 500px;"></canvas>
            </div>
        </div>
    </div>
    <div class="row mt-3 mb-3">
        <div class="col-12">
            {{-- Listing Frequency --}}
            <h3>Monthly Listings this year</h3>
            <canvas id="listing-frequency" style="width:100%; height: 500px"></canvas>
        </div>
    </div>
    <div class="row mt-3 mb-3">
        <div class="col-6">
            <h3>Total listings per locality</h3>
            <div class="localities-table p-0 m-0">
                <table class=" table table-striped table-hover overflow-auto w-100">
                    <thead class="bg-dark">
                        <tr>
                            <th class="text-light p-2">Locality Name</th>
                            <th class="text-light p-2">Total Listings</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($localities as $locality)
                            <tr>
                                <td class="text-dark p-2">{{ $locality->locality_name }}</td>
                                <td class="text-dark p-2">{{ $locality->properties->count() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Using google charts to display information using illustrations --}}
    <script>
        // Getting the DOM element
        const ctx = document.getElementById('category-bar').getContext('2d');
        // Defining a new chart
        const myChart = new Chart(ctx, {
            type: 'bar', // The type of chart
            data: {
                labels: ['House', 'Apartment', 'Land', 'Rent', ], // Labels for the data
                datasets: [{
                    label: 'Number of Properties', // Label for each Bar
                    // Data to be displayed 
                    data: [{{ $properties->where('property_category', '=', App\Models\Property::PROPERTY_CATEGORY['HOUSE'])->count() }},
                        {{ $properties->where('property_category', '=', App\Models\Property::PROPERTY_CATEGORY['APARTMENT'])->count() }},
                        {{ $properties->where('property_category', '=', App\Models\Property::PROPERTY_CATEGORY['LAND'])->count() }},
                        {{ $properties->where('property_category', '=', App\Models\Property::PROPERTY_CATEGORY['ROOM'])->count() }},
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        const lF = document.getElementById('listing-frequency').getContext('2d');
        const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
            'November', 'December'
        ];
        const typeLine = new Chart(lF, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: "Listed Properties",
                    data: [
                        {{ isset($propertiesGrouped['January']) ? $propertiesGrouped['January']->count() : 0 }},
                        {{ isset($propertiesGrouped['February']) ? $propertiesGrouped['February']->count() : 0 }},
                        {{ isset($propertiesGrouped['March']) ? $propertiesGrouped['March']->count() : 0 }},
                        {{ isset($propertiesGrouped['April']) ? $propertiesGrouped['April']->count() : 0 }},
                        {{ isset($propertiesGrouped['May']) ? $propertiesGrouped['May']->count() : 0 }},
                        {{ isset($propertiesGrouped['June']) ? $propertiesGrouped['June']->count() : 0 }},
                        {{ isset($propertiesGrouped['July']) ? $propertiesGrouped['July']->count() : 0 }},
                        {{ isset($propertiesGrouped['August']) ? $propertiesGrouped['August']->count() : 0 }},
                        {{ isset($propertiesGrouped['September']) ? $propertiesGrouped['September']->count() : 0 }},
                        {{ isset($propertiesGrouped['October']) ? $propertiesGrouped['October']->count() : 0 }},
                        {{ isset($propertiesGrouped['November']) ? $propertiesGrouped['November']->count() : 0 }},
                        {{ isset($propertiesGrouped['December']) ? $propertiesGrouped['December']->count() : 0 }},
                    ],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1,
                }]
            }
        });
    </script>

    <script>
        const ltp = document.getElementById('listing-types-pie').getContext('2d');

        const typePie = new Chart(ltp, {
            type: 'doughnut',
            data: {
                labels: ['Sale', 'Rent'],
                datasets: [{
                    label: "Number of Properties",
                    data: [
                        {{ $properties->where('listing_type', '=', App\Models\Property::LISTING_TYPES['SALE'])->count() }},
                        {{ $properties->where('listing_type', '=', App\Models\Property::LISTING_TYPES['RENT'])->count() }}
                    ],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                    ],
                    hoverOffset: 10,
                }]
            }
        });
    </script>
@endsection
