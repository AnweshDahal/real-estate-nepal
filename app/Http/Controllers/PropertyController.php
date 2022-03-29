<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Locality;
use App\Models\Image;
use App\Models\Property;
use App\Http\Requests\StorePropertyRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class PropertyController extends Controller
{

    public function index()
    {
        $properties = Property::all();
        if (request()->input('type') == 'buy'){
            $properties = $properties->where('listing_type', Property::LISTING_TYPES['SALE']);
        } else if (request()->input('type') == 'rent'){
            $properties = $properties->where('listing_type', Property::LISTING_TYPES['RENT']);
        } else {
            return redirect()->route('home');
        }

        return view('properties.index', compact('properties'));

    }

    public function create()
    {
        abort_if(!auth()->check(), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $localities = Locality::all(); // fetching all properties from the dB
        return view('properties.create', compact('localities'));
    }

    public function store(StorePropertyRequest $request)
    {
        DB::transaction(function () use ($request) {
            $property = Property::create([
                'user_id' => auth()->id(),
                'locality_id' => $request->locality_id,
                'listing_type' => $request->listing_type,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'property_name' => $request->property_name,
                'property_category' => $request->property_category,
                'description' => $request->description,
                'price' => $request->price,
                'property_size' => $request->property_size
            ]);

            $thumbnail_name = $property->id . Carbon::now()->format('YMDHis') . '.' . $request->file('thumbnail')->extension();

            $request->file('thumbnail')->move(public_path('storage/img/property'), $thumbnail_name);

            $image = Image::create([
                'property_id' => $property->id,
                'file_name' => $thumbnail_name,
                'is_thumbnail' => true,
            ]);
        });

        return redirect()->route('home')
            ->with('success', 'The property has been listed successfully!');
    }

    public function show(Property $property){
        $thumbnail = Image::where('property_id', $property->id)->where('is_thumbnail', 1)->get();

        return view('properties.show', compact('property', 'thumbnail'));
    }
}
