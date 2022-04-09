@extends('layouts.app')

@section('title')
    {{ auth()->user()->fullName() }}{{ ' | ' }}{{ config('app.name') }}
@endsection

@section('content')
    <div class="user-settings__content">
        <div class="user-settings__container">
            <div class="card user-settings__card user-info-card">
                <div class="row user-settings__card-row">
                    <div class="col-12 col-md-6 col-lg-1 user-image-wrapper">
                        <img src="https://avatars.dicebear.com/api/initials/{{ $user->first_name }}.svg" alt=""
                            class="user-image">
                    </div>
                    <div class="col-12 col-md-6 col-lg-8 user-name-wrapper">
                        <p class="user-setting__name semi-bold mb-0">
                            {{ $user->fullName() }}<span class="text-muted light"> #{{ $user->id }}</span>
                        </p>
                        <p class="user-setting__details text-muted medium d-flex align-items-center">
                            <span class="material-icons me-1">
                                email
                            </span> <span class="me-3">{{ $user->email }}</span><span
                                class="material-icons me-1">
                                call
                            </span><span class="me-3">{{ $user->phone_number }}</span>
                        </p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2"></div>
                </div>
            </div>
            <div class="row m-0 mt-3">
                <div class="col-12 col-md-12 col-lg-3 p-0 pe-3">
                    <div class="card user-settings__card nav-card ">
                        <button class="nav-tab" id="properties-tab"><span class="material-icons">
                                maps_home_work
                            </span> Properties</button>
                        <button class="nav-tab" id="bookmarks-tab"><span class="material-icons">
                                bookmark
                            </span> Bookmarks</button>
                        <button class="nav-tab" id="sent-visit-requests-tab"><span class="material-icons">
                                send
                            </span> Sent Visit Requests</button>
                        <button class="nav-tab" id="recieved-visit-requests-tab"><span class="material-icons">
                                inbox
                            </span> Recieved Visit Requests</button>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-9 user-settings__info-card p-0">
                    <div class="card user-settings__card properties mb-3 d-none" id="properties">
                        <div class="card-title">My Properties</div>
                        @if (!$properties->isEmpty())
                            @foreach ($properties as $property)
                                <div class="property-list-item mt-3">
                                    <img src="{{ asset('storage/img/property/' . $property->image->first()->file_name) }}"
                                        alt="" class="thumbnail">
                                    <p class="property-info d-flex flex-column">
                                        <span class="property-name medium">{{ $property->property_name }} <span
                                                class="text-muted light">#{{ $property->id }}</span></span>
                                        <span class="address text-muted medium">
                                            {{ $property->address }}
                                        </span>
                                        <span class="medium price">
                                            <span class="bold text-theme-blue">Rs.</span> <span
                                                class="bold">{{ $property->price }}</span>
                                        </span>
                                    </p>
                                </div>
                            @endforeach
                        @else
                            <div class="not-found">
                                <span>Looks like you haven't listed any properties</span>
                            </div>
                        @endif
                    </div>
                    <div class="card user-settings__card bookmarks mb-3 d-none" id="bookmarks">
                        <div class="card-title">Bookmarked Properties</div>
                        @if (!$bookmarks->isEmpty())
                            @foreach ($bookmarks as $bookmark)
                                <div class="property-list-item mt-3">
                                    <img src="{{ asset('storage/img/property/' . $bookmark->property->image->first()->file_name) }}"
                                        alt="" class="thumbnail">
                                    <p class="property-info d-flex flex-column">
                                        <span class="property-name medium">{{ $bookmark->property->property_name }} <span
                                                class="text-muted light">#{{ $bookmark->property->id }}</span></span>
                                        <span class="address text-muted medium">
                                            {{ $bookmark->property->address }}
                                        </span>
                                        <span class="medium price">
                                            <span class="bold text-theme-blue">Rs.</span> <span
                                                class="bold">{{ $bookmark->property->price }}</span>
                                        </span>
                                    </p>
                                </div>
                            @endforeach
                        @else
                            <div class="not-found">
                                <span>Looks like you haven't bookmarked any properties!</span>
                            </div>
                        @endif
                    </div>
                    <div class="card user-settings__card sent-visit-requests mb-3 d-none" id="sent-visit-requests">
                        <div class="card-title">Sent Visit Requests</div>
                        @if (!$sentVisitRequests->isEmpty())
                            @foreach ($sentVisitRequests as $sentVisitRequest)
                                @include(
                                    'partials.sentVisitRequestListItem',
                                    $sentVisitRequest
                                )
                            @endforeach
                        @else
                            <div class="not-found">
                                <span>Looks like you haven't sent any visit requests!</span>
                            </div>
                        @endif
                    </div>
                    <div class="card user-settings__card recieved-visit-requests d-none" id="recieved-visit-requests">
                        <div class="card-title mb-3">Recieved Visit Request</div>
                        @if (!$recievedVisitRequests->isEmpty())
                            @foreach ($recievedVisitRequests as $recievedVisitRequest)
                                @include(
                                    'partials.recievedVisitRequestListItem',
                                    $recievedVisitRequest
                                )
                            @endforeach
                        @else
                            <div class="not-found">
                                <span>Looks like you haven't recieved any visit requests!</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var currentTab = document.getElementById('properties-tab');
        currentTab.classList.toggle('active');
        var currentDisplay = document.getElementById('properties');
        currentDisplay.classList.toggle('d-none');


        document.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('properties-tab').addEventListener('click', (event) => {
                event.preventDefault();
                clickTab('properties')
            });

            document.getElementById('bookmarks-tab').addEventListener('click', (event) => {
                event.preventDefault();
                clickTab('bookmarks')
            });

            document.getElementById('sent-visit-requests-tab').addEventListener('click', (event) => {
                event.preventDefault();
                clickTab('sent-visit-requests')
            });

            document.getElementById('recieved-visit-requests-tab').addEventListener('click', (event) => {
                event.preventDefault();
                clickTab('recieved-visit-requests')
            });
        });

        var clickTab = (tabName) => {
            if (currentTab) {
                currentTab.classList.toggle("active");
            }
            currentTab = document.getElementById(`${tabName}-tab`);
            currentTab.classList.toggle('active');

            if (currentDisplay) {
                currentDisplay.classList.toggle('d-none');
            }

            currentDisplay = document.getElementById(tabName);
            currentDisplay.classList.toggle('d-none');
        }
    </script>
@endsection
