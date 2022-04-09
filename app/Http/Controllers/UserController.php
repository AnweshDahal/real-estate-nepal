<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function show(User $user)
    {
        // Redirect the user to the login page if the
        // auch check fails
        if (!auth()->check()) {
            return redirect('login');
        }

        // 403 abort the user if they try to access the user settings 
        abort_if($user != auth()->user(), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookmarks = $user->likes;
        $properties = $user->properties;
        $sentVisitRequests = $user->sentVisitRequest;
        $recievedVisitRequests = $user->recievedVisitRequest;

        return view('users.settings', compact('user', 'bookmarks', 'properties', 'sentVisitRequests', 'recievedVisitRequests'));
    }
}
