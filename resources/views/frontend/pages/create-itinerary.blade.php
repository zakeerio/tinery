@extends('frontend.layouts.app')

@section('content')
    @php
        $usercheck = isset($isloggedin) ? $isloggedin : false;;
        $user = auth('user')->user();
        
        $key = env('GOOGLE_MAP_API_KEY');
    @endphp
    <section class="profile-section">
        <div class="container mt-4">
            <div class="row border p-2 rounded p-3 ">
                <div class="col-12 d-flex justify-content-between ">
                    <h2>{{$itinerary->title}}</h2>
                    <!-- Button trigger modal -->
                    <button type="button" class="bg-transparent border-0" data-bs-toggle="modal" data-bs-target="#intro">
                        <img src="{{ asset('frontend/images/editbt.png')}}" alt="">
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="intro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">
                                        Intro</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-3 ">
                                    {!! Form::open(['route' => 'itineraries.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                    <input type="hidden" name="id" value="{{$itinerary->id}}">
                                    <div class="mb-3">
                                        <h4>Itinerary info</h4>
                                    </div>
                                    <div class="mb-3">
                                        <label for="title" class="form-label fw-bold">Itinerary Title<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="title" value="{{ $itinerary->title}}" class="form-control rounded-pill" required placeholder="Ex. My Winter Break 2022" id="title" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="title" class="form-label fw-bold">Slug Title<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="slug" value="{{ $itinerary->slug}}" class="form-control rounded-pill" required placeholder="Slug" id="title" aria-describedby="emailHelp">
                                    </div>
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
                                            {!! Form::select('tags[]', $listtags, $listtag, ['class' => 'form-control', 'required', 'multiple' => true]) !!}
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
                                    <!-- space problem -->
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


            <div class="col-12 d-flex align-items-center my-3  gap-2">
                <img src="{{ asset('frontend/images/Image.png')}}" alt="">
                <p class="my-auto">{{$user->name}}</p>
                <div class="vr h-50 align-self-center"></div>
                <div class="text">{{date('d/m/Y',strtotime($user->created_at))}}
                </div>
            </div>

            <div class="col-12 d-flex gap-3">
                <div class="location d-flex gap-2 align-items-center">
                    <img class="w" src="{{ asset('frontend/images/location.png')}}" alt="">
                    <p class="my-auto">{{$itinerary->address_street}}</p>
                </div>
                <div class="location d-flex gap-2 align-items-center">
                    <img class="w" src="{{ asset('frontend/images/duration.png')}}" alt="">
                    <p class="my-auto">{{$itinerary->duration}}</p>
                </div>
                <div class="location d-flex gap-2 align-items-center">
                    <img class="w" src="{{ asset('frontend/images/world.png')}}" alt="">
                    <p class="my-auto">{{$itinerary->website}}</p>
                </div>
            </div>

            <div class="col-12 ">
                @if($itinerary->tags != '')
                @php
                    $tags = json_decode($itinerary->tags);
                @endphp
                @foreach($tags as $tags)
                @php
                    $tag = \App\Models\tags::find($tags);
                @endphp
                <button type="button" class="btn rounded-pill px-3 bg-transparent border-primary text-primary my-3">{{$tag->name}}</button>
                @endforeach
                @endif
            </div>
            <div class="col-12 mb-3">
                <p>{{$itinerary->description}}</p>
            </div>


            <div class="col-12 rounded-2 bg-light align-items-center d-flex flex-column justify-content-center" style="height:412px" ;>
                <input type="file" id="file" class="d-none">
                <label for="file" class="text-center">
                    <img src="{{ asset('frontend/images/add-image.png')}}" alt="">
                    <h3>Add cover photo!</h3>
                    <p>Showcase the itinerary showing image.</p>
                    <img src="{{ asset('frontend/images/cover-bt.png')}}" alt="">
                </label>
            </div>


            <div class="col-12 d-flex justify-content-between  border rounded-3 p-3 mt-3">

                <h2>Day 1</h2>
                <button type="button" class="bg-transparent border-0" data-bs-toggle="modal" data-bs-target="#day1">
                    <img src="{{ asset('frontend/images/editbt.png')}}" alt=""></button>

                <!-- Modal -->
                <div class="modal fade" id="day1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Day 1 Activities</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">


                                <div class=" p-3">
                                    <div class="row border rounded-pill ">
                                        <div class="col-12 d-flex justify-content-between  align-items-center">
                                            <p class="m-0">Activity 1</p>
                                            <button type="button" class="bg-transparent border-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <img class="w-75" src="{{ asset('frontend/images/editbt.png')}}" alt="">
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bg-light rounded-2 p-2 mt-2 mb-2">
                                        <div class="mb-3 ">
                                            <div class="mb-3 d-flex gap-1">
                                                <div class="">
                                                    <label for="title1" class="form-label fw-bold">Title</label>
                                                    <input type="text" class="form-control rounded-pill" placeholder="Ex. Metropolitan Museum" id="title1" aria-describedby="titleHelp">
                                                </div>
                                                <div class="">
                                                    <label for="title1" class="form-label fw-bold">Time</label>
                                                    <input type="time" class="form-control rounded-pill" placeholder="Ex. Metropolitan Museum" id="title1" aria-describedby="timeHelp">
                                                </div>
                                                <div class="">
                                                    <label for="title1" class="form-label fw-bold">&nbsp;</label>
                                                    <label for="title1" class="form-label fw-bold px-1">
                                                        <h4>:</h4>
                                                    </label>
                                                </div>
                                                <div class="">
                                                    <label for="title1" class="form-label fw-bold">&nbsp;</label>
                                                    <input type="time" class="form-control rounded-pill" placeholder="Ex. Metropolitan Museum" id="title1" aria-describedby="timeHelp">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="summary" class="form-label fw-bold">Summary</label>
                                            <!-- <input type="" class="form-control rounded"  style="min-height:145px;" placeholder="Please add summary" id="summary" aria-describedby="emailHelp"> -->
                                            <textarea class="form-control" placeholder="Please add summary" id="exampleFormControlTextarea1" rows="5"></textarea>

                                        </div>
                                        <div class="mb-3 d-flex align-items-center gap-2 border rounded-pill p-2">
                                            <img src="{{ asset('frontend/images/location1.png')}}" alt="">
                                            <p class="text-center m-0">Add map location</p>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="button" class="btn save-bt btn-dark rounded-pill float-end ">Save</button>
                                    </div>

                                </div>


                            </div>
                            <div class="mb-3 activity-bt border rounded-pill mx-3 mb-3">
                                <h5 class="text-center text-danger m-0 p-2 " data-bs-toggle="modal" data-bs-target="#intro1">+ Add activity</h5>

                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <!-- line pbolem -->
            <div class="vr mx-auto"></div>
            <div class="col-12  text-center border rounded-3 p-3 my-3 mt-1">

                <h2 class="text-danger">+Add Day</h2>
            </div>

            <div class="col-12 rounded-2 bg-light align-items-center d-flex flex-column justify-content-center mb-5" style="height:345px" ;>


                <h3 class="align-self-start justify-content-start px-3">Pictures</h3>

                <label for="file" class="text-center">
                    <img src="{{ asset('frontend/images/add-image.png')}}" alt="">

                    <p class="attach-area-width text-center">
                        <span class="fw-bold">Attach or drop your images here.</span><br>
                        Accepts .jpg, .jpeg, .png, and .gif file types.</p>
                    <p class="fw-bold">Maximum file size is 5 MB</p>

                    <!-- <button type="button" class="btn btn-danger rounded-pill px-4 text-center">Attach</button> -->
                    <input type="file" id="file" class="d-none">

                    <img src="{{ asset('frontend/images/Attach.png')}}" alt=""></label>
            </div>


            <!-- Extra Activity -->


            <!-- Modal -->
            <div class="modal fade" id="intro1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
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
</div>

</section>
@endsection

