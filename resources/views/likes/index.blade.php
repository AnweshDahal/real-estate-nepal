@extends('layouts.app')

@section('title')
    {{ 'Visit Requests | ' }}{{ config('app.name') }}
@endsection

@section('content')
    <div class="property-index-container">
        <div class="row w-100">
            <div class="col-12 col-md-12 col-lg-12 p-0 pe-3">
                <div class="bookmarked-properties-card">
                    <div class="card-section-title semi-bold">
                        Bookmarked Properties
                    </div>
                    @if (!$likes->isEmpty())
                        @foreach ($likes as $like)
                            <div class="card p-2">
                                <h2 class="light"><a href="{{ route('property.show', $like->property->id) }}"
                                        class="text-decoration-none">{{ $like->property->property_name }}</a></h2>
                                <p>By {{ $like->property->user->fullname() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p>No Visit Requests Recieved</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
