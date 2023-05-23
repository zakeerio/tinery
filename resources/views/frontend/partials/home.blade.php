@extends('frontend.layouts.app')

@section('content')

<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h2>Welcome to Tinery</h2>
            <p>The Network for travelers, big and small, to discover and <br> share their favourite experiences.</p>
        </div>

    </div>
</div>

<div class="explore">
    <div class="container">
        <div class="explore-section py-4">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Explore Popular Travel Itineraries</h2>
                </div>
                <div class="col-lg-6 text-end">
                    <h2>
                        <a href="#" class="text-decoration-none text-dark">Explore All</a>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-section py-3">
    <div class="container">
        <div class="cards-item">
            <div class="row">
                @php
                    $itineraries = \App\Models\Itineraries::where('featured','1')
                    ->where('status','published')
                    ->get();
                @endphp
                @if(!$itineraries->isEmpty())
                @foreach($itineraries as $row)
                <div class="col-lg-3">
                    <div class="card bg-im" style="background-image: url('/frontend/itineraries/{{ $row->seo_image}}');background-size: cover;background-repeat: no-repeat;height: 370px !important;">
                        <div class="Ellipse bg-white m-3 rounded-pill p-2">
                            <div class="">
                                <img src="{{ asset('frontend/images/toro (2).png') }}" alt="">
                            </div>
                            <div class=" ">
                                <span class="mx-3">{{ $row->author}}</span>
                            </div>
                        </div>
                        <div class="heart-icon">
                            <a href="#"> <img src="{{ asset('frontend/images/Path.png') }}" alt="" class="path-img"></a>
                        </div>
                    </div>
                    <a href="{{route('itinerary', ['id' => $row->slug])}}" style="text-decoration:none;"><h4 class="h-4">{{ $row->title}}</h4></a>
                    <div class="tags">
                        @php
                            $itinerarytag = json_decode($row->tags);
                        @endphp
                        @foreach($itinerarytag as $itinerarytag)
                            <a href="#">
                                <button class="foodie">
                                    {{$itinerarytag}}
                                </button>
                            </a>
                        @endforeach
                        <!-- <a href="#"> <button class="foodie">Backpacker</button></a>
                        <a href="#"> <button class="foodie">Backpacker</button></a>
                        <a href="#"> <button class="foodie">Backpacker</button></a> -->
                    </div>
                    <p class="city">{{ $row->address_city}} | 3 Days</p>
                </div>
                @endforeach
                @endif
            </div>

        </div>
    </div>
</div>

<div class="member-spot">
    <div class="container">
        <div class="spotlight">
            <div class="row spotlight-center">
                <h2 class="membr">Members Spotlight</h2>
                <div class="col-lg-4">
                    <div class="member-info d-flex align-items-center justify-content-between">
                        <div class="">
                            <a href="#"> <img src="{{ asset('frontend/images/hat.png') }}" alt="" class="member-img"></a>
                        </div>
                        <div class="mx-3">
                            <h4 class="Benjamin">Benjamin Franklin</h4>
                            <p class="Benjamin-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit....</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('frontend/images/black.png') }}" alt="" class="heart-img">
                        </div>
                    </div>

                </div>

                <div class="col-lg-4">
                    <div class="member-info">
                        <div class="">
                            <a href="#"> <img src="{{ asset('frontend/images/hat.png') }}" alt="" class="member-img"></a>
                        </div>
                        <div class="mx-3">
                            <h4 class="Benjamin">Benjamin Franklin</h4>
                            <p class="Benjamin-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit....</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('frontend/images/black.png') }}" alt="" class="heart-img">
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="member-info">
                        <div class="">
                            <a href="#"> <img src="{{ asset('frontend/images/hat.png') }}" alt="" class="member-img"></a>
                        </div>
                        <div class="mx-3">
                            <h4 class="Benjamin">Benjamin Franklin</h4>
                            <p class="Benjamin-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit....</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('frontend/images/black.png') }}" alt="" class="heart-img">
                        </div>
                    </div>

                </div>
            </div>

            <div class="row  spotlight-centermt-4">
                <!-- <h2 class="membr">James Dean</h2> -->
                <div class="col-lg-4">
                    <div class="member-info">
                        <div class="">
                            <a href="#"> <img src="{{ asset('frontend/images/hat.png') }}" alt="" class="member-img"></a>
                        </div>
                        <div class="mx-3">
                            <h4 class="Benjamin">Benjamin Franklin</h4>
                            <p class="Benjamin-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit....</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('frontend/images/black.png') }}" alt="" class="heart-img">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="member-info">
                        <div class="">
                            <a href="#"> <img src="{{ asset('frontend/images/hat.png') }}" alt="" class="member-img"></a>
                        </div>
                        <div class="mx-3">
                            <h4 class="Benjamin">Benjamin Franklin</h4>
                            <p class="Benjamin-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit....</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('frontend/images/black.png') }}" alt="" class="heart-img">
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="member-info">
                        <div class="">
                            <a href="#"> <img src="{{ asset('frontend/images/hat.png') }}" alt="" class="member-img"></a>
                        </div>
                        <div class="mx-3">
                            <h4 class="Benjamin">Benjamin Franklin</h4>
                            <p class="Benjamin-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit....</p>
                        </div>
                        <div class="">
                            <img src="{{ asset('frontend/images/black.png') }}" alt="" class="heart-img">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="world">
    <div class="container">
        <h2 class="membr">Explore Your World</h2>
        <div class="map">
            <iframe src="https://www.google.com/maps/d/embed?mid=1PdXSyjjbalDBQ2IKJDLhTgnq_9E&hl=en_US&ehbc=2E312F"
                width="100%" height="550"></iframe>

        </div>
    </div>
</div>

<div class="social-media">
    <div class="container">
        <h2 class="membr my-2">Discover More on Social</h2>

        <div class="row">
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

        <div class="row d-flex  align-items-center">
            <div class="col-lg-2 ">
                <img src="Tiktok Post 01.png') }}" alt="" class="slider-img">
            </div>
            <div class="col-lg-2 ">
                <img src="Tiktok Post 01.png') }}" alt="" class="slider-img">
            </div>
            <div class="col-lg-2 ">
                <img src="Tiktok Post 01.png') }}" alt="" class="slider-img">
            </div>
            <div class="col-lg-2 ">
                <img src="Tiktok Post 01.png') }}" alt="" class="slider-img">
            </div>
            <div class="col-lg-2 ">
                <img src="Tiktok Post 01.png') }}" alt="" class="slider-img">
            </div>
            <div class="col-lg-2 ">
                <img src="Tiktok Post 01.png') }}" alt="" class="slider-img">
            </div>
        </div>
    </div>
</div>

<div class="about-us py-5">
    <div class="container">
        <div class="about-item py-4">
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
                <a href="#"><button class="btn btn-outline-dark join px-4 rounded-pill">Join Tinery</button></a>
            </div>
        </div>
    </div>
</div>


@endsection
