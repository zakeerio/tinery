@extends('frontend.layouts.app')

{{-- @section('title', $title)
@section('meta_keywords', $meta_keywords)
@section('meta_description', $meta_description) --}}

@section('content')

    <div class="perfect py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="perfect-item ">
                        <h3 class="travel">Find the Perfect Travel Itinerary</h3>
                        <p class="filters-p">Filter by location, trip length, tag or user. Don’t see your location? New
                            itineraries are added by users everyday - or take it upon yourself to write the first one!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-section py-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="cards-item">
                        <div class="row">
                            @php
                                $locationsArr = [];
                            @endphp
                            @if (!empty($itineraries))
                                @foreach ($itineraries as $row)
                                    <div class="col-6 col-md-4 col-lg-3 ">
                                        @php
                                            $bgimage = !empty($row->seo_image) ? asset('/frontend/itineraries/' . $row->seo_image) : asset('frontend/images/annie-spratt.jpg');
                                        @endphp
                                        <div class="card bg-img position-relative p-0">
                                            <a href="{{ route('itinerary', ['slug' => $row->slug]) }}"
                                                class="h-100 text-decoration-none">
                                                <img src="{{ $bgimage }}" alt=""
                                                    class=" bright-70 h-100 bf-img w-100">
                                            </a>
                                            <div class=" position-absolute">
                                                <a href="{{ route('username', ['username' => $row->user->username]) }}"
                                                    class="d-inline-flex text-dark text-decoration-none">
                                                    <div class="Ellipse bg-white m-3 rounded-pill p-1 gap-1">
                                                        <div class="">
                                                            {{-- <img src="{{ asset('frontend/images/toro (2).png') }}" alt=""> --}}
                                                            @if ($row->user->profile != '')
                                                                <img src="{{ asset('frontend/profile_pictures/' . $row->user->profile) }}"
                                                                    alt="" class="width-48">
                                                            @else
                                                                <img src="{{ asset('frontend/profile_pictures/avatar.png') }}"
                                                                    alt="" class="width-48">
                                                            @endif
                                                        </div>
                                                        <div class="e-text-size  text-nowrap pe-2">
                                                            <span class="e-text-size ">{{ $row->user->name }}
                                                                {{ $row->user->lastname }}</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="heart-icon">
                                                @if (Auth::guard('user')->user())
                                                    @php
                                                        $query = \App\Models\Favorites::where('user_id', Auth::guard('user')->user()->id)
                                                            ->where('itineraries_id', $row->id)
                                                            ->get();
                                                    @endphp
                                                    @if ($query->count() == 1)
                                                        <a href="javascript:void(0)" data-role="removetowishlist"
                                                            data-id="{{ $row->id }}"> <img
                                                                src="{{ asset('frontend/images/border-heart.svg') }}"
                                                                alt="" class="path-img"></a>
                                                    @else
                                                        <a href="javascript:void(0)" data-role="addtowishlist"
                                                            data-id="{{ $row->id }}"> <img
                                                                src="{{ asset('frontend/images/Path.png') }}"
                                                                alt="" class="path-img"></a>
                                                    @endif
                                                @else
                                                    <a href="javascript:void(0)" data-role="addtowishlistnotlogin"> <img
                                                            src="{{ asset('frontend/images/Path.png') }}" alt=""
                                                            class="path-img"></a>
                                                @endif
                                            </div>
                                        </div>
                                        <a href="{{ route('itinerary', ['slug' => $row->slug]) }}"
                                            style="text-decoration:none;">
                                            <h4 class="h-4">{{ $row->title }}</h4>
                                        </a>
                                        <div class="tags">
                                            @if ($row->tags != '')
                                                @php
                                                    $itinerarytag = json_decode($row->tags);
                                                @endphp
                                                @foreach ($itinerarytag as $itinerarytag)
                                                    @php
                                                        $tag = $row->tagsdata($itinerarytag);
                                                    @endphp

                                                    @if ($tag)
                                                        <a href="{{ url('/tags/' . $tag->slug) }}">
                                                            <button class="foodie text-nowrap">
                                                                {{ $tag->name }}
                                                            </button>
                                                        </a>
                                                    @endif

                                                    {{-- {{ $itinerarytag }} --}}
                                                @endforeach
                                            @endif
                                        </div>
                                        @if ($row->location_id != null && $row->itinerarylocations)
                                            @php
                                                $link = route('itinerary', ['slug' => $row->slug]);
                                                $title = $row->title;

                                                $locationsArr[] = [
                                                    'url' => $link,
                                                    'title' => $title,
                                                    'lat' => $row->itinerarylocations->latitude,
                                                    'long' => $row->itinerarylocations->longitude,
                                                ];
                                            @endphp
                                        @endif
                                        <p class="city">
                                            {{ $row->location_id != null && $row->itinerarylocations ? $row->itinerarylocations->address_city : 'Location' }}
                                            | {{ $row->created_at->diffForHumans() }}</p>
                                    </div>

                                    @if ($row->location_id != null && $row->itinerarylocations)
                                        @php
                                            $locationsArr[] = [
                                                'description' => $row->title . '<br>' . Str::words($row->description ?? '', 5, ' ...') . '<br>' . $row->itinerarylocations->address_street . '<br>' . $row->itinerarylocations->address_city . '<br>' . $row->itinerarylocations->address_country,
                                                'lat' => $row->itinerarylocations->latitude,
                                                'long' => $row->itinerarylocations->longitude,
                                            ];
                                        @endphp
                                    @endif
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <hr>
    @if ($locationsArr)
        <div class="world py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <div id="homepagemap" style="height: 450px;"></div>
                    </div>
                </div>

            </div>
        </div>
    @endif

    @php
        $locationArrJson = json_encode($locationsArr);
    @endphp

    <script>
        $(document).ready(function() {
            if ($('#homepagemap').length > 0) {

                initMaps();
            }

            function initMaps() {

                // execute
                var locations = JSON.parse('<?php echo $locationArrJson; ?>');

                console.log(locations)

                var map = new google.maps.Map(document.getElementById('homepagemap'), {
                    zoom: 5,
                    /* Zoom level of your map */
                    center: new google.maps.LatLng(locations[0].lat, locations[0].long),

                    // center: new google.maps.LatLng(47.47021625, -100.47173475),
                    /* coordinates for the center of your map */
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                var infowindow = new google.maps.InfoWindow();

                var marker, i;

                locations.forEach(function(location) {
                    // Accessing individual properties
                    var description = location.description;
                    var lat = location.lat;
                    var long = location.long;

                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(lat, long),
                        map: map
                    });

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent(description);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));

                    // Perform actions with the location data
                    // console.log('Description:', description);
                    // console.log('Latitude:', lat);
                    // console.log('Longitude:', long);
                })
            }
        });
    </script>

@endsection
