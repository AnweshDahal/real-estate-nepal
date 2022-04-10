<?php

namespace App\Http\Controllers;

use App\Models\Locality;
use Illuminate\Http\Request;
use App\Models\Property;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $properties = Property::latest()->take(4)->with(['image' => function($query) {
            $query->where('is_thumbnail', true);
        }])->get();
        $localities = Locality::select('id', 'locality_name')->get();
        return view('home', compact('properties', 'localities'));
    }
}
