@extends ('layouts.admin.app')

@section('title')
    {{ 'All Properties | Real Estate Nepal' }}
@endsection

@section('contents')
    <div class="card m-auto">
        <div class="card-body">
            <h1 class="card-title">Images</h1>
            <h6 class="card-subtitle mb-2 text-muted">View all Images available in the system</h6>
        </div>
        <div class="row mt-3 mb-3 p-3 d-flex">
            @foreach ($images as $image)
                <div class="col-6 col-md-4 col-lg-3 d-flex mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/img/property/' . $image->file_name) }}" class="thumbnail"
                            alt="{{ $image->property->property_name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $image->property->property_name }}</h5>
                            <p class="text-muted">By: {{ $image->property->user->fullName() }}</p>
                            
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('admin.image.destroy', $image->id) }}" method="post">
                                @csrf 
                                @method('delete')
                                <input type="submit" value="Delete Property" class="btn btn-danger btn-sm">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
