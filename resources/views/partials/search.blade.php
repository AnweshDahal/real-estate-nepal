<div class="search-section">
    <h1 class="section-title semi bold text-light text-center mb-3">Find a Home that Suits you!</h1>
    <form action="{{ route('property.search') }}" method="POST">
        @csrf
        <div class="searchbar">
            <select name="id" id="search" class="searchbar-text">
                <option selected disabled>Search a locality</option>
                @foreach ($localities as $locality)
                    <option value="{{ $locality->id }}">{{ $locality->locality_name }}</option>
                @endforeach
            </select>
            <button class="searchbar-btn text-theme-blue"><span class="material-icons">
                    search
                </span></button>
        </div>
    </form>
</div>
