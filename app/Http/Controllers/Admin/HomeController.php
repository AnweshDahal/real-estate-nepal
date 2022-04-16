<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\User;
use App\Models\Property;
use App\Models\Locality;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(){
        $users = User::all();
        $properties = Property::all();
        $propertiesGrouped = Property::all()->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('F');
        });
        $localities = Locality::orderBy('locality_name')->get();
        return view('admin.home', compact('users', 'properties', 'propertiesGrouped', 'localities'));
    }
}
