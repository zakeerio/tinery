@extends('frontend.layouts.app')

@section('content')
    @php
        $usercheck = isset($isloggedin) ? $isloggedin : false;
        $user = auth('user')->user();

        $key = env('GOOGLE_MAP_API_KEY');
    @endphp
    <section class="profile-section ">
        @if (!empty($itinerary))
            <div class="container margin-top-75">
                <div class="row justify-content-center">
                    <div class="col-11 px-0">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="border rounded  p-30p">
                                    <div class="row  ">
                                        <div class="col-12 d-flex pb-lg-4 pb-2 justify-content-between ">
                                            <h1 class="trip-h1">
                                                @if ($itinerary->title != '')
                                                    {{ $itinerary->title }}
                                                @else
                                                    Itinerary Name
                                                @endif
                                            </h1>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="bg-transparent border-0" data-bs-toggle="modal"
                                                data-bs-target="#intro">
                                                <img class="button-24" src="{{ asset('frontend/images/editbt.png') }}"
                                                    alt="">
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="intro" data-bs-backdrop="static"
                                                data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fs-18-600 dark-blue-500"
                                                                id="staticBackdropLabel">
                                                                Edit Intro</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-3 ">
                                                            {!! Form::open(['route' => 'itineraries.update', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                            <input type="hidden" name="id"
                                                                value="{{ $itinerary->id }}">
                                                            <div class="mb-3">
                                                                <h4 class="fs-24-600 dark-blue-500">Itinerary info</h4>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="title" class="form-label fs-16-700">Itinerary
                                                                    Title<span class="text-danger">*</span>
                                                                </label>
                                                                <input type="text" name="title"
                                                                    value="{{ $itinerary->title }}"
                                                                    class="form-control fs-16-300 rounded-pill black-300"
                                                                    required placeholder="Ex. My Winter Break 2022"
                                                                    id="title" aria-describedby="emailHelp">
                                                            </div>
                                                            {{-- <div class="mb-3">
                                                                <label for="title" class="form-label fw-bold">Slug Title<span class="text-danger">*</span>
                                                                </label>
                                                                <input type="text" name="slug" value="{{ $itinerary->slug}}" class="form-control rounded-pill" required placeholder="Slug" id="title" aria-describedby="emailHelp">
                                                            </div> --}}
                                                            <div class="mb-3">
                                                                <label for="tags" class="form-label fs-16-700 ">Add
                                                                    Tags<span class="text-danger">*</span></label>
                                                                @php
                                                                    $listtags = [];
                                                                    $listtag = json_decode($itinerary->tags);
                                                                @endphp
                                                                @foreach ($tags as $key => $tags)
                                                                    @php
                                                                        $listtags[$tags->id] = $tags->name;
                                                                    @endphp
                                                                @endforeach
                                                                {!! Form::select('tags[]', $listtags, $listtag, [
                                                                    'class' => 'form-control fs-16-300 black-300 rounded-pill select2',
                                                                    'required',
                                                                    'multiple' => true,
                                                                ]) !!}
                                                                <small class="black-300 fs-12-400 ">Add a tag by typing in
                                                                    the field above and hitting ‘enter’ on your keyboard or
                                                                    by clicking on a suggested tag.</small>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="summary" class="form-label fs-16-700">Itinerary
                                                                    Summary<span class="text-danger">*</span></label>
                                                                <textarea class="form-control fs-16-300 black-300" name="description" required placeholder="Please add summary"
                                                                    id="exampleFormControlTextarea1" rows="5">{{ $itinerary->description }}</textarea>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="title"
                                                                    class="form-label fs-16-700 ">Location<span
                                                                        class="text-danger">*</span></label>
                                                                @if (!empty($itinerary_location))
                                                                    @foreach ($itinerary_location as $key => $row)
                                                                        @php
                                                                            $locations[$row->id] = $row->address_city;
                                                                        @endphp
                                                                    @endforeach
                                                                @endif
                                                                {!! Form::select('address_street', $locations, $itinerary->location_id, [
                                                                    'class' => 'form-control  select2',
                                                                    'required',
                                                                ]) !!}
                                                                {{-- <input type="text" class="form-control rounded-pill" name="address_street" value="{{ $itinerary->address_street}}" id="address_street" required> --}}
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="title"
                                                                    class="form-label fs-16-700">Duration</label>
                                                                <input type="number" name="duration"
                                                                    value="{{ $itinerary->duration }}"
                                                                    class="form-control fs-16-300 rounded-pill"
                                                                    placeholder="Duration">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="Personal-blog"
                                                                    class="form-label fs-16-700">Personal Blog or Relevant
                                                                    Site</label>
                                                                <input type="url" name="website"
                                                                    value="{{ $itinerary->website }}"
                                                                    class="form-control fs-16-300 rounded-pill"
                                                                    placeholder="Ex: www.nyc.com" id="Personal-blog"
                                                                    aria-describedby="emailHelp">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="Personal-blog"
                                                                    class="form-label fs-16-700">Visibility</label>
                                                                <select name="visibility"
                                                                    class="form-control fs-16-300 rounded-pill" required>
                                                                    <option value="public"
                                                                        {{ $itinerary->visibility == 'public' ? 'selected' : '' }}>
                                                                        Public</option>
                                                                    <option value="private"
                                                                        {{ $itinerary->visibility == 'private' ? 'selected' : '' }}>
                                                                        Private</option>
                                                                </select>
                                                            </div>

                                                            <div class="text-end ">
                                                                <button type="submit"
                                                                    class="btn save-bt btn-dark rounded-pill ">Save</button>
                                                            </div>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="related d-flex align-items-center gap-2 " >
                                        <div class=" ">
                                            <a href="{{ route('username', ['username' => $itinerary->user->username]) }}">
                                                @if (!empty($itinerary->user->profile))
                                                    <img src="{{ asset('frontend/profile_pictures/' . $itinerary->user->profile) }}"
                                                        alt="" class="imgagesize rounded-circle">
                                                @else
                                                    <img src="{{ asset('frontend/profile_pictures/avatar.png') }}"
                                                        alt="" class="imgagesize rounded-circle">
                                                @endif
                                            </a>
                                        </div>

                                        <div class="profile-p px-1 profilefont"><a class="text-black text-decoration-none"
                                                href="{{ route('username', ['username' => $itinerary->user->username]) }}">{{ $itinerary->user ? $itinerary->user->name : 'User not found.' }}
                                            </a></div>
                                        <div class="vr align-self-center linesize mx-1"></div>
                                        <div class="profile-p px-3">
                                            {{ date('d/y/Y', strtotime($itinerary->created_at)) }}</div>
                                    </div>

                                    <div class="city d-flex   flex-wrap">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('frontend/images/nav.png') }}" alt="">
                                            <h6 class="profile-p pt-2 mx-1">
                                                @if ($itinerary->location_id != '0' && $itinerary->itinerarylocations)
                                                    {{ $itinerary->itinerarylocations->address_city }}
                                                @else
                                                    Location
                                                @endif
                                            </h6>
                                        </div>
                                        <div class=" d-flex align-items-center">
                                            <img src="{{ asset('frontend/images/mail.png') }}" alt="">
                                            <h6 class="profile-p pt-2 mx-2">
                                                @if (count($days) > 0)
                                                    {{ count($days) }} Day{{ count($days) > 1 ? 's' : '' }}
                                                @else
                                                    Duration
                                                @endif
                                            </h6>
                                        </div>
                                        <div class=" d-flex align-items-center">
                                            <img src="{{ asset('frontend/images/Link.png') }}" alt="">
                                            <h6 class="profile-p pt-2 mx-2">
                                                @if (!empty($itinerary->website))
                                                    <a href="{{ !empty($itinerary->website) ? $itinerary->website : '' }}"
                                                        class="text-decoration-none profile-p">{{ $itinerary->website }}</a>
                                                @else
                                                    Links
                                                @endif
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="tags  flex-wrap gap-1" style="margin-top:-40px;">
                                        @php
                                            $itinerarytag = json_decode($itinerary->tags);
                                        @endphp
                                        @if ($itinerarytag)
                                            @foreach ($itinerarytag as $itinerarytag)
                                                @php
                                                    $tag = $itinerary->tagsdata($itinerarytag);
                                                @endphp
                                                @if ($tag)
                                                    <a href="{{ url('/tags/' . $tag->slug) }}">
                                                        <button class="foodie text-nowrap">
                                                            {{ $tag->name }}
                                                        </button>
                                                    </a>
                                                @endif
                                            @endforeach

                                        @endif

                                    </div>
                                    <div class="col-12 tags-description ">
                                        <p class=" pe-2 ">
                                            @if ($itinerary->description != '')
                                                {{ $itinerary->description }}
                                            @else
                                                You itinerary summary will take place here.
                                            @endif
                                        </p>
                                    </div>
                                    {{-- @if (Session::has('successitinerary'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ Session::get('successitinerary') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif --}}
                                    <div class="col-12 mt-4 pb-4">
                                        @php
                                            $featured_image = $itinerary->seo_image != '' ? asset('/frontend/itineraries/' . $itinerary->seo_image) : asset('frontend/images/annie-spratt.jpg');
                                        @endphp
                                        {{--
                                        <div class="bg-light col-12 d-flex flex-column align-items-center rounded-2 position-relative h-412 " style="background-image:url({{$featured_image }} ); background-size: cover; ">
                                            <div class=" w-100 h-100 p-2 bg-c-o ">
                                                {!! Form::open(['route' => 'single.itinerary.cover.upload', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'dropzone bg-c-o border-white   d-flex align-items-center justify-content-center h-100 w-100 rounded ', 'id' =>'my-awesome-dropzone1']) !!}

                                                @csrf
                                                <input type="hidden" value="{{$itinerary->id}}" name="id">
                                                <div class="dz-message  p-0 m-0  " data-dz-message>
                                                    <div  class="text-center text-white ">
                                                        <div id="image-preview-1" class="image-preview-1">  <img  src="{{ asset('frontend/images/add-image.svg')}}" alt="" class="  "></div>
                                                        <h3 class="">Add cover photo!</h3>
                                                        <p class="">Showcase the itinerary showing image.</p>
                                                        <div class="d-flex gap-2 justify-content-center">
                                                            <img src="{{ asset('frontend/images/add-cover.svg')}}" alt="">
                                                            <input type="submit" id="submitbtn" value="Save" class="btn btn-dark rounded-pill save-bt d-none">
                                                        </div>
                                                    </div>
                                                </div>

                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                        --}}
                                        <div id="bgimg"
                                            class="bg-light col-12 d-flex flex-column align-items-center rounded-2 position-relative"
                                            style="background-image:url({{ $featured_image }} ); background-size: cover; ">
                                            <div class="w-100 h-100 p-2 bg-c-o r-10">
                                                {!! Form::open([
                                                    'route' => 'single.itinerary.cover.upload',
                                                    'method' => 'POST',
                                                    'enctype' => 'multipart/form-data',
                                                    'class' => 'dropzone bg-c-o border-white d-flex align-items-center justify-content-center h-100 w-100 rounded',
                                                    'id' => 'my-awesome-dropzone1',
                                                ]) !!}
                                                @csrf
                                                <input type="hidden" value="{{ $itinerary->id }}" name="id">
                                                <div class="dz-message p-0 m-0" data-dz-message>
                                                    <div class="text-center text-white">
                                                        <div id="image-preview-1" class="image-preview-1">
                                                            <img src="{{ asset('frontend/images/add-image.svg') }}"
                                                                alt="" class="w-h-68p ">
                                                        </div>
                                                        <h3 class=" fs-24-600  add-photo-p ">Add cover photo!</h3>
                                                        <p class="fs-16-300 text-white">Showcase the itinerary showing
                                                            image.</p>
                                                        <div class="d-flex gap-2 justify-content-center">
                                                            <img src="{{ asset('frontend/images/add-cover.svg') }}"
                                                                alt="">
                                                            <input type="submit" id="submitbtn" value="Save"
                                                                class="btn btn-dark rounded-pill save-bt d-none savecoveritinerary">
                                                        </div>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12">
                                    @if (!empty($days))
                                        @foreach ($days as $key => $days)
                                            @php
                                                $count = ++$key;
                                            @endphp
                                            <div
                                                class="col-12 d-flex justify-content-between align-items-center  border rounded-3 px-3 py-2 mt-3">
                                                <h2 class="mb-0 gallery py-2">Day {{ $count }}</h2>
                                                <button type="button" class="bg-transparent border-0"
                                                    data-role="btnshowactivitymodel"
                                                    data-itineraryid="{{ $itinerary->id }}"
                                                    data-daysid="{{ $days->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#day{{ $count }}">
                                                    <img src="{{ asset('frontend/images/editbt.png') }}"
                                                        class="button-24" alt=""></button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="day{{ $count }}"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div
                                                        class="modal-dialog day-pop-width modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title fs-18-600 dark-blue-500"
                                                                    id="staticBackdropLabel">Day {{ $count }}
                                                                    Activities</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body"
                                                                id="showitinerariesdaysactivities{{ $days->id }}">

                                                            </div>
                                                            <div class="mb-3 activity-bt border border-0 mx-3 mb-3">
                                                                <a href="javascript:void(0)" class="text-decoration-none"
                                                                    data-id="showitinerariesdaysactivities{{ $days->id }}"
                                                                    data-role="btnaddactivity"
                                                                    data-itineraryid="{{ $itinerary->id }}"
                                                                    data-daysid="{{ $days->id }}">
                                                                    <p
                                                                        class="text-center text-danger add-activity-bt rounded-pill  m-0 py-2 fs-13-700">
                                                                        + Add activity </p>
                                                                </a>
                                                            </div>
                                                            <div class="mb-3 activity-bt border rounded-pill mx-3 mb-3">
                                                                <a href="{{ url('/deleteday/' . $days->id . '/' . $days->itineraries_id) }}"
                                                                    style="text-decoration:none;">
                                                                    <h5
                                                                        class="text-center text-danger m-0  py-2 fs-16-700">
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
                                    <a href="{{ url('create-itinerary-day/' . $itinerary->id) }}"
                                        style="text-decoration:none;">
                                        <div class="col-12  text-center border rounded-3 px-3 py-2 my-3 mt-0">
                                            <h2 class="text-danger fw-bold mb-0 gallery py-2">+Add Day</h2>
                                        </div>
                                    </a>
                                    <div
                                        class="col-12 rounded-2 bg-light align-items-center d-flex flex-column justify-content-center mb-5 height-400">

                                        <div class="col-12 gallery-images p-3">
                                            <h3 class="align-self-start justify-content-start px-lg-3 pt-3 gallery">Gallery
                                                Pictures</h3>
                                            @if ($itinerary_gallery)
                                                <div class="gallery-img py-2">
                                                    <div class="row  images-items">
                                                        @foreach ($itinerary_gallery as $files)
                                                            <div class=" col-6 col-sm-4 col-lg-3  mt-2 ">
                                                                <div class="position-relative h-100 w-100">
                                                                    <img src="{{ asset('frontend/itineraries/' . $files->image) }}"
                                                                        class=" w-200 position-relative r-10"
                                                                        alt="">
                                                                    <a
                                                                        href="{{ url('/delete_gallery_image/' . $files->id) }}">
                                                                        <div class=" position-absolute top-0 end-0 p-1 ">
                                                                            <button
                                                                                class="btn-close btn-close-white p-2 bg-body"></button>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>

                                                </div>
                                            @endif
        @endif
        @if ($itinerary_gallery)
            <div class=" justify-content-center d-flex align-items-center">
                {!! Form::open([
                    'route' => 'single.itinerary.gallery.upload',
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data',
                    'class' => 'dropzone w-100 rounded bg-transparent',
                    'id' => 'my-awesome-dropzone2',
                ]) !!}
                {{-- <form action="{{'route('single.itinerary.gallery.upload')}}" class="dropzone w-100 " id="my-awesome-dropzone"> --}}
                @csrf
                <input type="hidden" value="{{ $itinerary->id }}" name="id">
                <div class="dz-message" data-dz-message>
                    <div class="text-center ">

                        {{-- <div class="col-12 d-none"><input type="file" id="image-upload-1" name="images[]" required class="form-control" accept="image/*" multiple></div> --}}
                        <div id="image-preview-1" class="image-preview-1"> <img
                                src="{{ asset('frontend/images/add-image.png') }}" alt=""></div>
                        <p class="attach-area-width fs-16-300 text-center mx-auto">
                            <span class="fs-16-700">Attach or drop your images here.</span><br>
                            Accepts .jpg, .jpeg, .png, and .gif file types.
                        </p>
                        <p class="fs-16-400">Maximum file size is 5 MB</p>

                        <!-- <button type="button" class="btn btn-danger rounded-pill px-4 text-center">Attach</button> -->
                        {{-- <input type="file" id="image-upload-1" class="d-none"> --}}
                        <div class="d-flex gap-2 justify-content-center">
                            <img src="{{ asset('frontend/images/attach.svg') }}" alt="">
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
                                                        <img src="{{ asset('frontend/images/add-image.png') }}" alt="">

                                                        <p class="attach-area-width text-center">
                                                            <span class="fw-bold">Attach or drop your images here.</span><br>
                                                            Accepts .jpg, .jpeg, .png, and .gif file types.</p>
                                                            <p class="fw-bold">Maximum file size is 5 MB</p>

                                                        <button type="button" class="btn btn-danger rounded-pill px-4 text-center">Attach</button>
                                                        <input type="file" id="file" class="d-none">

                                                        <img src="{{ asset('frontend/images/Attach.png') }}" alt=""></label> -->
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
                            previewImage.classList.add('preview-image', 'img-thumbnail', 'w-200', 'm-1');
                            previewImage.src = e.target.result;

                            previewContainer.appendChild(previewImage);
                        };
                        reader.readAsDataURL(files[i]);
                    }
                }

                if (document.getElementById("image-upload-1")) {
                    //It does not exist
                    var fileInput = document.getElementById('image-upload-1');
                    fileInput.addEventListener('change', previewImages);
                }
            </script>
            </div>
            </div>

            <!-- Extra Activity -->

            <!-- Modal -->
            <div class="modal fade" id="intro1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Day 1 Activities</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="col-12 border rounded-pill p-1 mb-2  d-flex justify-content-between">
                                <p class="m-0 align-self-center px-3">1. Metropolitan Museum</p>
                                <img class="edit-bt-size" src="{{ asset('frontend/images/editbt.png') }}"
                                    alt="">
                            </div>
                            <div class="col-12 border rounded-pill p-1 mb-2 d-flex justify-content-between">
                                <p class="m-0 align-self-center px-3">2. Statue of Liberty</p>
                                <img class="edit-bt-size" src="{{ asset('frontend/images/editbt.png') }}"
                                    alt="">
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
                <div class="profile p-3 d-sm-flex d-lg-block align-items-sm-baseline">
                    <div class="d-flex align-items-center mb-3">
                        <div class="sideprofilepic rounded-circle">
                            <a href="{{ route('username', ['username' => $itinerary->user->username]) }}">
                                @if (!empty($itinerary->user->profile))
                                    <img src="{{ asset('frontend/profile_pictures/' . $itinerary->user->profile) }}"
                                        alt="" class="img-80px rounded-circle">
                                @else
                                    <img src="{{ asset('frontend/profile_pictures/avatar.png') }}" alt=""
                                        class="img-80px">
                                @endif
                            </a>
                        </div>
                        <div class="sidenameandlinks ">
                            <div class="profiler"><a class="text-black text-decoration-none"
                                    href="{{ route('username', ['username' => $itinerary->user->username]) }}">{{ $itinerary->user->name }}</a>
                            </div>
                            <div class="d-flex  socialpicsize d-none d-sm-flex">
                                @if (!empty($itinerary->user->facebook))
                                    <div> <a href="{{ $itinerary->user->facebook }}"><img
                                                src="{{ asset('frontend/images/fb.svg') }}" alt=""></a></div>
                                @endif
                                @if (!empty($itinerary->user->twitter))
                                    <div><a href="{{ $itinerary->user->twitter }}"><img
                                                src="{{ asset('frontend/images/tw.svg') }}" alt=""></a></div>
                                @endif
                                @if (!empty($itinerary->user->instagram))
                                    <div> <a href="{{ $itinerary->user->instagram }}"><img
                                                src="{{ asset('frontend/images/insta.svg') }}" alt=""></a></div>
                                @endif
                                @if (!empty($itinerary->user->tiktok))
                                    <div><a href="{{ $itinerary->user->tiktok }}"><img
                                                src="{{ asset('frontend/images/tiktok.svg') }}" alt=""></a></div>
                                @endif
                                @if (!empty($itinerary->user->website))
                                    <div> <a href="{{ $itinerary->user->website }}"><img
                                                src="{{ asset('frontend/images/Link.svg') }}" alt=""></a></div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <h6 class="profile-details p-3">
                        {{ $itinerary->user->bio }}
                    </h6>
                    <div class="d-flex  socialpicsize d-sm-none justify-content-around">
                        @if (!empty($itinerary->user->facebook))
                            <div> <a href="{{ $itinerary->user->facebook }}"><img
                                        src="{{ asset('frontend/images/fb.svg') }}" alt=""></a></div>
                        @endif
                        @if (!empty($itinerary->user->twitter))
                            <div><a href="{{ $itinerary->user->twitter }}"><img
                                        src="{{ asset('frontend/images/tw.svg') }}" alt=""></a></div>
                        @endif
                        @if (!empty($itinerary->user->instagram))
                            <div> <a href="{{ $itinerary->user->instagram }}"><img
                                        src="{{ asset('frontend/images/insta.svg') }}" alt=""></a></div>
                        @endif
                        @if (!empty($itinerary->user->tiktok))
                            <div><a href="{{ $itinerary->user->tiktok }}"><img
                                        src="{{ asset('frontend/images/tiktok.svg') }}" alt=""></a></div>
                        @endif
                        @if (!empty($itinerary->user->website))
                            <div> <a href="{{ $itinerary->user->website }}"><img
                                        src="{{ asset('frontend/images/Link.svg') }}" alt=""></a></div>
                        @endif
                    </div>
                </div>

                <div class="profiles mt-32 row g-3">
                    <h6 class=" profiler-related  align-self-center m-0 col-12 ">Related Content </h6>
                    @if (!$related_itinerary->isEmpty())
                        @foreach ($related_itinerary as $row)
                            <div class=" col-sm-6 col-lg-12  d-flex align-items-lg-center px-0 ">
                                <div class="h-100">
                                    <a href="{{ route('itinerary', ['slug' => $row->slug]) }}">
                                        <img src="{{ asset('frontend/itineraries/' . $row->seo_image) }}" alt=""
                                            class="w-120"></a>
                                </div>
                                <div class="px-2 mx-1">
                                    <a href="{{ route('itinerary', ['slug' => $row->slug]) }}"
                                        style="text-decoration:none;">
                                        <div class="profiler-relate profile-relate">{{ $row->title }}</div>
                                    </a>
                                    <div class="d-flex align-items-center">
                                        <p class="lang"><a class="text-decoration-none "
                                                href="{{ route('username', ['username' => $row->user->username]) }}">{{ $row->user->name }}
                                            </a> |</p>
                                        <p class="lang1 px-2">{{ $row->created_at->diffForHumans() }}</p>
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

            </div>
            </div>
        @endif
    </section>
@endsection
