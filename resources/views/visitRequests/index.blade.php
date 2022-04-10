@extends('layouts.app')

@section('title')
    {{ 'Visit Requests | ' }}{{ config('app.name') }}
@endsection

@section('content')
    <div class="property-index-container">
        <div class="row w-100">
            <div class="col-12 col-md-12 col-lg-6 p-0 pe-3">
                <div class="section-title semi-bold text-theme-blue mb-3">
                    Recieved Visit Requests
                </div>
                <div class="card p-0 border-0">
                    @if (!$recievedVisitRequests->isEmpty())
                        @foreach ($recievedVisitRequests as $recievedVisitRequest)
                            @include(
                                'partials.recievedVisitRequestListItem',
                                $recievedVisitRequest
                            )
                        @endforeach
                    @else
                        <p>No Visit Requests Recieved</p>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6 p-0 pe-3">
                <div class="section-title semi-bold text-theme-blue mb-3">
                    Sent Visit Requests
                </div>
                <div class="card p-0 border-0">
                    @if (!$sentVisitRequests->isEmpty())
                        @foreach ($sentVisitRequests as $sentVisitRequest)
                            @include(
                                'partials.sentVisitRequestListItem',
                                $sentVisitRequest
                            )
                        @endforeach
                    @else
                        <p>No Visit Requests Recieved</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
