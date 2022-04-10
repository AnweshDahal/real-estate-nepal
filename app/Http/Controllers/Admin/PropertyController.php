<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();

        return view('admin.properties.index', compact('properties'));
    }

    public function destroy(Property $property)
    {
        $property->delete();

        return back()->with('success', 'Property deleted successfully');
    }
}
