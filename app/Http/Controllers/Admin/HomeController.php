<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\User;
use App\Models\Property;

class HomeController extends Controller
{
    public function index(){
        $users = User::all();
        $properties = Property::all();
        return view('admin.home', compact('users', 'properties'));
    }
}
