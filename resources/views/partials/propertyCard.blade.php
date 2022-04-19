<div class="property-card">
    <div class="card-header p-0">
        <div class="show-panel">
            <a href="/property/{{ $id }}" class="show-btn btn">View Property</a>
        </div>
        <div class="img">
            <img src="{{ asset('storage/img/property/' . $property->image->first()->file_name) }}" alt="">
        </div>
        <div class="type">For {{ $listing_type }}</div>
        <div class="property-type">
            {{ $property_category }}
        </div>
    </div>
    <div class="card-body">
        <div class="price">
            <div class="text-theme-blue">Rs.</div>
            <div class="amount">&nbsp;{{ number_format($price,2, '.', ',') }}</div>
        </div>
        <div class="house-details-1">
            <span class="name">{{ $property_name }}</span>
        </div>
        <div class="house-details-2">
            <span class="address">
                <span class="material-icons">
                    room
                </span>
                <span class="ms-1">{{ $address }}</span>
            </span>
            <span class="size">
                <span class="material-icons">
                    straighten
                </span>
                <span class="ms-1">{{ $property_size }}</span>
                <span class="ms-1">{{ App\Models\Property::UNITS[$unit] }}</span>
            </span>
        </div>
    </div>
</div>
