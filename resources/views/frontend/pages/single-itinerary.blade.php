@extends('frontend.layouts.app')

@section('title', $itinerary->title)
@section('meta_keywords', 'meta keywords')
@section('meta_description', $itinerary->description)

@if ($itinerary->seo_image != "")
    @php
        $seo_image = asset('frontend/itineraries/'.$itinerary->seo_image);
    @endphp
@else
    @php
        $seo_image = asset('frontend/images/LOGO.png')
    @endphp
@endif


@section('seo_image', ($seo_image))




@section('content')

    <section class="hero-sections">
        <div class="container">
            <div class="hero-content left-margin">
                <div class="row">
                    <div class="col-lg-8">
                        @php
                        $locationsArr = [];
                        @endphp
                        @if(($itinerary->location_id != NULL && $itinerary->itinerarylocations))
                        @php
                        $locationsArr[] = [
                            'description'=>$itinerary->title.'<br>'.Str::words($itinerary->description ?? '',5,' ...').'<br>'.$itinerary->itinerarylocations->address_street.'<br>'.$itinerary->itinerarylocations->address_city.'<br>'.$itinerary->itinerarylocations->address_country,
                            'lat'=>$itinerary->itinerarylocations->latitude,
                            'long'=>$itinerary->itinerarylocations->longitude];
                        @endphp
                        @endif
                        @php
                        $locationArrJson = json_encode($locationsArr);
                        @endphp

                        <div class="d-flex justify-content-between  ">
                            <div class="col-lg-8">
                                <h1 class="trip-h1" style="font-size:35px;">{{ $itinerary->title}}</h1>
                            </div>

                            <div class="col-lg-4 text-end pt-3">
                                @if(Auth::guard('user')->user())
                                    @php
                                        $query = \App\Models\Favorites::where('user_id',Auth::guard('user')->user()->id)
                                        ->where('itineraries_id',$itinerary->id)
                                        ->get();
                                    @endphp
                                    @if($query->count() == 1)
                                        <a href="javascript:void(0)" data-role="removetowishlist" data-id="{{ $itinerary->id}}"> <img src="{{ asset('frontend/images/heart-red.png') }}" class="heart-size" alt=""></a>
                                    @else
                                        <a href="javascript:void(0)" data-role="addtowishlist" data-id="{{ $itinerary->id}}"> <img src="{{ asset('frontend/images/border-heart.svg') }}" class="heart-size" alt=""></a>
                                    @endif
                                @else
                                    <a href="javascript:void(0)" data-role="addtowishlistnotlogin"> <img src="{{ asset('frontend/images/border-heart.svg') }}" class="heart-size" alt=""></a>
                                @endif
                            </div>
                        </div>
                        <div class="related d-flex align-items-center gap-2">
                            <div class=" ">
                                <a href="{{ route('username', ['username' => $itinerary->user->username]) }}">
                                    @if (!empty($itinerary->user->profile))
                                        <img src="{{ asset('frontend/profile_pictures/'. $itinerary->user->profile) }}" alt="" class="imgagesize rounded-circle">
                                    @else
                                        <img src="{{ asset('frontend/profile_pictures/avatar.png') }}" alt="" class="imgagesize rounded-circle">
                                    @endif
                                </a>
                            </div>
                            <div class="profile-p px-1 profilefont"><a class="text-black text-decoration-none" href="{{ route('username', ['username' => $itinerary->user->username]) }}">{{ ($itinerary->user) ? $itinerary->user->name : 'User not found.' }} </a></div>
                            <div class="vr align-self-center linesize mx-1"></div>
                            <div class="profile-p px-3 profilefont1">{{date('d/y/Y',strtotime($itinerary->created_at))}}</div>
                        </div>


                        <div class="city d-flex flex-wrap">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('frontend/images/nav.png') }}" alt="">
                                <h6 class="profile-p pt-2 mx-1">
                                    @if($itinerary->location_id != 0 && $itinerary->itinerarylocations)
                                        {{$itinerary->itinerarylocations->address_city}}
                                    @else
                                        Location
                                    @endif
                                </h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('frontend/images/mail.png') }}" alt="">
                                <h6 class="profile-p pt-2 mx-2">
                                    @if(count($days) > 0)
                                            {{count($days)}} Day{{(count($days) > 1) ? 's' : ''}}
                                    @else
                                        Duration
                                    @endif
                                </h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('frontend/images/Link.png') }}" alt="">
                                <h6 class="profile-p pt-2 mx-2">@if((!empty($itinerary->website))) <a href="{{ (!empty($itinerary->website)) ? $itinerary->website : '' }}" class="text-decoration-none .profile-p" >{{ $itinerary->website }}</a> @else Links @endif </h6>
                            </div>
                        </div>

                        <div class="tags flex-wrap gap-1" style="margin-top:-40px;">
                            @if($itinerary->tags != '')
                            @php
                                $itinerarytag = json_decode($itinerary->tags);
                            @endphp
                                @foreach($itinerarytag as $itinerarytag)
                                    @php
                                        $tag = $itinerary->tagsdata($itinerarytag);
                                    @endphp
                                    @if($tag)
                                        <a href="{{url('/tags/'.$tag->slug)}}">
                                            <button class="foodie">
                                                {{$tag->name}}
                                            </button>
                                        </a>
                                    @endif

                                @endforeach
                            @endif
                        </div>

                        <div class="content mt-4">
                            {{ $itinerary->description }}
                        </div>


                        <div class="col-lg-12 mb-3 bright-70 featuredimg-padding">
                            @if ($itinerary->seo_image != "")
                            <img src="{{ asset('frontend/itineraries/'.$itinerary->seo_image) }}" alt="" class="wed-img">
                            @else
                            <img src="{{ asset('frontend/images/annie-spratt.jpg') }}" alt="" class="wed-img">
                            @endif

                        </div>


                            <!--Start  DAY 1 Coding  -->
                            @if(!empty($days))
                            @php
                            $activityKey = 0;
                            @endphp
                            @foreach($days as $key => $days)
                            <div class="accordion accordion-flush  py-4" id="accordionSibglepage{{$days->id}}">
                                <h5 class=" text-dark tripday m-0"> Day {{++$key}}</h5>
                                <div class="sideborder d-flex position-relative">
                                    <div class="vr text-dark h-100 position-absolute  vr1">&nbsp;</div>
                                    <div class="d-flex flex-column gap-4 py-4 w-100 ">
                                        @php
                                            $activities = \App\Models\ItineraryActivities::where('days_id',$days->id)->get();
                                        @endphp
                                        @if(!empty($activities))
                                        @foreach($activities as $activity)
                                        {{-- {{ print_r($activity) }} --}}
                                        @php
                                            $time = $activity->starttime;
                                        @endphp
                                        <div class="accordion-item  border-0  mycollapsebutton">
                                            <button class="accordion-button collapsed acordionsinglepage " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{ $days->id.'-'.$activity->id }}" aria-expanded="false" aria-controls="flush-collapseOne{{ $days->id.'-'.$activity->id }}">
                                                <div class=" row days-menu ">

                                                    <div class=" d-flex ">
                                                        <div class="align-items-center d-flex itemnumbers justify-content-center px-3 rounded-circle text-bg-danger ">  {{ ++$activityKey }}  </div>
                                                        <div class="align-items-center d-flex flex-shrink-0 gap-3 justify-content-between px-3  d-sm-flex">
                                                            <div class="red-p text-danger">{{date('h:ia',strtotime($activity->starttime))}}</div>
                                                            <div class="vr vr2"></div>
                                                            <div class="yoga">{{ $activity->title }}</div>
                                                        </div>
                                                        <div class=" px-1 align-items-center w-100">
                                                            <img src="{{ asset('frontend/images/Line.png') }}" alt="" class=" line mt-2">
                                                        </div>
                                                    </div>

                                                </div>
                                            </button>
                                            <div id="flush-collapseOne{{ $days->id.'-'.$activity->id }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionSibglepage{{$days->id}}">
                                                <div class="accordion-body px-5">{{ $activity->description }}</div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                </div>
                            </div>
                    </div>
                            @endforeach
                            @endif

                           <!--End  DAY 1 Coding  -->




                           @php
                            $locationArrJson = json_encode($locationsArr);
                            @endphp

                            @if ($locationsArr)
                                <div class="world py-3">
                                    <div id="homepagemap" style="height: 300px;"></div>
                                </div>
                            @endif


                        <div class="gallery-img">
                            <div class="row d-flex  images-items">
                                @foreach($itinerary_gallery as $files)
                                <div class="col-lg-3 mt-2">
                                    <img src="{{ asset('frontend/itineraries/'.$files->image) }}" alt="" class=" sea-img w-200">

                                </div>
                                @endforeach

                            </div>

                        </div>

                        <div class=" mt-4">
                            <div class="d-flex align-items-center">
                                <a href="#"><img src="{{ asset('frontend/images/chat.png') }}" alt=""></a>
                                <h3 class="coments mt-3 px-2 text-nowrap">Comments ({{ ($itinerary->comments) ? count($itinerary->comments) : '0' }})</h3>
                                <div class=" d-flex align-items-center">
                                    <img src="{{ asset('frontend/images/Line.png') }}" alt="" class=" line mt-2">
                                    <img src="{{ asset('frontend/images/up.png') }}" alt="" class="  mx-2">
                                </div>
                            </div>
                            @if(auth('user')->id() == '')
                            <div class=" d-flex align-items-center">
                                <a href="#"> <img src="{{ asset('frontend/images/User Image.png') }}" alt=""></a>
                                <p class="login-to-add mt-3 px-2">Login to add a comment</p>
                            </div>
                            @else
                            <form action="{{route('comments.store',$itinerary)}}" method="POST">
                                @csrf
                                <label>Comment</label>
                                <textarea name="body" class="form-control" cols="10" rows="5" required></textarea>
                                <br>
                                <input type="submit" value="Save" class="btn btn-primary">
                            </form>
                            @endif
                            <hr>
                            <div class="row">

                                <div class="col-md-12">
                                <h3>Comments</h3>
                                    @if ($itinerary->comments)


                                        @foreach($itinerary->comments as $comment)

                                            {{--{{ dd($comment->likesDislikes) }}--}}

                                            <div class="d-flex flex-row comment-row">
                                                <div class="p-2">
                                                    @if (!empty($comment->user->profile))
                                                        <img src="{{ asset('frontend/profile_pictures/'. $comment->user->profile) }}" alt="user-image" width="50" class="rounded-circle">
                                                    @else
                                                        <img src="{{ asset('frontend/profile_pictures/avatar.png') }}" alt="user-image" width="50" class="rounded-circle">
                                                    @endif
                                                    {{-- <img src="{{ asset('frontend/images/user1.png') }}" alt="user" width="50" class="rounded-circle"> --}}
                                                </div>
                                                <div class="comment-text w-100">
                                                    <h5 class="font-medium">{{ $comment->user->name }} {{ $comment->user->last_name }}</h5>
                                                    <span class="m-b-15 d-block">{{ $comment->body }}</span>
                                                    <div class="comment-footer">
                                                        <div class="row">
                                                            @if(auth('user')->id() != '')
                                                            <div class="col-lg-1">
                                                                @if(count($comment->likesDislikes) > 0)
                                                                @foreach($comment->likesDislikes as $likeDislike)
                                                                @if($likeDislike->type == 'like')
                                                                <form action="{{ route('likesDislikes.destroy', $likeDislike) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-transparent"><img src="{{ asset('frontend/images/liked.svg') }}" alt=""></button>
                                                                </form>
                                                                @else
                                                                <form action="{{ route('likesDislikes.store', $comment) }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" value="like" name="type">
                                                                    <button type="submit" class="btn btn-transparent"><img src="{{ asset('frontend/images/Like Animation.png') }}" alt=""></button>
                                                                </form>
                                                                @endif
                                                                @endforeach
                                                                @else
                                                                <form action="{{ route('likesDislikes.store', $comment) }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" value="like" name="type">
                                                                    <button type="submit" class="btn btn-transparent"><img src="{{ asset('frontend/images/Like Animation.png') }}" alt=""></button>
                                                                </form>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-1">
                                                            @if(count($comment->likesDislikes) > 0)
                                                                @foreach($comment->likesDislikes as $likeDislike)
                                                                @if($likeDislike->type == 'dislike')
                                                                <form action="{{ route('likesDislikes.destroy', $likeDislike) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-transparent"><img src="{{ asset('frontend/images/disliked.svg') }}" alt=""></button>
                                                                </form>
                                                                @else
                                                                <form action="{{ route('likesDislikes.store', $comment) }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" value="dislike" name="type">
                                                                    <button type="submit" class="btn btn-transparent"><img src="{{ asset('frontend/images/Dislike Animation.png') }}" alt=""></button>
                                                                </form>
                                                                @endif
                                                                @endforeach
                                                                @else
                                                                <form action="{{ route('likesDislikes.store', $comment) }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" value="dislike" name="type">
                                                                    <button type="submit" class="btn btn-transparent"><img src="{{ asset('frontend/images/Dislike Animation.png') }}" alt=""></button>
                                                                </form>
                                                                @endif
                                                                {{--<form action="{{ route('likesDislikes.store', $comment) }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" value="dislike" name="type">
                                                                    <button type="submit" class="btn btn-transparent"><img src="{{ asset('frontend/images/Dislike Animation.png') }}" alt=""></button>
                                                                </form>--}}
                                                            </div>
                                                            @endif
                                                            <div class="col-lg-3 mt-2">
                                                                <span class="text-muted ">{{ \Carbon\Carbon::parse($comment->created_at)->format('M d, Y')}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                            <div class="w-25 m-auto mt-4">
                                <button class="btn btn-light rounded-pill load-btn px-4 text-center text-nowrap">Load More</button>
                            </div>
                        </div>
                        <div>



                        </div>
                    </div>

                    <div class="col-lg-4 mt-3">
                        <div class="profile p-3">
                            <div class="d-flex align-items-center">
                                <div class="sideprofilepic rounded-circle">
                                    <a href="{{ route('username', ['username' => $itinerary->user->username]) }}">
                                        @if (!empty($itinerary->user->profile))
                                            <img src="{{ asset('frontend/profile_pictures/'. $itinerary->user->profile) }}" alt="" class="img-80px">
                                        @else
                                            <img src="{{ asset('frontend/profile_pictures/avatar.png') }}" alt="" class="img-80px">
                                        @endif
                                    </a>
                                </div>
                                <div class="sidenameandlinks">
                                    <div class="profiler"><a class="text-black text-decoration-none" href="{{ route('username', ['username' => $itinerary->user->username]) }}">{{$itinerary->user->name}}</a></div>
                                    <div class="d-flex socialpicsize d-none d-sm-block">
                                        @if(!empty($itinerary->user->facebook))
                                            <a href="{{$itinerary->user->facebook}}"><img src="{{ asset('frontend/images/fb.png') }}" alt=""></a>
                                        @endif
                                        @if(!empty($itinerary->user->twitter))
                                            <a href="{{$itinerary->user->twitter}}"><img src="{{ asset('frontend/images/tw.png') }}" alt=""></a>
                                        @endif
                                        @if(!empty($itinerary->user->instagram))
                                            <a href="{{$itinerary->user->instagram}}"><img src="{{ asset('frontend/images/insta.png') }}" alt=""></a>
                                        @endif
                                        @if(!empty($itinerary->user->tiktok))
                                            <a href="{{$itinerary->user->tiktok}}"><img src="{{ asset('frontend/images/tiktok.png') }}" alt=""></a>
                                        @endif
                                        @if(!empty($itinerary->user->website))
                                            <a href="{{$itinerary->user->website}}"><img src="{{ asset('frontend/images/Link.png') }}" alt=""></a>
                                        @endif
                                    </div>



                                </div>

                            </div>
                            <h6 class="profile-details p-3">
                                {{$itinerary->user->bio}}
                            </h6>
                             <div class="d-flex socialpicsize d-sm-none justify-content-evenly ">
                                        @if(!empty($itinerary->user->facebook))
                                            <a href="{{$itinerary->user->facebook}}"><img src="{{ asset('frontend/images/fb.png') }}" alt=""></a>
                                        @endif
                                        @if(!empty($itinerary->user->twitter))
                                            <a href="{{$itinerary->user->twitter}}"><img src="{{ asset('frontend/images/tw.png') }}" alt=""></a>
                                        @endif
                                        @if(!empty($itinerary->user->instagram))
                                            <a href="{{$itinerary->user->instagram}}"><img src="{{ asset('frontend/images/insta.png') }}" alt=""></a>
                                        @endif
                                        @if(!empty($itinerary->user->tiktok))
                                            <a href="{{$itinerary->user->tiktok}}"><img src="{{ asset('frontend/images/tiktok.png') }}" alt=""></a>
                                        @endif
                                        @if(!empty($itinerary->user->website))
                                            <a href="{{$itinerary->user->website}}"><img src="{{ asset('frontend/images/Link.png') }}" alt=""></a>
                                        @endif
                            </div>
                        </div>

                        <div class="profiles p-3 mt-32 row">
                            <h6 class="profiler-related related pt-md-4 col-sm-6 align-self-sm-center">Related Content</h6><div class="d-sm-none d-md-block "></div>

                            @if(!$related_itinerary->isEmpty())
                            @foreach($related_itinerary as $rowrelated)
                            <div class="pt-3 d-flex align-items-lg-center   col-sm-6 col-lg-12 ">
                                <div class="">
                                    <a href="{{route('itinerary', ['slug' => $rowrelated->slug])}}">
                                        @if (!empty($rowrelated->seo_image))
                                            <img src="{{ asset('frontend/itineraries/'.$rowrelated->seo_image) }}" alt="" class="w-120"></a>

                                        @else
                                            <img src="{{ asset('frontend/images//annie-spratt.jpg') }}" alt="" class="w-120"></a>
                                        @endif
                                </div>
                                <div class="px-2 mx-1">
                                    <a href="{{route('itinerary', ['slug' => $rowrelated->slug])}}" style="text-decoration:none;">
                                        <div class="profiler-relate profile-relate">{{$rowrelated->title}}</div>
                                    </a>
                                    <div class="d-flex align-items-center">
                                        <p class="lang"><a class="text-black text-decoration-none " href="{{ route('username', ['username' => $rowrelated->user->username]) }}">{{$rowrelated->user->name}} </a> |</p>
                                        <p class="lang px-2 ">{{ $rowrelated->created_at->diffForHumans() }}</p>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

    </section>
    <script>
        $(document).ready(function () {
            if ($('#homepagemap').length > 0) {

            initMaps();
            }

            function initMaps() {

            // execute
            var locations = JSON.parse( '<?php echo $locationArrJson;?>' );
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
                zoom: 9,
                /* Zoom level of your map */
                center: new google.maps.LatLng(locations[0].lat, locations[0].long),

                // center: new google.maps.LatLng(47.47021625, -100.47173475),
                /* coordinates for the center of your map */
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            locations.forEach(function (location) {
                // Accessing individual properties
                var description = location.description;
                var lat = location.lat;
                var long = location.long;

                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat, long),
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
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
