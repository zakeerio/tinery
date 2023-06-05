@extends('frontend.layouts.app')

@section('content')

    <div class="perfect py-5">
        <div class="container">
            <div class="perfect-item ">
                <h3 class="travel">Find the Perfect Travel Itinerary</h3>
                <p class="filters-p">Filter by location, trip length, tag or user. Don’t see your location? New
                    itineraries are added by users everyday - or take it upon yourself to write the first one!
                </p>
            </div>
        </div>
    </div>

    <div class="card-section py-3">
        <div class="container">
            <div class="cards-item">
                <div class="row">
                    @if(!empty($itineraries))
                    @foreach($itineraries as $row)
                    <div class="col-lg-3 ">
                        <div class="card bg-im" style="background-image: url('/frontend/itineraries/{{ $row->seo_image}}');background-size: cover;background-repeat: no-repeat;height: 317px;  !important;">
                            <a href="{{ route('username', ['username' => $row->user->username]) }}" class="d-inline-flex text-dark text-decoration-none">
                                <div class="Ellipse bg-white m-3 rounded-pill p-1">
                                    <div class="">
                                        {{-- <img src="{{ asset('frontend/images/toro (2).png') }}" alt=""> --}}
                                        @if($row->user->profile != '')
                                        <img src="{{ asset('frontend/profile_pictures/'.$row->user->profile) }}" alt="" class="width-48">
                                        @else
                                        <img src="{{ asset('frontend/profile_pictures/avatar.png') }}" alt="" class="width-48">
                                        @endif
                                    </div>
                                    <div class=" ">
                                        <span class="mx-3">{{ $row->user->name}} {{ $row->user->lastname}}</span>
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
                        <p class="city">{{ $row->address_city}} | {{ $row->created_at->diffForHumans() }}</p>
                    </div>
                    @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>
    <hr>
    <div class="world py-4">
        <div class="container">
            <div class="map">
                <iframe src="https://www.google.com/maps/d/embed?mid=1PdXSyjjbalDBQ2IKJDLhTgnq_9E&hl=en_US&ehbc=2E312F"
                    width="100%" height="550"></iframe>
            </div>
        </div>
    </div>



@endsection
