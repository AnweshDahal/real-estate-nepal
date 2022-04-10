<div class="visit-request-list-item d-flex flex-row m-0 mb-2">
    <div class="request-status {{ strtolower($sentVisitRequest->status) }}" title="{{ $sentVisitRequest->status }}">
        @if ($sentVisitRequest->status == App\Models\VisitRequest::STATUS['ACCEPTED'])
            <span class="material-icons">
                thumb_up
            </span>
        @elseif ($sentVisitRequest->status == App\Models\VisitRequest::STATUS['REJECTED'])
            <span class="material-icons">
                thumb_down_alt
            </span>
        @else
            <span class="material-icons">
                schedule
            </span>
        @endif
    </div>
    <div class="mb-1 d-flex flex-column">
        <span class="visit-date light">
            {{ $sentVisitRequest->visit_date }}
        </span>
        <span class="username medium">
            {{ $sentVisitRequest->requesteeInfo->fullname() }}
        </span>
    </div>
</div>
