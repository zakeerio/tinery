<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Favorites;
use App\Models\Comment;
use App\Models\ItineraryDays;
use App\Models\Tags;
use App\Models\ItineraryActivities;

class Itineraries extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'excerpt',
        'seo_title',
        'seo_description',
        'seo_image',
        'author',
        'categories',
        'tags',
        'address_street',
        'address_street_line1',
        'address_city',
        'address_state',
        'address_zipcode',
        'address_country',
        'latitude',
        'longitude',
        'phone',
        'website',
        'additional_info',
        'activities_data',
        'featured',
        'visibility',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorites::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function itinerarydays()
    {
        return $this->hasMany(ItineraryDays::class);
    }

    public function itineraryactivities()
    {
        return $this->ItineraryActivities(Comment::class);
    }

    public function tagsdata($tags){
        
        $singletag = Tags::find($tags);

        return $singletag;
    }
}
