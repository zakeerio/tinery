@extends('frontend.layouts.app')

@section('content')
    @php
        $usercheck = isset($isloggedin) ? $isloggedin : false;;
        $user = Auth::guard('user')->user();
    @endphp
    <section class="profile-section">
        <div class="container mt-4">
            <div class="row">
            <div class="col-md-4 border-card my-5 ">
                    <div class="row d-flex align-items-center ">
                        <div class="col-md-4 position-relative">
                            <form action="" method="post" enctype="multipart/form-data">
                                @if($user->profile != '')
                                <img src="{{ asset('frontend/profile_pictures/'.$user->profile) }}" alt="Profile Image"
                                    class="profile-img">
                                @else
                                <img src="{{ asset('frontend/profile_pictures/avatar.png') }}" alt="Profile Image" class="profile-img">
                                @endif
                                <!-- <label for="profileimg" class="position-absolute bottom-0 end-0 position-absolute"><i
                                        class="fa-solid fa-circle-plus"></i></label>
                                <div class="d-none"><input type="file" id="profileimg"></div> -->
                            </form>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Hi, {{ $user->name }} {{ $user->lastname }}!</h5>
                                <div class="d-flex gap-1">
                                    @if(!empty($user->facebook))
                                        <a href="{{$user->facebook}}"><img src="{{ asset('frontend/images/fb.png') }}" alt=""></a>
                                    @endif
                                    @if(!empty($user->twitter))
                                        <a href="{{$user->twitter}}"><img src="{{ asset('frontend/images/tw.png') }}" alt=""></a>
                                    @endif
                                    @if(!empty($user->instagram))
                                        <a href="{{$user->instagram}}"><img src="{{ asset('frontend/images/insta.png') }}" alt=""></a>
                                    @endif
                                    @if(!empty($user->website))
                                        <a href="{{$user->website}}"><img src="{{ asset('frontend/images/Link.png') }}" alt=""></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <p class="card-text">{{ $user->bio}}</p>
                        </div>
                    </div>

                    <div class="accordion mt-5" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="adminBio">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseAdminBio" aria-expanded="true"
                                    aria-controls="collapseAdminBio">
                                    <span class="fw-bold">{{ $user->username }}</span>
                                </button>
                            </h2>
                            <div id="collapseAdminBio" class="accordion-collapse collapse show" aria-labelledby="adminBio"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <!-- Admin profile content -->
                                    <div class="row">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        @if ($usercheck)

                                            {!! Form::open(['route' => 'profileupdate', 'method' => 'POST']) !!}
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    {!! Form::label('username', 'Username',['class'=>'fw-bold required']) !!}
                                                    {!! Form::text('username', $user->username, ['class' => 'form-control']) !!}
                                                </div>
                                                <small>Your Tinery URL: {{ route('username', ['username' => $user->username]) }}</small>


                                            </div>
                                            <div class="col-lg-12 mt-4">
                                                <b>Change Password</b>
                                                <div class="form-group mt-4">
                                                    {!! Form::label('old_password', 'Old password',['class'=>'fw-bold']) !!}
                                                    {!! Form::password('old_password', ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    {!! Form::label('new_password', 'New password',['class'=>'fw-bold']) !!}
                                                    {!! Form::password('new_password', ['class' => 'form-control']) !!}
                                                </div>
                                                <small>Minimum 6 characters</small>
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <div class="form-group">
                                                    {!! Form::label('email', 'Email Address',['class'=>'fw-bold required']) !!}
                                                    {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="float-end">
                                                <div class="form-group">
                                                    {!! Form::submit("Save", ['class' => 'btn btn-dark mt-3' ]) !!}
                                                </div>
                                            </div>
                                            {!! Form::close() !!}

                                        @else

                                            {!! Form::label('email', 'Email Address',['class'=>'fw-bold']) !!}
                                            <div class="form-text"> {{ $user->email }}</div>

                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="bioHeading">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseBio" aria-expanded="false" aria-controls="collapseBio">
                                    <span class="fw-bold">Bio</span>
                                </button>
                            </h2>
                            <div id="collapseBio" class="accordion-collapse collapse" aria-labelledby="bioHeading"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <!-- Admin bio content -->


                                    <div class="row">
                                        @if ($usercheck)

                                            {!! Form::open(['route' => 'bioupdate', 'method' => 'POST', 'files' => true]) !!}
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    {!! Form::label('bio', 'Bio',['class'=>'fw-bold required']) !!}
                                                    {!! Form::textarea('bio', $user->bio, ['class' => 'form-control', 'rows' => '5']) !!}
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <div class="form-group">
                                                    {!! Form::label('file', 'File',['class'=>'fw-bold']) !!}
                                                    {!! Form::file('file', ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-lg-2" style="float:right;margin-right:10px;">
                                                <div class="form-group">
                                                    {!! Form::submit("Save", ['class' => 'btn btn-dark mt-3' ]) !!}
                                                </div>
                                            </div>
                                            {!! Form::close() !!}

                                        @else

                                            {!! Form::label('bio', 'Bio',['class'=>'fw-bold']) !!}
                                            <div class="form-text">{{ $user->bio }}</div>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="socialProfile">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSocialProfile" aria-expanded="false"
                                    aria-controls="collapseSocialProfile">
                                    <span class="fw-bold">Social Profile</span>
                                </button>
                            </h2>
                            <div id="collapseSocialProfile" class="accordion-collapse collapse"
                                aria-labelledby="socialProfile" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <!-- Social profile content -->
                                    <div class="row">
                                    @if ($usercheck)
                                        {!! Form::open(['route' => 'socialprofileupdate', 'method' => 'POST']) !!}
                                        @csrf
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                {!! Form::label('facebook', 'Facebook',['class'=>'fw-bold']) !!}
                                                {!! Form::text('facebook', $user->facebook, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="form-group">
                                                {!! Form::label('twitter', 'Twitter',['class'=>'fw-bold']) !!}
                                                {!! Form::text('twitter', $user->twitter, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="form-group">
                                                {!! Form::label('instagram', 'Instagram',['class'=>'fw-bold']) !!}
                                                {!! Form::text('instagram', $user->instagram, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="form-group">
                                                {!! Form::label('tiktok', 'Tiktok',['class'=>'fw-bold']) !!}
                                                {!! Form::text('tiktok', $user->tiktok, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="form-group">
                                                {!! Form::label('website', 'website',['class'=>'fw-bold']) !!}
                                                {!! Form::text('website', $user->website, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-2" style="float:right;margin-right:10px;">
                                            <div class="form-group">
                                                {!! Form::submit("Save", ['class' => 'btn btn-dark mt-3' ]) !!}
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    @else
                                        <div class="col-lg-12">
                                            {!! Form::label('facebook', 'Facebook',['class'=>'fw-bold d-block']) !!}
                                            {{$user->facebook}}
                                        </div>
                                        <div class="col-lg-12">
                                            {!! Form::label('twitter', 'Twitter',['class'=>'fw-bold d-block']) !!}
                                            {{$user->twitter}}
                                        </div>
                                        <div class="col-lg-12">
                                            {!! Form::label('instagram', 'Instagram',['class'=>'fw-bold d-block']) !!}
                                            {{$user->instagram}}
                                        </div>
                                        <div class="col-lg-12">
                                            {!! Form::label('tiktok', 'Tiktok',['class'=>'fw-bold d-block']) !!}
                                            {{$user->tiktok}}
                                        </div>
                                        <div class="col-lg-12">
                                            {!! Form::label('website', 'website',['class'=>'fw-bold d-block']) !!}
                                            {{$user->website}}
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="relevantTags">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseRelevantTags" aria-expanded="false"
                                    aria-controls="collapseRelevantTags">
                                    <span class="fw-bold">Relevant Tags</span>
                                </button>
                            </h2>
                            <div id="collapseRelevantTags" class="accordion-collapse collapse"
                                aria-labelledby="relevantTags" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <!-- Relevant tags content -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-8 px-4">
                <div class="row border p-2 rounded p-3 ">
                <div class="col-12 d-flex justify-content-between ">
                    <h2>Itinerary Name</h2>
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
                                    <div class="mb-3">
                                        <h4>Itinerary info</h4>
                                    </div>
                                    <div class="mb-3">
                                        <label for="title" class="form-label fw-bold">Itinerary Title<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control rounded-pill" placeholder="Ex. My Winter Break 2022" id="title" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tags" class="form-label fw-bold">Add Tags<span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control rounded-pill" placeholder="Ex: locations, subjects, themes, etc." id="tags" aria-describedby="tagsHelp">
                                        <div id="tagsHelp" class="form-text mt-2">Add a tag by typing in the field above and
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            hitting ‘enter’ on your keyboard or by clicking on a suggested tag.</div>
                                        <div
                                            class="">
                                            <!-- cross button problem -->
                                            <button type="submit" class="btn rounded-pill px-3 bg-transparent border-primary text-primary my-3 mx-1">California
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            X</button>
                                            <button type="submit" class="btn rounded-pill px-3 bg-transparent border-primary text-primary my-3 mx-1">California
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            X</button>
                                            <button type="submit" class="btn rounded-pill px-3 bg-transparent border-primary text-primary my-3 mx-1">California
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            X</button>
                                        </div>
                                        <div class="">
                                            <a href="">Clear all tags</a>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <label for="summary" class="form-label fw-bold">Itinerary Summary<span class="text-danger">*</span>
                                        </label>
                                        <!-- <input type="" class="form-control rounded"  style="min-height:145px;" placeholder="Please add summary" id="summary" aria-describedby="emailHelp"> -->


                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>

                                    </div>
                                    <div class="mb-3">
                                        <label for="title" class="form-label fw-bold">Location</label>
                                        <select class="form-select rounded-pill" aria-label="Default select example">
                                            <option selected>New York</option>
                                            <option value="1">New York</option>
                                            <option value="2">New York</option>
                                            <option value="3">New York</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="title" class="form-label fw-bold">Duration</label>
                                        <select class="form-select rounded-pill" aria-label="Default select example">
                                            <option selected>1 Day</option>
                                            <option value="1">2 Day</option>
                                            <option value="2">3 Day</option>
                                            <option value="3">4 Day</option>
                                            <option value="4">5 Day</option>
                                            <option value="5">6 Day</option>
                                            <option value="6">7 Day</option>
                                            <option value="7">8 Day</option>
                                            <option value="8">9 Day</option>
                                            <option value="9">10 Day</option>

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Personal-blog" class="form-label fw-bold">Personal Blog or Relevant
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Site</label>
                                        <input type="text" class="form-control rounded-pill" placeholder="Ex: www,nyc,com" id="Personal-blog" aria-describedby="emailHelp">
                                    </div>
                                    <!-- space problem -->
                                    <div class="text-end ">
                                        <button type="button" class="btn save-bt btn-dark rounded-pill ">Save</button>
                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 d-flex align-items-center my-3  gap-2">
                <img src="{{ asset('frontend/images/Image.png')}}" alt="">
                <p class="my-auto">Benjamin Franklin</p>
                <div class="vr h-50 align-self-center"></div>
                <div class="text">3/11/2022
                </div>
            </div>

            <div class="col-12 d-flex gap-3">
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
                <button type="submit" class="btn rounded-pill px-3 bg-transparent border-primary text-primary my-3">hashtags</button>
            </div>
            <div class="col-12 mb-3">
                <p>You itinerary summary will take place here.</p>
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
</div>
            </div>

</section>
@endsection

