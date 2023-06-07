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
        // dd($comment);
        $attributes = request()->validate([
            'type' => 'required'
        ]);
        // dd($attributes);
        $check = LikeDislike::where('comment_id',$comment->id)->get();
        if(count($check) == 0)
        {
            $attributes['user_id'] = auth()->id();

            $comment->likesDislikes()->create($attributes);    
        }     
        else
        {
            foreach($check as $check);

            $array = LikeDislike::find($check->id);
            $array->type = $attributes['type'];
            $array->save();
        }   

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
