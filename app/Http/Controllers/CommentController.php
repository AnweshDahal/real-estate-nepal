<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (!auth()->check()){
            return back()->with('error', 'You need to be logged in!');
        }
        
        $comment = Comment::create([
            'user_id' => auth()->user()->id,
            'property_id' => $request->property_id,
            'comment_text' => $request->comment,
        ]);

        return back();
    }
}
