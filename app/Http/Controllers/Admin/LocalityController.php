<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Locality;

class LocalityController extends Controller
{
    public function index()
    {
        $localities = Locality::all();

        return view('admin.locality.index', compact('localities'));
    }

    public function create()
    {
        return view('admin.locality.create');
    }

    public function store(Request $request)
    {
        $locality = Locality::create([
            'locality_name' => $request->locality_name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('admin.locality.index')->with('success', 'Locality created successfully');
    }

    public function edit(Locality $locality)
    {
        return view('admin.locality.edit', compact('locality'));
    }

    public function update(Locality $locality, Request $request){
        $locality->update($request->all());

        return redirect()->route('admin.locality.index')->with('success', 'Locality updated successfully');
    }

    public function destroy(Locality $locality){
        $locality->delete();

        return redirect()->route('admin.locality.index')->with('success', 'Locality deleted successfully');
    }
}
