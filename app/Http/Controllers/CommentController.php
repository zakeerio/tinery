<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request,$id)
    {
        dd($request);
        $attributes = request()->validate([
            'body' => 'required'
        ]);

        $attributes['user_id'] = auth()->id();

        $post->comments()->create($attributes);

        return back();
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back();
    }
}
