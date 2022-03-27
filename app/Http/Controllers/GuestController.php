<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class GuestController extends Controller
{
    // Index view for users that have not logged in
    public function index(){
        // Latest Properties with thumbnails
        $properties = Property::latest()->take(4)->with(['image' => function($query) {
            $query->where('is_thumbnail', true);
        }])->get();
        return view('welcome', compact('properties'));
    }
}
