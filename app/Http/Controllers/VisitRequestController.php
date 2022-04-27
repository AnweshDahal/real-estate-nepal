<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitRequest;
use App\Models\Property;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class VisitRequestController extends Controller
{
    public function index()
    {
        $recievedVisitRequests = VisitRequest::where('requestee', auth()->user()->id)->get();
        $sentVisitRequests = VisitRequest::where('requestor', auth()->user()->id)->get();


        return view('visitRequests.index', compact('recievedVisitRequests', 'sentVisitRequests'));
    }
    
    public function store(Request $request){
        
        if (Property::findOrFail($request->property_id)->user->id == auth()->user()->id){
            return redirect()->route('property.show', ['property' => $request->property_id])->with('error', 'You cannot request a visiit request for your own property');
        }

        
        if (VisitRequest::where([
            ['requestor', '=', auth()->user()->id],
            ['property_id', '=', $request->property_id ], 
            ['visit_date', '=', $request->visit_date ]
        ])->first()){
            return redirect()->route('property.show', ['property' => $request->property_id])->with('error', 'You already have a pending request for this property');
        } 

        if (VisitRequest::where('requestor'))

        $visitRequest = VisitRequest::create([
            'requestor' => auth()->user()->id,
            'requestee' => $request->requestee,
            'property_id' => $request->property_id,
            'visit_date' => $request->visit_date,
            'status' => VisitRequest::STATUS['PENDING'],
        ]);
        

        return redirect()->route('property.show', ['property' => $request->property_id])->with('success', 'Visit Requested Successfully');
    }

    public function update(VisitRequest $visitRequest, Request $request)
    {
        // Bad Request if the status has already been set to other than PENDING
        abort_if($visitRequest->status != VisitRequest::STATUS['PENDING'], Response::HTTP_BAD_REQUEST, '400 Bad Request');

        // Abort if the person updating the status is not the requestee
        abort_if($visitRequest->requestee != auth()->user()->id, Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Updating the status
        $visitRequest->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'The Request has been ' . strtolower($request->status));
    }
}
