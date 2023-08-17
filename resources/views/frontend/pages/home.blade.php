@extends('frontend.layouts.app')

@section('content')

    <div class="align-items-center d-flex hero-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 px-0">
                    <div class="">
                        <h2 class="hero-content-h2">{{ config('settings.banner_title') }}</h2>
                        <p class="hero-c-p hero-content-p">
                            {{ config('settings.banner_description') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="explore">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-11 px-0">
                    <div class="explore-section pb-3 pt-5">
                        <div class="row">
                            <div class="d-flex justify-content-between align-items-center ">
                                <h1 class=" ">Explore Popular Travel Itineraries</h1>
                                <h2>
                                    <a href="{{ route('itineraries') }}" class="text-decoration-none text-dark">Explore All
                                        <img src="frontend/images/e-arrow.svg" alt="">
                                    </a>
                                </h2>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="card-section py-3  px-md-0">
        <div class="container mx-md-auto ">
            <div class="row justify-content-center">
                <div class="col-11 px-0">
                    <div class="cards-item">
                        <div class="row slickslider">
                            @php
                                $locationsArr = [];
                            @endphp
                            @if ($itineraries->count() > 0)
                                @foreach ($itineraries as $row)
                                    <div class="col-lg-3 ">
                                        @php
                                            $bgimage = !empty($row->seo_image) ? asset('frontend/itineraries/' . $row->seo_image) : asset('frontend/images/annie-spratt.jpg');
                                        @endphp
                                        {{-- <div class="card bg-img position-relative " --}}
                                        <div class="card bg-img position-relative r-12 ">
                                            <a href="{{ route('itinerary', ['slug' => $row->slug]) }}"
                                                class="h-100 r-12 text-decoration-none">
                                                <img src="{{ $bgimage }}" alt=""
                                                    class=" bright-70 h-100 r-12 bf-img w-100">
                                            </a>
                                            <div class=" position-absolute">
                                                <a href="{{ route('username', ['username' => $row->user->username]) }}"
                                                    class="d-inline-flex text-dark text-decoration-none">
                                                    <div class="Ellipse bg-white m-3 rounded-pill p-1 ">
                                                        <div class=" ">
                                                            {{-- <img src="{{ asset('frontend/images/toro (2).png') }}" alt=""> --}}
                                                            @if ($row->user->profile != '')
                                                                <img src="{{ asset('frontend/profile_pictures/' . $row->user->profile) }}"
                                                                    alt="" class="width-48 ">
                                                            @else
                                                                <img src="{{ asset('frontend/profile_pictures/avatar.png') }}"
                                                                    alt="" class="width-48">
                                                            @endif
                                                        </div>
                                                        <div class="e-text-size  text-nowrap pe-2">
                                                            <span class=" ps-2 pe-2 me-1 fs-16-300">{{ $row->user->name }}
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
                                            @php
                                                $itinerarytag = json_decode($row->tags);
                                            @endphp
                                            @foreach ($itinerarytag as $itinerarytag)
                                                @php
                                                    $tag = $row->tagsdata($itinerarytag);
                                                @endphp
                                                @if ($tag)
                                                    <a href="{{ url('/tags/' . $tag->slug) }}">
                                                        <button class="foodie">
                                                            {{ $tag->name }}
                                                        </button>
                                                    </a>
                                                @endif
                                            @endforeach
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
                                        <p class="city mt-3">
                                            {{ $row->location_id != null && $row->itinerarylocations ? $row->itinerarylocations->address_city : 'Location' }}
                                            | {{ $row->created_at->diffForHumans() }}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    @php
        $locationArrJson = json_encode($locationsArr);
    @endphp

    <div class="member-spot">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 ">

                    <div class="row col-12 m-0">
                        <h2 class="membr px-0">Members Spotlight</h2>

                        <!-- Hide on moible only -->

                        @forelse ($users as $userdata)
                            <div class="col-lg-4 col-md-6 mb-md-5 mb-4 d-none d-lg-block">
                                <div class="member-info d-flex p-xl-4 align-items-center justify-content-between ">
                                    <div class="d-flex align-items-center justify-content-start ">
                                        @if ($userdata->profile != '')
                                            <a href="{{ route('username', ['username' => $userdata->username]) }}"
                                                class="d-block">
                                                <img src="{{ asset('frontend/profile_pictures/' . $userdata->profile) }}"
                                                    alt="" class="rounded-circle member-img">
                                            </a>
                                        @else
                                            <a href="{{ route('username', ['username' => $userdata->username]) }}"
                                                class="d-block"> <img
                                                    src="{{ asset('frontend/profile_pictures/avatar.png') }}"
                                                    alt="" class="rounded-circle member-img"></a>
                                        @endif

                                        <div class="mx-md-3 mx-2">
                                            <a href="{{ route('username', ['username' => $userdata->username]) }}"
                                                class="d-block text-decoration-none">
                                                <h4 class="Benjamin">{{ $userdata->name }} {{ $userdata->lastname }}
                                                </h4>
                                            </a>
                                            <p class="Benjamin-p">{{ \Str::limit($userdata->bio, 100) }}</p>
                                        </div>
                                    </div>

                                    <div class="">
                                        <img src="{{ asset('frontend/images/black.png') }}" alt=""
                                            class="heart-img">
                                    </div>
                                </div>

                            </div>

                        @empty

                            <div class=" d-lg-block">No users found! </div>
                        @endforelse

                        <!-- display on moible only -->

                        @forelse ($users_mobile as $userdata)
                            <div class="col-lg-4 mb-md-5 col-md-6 mb-4  d-block d-lg-none">
                                <div class="member-info d-flex align-items-center justify-content-between ">
                                    <div class="d-flex align-items-center justify-content-start ">
                                        @if ($userdata->profile != '')
                                            <a href="{{ route('username', ['username' => $userdata->username]) }}"
                                                class="d-block"> <img
                                                    src="{{ asset('frontend/profile_pictures/' . $userdata->profile) }}"
                                                    alt="" class="rounded-circle member-img"></a>
                                        @else
                                            <a href="{{ route('username', ['username' => $userdata->username]) }}"
                                                class="d-block"> <img
                                                    src="{{ asset('frontend/profile_pictures/avatar.png') }}"
                                                    alt="" class="rounded-circle member-img"></a>
                                        @endif

                                        <div class="mx-md-3 mx-2">
                                            <a href="{{ route('username', ['username' => $userdata->username]) }}"
                                                class="d-block text-decoration-none">
                                                <h4 class="Benjamin">{{ $userdata->name }} {{ $userdata->lastname }}
                                                </h4>
                                            </a>
                                            <p class="Benjamin-p">{{ \Str::limit($userdata->bio, 100) }}</p>
                                        </div>
                                    </div>

                                    <div class="">
                                        <img src="{{ asset('frontend/images/black.png') }}" alt=""
                                            class="heart-img">
                                    </div>
                                </div>

                            </div>

                        @empty

                            <div class=" d-lg-none">No users found! </div>
                        @endforelse

                    </div>

                </div>
            </div>
        </div>

    </div>

    @if ($locationsArr)
        <div class="world">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-11 px-0">
                        <h2 class="membr">Explore Your World</h2>
                        <div id="homepagemap" class="h-700p r-12"></div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="social-media">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 px-0">
                    <h2 class="membr py-4">Discover More on Social</h2>

                </div>
            </div>

        </div>
    </div>
    </div>
    <?= config('settings.social_instagram') ?>
    <?= config('settings.social_tiktok') ?>
    <div class="about-us py-4 d-none d-lg-block">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-11 px-0">
                    <div class="about-item">
                        <div class="content">
                            <h2 class="membrs">About Us</h2>
                            <?= config('settings.about_us') ?>
                        </div>

                        <div>
                            <a href="#"><button class="btn btn-dark rounded-pill px-4 join" data-bs-toggle="modal"
                                    data-bs-target="#userregistration">Join Tinery</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            if ($('#homepagemap').length > 0) {

                initMaps();
            }

            function initMaps() {

                // execute
                var locations = JSON.parse('<?php echo $locationArrJson; ?>');
                // var locations = [
                //     {
                //         'description': '<b>Name 1</b><br>Address Line 1<br>Bismarck, ND 58501<br>Phone: 701-555-1234<br><a href="#" >Link<a> of some sort.',
                //         'lat': 46.8133,
                //         'long': -100.7790,
                //     },
                //     {
                //         'description': '<b>Name 2</b><br>Address Line 1<br>Fargo, ND 58103<br>Phone: 701-555-4321<br><a href="#" target="_blank">Link<a> of some sort.',
                //         'lat': 46.8772,
                //         'long': -96.7894,
                //     }
                // ];

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
                    var description = '<a href="' + location.url + '">' + location.title + '</a>';
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
