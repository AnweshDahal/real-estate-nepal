<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Locality;

class GuestController extends Controller
{
    // Index view for users that have not logged in
    public function index(){
        // Latest Properties with thumbnails
        $properties = Property::latest()->take(4)->with(['image' => function($query) {
            $query->where('is_thumbnail', true);
        }])->get();
        $localities = Locality::select('id', 'locality_name')->get();
        return view('welcome', compact('properties'));
    }
}
