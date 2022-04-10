<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserStatus;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        if ($user->id === 1){
            return back()->with('error', 'This action cannot be performed for this user, please contact your database administrator!');
        }

        $user->delete();

        return back()->with('success', 'User removed successfully');
    }

    public function patch(User $user, Request $request)
    {
        if ($user->id === 1){
            return back()->with('error', 'This action cannot be performed for this user, please contact your database administrator!');
        }

        $userStatus = UserStatus::where('user_id', '=', $user->id)->get();

        if ($userStatus->isEmpty()){
            return back()->with('error', 'Something went wrong.');
        }
        if ($userStatus->first()->role == UserStatus::ROLES['admin']){
            $userStatus->first()->role = UserStatus::ROLES['user'];
        } else {
            $userStatus->first()->role = UserStatus::ROLES['admin'];
        }
        $userStatus->first()->save();

        return back()->with('success', 'Status changed successfully.');
    }
}
