@extends('frontend.layouts.app')

@section('content')
    <section class="hero-sections">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="hero-content">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-lg-8">
                                        <h1 class="trip-h1">{{ $itinerary->title }}</h1>
                                    </div>
                                    <div class="col-lg-4 text-end">
                                        @if (Auth::guard('user')->user())
                                            @php
                                                $query = \App\Models\Favorites::where('user_id', Auth::guard('user')->user()->id)
                                                    ->where('itineraries_id', $itinerary->id)
                                                    ->get();
                                            @endphp
                                            @if ($query->count() == 1)
                                                <a href="javascript:void(0)" data-role="removetowishlist"
                                                    data-id="{{ $itinerary->id }}"> <img
                                                        src="{{ asset('frontend/images/heart-red.png') }}"
                                                        alt=""></a>
                                            @else
                                                <a href="javascript:void(0)" data-role="addtowishlist"
                                                    data-id="{{ $itinerary->id }}"> <img
                                                        src="{{ asset('frontend/images/border-heart.svg') }}"
                                                        alt=""></a>
                                            @endif
                                        @else
                                            <a href="javascript:void(0)" data-role="addtowishlistnotlogin"> <img
                                                    src="{{ asset('frontend/images/border-heart.svg') }}"
                                                    alt=""></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="row related d-flex align-items-center">
                                    <div class="col-lg-3">
                                        <a href="#">
                                            @if (!empty($itinerary->user->profile))
                                                <img src="{{ asset('frontend/profile_pictures/' . $itinerary->user->profile) }}"
                                                    alt="" class="w-75">
                                            @else
                                                <img src="{{ asset('frontend/profile_pictures/avatar.png') }}"
                                                    alt="" class="w-75">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="profile-p">{{ $itinerary->user->name }} |</h6>
                                    </div>
                                    <div class="col-lg-3">
                                        <h6 class="profile-p">{{ date('d/y/Y', strtotime($itinerary->created_at)) }}</h6>
                                    </div>
                                </div>
                                <div class="row city mt-4">
                                    <div class="col-lg-4 d-flex align-items-center">
                                        <a href="#"><img src="{{ asset('frontend/images/nav.png') }}"
                                                alt=""></a>
                                        <h6 class="profile-p pt-2 mx-1">{{ $itinerary->address_city }} </h6>
                                    </div>
                                    <div class="col-lg-4 d-flex align-items-center">
                                        <a href="#"><img src="{{ asset('frontend/images/mail.png') }}"
                                                alt=""></a>
                                        <h6 class="profile-p pt-2 mx-2">3 Days</h6>
                                    </div>
                                    <div class="col-lg-4 d-flex align-items-center">
                                        <a href="#"><img src="{{ asset('frontend/images/Link.png') }}"
                                                alt=""></a>
                                        <h6 class="profile-p pt-2 mx-2">Links </h6>
                                    </div>
                                </div>
                                <div class="tags">
                                    @if ($itinerary->tags != '')
                                        @php
                                            $itinerarytag = json_decode($itinerary->tags);
                                        @endphp
                                        @foreach ($itinerarytag as $itinerarytag)
                                            @php
                                                $tag = $itinerary->tagsdata($itinerarytag);
                                            @endphp
                                            @if ($tag)
                                                <a href="#">
                                                    <button class="foodie">
                                                        {{ $tag->name }}
                                                    </button>
                                                </a>
                                            @endif
                                        @endforeach
                                    @endif
                                    <!-- <a href="#"> <button class="foodie">Foodie</button></a>
                                        <a href="#"> <button class="foodie">Backpacker</button></a>
                                        <a href="#"> <button class="foodie">Spring</button></a>
                                        <a href="#"> <button class="foodie">Holiday Destination</button></a>
                                        <a href="#"> <button class="foodie">Mexico</button></a> -->
                                    <!-- <a href="#"> <button class="foodie">Backpacker</button></a> -->
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <img src="{{ asset('frontend/itineraries/' . $itinerary->seo_image) }}"
                                            alt="" class="wed-img">
                                    </div>
                                </div>
                                <div class="trip-days">
                                    <h5 class=" text-dark pt-3"> Day 1</h5>
                                    <!-- <img src="{{ asset('frontend/images/Vec3.png') }}" alt="" class="vector-img"> -->
                                    <div class=" row days-menu">
                                        <div class=" col-lg-4 d-flex justify-content-between ">
                                            <div class="img-counter"><img src="{{ asset('frontend/images/Number.png') }}"
                                                    alt=""></div>
                                            <p class="red-p text-danger">10:00 AM</p>
                                            <div class="img-counter"><img src="{{ asset('frontend/images/Vec 2.png') }}"
                                                    alt=""></div>
                                            <p class="yoga">Yoga at Jessie’s</p>
                                        </div>
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <img src="{{ asset('frontend/images/Line.png') }}" alt=""
                                                class=" line mt-2">
                                            <img src="{{ asset('frontend/images/down.png') }}" alt=""
                                                class="  mx-2">
                                        </div>
                                    </div>
                                    <div class=" row days-menu">
                                        <div class=" col-lg-4 d-flex justify-content-between ">
                                            <div class="img-counter"><img src="{{ asset('frontend/images/Number2.png') }}"
                                                    alt=""></div>
                                            <p class="red-p text-danger">10:00 AM</p>
                                            <div class="img-counter"><img src="{{ asset('frontend/images/Vec 2.png') }}"
                                                    alt=""></div>
                                            <p class="yoga">Yoga at Jessie’s</p>
                                        </div>
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <img src="{{ asset('frontend/images/Line.png') }}" alt=""
                                                class=" line mt-2">
                                            <img src="{{ asset('frontend/images/down.png') }}" alt=""
                                                class="  mx-2">
                                        </div>
                                    </div>
                                    <div class=" row days-menu">
                                        <div class=" col-lg-4 d-flex justify-content-between ">
                                            <div class="img-counter"><img
                                                    src="{{ asset('frontend/images/Number3.png') }}" alt="">
                                            </div>
                                            <p class="red-p text-danger">10:00 AM</p>
                                            <div class="img-counter"><img src="{{ asset('frontend/images/Vec 2.png') }}"
                                                    alt=""></div>
                                            <p class="yoga">Yoga at Jessie’s</p>
                                        </div>
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <img src="{{ asset('frontend/images/Line.png') }}" alt=""
                                                class=" line mt-2">
                                            <img src="{{ asset('frontend/images/down.png') }}" alt=""
                                                class="  mx-2">
                                        </div>
                                    </div>
                                    <div class=" row days-menu">
                                        <div class=" col-lg-4 d-flex justify-content-between ">
                                            <div class="img-counter"><img
                                                    src="{{ asset('frontend/images/Number4.png') }}" alt="">
                                            </div>
                                            <p class="red-p text-danger">10:00 AM</p>
                                            <div class="img-counter"><img src="{{ asset('frontend/images/Vec 2.png') }}"
                                                    alt=""></div>
                                            <p class="yoga">Yoga at Jessie’s</p>
                                        </div>
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <img src="{{ asset('frontend/images/Line.png') }}" alt=""
                                                class=" line mt-2">
                                            <img src="{{ asset('frontend/images/down.png') }}" alt=""
                                                class="  mx-2">
                                        </div>
                                    </div>
                                    <div class=" row days-menu">
                                        <div class=" col-lg-4 d-flex justify-content-between ">
                                            <div class="img-counter"><img
                                                    src="{{ asset('frontend/images/Number5.png') }}" alt="">
                                            </div>
                                            <p class="red-p text-danger">10:00 AM</p>
                                            <div class="img-counter"><img src="{{ asset('frontend/images/Vec 2.png') }}"
                                                    alt=""></div>
                                            <p class="yoga">Yoga at Jessie’s</p>
                                        </div>
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <img src="{{ asset('frontend/images/Line.png') }}" alt=""
                                                class=" line mt-2">
                                            <img src="{{ asset('frontend/images/down.png') }}" alt=""
                                                class="  mx-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="trip-days">
                                    <h5 class=" text-dark pt-3"> Day 2</h5>
                                    <!-- <img src="{{ asset('frontend/images/Vec3.png') }}" alt="" class="vector-img"> -->
                                    <div class=" row days-menu">
                                        <div class=" col-lg-4 d-flex justify-content-between ">
                                            <div class="img-counter"><img
                                                    src="{{ asset('frontend/images/Number6.png') }}" alt="">
                                            </div>
                                            <p class="red-p text-danger">10:00 AM</p>
                                            <div class="img-counter"><img src="{{ asset('frontend/images/Vec 2.png') }}"
                                                    alt=""></div>
                                            <p class="yoga">Yoga at Jessie’s</p>
                                        </div>
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <img src="{{ asset('frontend/images/Line.png') }}" alt=""
                                                class=" line mt-2">
                                            <img src="{{ asset('frontend/images/down.png') }}" alt=""
                                                class="  mx-2">
                                        </div>
                                    </div>
                                    <div class=" row days-menu">
                                        <div class=" col-lg-4 d-flex justify-content-between ">
                                            <div class="img-counter"><img
                                                    src="{{ asset('frontend/images/Number7.png') }}" alt="">
                                            </div>
                                            <p class="red-p text-danger">10:00 AM</p>
                                            <div class="img-counter"><img src="{{ asset('frontend/images/Vec 2.png') }}"
                                                    alt=""></div>
                                            <p class="yoga">Yoga at Jessie’s</p>
                                        </div>
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <img src="{{ asset('frontend/images/Line.png') }}" alt=""
                                                class=" line mt-2">
                                            <img src="{{ asset('frontend/images/down.png') }}" alt=""
                                                class="  mx-2">
                                        </div>
                                    </div>
                                    <div class=" row days-menu">
                                        <div class=" col-lg-4 d-flex justify-content-between ">
                                            <div class="img-counter"><img
                                                    src="{{ asset('frontend/images/Number8.png') }}" alt="">
                                            </div>
                                            <p class="red-p text-danger">10:00 AM</p>
                                            <div class="img-counter"><img src="{{ asset('frontend/images/Vec 2.png') }}"
                                                    alt=""></div>
                                            <p class="yoga">Yoga at Jessie’s</p>
                                        </div>
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <img src="{{ asset('frontend/images/Line.png') }}" alt=""
                                                class=" line mt-2">
                                            <img src="{{ asset('frontend/images/down.png') }}" alt=""
                                                class="  mx-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="trip-days">
                                    <h5 class=" text-dark pt-3"> Day 3</h5>
                                    <!-- <img src="{{ asset('frontend/images/Vec3.png') }}" alt="" class="vector-img"> -->
                                    <div class=" row days-menu">
                                        <div class=" col-lg-4 d-flex justify-content-between ">
                                            <div class="img-counter"><img
                                                    src="{{ asset('frontend/images/Number9.png') }}" alt="">
                                            </div>
                                            <p class="red-p text-danger">10:00 AM</p>
                                            <div class="img-counter"><img src="{{ asset('frontend/images/Vec 2.png') }}"
                                                    alt=""></div>
                                            <p class="yoga">Yoga at Jessie’s</p>
                                        </div>
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <img src="{{ asset('frontend/images/Line.png') }}" alt=""
                                                class=" line mt-2">
                                            <img src="{{ asset('frontend/images/down.png') }}" alt=""
                                                class="  mx-2">
                                        </div>
                                    </div>

                                </div>

                                <div class="world py-3">
                                    <div class="container">
                                        <div class="map">
                                            <iframe
                                                src="https://www.google.com/maps/d/embed?mid=1PdXSyjjbalDBQ2IKJDLhTgnq_9E&hl=en_US&ehbc=2E312F"
                                                width="100%" height="550"></iframe>
                                        </div>
                                    </div>
                                </div>

                                <div class="gallery-img">
                                    <div class="row d-flex justify-content-between align-items-center images-items">
                                        <div class="col-lg-6">
                                            <img src="{{ asset('frontend/images/fam.png') }}" alt=""
                                                class="fam-img">

                                        </div>

                                        <div class="col-lg-3">
                                            <img src="{{ asset('frontend/images/sea.png') }}" alt=""
                                                class=" sea-img">

                                        </div>

                                        <div class="col-lg-3">
                                            <div class=" row d-flex align-items-center justify-content-between ">
                                                <div class="col-lg-6">
                                                    <img src="{{ asset('frontend/images/sea.png') }}" alt=""
                                                        class=" seaimg">
                                                </div>
                                                <div class="col-lg-6">
                                                    <img src="{{ asset('frontend/images/sea.png') }}" alt=""
                                                        class="seaimg">
                                                </div>
                                            </div>

                                            <div class=" row d-flex align-items-center justify-content-between">
                                                <div class="col-lg-6">
                                                    <img src="{{ asset('frontend/images/sea.png') }}" alt=""
                                                        class=" seaimg">
                                                </div>
                                                <div class="col-lg-6">
                                                    <img src="{{ asset('frontend/images/sea.png') }}" alt=""
                                                        class="seaimg">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class=" mt-4">
                                    <div class="d-flex align-items-center">
                                        <a href="#"><img src="{{ asset('frontend/images/chat.png') }}"
                                                alt=""></a>
                                        <h2 class="coments mt-3 px-2">Comments (5)</h2>
                                        <div class=" d-flex align-items-center">
                                            <img src="{{ asset('frontend/images/Line.png') }}" alt=""
                                                class=" line mt-2">
                                            <img src="{{ asset('frontend/images/up.png') }}" alt=""
                                                class="  mx-2">

                                        </div>
                                    </div>

                                    <div class=" d-flex align-items-center">
                                        <a href="#"> <img src="{{ asset('frontend/images/User Image.png') }}"
                                                alt=""></a>
                                        <p class="login-to-add mt-3 px-2">Login to add a comment</p>
                                    </div>
                                    <hr>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="d-flex flex-row comment-row">
                                                <div class="p-2"><img src="{{ asset('frontend/images/user1.png') }}"
                                                        alt="user" width="50" class="rounded-circle"></div>
                                                <div class="comment-text w-100">
                                                    <h5 class="font-medium">John Doe</h5>
                                                    <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the
                                                        printing and typesetting industry.</span>
                                                    <div class="comment-footer">

                                                        <img src="{{ asset('frontend/images/Like Animation.png') }}"
                                                            alt="">
                                                        <img src="{{ asset('frontend/images/Dislike Animation.png') }}"
                                                            alt="">
                                                        <span class="text-muted ">May 7, 2023</span>

                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex flex-row comment-row">
                                                <div class="p-2"><img src="{{ asset('frontend/images/user1.png') }}"
                                                        alt="user" width="50" class="rounded-circle"></div>
                                                <div class="comment-text w-100">
                                                    <h5 class="font-medium">John Doe</h5>
                                                    <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the
                                                        printing and typesetting industry.</span>
                                                    <div class="comment-footer">

                                                        <img src="{{ asset('frontend/images/Like Animation.png') }}"
                                                            alt="">
                                                        <img src="{{ asset('frontend/images/Dislike Animation.png') }}"
                                                            alt="">
                                                        <span class="text-muted ">May 7, 2023</span>

                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex flex-row comment-row">
                                                <div class="p-2"><img src="{{ asset('frontend/images/user1.png') }}"
                                                        alt="user" width="50" class="rounded-circle"></div>
                                                <div class="comment-text w-100">
                                                    <h5 class="font-medium">John Doe</h5>
                                                    <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the
                                                        printing and typesetting industry.</span>
                                                    <div class="comment-footer">

                                                        <img src="{{ asset('frontend/images/Like Animation.png') }}"
                                                            alt="">
                                                        <img src="{{ asset('frontend/images/Dislike Animation.png') }}"
                                                            alt="">
                                                        <span class="text-muted ">May 7, 2023</span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-25 m-auto mt-4">
                                        <button class="btn btn-light rounded-pill load-btn px-4 text-center">Load
                                            More</button>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-4">
                                <div class="profile p-3">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-lg-4">
                                            <a href="#">
                                                @if (!empty($itinerary->user->profile))
                                                    <img src="{{ asset('frontend/profile_pictures/' . $itinerary->user->profile) }}"
                                                        alt="" class="w-75">
                                                @else
                                                    <img src="{{ asset('frontend/profile_pictures/avatar.png') }}"
                                                        alt="" class="w-75">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-lg-8">
                                            <h6 class="profiler">{{ $itinerary->user->name }}</h6>
                                            <div class="row w-50">
                                                @if (!empty($itinerary->user->facebook))
                                                    <div class="col-lg-3">
                                                        <a href="{{ $itinerary->user->facebook }}"><img
                                                                src="{{ asset('frontend/images/fb.svg') }}"
                                                                alt=""></a>
                                                    </div>
                                                @endif
                                                @if (!empty($itinerary->user->twitter))
                                                    <div class="col-lg-3">
                                                        <a href="{{ $itinerary->user->twitter }}"><img
                                                                src="{{ asset('frontend/images/tw.svg') }}"
                                                                alt=""></a>
                                                    </div>
                                                @endif
                                                @if (!empty($itinerary->user->instagram))
                                                    <div class="col-lg-3">
                                                        <a href="{{ $itinerary->user->instagram }}"><img
                                                                src="{{ asset('frontend/images/insta.svg') }}"
                                                                alt=""></a>
                                                    </div>
                                                @endif
                                                @if (!empty($itinerary->user->website))
                                                    <div class="col-lg-3">
                                                        <a href="{{ $itinerary->user->website }}"><img
                                                                src="{{ asset('frontend/images/Link.svg') }}"
                                                                alt=""></a>
                                                    </div>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                    <h6 class="profile-details p-3">
                                        {{ $itinerary->user->bio }}
                                    </h6>
                                </div>

                                <div class="profiles p-3 mt-5">
                                    <h6 class="profiler-related">Related Content</h6>
                                    @php
                                        $related_itinerary = \App\Models\Itineraries::where('slug', '!=', $itinerary->slug)->get();
                                    @endphp
                                    @if (!$related_itinerary->isEmpty())
                                        @foreach ($related_itinerary as $row)
                                            <div class="row pt-3 d-flex align-items-center justify-content-center">
                                                <div class="col-lg-4">
                                                    <a href="{{ route('itinerary', ['slug' => $row->slug]) }}"> <img
                                                            src="{{ asset('frontend/itineraries/' . $row->seo_image) }}"
                                                            alt="" class="w-120"></a>
                                                </div>
                                                <div class="col-lg-8">
                                                    <a href="{{ route('itinerary', ['slug' => $row->slug]) }}"
                                                        style="text-decoration:none;">
                                                        <h6 class="profiler-related">{{ $row->title }}</h6>
                                                    </a>
                                                    <div class="d-flex align-items-center">
                                                        <p class="lang">{{ $row->user->name }} |</p>
                                                        <p class="lang px-2">16 Hours Ago</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </section>

@endsection
