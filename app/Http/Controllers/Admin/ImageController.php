<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function index(){
        $images = Image::all();

        return view('admin.images.index', compact('images'));
    }

    public function destroy(Image $image){

        DB::transaction((function() use($image) {
            $property = $image->property;

            $property->delete();

            $image->delete();
        }));

        return back()->with('success', 'The property has been deleted');
    }
}
