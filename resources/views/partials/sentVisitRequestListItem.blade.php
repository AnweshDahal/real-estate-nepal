<div class="visit-request-list-item d-flex flex-row m-0 mb-2">
    <div class="request-status {{ strtolower($sentVisitRequest->status) }}">
        @if ($sentVisitRequest->status == App\Models\VisitRequest::STATUS['ACCEPTED'])
            <i class="bi bi-hand-thumbs-up"></i>
        @elseif ($sentVisitRequest->status == App\Models\VisitRequest::STATUS['REJECTED'])
            <i class="bi bi-hand-thumbs-down"></i>
        @else
            <i class="bi bi-clock"></i>
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