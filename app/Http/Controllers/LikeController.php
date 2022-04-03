<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Like;
use App\Models\Property;

class LikeController extends Controller
{
    public function index()
    {
        $likes = Like::where('user_id', '=', auth()->user()->id)->get();

        // return 
    }
    public function store(Request $request)
    {

        if (Property::findOrFail($request->property_id)->user->id == auth()->user()->id){
            return redirect()->back()->with('error', 'You cannot bookmark your own property');
        }
        
        if (auth()->user()->hasLiked(Property::findOrFail($request->property_id))) {
            Like::where('user_id', '=', auth()->user()->id)->delete();

            return back()->with('success', 'Property removed from bookmark');
        }

        Like::create([
            'user_id' => auth()->user()->id,
            'property_id' => $request->property_id
        ]);

        return back()->with('success', 'Property bookmarked');
    }
}
