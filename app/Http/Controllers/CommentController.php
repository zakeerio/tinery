<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    //
    public function store(Request $request,$id)
    {
        
        $attributes = request()->validate([
            'body' => 'required'
        ]);
        // dd($attributes);
        $attributes['user_id'] = auth()->id();

        $post = new Comment;
        $post->body = $attributes['body'];
        $post->user_id = auth()->id();;
        $post->itineraries_id = $id;
        $post->save();

        // $post->comments()->create($attributes);

        return back();
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back();
    }
}
