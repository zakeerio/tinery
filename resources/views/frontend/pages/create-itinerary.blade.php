@extends('frontend.layouts.app')

@section('content')
    @php
        $usercheck = isset($isloggedin) ? $isloggedin : false;;
        $user = auth('user')->user();

        $key = env('GOOGLE_MAP_API_KEY');
    @endphp
    <section class="profile-section py-4">
        @if(empty($itinerary))
        <div class="container row margin-top-75 mx-auto">
            <div class="border rounded col-lg-8">
                <div class="row  p-3 ">
                    <div class="col-12 d-flex justify-content-between ">
                        <h2 class=" trip-h1">Itinerary Title</h2>
                        <!-- Button trigger modal -->
                        <button type="button " class="bg-transparent border-0 " data-bs-toggle="modal" data-bs-target="#intro"  title="Create Itinerary">
                            <img src="{{ asset('frontend/images/editbt.png')}}" class="button-24" alt="">
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="intro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold" id="staticBackdropLabel">
                                            Intro</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    <div class="modal-body p-3 ">
                                        {!! Form::open(['route' => 'itineraries.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                        <div class="mb-3">
                                            <h4 class="fw-bold">Itinerary info</h4>
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label fw-bold">Itinerary Title<span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="title" class="form-control rounded-pill" required placeholder="Ex. My Winter Break 2022" id="title" aria-describedby="emailHelp">
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="title" class="form-label fw-bold">Slug Title<span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="slug" class="form-control rounded-pill" required placeholder="Slug" id="title" aria-describedby="emailHelp">
                                        </div> --}}
                                        <div class="mb-3">
                                            <label for="tags" class="form-label fw-bold">Add Tags<span class="text-danger">*</span></label>
                                            @php
                                                    $listtags = [];
                                                    @endphp
                                                @foreach ($tags as $key => $tags)
                                                @php
                                                        $listtags[$tags->id] = $tags->name;
                                                    @endphp
                                                @endforeach
                                                {!! Form::select('tags[]', $listtags, null, ['class' => 'form-control select2', 'required', 'multiple' => true]) !!}
                                            </div>
                                            <div class="mb-3">
                                                <label for="summary" class="form-label fw-bold">Itinerary Summary<span class="text-danger">*</span></label>
                                                <textarea class="form-control" name="description" required id="exampleFormControlTextarea1" rows="5"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="title" class="form-label fw-bold">Location<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control rounded-pill" name="address_street" value="" id="address_street" required>
                                            </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label fw-bold">Duration</label>
                                            <input type="number" name="duration" value="" class="form-control rounded-pill" placeholder="Duration">
                                        </div>
                                        <div class="mb-3">
                                            <label for="Personal-blog" class="form-label fw-bold">Personal Blog or Relevant Site</label>
                                            <input type="text" name="website" value="" class="form-control rounded-pill" placeholder="Ex: www,nyc,com" id="Personal-blog" aria-describedby="emailHelp">
                                        </div>

                                        <div class="text-end ">
                                            <button type="submit" class="btn save-bt btn-dark rounded-pill ">Save</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="related d-flex align-items-center gap-2 profile-padding-left">
                    <div class=" ">
                        <a href="{{ route('username', ['username' => $user->username]) }}">
                            @if (!empty($user->profile))
                                <img src="{{ asset('frontend/profile_pictures/'. $user->profile) }}" alt="" class="imgagesize rounded-circle">
                            @else
                                <img src="{{ asset('frontend/profile_pictures/avatar.png') }}" alt="" class="w-75">
                            @endif
                        </a>
                    </div>

                    <div class="profile-p px-1 profilefont"><a class="text-black text-decoration-none" href="{{ route('username', ['username' => $user->username]) }}">{{ ($user) ? $user->name : 'User not found.' }} </a></div>
                    <div class="vr align-self-center linesize mx-1"></div>
                    <div class="profile-p px-3 profilefont1">{{date('d/y/Y',strtotime(date(now())))}}</div>
                </div>


                <div class="city d-flex profile-padding-left  flex-wrap">
                    <div class="location d-flex gap-2 align-items-center">
                        <img class="w" src="{{ asset('frontend/images/location.png')}}" alt="">
                        <p class="my-auto">Location</p>
                    </div>
                    <div class="location d-flex gap-2 align-items-center">
                        <img class="w" src="{{ asset('frontend/images/duration.png')}}" alt="">
                        <p class="my-auto">Duration</p>
                    </div>
                    <div class="location d-flex gap-2 align-items-center">
                        <img class="w" src="{{ asset('frontend/images/world.png')}}" alt="">
                        <p class="my-auto">Links</p>
                    </div>
                </div>


                <div class="col-12 ">


                        <div class="tags profile-padding-left">

                            <button type="button" class="btn rounded-pill px-3 bg-transparent border-primary text-primary my-3">Food</button>
                        </div>
                        <div class=" col-12 tags-description ">
                            <p class=" pe-2 ">This is our itinerary Description</p>
                        </div>
                </div>

             </div>
             <div class="col-lg-4">
                <div class="profile p-3">
                    <div class="d-flex align-items-center mb-3">
                        <div class="sideprofilepic rounded-circle">
                            <a href="{{ route('username', ['username' => $user->username]) }}">
                                        @if (!empty($user->profile))
                                        <img src="{{ asset('frontend/profile_pictures/'. $user->profile) }}" alt="" class=".img-80px">
                                        @else
                                        <img src="{{ asset('frontend/profile_pictures/avatar.png') }}" alt="" class=".img-80px">
                                        @endif
                                    </a>
                                        </div>
                                        <div class="sidenameandlinks ">
                                    <div class="profiler"><a class="text-black text-decoration-none" href="{{ route('username', ['username' => $user->username]) }}">{{$user->name}}</a></div>
                                    <div class="d-flex  socialpicsize">
                                        @if(!empty($user->facebook))
                                        <div>  <a href="{{$user->facebook}}"><img src="{{ asset('frontend/images/fb.png') }}" alt=""></a></div>
                                        @endif
                                        @if(!empty($user->twitter))
                                            <div><a href="{{$user->twitter}}"><img src="{{ asset('frontend/images/tw.png') }}" alt=""></a></div>
                                            @endif
                                            @if(!empty($user->instagram))
                                            <div> <a href="{{$user->instagram}}"><img src="{{ asset('frontend/images/insta.png') }}" alt=""></a></div>
                                        @endif
                                        @if(!empty($user->tiktok))
                                            <div><a href="{{$user->tiktok}}"><img src="{{ asset('frontend/images/tiktok.png') }}" alt=""></a></div>
                                            @endif
                                            @if(!empty($user->website))
                                            <div> <a href="{{$user->website}}"><img src="{{ asset('frontend/images/Link.png') }}" alt=""></a></div>
                                            @endif
                                    </div>
                                </div>


                            </div>
                                    <h6 class="profile-details p-3">
                                {{$user->bio}}
                            </h6>
                        </div>

                                <div class="profiles p-3 mt-5">
                                    <h6 class="profiler-related related">Related Content </h6>
                                    @if(!$related_itinerary->isEmpty())
                                    @foreach($related_itinerary as $row)

                                    <div class="pt-3 d-flex align-items-center ">
                                        <div class="">
                                            <a href="{{route('itinerary', ['slug' => $row->slug])}}">
                                                <img src="{{ asset('frontend/itineraries/'.$row->seo_image) }}" alt="" class="w-120"></a>
                                            </div>
                                            <div class="px-2 mx-1">
                                                <a href="{{route('itinerary', ['slug' => $row->slug])}}" style="text-decoration:none;">
                                                    <div class="profiler-relate profile-relate">{{$row->title}}</div>
                                                </a>
                                                <div class="d-flex align-items-center">
                                                <p class="lang"><a class="text-black text-decoration-none " href="{{ route('username', ['username' => $row->user->username]) }}">{{$row->user->name}} </a> |</p>
                                                <p class="lang px-2">{{ $row->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>


                                    @endforeach
                                    @endif
                                </div>
                            </div>

        </div>

            @else
            <div class="container margin-top-75">
            <div class="row">
                <div class="col-lg-8">
                    <div class="border rounded">

                        <div class="row  p-3 ">
                                <div class="col-12 d-flex justify-content-between ">
                                    <h1 class="trip-h1">{{ $itinerary->title}}</h1>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="bg-transparent border-0" data-bs-toggle="modal" data-bs-target="#intro">
                                        <img class="button-24" src="{{ asset('frontend/images/editbt.png')}}" alt="">
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="intro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold" id="staticBackdropLabel">
                                                    Edit Intro</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-3 ">
                                                    {!! Form::open(['route' => 'itineraries.update', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                    <input type="hidden" name="id" value="{{$itinerary->id}}">
                                                    <div class="mb-3">
                                                        <h4 class="fw-bold">Itinerary info</h4>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label fw-bold">Itinerary Title<span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" name="title" value="{{ $itinerary->title}}" class="form-control rounded-pill" required placeholder="Ex. My Winter Break 2022" id="title" aria-describedby="emailHelp">
                                                    </div>
                                                    {{-- <div class="mb-3">
                                                        <label for="title" class="form-label fw-bold">Slug Title<span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" name="slug" value="{{ $itinerary->slug}}" class="form-control rounded-pill" required placeholder="Slug" id="title" aria-describedby="emailHelp">
                                                    </div> --}}
                                                    <div class="mb-3">
                                                        <label for="tags" class="form-label fw-bold">Add Tags<span class="text-danger">*</span></label>
                                                        @php
                                                                $listtags = [];
                                                                $listtag = json_decode($itinerary->tags);
                                                                @endphp
                                                            @foreach ($tags as $key => $tags)
                                                            @php
                                                                    $listtags[$tags->id] = $tags->name;
                                                                    @endphp
                                                            @endforeach
                                                            {!! Form::select('tags[]', $listtags, $listtag, ['class' => 'form-control select2', 'required', 'multiple' => true]) !!}
                                                            <small class="small-tiny-color" >Add a tag by typing in the field above and hitting ‘enter’ on your keyboard or by clicking on a suggested tag.</small>
                                                        </div>
                                                    <div class="mb-3">
                                                        <label for="summary" class="form-label fw-bold">Itinerary Summary<span class="text-danger">*</span></label>
                                                        <textarea class="form-control" name="description" required id="exampleFormControlTextarea1" rows="5">{{ $itinerary->description}}</textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="title" class="form-label fw-bold">Location<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control rounded-pill" name="address_street" value="{{ $itinerary->address_street}}" id="address_street" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label fw-bold">Duration</label>
                                                        <input type="number" name="duration" value="{{ $itinerary->duration}}" class="form-control rounded-pill" placeholder="Duration">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="Personal-blog" class="form-label fw-bold">Personal Blog or Relevant Site</label>
                                                        <input type="text" name="website" value="{{ $itinerary->website}}" class="form-control rounded-pill" placeholder="Ex: www,nyc,com" id="Personal-blog" aria-describedby="emailHelp">
                                                    </div>

                                                    <div class="text-end ">
                                                        <button type="submit" class="btn save-bt btn-dark rounded-pill ">Save</button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="related d-flex align-items-center gap-2 profile-padding-left">
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

                            <div class="city d-flex profile-padding-left  flex-wrap">
                                <div class="d-flex align-items-center">
                                    <a href="#"><img src="{{ asset('frontend/images/nav.png') }}" alt=""></a>
                                    <h6 class="profile-p pt-2 mx-1">{{$itinerary->address_street}} </h6>
                                </div>
                                <div class=" d-flex align-items-center">
                                    <a href="#"><img src="{{ asset('frontend/images/mail.png') }}" alt=""></a>
                                    <h6 class="profile-p pt-2 mx-2">
                                        {{count($days)}}
                                        Days</h6>
                                    </div>
                                    <div class=" d-flex align-items-center">
                                        <a href="{{ (!empty($itinerary->website)) ? $itinerary->website : '#' }}"><img src="{{ asset('frontend/images/Link.png') }}" alt=""></a>
                                    <h6 class="profile-p pt-2 mx-2">Links<a href="{{ (!empty($itinerary->website)) ? $itinerary->website : '' }}">{{ $itinerary->website }}</a> </h6>
                                </div>
                            </div>

                            <div class="tags profile-padding-left flex-wrap gap-1">
                                @php
                                    $itinerarytag = json_decode($itinerary->tags);
                                @endphp
                                @if ($itinerarytag)
                                    @foreach($itinerarytag as $itinerarytag)
                                        @php
                                            $tag = $itinerary->tagsdata($itinerarytag);
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

                                </div>
                                <div class="col-12 tags-description ">
                                <p class=" pe-2 ">{{$itinerary->description}}</p>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="bg-light col-12 d-flex flex-column px-3 rounded-2">

                                    @if($itinerary->seo_image != '')
                                    <img src="{{asset('/frontend/itineraries/'.$itinerary->seo_image)}}" alt="Image Preview" class="wed-img m-0 mb-4">
                                    <!-- <div class="ms-2">
                                        <div class=" position-relative w-120">
                                            <a href=""><img src="{{ asset('frontend/images/fam.png') }}" class="  position-relative img-thumbnail" alt=""></a>
                                            <div class=" position-absolute top-0 end-0 p-1">
                                                    <button class="btn-close" ></button>
                                                </div>
                                            </div>
                                        </div> -->
                                        @endif
                                        <div class=" justify-content-center d-flex align-items-center mb-3">

                                        {{-- {!! Form::open(['route' => 'single.itinerary.cover.upload', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} --}}
                                        {!! Form::open(['route' => 'single.itinerary.cover.upload', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'dropzone w-100 bg-transparent rounded', 'id' =>'my-awesome-dropzone1']) !!}

                                        @csrf
                                             <input type="hidden" value="{{$itinerary->id}}" name="id">
                                                    <div class="dz-message" data-dz-message>
                                                        <div  class="text-center ">
                                                            <div id="image-preview-1" class="image-preview-1">  <img  src="{{ asset('frontend/images/add-image.png')}}" alt=""></div>
                                                            <h3>Add cover photo!</h3>
                                                                <p>Showcase the itinerary showing image.</p>
                                                                <div class="d-flex gap-2 justify-content-center">
                                                                    <img src="{{ asset('frontend/images/add-cover.svg')}}" alt="">
                                                                    <input type="submit" id="submitbtn" value="Save" class="btn btn-dark rounded-pill save-bt d-none">
                                                                </div>
                                                        </div>
                                                    </div>
{{--
                                        <label for="image-upload" class="text-center ">
                                            <img id="image-preview" src="{{ asset('frontend/images/add-image.png') }}" alt="Image Preview" class="mb-2 w-150 mt-3">
                                            <h3>Add cover photo!</h3>
                                             <p>Showcase the itinerary showing image.</p>
                                            <div class="d-flex gap-2 justify-content-center">
                                            <img src="{{ asset('frontend/images/add-cover.svg')}}" alt="">
                                            <input type="submit" id="submitbtn" value="Save" class="btn btn-dark rounded-pill save-bt d-none">
                                            </div>
                                        </label> --}}

                                        {!! Form::close() !!}
                                           </div>


                                    {!! Form::open(['route' => 'single.itinerary.cover.upload', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                    <!-- <input type='file' id="imgInp"/>
                                        <img id="blah" src="#" alt="your image" /> -->
                                         <div class="col-12 d-none">
                                             <input type="file" id="image-upload" name="seo_image" accept="image/*" required class="form-control py-3">
                                            <input type="hidden" value="{{$itinerary->id}}" name="id">
                                            <input type="submit" id="submitbtn" value="Save" class="btn btn-dark rounded-pill save-bt d-none">
                                            </div>
                                            {{-- <div class="col-12 py-4"> --}}

                                                {{-- <img id="image-preview" src="{{ asset('frontend/images/map.png') }}" alt="Image Preview" class="img-thumbnail w-200"> --}}
                                                <!-- <label for="file" class="text-center">
                                                    <img src="{{ asset('frontend/images/add-image.png')}}" alt="">
                                                    <h3>Add cover photo!</h3>
                                                    <p>Showcase the itinerary showing image.</p>
                                                    <img src="{{ asset('frontend/images/add-cover.svg')}}" alt="">
                                                </label> -->


                                        {{-- </div> --}}
                                        {!! Form::close() !!}
                                        <script>
                                        function previewImage(event) {
                                            var reader = new FileReader();
                                            reader.onload = function() {
                                            var output = document.getElementById('image-preview');
                                            output.src = reader.result;
                                        };
                                        reader.readAsDataURL(event.target.files[0]);
                                    }

                                        var fileInput = document.getElementById('image-upload');
                                        fileInput.addEventListener('change', previewImage);
                                     </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            @if(!empty($days))
                            @foreach($days as $key => $days)
                            @php
                                    $count = ++$key;
                                @endphp
                                <div class="col-12 d-flex justify-content-between  border rounded-3 px-3 py-2 mt-3">
                                    <h2 class="fw-bold mb-0">Day {{$count}}</h2>
                                    <button type="button" class="bg-transparent border-0" data-role="btnshowactivitymodel" data-itineraryid="{{$itinerary->id}}" data-daysid="{{$days->id}}" data-bs-toggle="modal" data-bs-target="#day{{$count}}">
                                        <img src="{{ asset('frontend/images/editbt.png')}}" class="button-24"  alt=""></button>
                                        <!-- Modal -->
                                    <div class="modal fade" id="day{{$count}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog day-pop-width modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold" id="staticBackdropLabel">Day {{$count}} Activities</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" id="showitinerariesdaysactivities{{$days->id}}">

                                                </div>
                                                <div class="mb-3 activity-bt border border-0 mx-3 mb-3">
                                                    <a href="javascript:void(0)" class="text-decoration-none" data-id="showitinerariesdaysactivities{{$days->id}}" data-role="btnaddactivity" data-itineraryid="{{$itinerary->id}}" data-daysid="{{$days->id}}">
                                                        <h5 class="text-center text-danger add-activity-bt rounded-pill fw-bold m-0 p-2"> + Add activity </h5>
                                                    </a>
                                                </div>
                                                <div class="mb-3 activity-bt border rounded-pill mx-3 mb-3">
                                                    <a href="{{url('/deleteday/'.$days->id.'/'.$days->itineraries_id)}}" style="text-decoration:none;">
                                                        <h5 class="text-center text-danger m-0 p-2 fw-bold">
                                                            Delete Day
                                                        </h5>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif

                                <div class=" justify-content-center d-flex align-items-center">
                                    <div class="vr vr3"></div>
                            </div>
                            <a href="{{ url('create-itinerary-day/'.$itinerary->id)}}" style="text-decoration:none;">
                                <div class="col-12  text-center border rounded-3 px-3 py-2 my-3 mt-0">
                                    <h2 class="text-danger fw-bold mb-0">+Add Day</h2>
                                </div>
                            </a>
                            <div class="col-12 rounded-2 bg-light align-items-center d-flex flex-column justify-content-center mb-5 height-400">

                                <div class="col-12 gallery-images p-3">
                                    <h3 class="align-self-start justify-content-start px-3 fw-bold">Gallery Pictures</h3>
                                    @if($itinerary_gallery)
                                            <div class="gallery-img py-2">
                                                <div class="d-flex images-items flex-wrap gap-3 mb-3">
                                                    @foreach($itinerary_gallery as $files)

                                                    <div class=" position-relative">
                                                        <img src="{{ asset('frontend/itineraries/'.$files->image) }}" class=" w-200 position-relative img-thumbnail" alt="">
                                                        <a href="{{ url('/delete_gallery_image/'.$files->id)}}"><div class=" position-absolute top-0 end-0 p-1 ">
                                                    <button class="btn-close btn-close-white p-2 bg-body" ></button>
                                                </div></a>
                                                    </div>
                                                    @endforeach

                                                </div>

                                            </div>
                                            @endif
                                        @endif
                                    @if($itinerary_gallery)
                                    <div class=" justify-content-center d-flex align-items-center">
                                        {!! Form::open(['route' => 'single.itinerary.gallery.upload', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'dropzone w-100 rounded bg-transparent', 'id' =>'my-awesome-dropzone']) !!}
                                        {{-- <form action="{{'route('single.itinerary.gallery.upload')}}" class="dropzone w-100 " id="my-awesome-dropzone"> --}}
                                            @csrf
                                             <input type="hidden" value="{{$itinerary->id}}" name="id">
                                            <div class="dz-message" data-dz-message>
                                                <div  class="text-center ">

                                                        {{-- <div class="col-12 d-none"><input type="file" id="image-upload-1" name="images[]" required class="form-control" accept="image/*" multiple></div> --}}
                                                        <div id="image-preview-1" class="image-preview-1">  <img  src="{{ asset('frontend/images/add-image.png')}}" alt=""></div>
                                                        <p class="attach-area-width text-center mx-auto">
                                                            <span class="fw-bold">Attach or drop your images here.</span><br>
                                                            Accepts .jpg, .jpeg, .png, and .gif file types.</p>
                                                            <p class="fw-bold">Maximum file size is 5 MB</p>

                                                            <!-- <button type="button" class="btn btn-danger rounded-pill px-4 text-center">Attach</button> -->
                                                            {{-- <input type="file" id="image-upload-1" class="d-none"> --}}
                                                            <div class="d-flex gap-2 justify-content-center">
                                                                <img src="{{ asset('frontend/images/attach.svg')}}" alt="">
                                                                {{-- <input type="submit" value="Save" class="btn btn-dark rounded-pill save-bt my-4"> --}}
                                                            </div>

                                                    </div>
                                                </div>


                                                {{-- <label for="image-upload-1" class="text-center ">
                                                        <div class="col-12 d-none"><input type="file" id="image-upload-1" name="images[]" required class="form-control" accept="image/*" multiple></div>
                                                        <div id="image-preview-1" class="image-preview-1">  <img  src="{{ asset('frontend/images/add-image.png')}}" alt=""></div>
                                                        <p class="attach-area-width text-center mx-auto">
                                                            <span class="fw-bold">Attach or drop your images here.</span><br>
                                                            Accepts .jpg, .jpeg, .png, and .gif file types.</p>
                                                            <p class="fw-bold">Maximum file size is 5 MB</p>
                                                            <!-- <button type="button" class="btn btn-danger rounded-pill px-4 text-center">Attach</button> -->
                                                            <input type="file" id="image-upload-1" class="d-none">
                                                            <div class="d-flex gap-2 justify-content-center">
                                                                <img src="{{ asset('frontend/images/attach.svg')}}" alt="">
                                                                <input type="submit" value="Save" class="btn btn-dark rounded-pill save-bt my-4">
                                                            </div>
                                                    </label> --}}
                                               {!! Form::close() !!}
                                            </div>


                                    {{-- {!! Form::open(['route' => 'single.itinerary.gallery.upload', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                    <div class="col-12 d-none">
                                    <input type="file" id="image-upload-1" name="images[]" required class="form-control" accept="image/*" multiple>
                                    </div>
                                    <br>



                                    <input type="hidden" value="{{$itinerary->id}}" name="id">

                                    {!! Form::close() !!} --}}
                                    <!-- <label for="file" class="text-center">
                                        <img src="{{ asset('frontend/images/add-image.png')}}" alt="">

                                        <p class="attach-area-width text-center">
                                            <span class="fw-bold">Attach or drop your images here.</span><br>
                                            Accepts .jpg, .jpeg, .png, and .gif file types.</p>
                                            <p class="fw-bold">Maximum file size is 5 MB</p>

                                        <button type="button" class="btn btn-danger rounded-pill px-4 text-center">Attach</button>
                                        <input type="file" id="file" class="d-none">

                                        <img src="{{ asset('frontend/images/Attach.png')}}" alt=""></label> -->
                                        <script>
                                            function previewImages(event) {
                                                var files = event.target.files;
                                                var previewContainer = document.getElementById('image-preview-1');

                                                // Clear existing previews
                                                previewContainer.innerHTML = '';

                                                for (var i = 0; i < files.length; i++) {
                                                    var reader = new FileReader();

                                                    reader.onload = function(e) {
                                                        var previewImage = document.createElement('img');
                                                        previewImage.classList.add('preview-image','img-thumbnail','w-200','m-1');
                                                        previewImage.src = e.target.result;

                                                        previewContainer.appendChild(previewImage);
                                                    };

                                                    reader.readAsDataURL(files[i]);
                                                }
                                            }

                                            var fileInput = document.getElementById('image-upload-1');
                                            fileInput.addEventListener('change', previewImages);
                                            </script>
                                    </div>
                                </div>


                                <!-- Extra Activity -->


                                <!-- Modal -->
                                <div class="modal fade" id="intro1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Day 1 Activities</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">


                                            <div class="col-12 border rounded-pill p-1 mb-2  d-flex justify-content-between">
                                                <p class="m-0 align-self-center px-3">1. Metropolitan Museum</p>
                                                <img class="edit-bt-size" src="{{ asset('frontend/images/editbt.png')}}" alt="">
                                            </div>
                                            <div class="col-12 border rounded-pill p-1 mb-2 d-flex justify-content-between">
                                                <p class="m-0 align-self-center px-3">2. Statue of Liberty</p>
                                                <img class="edit-bt-size" src="{{ asset('frontend/images/editbt.png')}}" alt="">
                                            </div>
                                            <div class="col-12 border rounded-pill text-danger text-center mb-5">
                                                <p class="m-0 align-self-center p-1 px-3 fw-bold">+ Add activity</p>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
            <div class="col-lg-4">
                <div class="profile p-3">
                    <div class="d-flex align-items-center mb-3">
                        <div class="sideprofilepic rounded-circle">
                            <a href="{{ route('username', ['username' => $itinerary->user->username]) }}">
                                        @if (!empty($itinerary->user->profile))
                                        <img src="{{ asset('frontend/profile_pictures/'. $itinerary->user->profile) }}" alt="" class="">
                                        @else
                                        <img src="{{ asset('frontend/profile_pictures/avatar.png') }}" alt="" class="">
                                        @endif
                                    </a>
                                        </div>
                                        <div class="sidenameandlinks ">
                                    <div class="profiler"><a class="text-black text-decoration-none" href="{{ route('username', ['username' => $itinerary->user->username]) }}">{{$itinerary->user->name}}</a></div>
                                    <div class="d-flex  socialpicsize d-none d-sm-flex">
                                        @if(!empty($itinerary->user->facebook))
                                        <div>  <a href="{{$itinerary->user->facebook}}"><img src="{{ asset('frontend/images/fb.png') }}" alt=""></a></div>
                                        @endif
                                        @if(!empty($itinerary->user->twitter))
                                            <div><a href="{{$itinerary->user->twitter}}"><img src="{{ asset('frontend/images/tw.png') }}" alt=""></a></div>
                                            @endif
                                            @if(!empty($itinerary->user->instagram))
                                            <div> <a href="{{$itinerary->user->instagram}}"><img src="{{ asset('frontend/images/insta.png') }}" alt=""></a></div>
                                        @endif
                                        @if(!empty($itinerary->user->tiktok))
                                            <div><a href="{{$itinerary->user->tiktok}}"><img src="{{ asset('frontend/images/tiktok.png') }}" alt=""></a></div>
                                            @endif
                                            @if(!empty($itinerary->user->website))
                                            <div> <a href="{{$itinerary->user->website}}"><img src="{{ asset('frontend/images/Link.png') }}" alt=""></a></div>
                                            @endif
                                    </div>
                                </div>


                            </div>
                                    <h6 class="profile-details p-3">
                                {{$itinerary->user->bio}}
                            </h6>
                            <div class="d-flex  socialpicsize d-sm-none justify-content-around">
                                        @if(!empty($itinerary->user->facebook))
                                        <div>  <a href="{{$itinerary->user->facebook}}"><img src="{{ asset('frontend/images/fb.png') }}" alt=""></a></div>
                                        @endif
                                        @if(!empty($itinerary->user->twitter))
                                            <div><a href="{{$itinerary->user->twitter}}"><img src="{{ asset('frontend/images/tw.png') }}" alt=""></a></div>
                                            @endif
                                            @if(!empty($itinerary->user->instagram))
                                            <div> <a href="{{$itinerary->user->instagram}}"><img src="{{ asset('frontend/images/insta.png') }}" alt=""></a></div>
                                        @endif
                                        @if(!empty($itinerary->user->tiktok))
                                            <div><a href="{{$itinerary->user->tiktok}}"><img src="{{ asset('frontend/images/tiktok.png') }}" alt=""></a></div>
                                            @endif
                                            @if(!empty($itinerary->user->website))
                                            <div> <a href="{{$itinerary->user->website}}"><img src="{{ asset('frontend/images/Link.png') }}" alt=""></a></div>
                                            @endif
                                    </div>
                        </div>

                                <div class="profiles p-3 mt-32">
                                   <h6 class=" profiler-related related">Related Content </h6>
                                    @if(!$related_itinerary->isEmpty())
                                    @foreach($related_itinerary as $row)

                                    <div class=" col-md-6 col-lg-12 pt-3 d-flex align-items-center ">
                                        <div class="">
                                            <a href="{{route('itinerary', ['slug' => $row->slug])}}">
                                                <img src="{{ asset('frontend/itineraries/'.$row->seo_image) }}" alt="" class="w-120"></a>
                                        </div>
                                            <div class="px-2 mx-1">
                                                <a href="{{route('itinerary', ['slug' => $row->slug])}}" style="text-decoration:none;">
                                                    <div class="profiler-relate profile-relate">{{$row->title}}</div>
                                                </a>
                                                <div class="d-flex align-items-center">
                                                <p class="lang"><a class="text-black text-decoration-none " href="{{ route('username', ['username' => $row->user->username]) }}">{{$row->user->name}} </a> |</p>
                                                <p class="lang px-2">{{ $row->created_at->diffForHumans() }}</p>
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
</div>
@endif
</section>
@endsection

