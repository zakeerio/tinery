<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($itineraries as $itinerary)
        <url>
            <loc>{{ url('/').'/itineraries/'.$itinerary->slug }}</loc>
            <lastmod>{{ $itinerary->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    @foreach ($pages as $page)
        <url>
            <loc>{{ url('/')."/".$page->slug }}</loc>
            <lastmod>{{ $page->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

</urlset>
