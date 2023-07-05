<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sitemap;
use App\Models\Itineraries;

class SitemapController extends Controller
{
    public function index() {
        Sitemap::truncate();

        $query = Itineraries::all();
        if(!empty($query))
        {
            foreach($query as $row)
            {
                $arr = new Sitemap;
                $arr->url = url('/').'/itineraries/'.$row->slug;
                $arr->description = $row->title;
                $arr->save();
            }
        }
        $data = [
            ['description' => 'Home', 'url' => url('/')],
            ['description' => 'Itineraries', 'url' => url('/').'/itineraries'],
            ['description' => 'Term of use', 'url' => url('/').'/term-of-use'],
            ['description' => 'Privacy policy', 'url' => url('/').'/privacy-policy'],
        ];
        
        Sitemap::insert($data);

        $posts = Sitemap::all();
        
        return response()->view('frontend.pages.sitemap', [
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
      }
}
