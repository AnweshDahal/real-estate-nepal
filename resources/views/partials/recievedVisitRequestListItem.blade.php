<div class="visit-request-list-item d-flex flex-column m-0 mb-2">
    <div class="mb-1 d-flex flex-column">
        <span class="username medium">
            {{ $recievedVisitRequest->requestorInfo->fullname() }}
        </span>
        <span class="visit-date light">
            {{ $recievedVisitRequest->visit_date }}
        </span>
    </div>
    <div class="d-flex justify-content-end">
        @if ($recievedVisitRequest->status == App\Models\VisitRequest::STATUS['PENDING'])
            <form action="{{ route('visit_request.update', $recievedVisitRequest->id) }}" class="me-2"
                method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="{{ App\Models\VisitRequest::STATUS['ACCEPTED'] }}">
                <input type="submit" value="Accept" class="btn btn-sm btn-success">
            </form>
            <form action="{{ route('visit_request.update', $recievedVisitRequest->id) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="{{ App\Models\VisitRequest::STATUS['REJECTED'] }}">
                <input type="submit" value="Reject" class="btn btn-danger btn-sm">
            </form>
        @else
            {{ 'This request has been '}}{{ strtolower($recievedVisitRequest->status )}}
        @endif
    </div>
</div>
