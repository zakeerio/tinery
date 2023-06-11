@extends('frontend.layouts.app')

@section('content')

    <section class="hero-sections">
        <div class="container">
            <div class="hero-content left-margin">
                <div class="row">
                    <div class="col-lg-8">

                        <div class="d-flex justify-content-between  ">
                            <div class="col-lg-8">
                                <h1 class="trip-h1">{{ $itinerary->title}}</h1>
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
                                        <img src="{{ asset('frontend/profile_pictures/avatar.png') }}" alt="" class="w-75">
                                    @endif
                                </a>
                            </div>
                            <div class="profile-p px-1 profilefont"><a class="text-black text-decoration-none" href="{{ route('username', ['username' => $itinerary->user->username]) }}">{{ ($itinerary->user) ? $itinerary->user->name : 'User not found.' }} </a></div>
                            <div class="vr align-self-center linesize mx-1"></div>
                            <div class="profile-p px-3 profilefont1">{{date('d/y/Y',strtotime($itinerary->created_at))}}</div>
                        </div>


                        <div class="city d-flex flex-wrap">
                            <div class="d-flex align-items-center">
                                <a href="#"><img src="{{ asset('frontend/images/nav.png') }}" alt=""></a>
                                <h6 class="profile-p pt-2 mx-1">{{$itinerary->address_city}} </h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="#"><img src="{{ asset('frontend/images/mail.png') }}" alt=""></a>
                                <h6 class="profile-p pt-2 mx-2">3 Days</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="{{ (!empty($itinerary->website)) ? $itinerary->website : '#' }}"><img src="{{ asset('frontend/images/Link.png') }}" alt=""></a>
                                <h6 class="profile-p pt-2 mx-2">Links<a href="{{ (!empty($itinerary->website)) ? $itinerary->website : '' }}">{{ $itinerary->website }}</a> </h6>
                            </div>
                        </div>

                        <div class="tags flex-wrap gap-1">
                            @if($itinerary->tags != '')
                            @php
                                $itinerarytag = json_decode($itinerary->tags);
                            @endphp
                            @foreach($itinerarytag as $itinerarytag)
                            @php
                                $tag = \App\Models\Tags::find($itinerarytag);
                                @endphp
                            @if($tag)
                                <a href="{{url('/slug/'.$tag->slug)}}">
                                    <button class="foodie">
                                        {{$tag->name}}
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

                        <div class="content mt-4">
                            {{ $itinerary->description }}
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                @if ($itinerary->seo_image != "")
                                <img src="{{ asset('frontend/itineraries/'.$itinerary->seo_image) }}" alt="" class="wed-img">
                                @else
                                {{-- <img src="{{ asset('frontend/images/map.png') }}" alt="" class="wed-img"> --}}
                                @endif

                            </div>
                        </div>


                            <!--Start  DAY 1 Coding  -->
                            @if(!empty($days))
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
                                        @foreach($activities as $activityKey => $activity)
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
                                <button class="btn btn-light rounded-pill load-btn px-4 text-center">Load More</button>
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

                        <div class="profiles p-3 mt-32">
                            <h6 class="profiler-related related">Related Content</h6>

                            @if(!$related_itinerary->isEmpty())
                            @foreach($related_itinerary as $rowrelated)
                            <div class="pt-3 d-flex align-items-center ">
                                <div class="">
                                    <a href="{{route('itinerary', ['slug' => $rowrelated->slug])}}">
                                        <img src="{{ asset('frontend/itineraries/'.$rowrelated->seo_image) }}" alt="" class="w-120"></a>
                                </div>
                                <div class="px-2 mx-1">
                                    <a href="{{route('itinerary', ['slug' => $rowrelated->slug])}}" style="text-decoration:none;">
                                        <div class="profiler-relate profile-relate">{{$rowrelated->title}}</div>
                                    </a>
                                    <div class="d-flex align-items-center">
                                        <p class="lang"><a class="text-black text-decoration-none " href="{{ route('username', ['username' => $rowrelated->user->username]) }}">{{$rowrelated->user->name}} </a> |</p>
                                        <p class="lang px-2">{{ $rowrelated->created_at->diffForHumans() }}</p>
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


@endsection
