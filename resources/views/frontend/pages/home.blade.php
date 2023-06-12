@extends('frontend.layouts.app')

@section('content')

<div class="align-items-center d-flex hero-section">
    <div class="container">
        <div class="hero-content">
            <h2>Welcome to Tinery</h2>
            <p class="hero-c-p">The Network for travelers, big and small, to discover and share their favourite experiences.</p>
        </div>

    </div>
</div>

<div class="explore">
    <div class="container ">
        <div class="explore-section px-lg-4 py-4">
            <div class="row">
                <div class="d-flex justify-content-between align-items-center ">
                    <h1 class=" " >Explore Popular Travel Itineraries</h1>

                    <h2>
                        <a href="{{ route('itineraries') }}" class="text-decoration-none text-dark">Explore All</a>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-section py-3  px-md-0">
    <div class="container mx-md-auto ">
        <div class="cards-item">
            <div class="row slickslider">
                @if($itineraries->count() > 0)
                    @foreach($itineraries as $row)
                    <div class="col-lg-3 ">
                        <div class="card bg-img" style="background-image: url('/frontend/itineraries/{{ $row->seo_image}}')">
                            <a href="{{ route('username', ['username' => $row->user->username]) }}" class="d-inline-flex text-dark text-decoration-none">
                                <div class="Ellipse bg-white m-3 rounded-pill p-1">
                                    <div class=" ">
                                        {{-- <img src="{{ asset('frontend/images/toro (2).png') }}" alt=""> --}}
                                        @if($row->user->profile != '')
                                        <img src="{{ asset('frontend/profile_pictures/'.$row->user->profile) }}" alt="" class="width-48">
                                        @else
                                        <img src="{{ asset('frontend/profile_pictures/avatar.png') }}" alt="" class="width-48">
                                        @endif
                                    </div>
                                    <div class="e-text-size  text-nowrap">
                                        <span class="mx-lg-3 mx-1">{{ $row->user->name}} {{ $row->user->lastname}}</span>
                                    </div>
                                </div>
                            </a>

                            <div class="heart-icon">
                                @if(Auth::guard('user')->user())
                                @php
                                $query = \App\Models\Favorites::where('user_id',Auth::guard('user')->user()->id)
                                ->where('itineraries_id',$row->id)
                                ->get();
                                @endphp
                                @if($query->count() == 1)
                                <a href="javascript:void(0)" data-role="removetowishlist" data-id="{{ $row->id}}"> <img src="{{ asset('frontend/images/border-heart.svg') }}" alt="" class="path-img"></a>
                                @else
                                <a href="javascript:void(0)" data-role="addtowishlist" data-id="{{ $row->id}}"> <img src="{{ asset('frontend/images/Path.png') }}" alt="" class="path-img"></a>
                                @endif
                                @else
                                <a href="javascript:void(0)" data-role="addtowishlistnotlogin"> <img src="{{ asset('frontend/images/Path.png') }}" alt="" class="path-img"></a>
                                @endif
                            </div>
                        </div>
                        <a href="{{route('itinerary', ['slug' => $row->slug])}}" style="text-decoration:none;"><h4 class="h-4">{{ $row->title}}</h4></a>
                        <div class="tags">
                            @php
                                $itinerarytag = json_decode($row->tags);
                            @endphp
                            @foreach($itinerarytag as $itinerarytag)
                                @php
                                    $tag = $row->tagsdata($itinerarytag);
                                @endphp
                                @if($tag)
                                <a href="{{url('/slug/'.$tag->slug)}}">
                                    <button class="foodie">
                                        {{$tag->name}}
                                    </button>
                                </a>
                                @endif
                            @endforeach
                        </div>
                        <p class="city mt-3">{{ $row->address_city}} | {{ $row->created_at->diffForHumans() }}</p>
                    </div>
                    @endforeach
                    @endif
                </div>

            </div>
        </div>
</div>

