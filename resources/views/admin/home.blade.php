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
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <h2 class="fw-light mb-0">Infographics</h2>
        </div>
        <div class="row mt-3 d-flex justify-content-between align-items-center">
            <div class="col-4">
                {{-- Listing Types --}}
                <canvas id="listing-types-pie" style="width: 100%; height: 400px;"></canvas>
            </div>
            <div class="col-6">
                {{-- Property Category --}}
                <canvas id="category-bar" style="width: 100%; height: 500px;"></canvas>
            </div>
        </div>
    </div>
    <div class="row mt-3">

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
                    data: [{{ $properties->where('property_category', '=', 'HOUSE')->count() }},
                        {{ $properties->where('property_category', '=', 'APARTMENT')->count() }},
                        {{ $properties->where('property_category', '=', 'LAND')->count() }},
                        {{ $properties->where('property_category', '=', 'ROOM')->count() }},
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
        const ltp = document.getElementById('listing-types-pie').getContext('2d');

        const typePie = new Chart(ltp, {
            type: 'doughnut',
            data: {
                labels: ['Sale', 'Rent'],
                datasets: [{
                    label: "Number of Properties",
                    data: [
                        {{ $properties->where('listing_type', '=', 'SALE')->count() }},
                        {{ $properties->where('listing_type', '=', 'RENT')->count() }}
                    ],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                    ],
                    hoverOffset: 10,
                }]
            }
        })
    </script>
@endsection
