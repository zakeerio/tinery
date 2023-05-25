<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeDislike extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'user_id'];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }


}
