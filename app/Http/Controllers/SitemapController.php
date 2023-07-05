<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sitemap;
use App\Models\Itineraries;
use App\Models\CrudPages;


class SitemapController extends Controller
{
    public function index() {
        Sitemap::truncate();

        $itineraries = Itineraries::where('itinerary_status','updated')->where('status','published')->orderBy('updated_at', 'DESC')->get();
        $pages = CrudPages::all();

        return response()->view('frontend.pages.sitemap', compact('itineraries', 'pages'))->header('Content-Type', 'text/xml');
      }
}
