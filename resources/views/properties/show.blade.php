@extends('layouts.app')

@section('title')
    {{ $property->property_name . ' | ' }}{{ config('app.name') }}
@endsection

@section('content')
    <div class="show-page w-100">
        <div class="show-property-container">
            <div class="row mb-4">
                <div class="col-9">
                    <div class="card show-card p-2">
                        <h1 class="semi-bold ms-3 mt-2">{{ $property->property_name }} <span
                                class="text-muted light">#{{ $property->id }}</span></h1>
                        <p class="semi-bold text-muted ms-3">{{ $property->address }}</p>
                        @auth
                            <form action="{{ route('like') }}" method="post"
                                class="d-flex align-items-center justify-content-center mb-3">
                                @csrf
                                <input type="hidden" name="property_id" value="{{ $property->id }}">
                                <button type="submit"
                                    class="btn {{ auth()->user()->hasLiked($property)? 'btn-primary': 'btn-outline-primary' }}"><i
                                        class="bi bi-bookmark-fill"></i> {{ auth()->user()->hasLiked($property)? 'Bookmarked': 'Bookmark' }}</button>
                            </form>

                        @endauth
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-6 pe-0">
                                @if ($property->description)
                                    <p class="description-card">
                                        {{ $property->description }}
                                    </p>
                                @else
                                    <p class="description-card">
                                        No Description Available
                                    </p>
                                @endif
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 ps-0 pe-0">
                                <div class="description-card mb-3 d-flex flex-column">
                                    <span class="mb-1">
                                        <span class="bold">Locality: </span>
                                        {{ $property->locality->locality_name }}
                                    </span>
                                    <span class="mb-1">
                                        <span class="bold">Size: </span> {{ $property->property_size }}
                                        {{ App\Models\Property::UNITS[$property->unit] }}
                                    </span>
                                    <span>
                                        <span class="bold">Price: </span> <span class="text-theme-blue medium">Rs.
                                        </span>{{ number_format($property->price, 2, '.', ',') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card uploader-information p-2">
                        <span class="text-muted show-card-id light ms-3 mt-2">Uploader ID: <span
                                class="medium">{{ $property->user->id }}</span></span>
                        <div class="user-info mx-3 mb-3 mt-2">
                            <div class="profile-avatar ">
                                <img src="https://avatars.dicebear.com/api/open-peeps/:{{ $property->user->fullName() }}.svg"
                                    alt="">
                            </div>
                            <div class="user-details">
                                <h2 class="light text-dark my-2 username text-center">
                                    {{ $property->user->fullName() }}
                                </h2>
                                <p class="medium text-theme-blue text-center contact mb-0">
                                    @if (auth()->check())
                                        <a href="tel:{{ $property->user->phone_number }}"
                                            class="link">{{ $property->user->phone_number }}</a>
                                    @else
                                        {{ 'XXX-XXX-XXXX' }}
                                    @endif
                                </p>
                            </div>
                            @if (auth()->check())
                                <div class="d-flex mt-2 px-0">
                                    <form action="{{ route('visit_request.store') }}" method="post"
                                        class="w-100">
                                        @csrf
                                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                                        <input type="hidden" name="requestee" value="{{ $property->user_id }}">
                                        <div class="form-group mb-2">
                                            <input type="date" name="visit_date" id="visit_date" class="form-control"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-custom-success w-100">Request A Visit</button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="map-container">
                        <div id="map" class="map"></div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="property-thumbnail">
                        <img src="{{ asset('storage/img/property/' . $thumbnail->first()->file_name) }}" alt="" />
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card comment-card">
                        <div class="card-body">
                            <div class="card-title light">Comments</div>
                            <div class="comment-form">
                                <form action={{ route('comment.store') }} method="POST" id="commentForm"
                                    class="mb-3 d-flex">
                                    @csrf
                                    <input type="hidden" name="property_id" id="property_id" value="{{ $property->id }}">
                                    <div class="form-group col-10 me-2">
                                        <input type="text" name="comment" id="comment" class="form-control">
                                    </div>
                                    <div class="form-group col-1 d-flex">
                                        <input type="submit" value="Submit" class="btn btn-custom-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="w-100">
                        <div class="comments d-flex flex-column-reverse">
                            @if (!$property->comments->isEmpty())
                                @foreach ($property->comments as $comment)
                                    <div class="card mb-3 comment-card">
                                        <div class="comment-details d-flex justify-content-between p-2">
                                            <span class="commentor">{{ $comment->poster->fullName() }}</span>
                                            <span
                                                class="comment-date text-muted medium">{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                        </div>
                                        <div class="card-body">
                                            <p>
                                                {{ $comment->comment_text }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                Be the first to comment!
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // Script for leaflet.js
            var map = L.map('map', {
                dragging: false,
                scrollWheelZoom: "center",
            }).setView({
                lon: {{ $property->longitude }},
                lat: {{ $property->latitude }}
            }, 16);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>',
                maxZoom: 50,
            }).addTo(map);

            L.marker({
                lon: {{ $property->longitude }},
                lat: {{ $property->latitude }}
            }).bindPopup('Rs. {{ $property->price }}').addTo(map);
        })
    </script>
@endsection