<div class="member-spot">
    <div class="container px-32 px-lg-0  ">
        <div class="spotlight ">
            <div class="row spotlight-center">
                <h2 class="membr">Members Spotlight</h2>

                @forelse ($users as $userdata )

                <div class="col-lg-4 mb-md-5 mb-4 px-1 col-sm-6">
                    <div class="member-info d-flex align-items-center justify-content-between ">
                        <div class="d-flex align-items-center justify-content-start ">
                            @if($userdata->profile != '')
                            <a href="{{ route('username', ['username' => $userdata->username]) }}" class="d-block"> <img src="{{ asset('frontend/profile_pictures/'.$userdata->profile) }}" alt="" class="rounded-circle member-img"></a>
                            @else
                            <a href="{{ route('username', ['username' => $userdata->username]) }}" class="d-block"> <img src="{{ asset('frontend/profile_pictures/avatar.png') }}" alt="" class="rounded-circle member-img"></a>
                            @endif

                            <div class="mx-md-3 mx-2">
                                <a href="{{ route('username', ['username' => $userdata->username]) }}" class="d-block text-decoration-none"><h4 class="Benjamin">{{ $userdata->name }} {{ $userdata->lastname }}</h4></a>
                                    <p class="Benjamin-p">{{ \Str::limit($userdata->bio, 100); }}</p>
                                </div>
                            </div>

                            <div class="">
                                <img src="{{ asset('frontend/images/black.png') }}" alt="" class="heart-img">
                            </div>
                        </div>

                    </div>

                    @empty

                    <div class="">No users found! </div>

                    @endforelse

                </div>

            </div>
        </div>
    </div>

    <div class="world">
        <div class="container">
            <h2 class="membr">Explore Your World</h2>
            {{-- <div class="map">
            <iframe src="https://www.google.com/maps/d/embed?mid=1PdXSyjjbalDBQ2IKJDLhTgnq_9E&hl=en_US&ehbc=2E312F"
                width="100%" height="550"></iframe>

            </div> --}}

            <div id="map" style="height: 450px;"></div>
        </div>
    </div>

    <div class="social-media">
        <div class="container">
            <h2 class="membr my-2">Discover More on Social</h2>
            <div class="row slickslider6">
                <div class="col-lg-2 ">
                    <div class="social-descover">
                        <div class="">
                            <img src="{{ asset('frontend/images/Ellipse 6.png') }}" alt="">
                        </div>
                        <div class="">
                            <h6 class="anna">Anna Jones</h6>
                        </div>
                        <div class="">
                            <img src="{{ asset('frontend/images/Logo 2.png') }}" alt="">
                        </div>
                    </div>
                <img src="{{ asset('frontend/images/Frame 189.png') }}" alt="" class="w-100">

                <div class="pt-2">
                    <p class="meet-p">Had a lovely break.Meet my new best friend Mr.Flamingo! 😂😂
                        #Tinery #RelaxiTaxi #Fun #Reset</p>
                    </div>
                </div>
                <div class="col-lg-2 ">
                    <div class="social-descover">
                        <div class="">
                            <img src="{{ asset('frontend/images/Ellipse 6.png') }}" alt="">
                        </div>
                        <div class="">
                            <h6 class="anna">Anna Jones</h6>
                        </div>
                        <div class="">
                            <img src="{{ asset('frontend/images/Logo 2.png') }}" alt="">
                        </div>
                    </div>
                    <img src="{{ asset('frontend/images/Frame 189.png') }}" alt="" class="w-100">

                    <div class="pt-2">
                        <p class="meet-p">Had a lovely break.Meet my new best friend Mr.Flamingo! 😂😂
                            #Tinery #RelaxiTaxi #Fun #Reset</p>
                </div>
            </div>

            <div class="col-lg-2 ">
                <div class="social-descover">
                    <div class="">
                        <img src="{{ asset('frontend/images/Ellipse 6.png') }}" alt="">
                    </div>
                    <div class="">
                        <h6 class="anna">Anna Jones</h6>
                    </div>
                    <div class="">
                        <img src="{{ asset('frontend/images/Logo 2.png') }}" alt="">
                    </div>
                </div>
                <img src="{{ asset('frontend/images/Frame 189.png') }}" alt="" class="w-100">

                <div class="pt-2">
                    <p class="meet-p">Had a lovely break.Meet my new best friend Mr.Flamingo! 😂😂
                        #Tinery #RelaxiTaxi #Fun #Reset</p>
                    </div>
                </div>
                <div class="col-lg-2 ">
                    <div class="social-descover">
                        <div class="">
                            <img src="{{ asset('frontend/images/Ellipse 6.png') }}" alt="">
                        </div>
                        <div class="">
                            <h6 class="anna">Anna Jones</h6>
                        </div>
                        <div class="">
                            <img src="{{ asset('frontend/images/Logo 2.png') }}" alt="">
                        </div>
                    </div>
                    <img src="{{ asset('frontend/images/Frame 189.png') }}" alt="" class="w-100">

                    <div class="pt-2">
                        <p class="meet-p">Had a lovely break.Meet my new best friend Mr.Flamingo! 😂😂
                            #Tinery #RelaxiTaxi #Fun #Reset</p>
                        </div>
                    </div>

                    <div class="col-lg-2 ">
                        <div class="social-descover">
                            <div class="">
                                <img src="{{ asset('frontend/images/Ellipse 6.png') }}" alt="">
                            </div>
                            <div class="">
                                <h6 class="anna">Anna Jones</h6>
                            </div>
                            <div class="">
                                <img src="{{ asset('frontend/images/Logo 2.png') }}" alt="">
                            </div>
                        </div>
                        <img src="{{ asset('frontend/images/Frame 189.png') }}" alt="" class="w-100">

                        <div class="pt-2">
                            <p class="meet-p">Had a lovely break.Meet my new best friend Mr.Flamingo! 😂😂
                        #Tinery #RelaxiTaxi #Fun #Reset</p>

                        </div>
                     </div>
                     <div class="col-lg-2 ">
                        <div class="social-descover">
                            <div class="">
                                <img src="{{ asset('frontend/images/Ellipse 6.png') }}" alt="">
                            </div>
                            <div class="">
                                <h6 class="anna">Anna Jones</h6>
                            </div>
                            <div class="">
                                <img src="{{ asset('frontend/images/Logo 2.png') }}" alt="">
                            </div>
                        </div>
                        <img src="{{ asset('frontend/images/Frame 189.png') }}" alt="" class="w-100">

                        <div class="pt-2">
                            <p class="meet-p">Had a lovely break.Meet my new best friend Mr.Flamingo! 😂😂
                        #Tinery #RelaxiTaxi #Fun #Reset</p>

                        </div>
                     </div>
            <div class="col-lg-2 ">
                <div class="social-descover">
                    <div class="">
                        <img src="{{ asset('frontend/images/Ellipse 6.png') }}" alt="">
                    </div>
                    <div class="">
                        <h6 class="anna">Anna Jones</h6>
                    </div>
                    <div class="">
                        <img src="{{ asset('frontend/images/Logo 2.png') }}" alt="">
                    </div>
                </div>
                <img src="{{ asset('frontend/images/Frame 189.png') }}" alt="" class="w-100">

                <div class="pt-2">
                    <p class="meet-p">Had a lovely break.Meet my new best friend Mr.Flamingo! 😂😂
                        #Tinery #RelaxiTaxi #Fun #Reset</p>
                    </div>
                </div>

            </div>

            <div class="row slickslider6 d-flex mb-5  align-items-center">
                <div class="col-lg-2 ">
                    <img src="{{ asset('frontend/images/Tiktok Post 01.png') }}" alt="" class="slider-img">
                </div>
                <div class="col-lg-2 ">
                    <img src="{{ asset('frontend/images/Tiktok Post 01.png') }}" alt="" class="slider-img">
                </div>
                <div class="col-lg-2 ">
                    <img src="{{ asset('frontend/images/Tiktok Post 01.png') }}" alt="" class="slider-img">
                </div>
                <div class="col-lg-2 ">
                    <img src="{{ asset('frontend/images/Tiktok Post 01.png') }}" alt="" class="slider-img">
                </div>
                <div class="col-lg-2 ">
                <img src="{{ asset('frontend/images/Tiktok Post 01.png') }}" alt="" class="slider-img">
            </div>
            <div class="col-lg-2 ">
                <img src="{{ asset('frontend/images/Tiktok Post 01.png') }}" alt="" class="slider-img">
            </div>
            <div class="col-lg-2 ">
                <img src="{{ asset('frontend/images/Tiktok Post 01.png') }}" alt="" class="slider-img">
            </div>
        </div>
    </div>
</div>

<div class="about-us py-4 d-none d-lg-block">
    <div class="container ">
        <div class="about-item">
            <div class="content">
                <h2 class="membrs">About Us</h2>
                <p class="about-p">Join our network today and become part of a growing community of travel
                    enthusiasts.</p>
                    <p class="about-p">Tinery aims to disrupt the #travelinspo industry by taking the power away from
                        algorithms and into the hands of real people. With our unique focus on user-generated content,
                        we empower travel creators to build awareness and reputation, and allow travel consumers to find
                        more personalized and authentic travel recommendations from their peers.</p>
                    </div>

                    <div>
                        <a href="#"><button class="btn btn-dark rounded-pill px-4 join" data-bs-toggle="modal" data-bs-target="#userregistration">Join Tinery</button></a>
                    </div>
                </div>
            </div>
        </div>


@endsection

