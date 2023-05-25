<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikeDislike;
use App\Models\Comment;

class LikeDislikeController extends Controller
{
    //
    public function store(Comment $comment)
    {
        $attributes = request()->validate([
            'type' => 'required'
        ]);

        $attributes['user_id'] = auth()->id();

        $comment->likesDislikes()->create($attributes);

        return back();
    }

    public function update(LikeDislike $likeDislike)
    {
        $likeDislike->update(['type' => request('type')]);

        return back();
    }

    public function destroy(LikeDislike $likeDislike)
    {
        $likeDislike->delete();

        return back();
    }
}
