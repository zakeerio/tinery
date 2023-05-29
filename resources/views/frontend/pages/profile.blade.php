@extends('frontend.layouts.app')

@section('content')
    @php
        $usercheck = isset($isloggedin) ? $isloggedin : false;;
        
    @endphp
    <section class="profile-section">
        <div class="container">
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

                    <div class="accordion mt-4 " id="accordionExample">
                        <div class="accordion-item border-0 border-bottom ">
                            <h2 class="accordion-header" id="adminBio">
                                <button class="accordion-button accordionbtn collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseAdminBio" aria-expanded="true"
                                    aria-controls="collapseAdminBio">
                                    <span class="fw-bold">{{ $user->username }}</span>
                                </button>
                            </h2>
                            <div id="collapseAdminBio" class="accordion-collapse collapse" aria-labelledby="adminBio"
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
                                                    {!! Form::label('username', 'Username',['class'=>'fw-bold required mb-3']) !!}
                                                    {!! Form::text('username', $user->username, ['class' => 'form-control rounded-pill mb-1']) !!}
                                                </div>
                                                <small>Your Tinery URL: {{ route('username', ['username' => $user->username]) }}</small>


                                            </div>
                                            <div class="col-lg-12 mt-4">
                                                <b>Change Password</b>
                                                <div class="form-group mt-4">
                                                    {!! Form::label('old_password', 'Old password',['class'=>'fw-bold mb-1']) !!}
                                                    {!! Form::password('old_password', ['class' => 'form-control rounded-pill mb-3']) !!}
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    {!! Form::label('new_password', 'New password',['class'=>'fw-bold mb-1']) !!}
                                                    {!! Form::password('new_password', ['class' => 'form-control rounded-pill mb-3']) !!}
                                                </div>
                                                <small>Minimum 6 characters</small>
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <div class="form-group">
                                                    {!! Form::label('email', 'Email Address',['class'=>'fw-bold required mb-2']) !!}
                                                    {!! Form::email('email', $user->email, ['class' => 'form-control rounded-pill']) !!}
                                                </div>
                                            </div>
                                            <div class="float-end">
                                                <div class="form-group">
                                                    {!! Form::submit("Save", ['class' => 'btn btn-dark mt-3 rounded-pill px-4' ]) !!}
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

                        <div class="accordion-item border-0 border-bottom ">
                            <h2 class="accordion-header" id="bioHeading">
                                <button class="accordion-button accordionbtn collapsed" type="button" data-bs-toggle="collapse"
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
                                                    {!! Form::label('bio', 'Bio',['class'=>'fw-bold required mb-2']) !!}
                                                    {!! Form::textarea('bio', $user->bio, ['class' => 'form-control', 'rows' => '5']) !!}
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <div class="form-group">
                                                    {!! Form::label('file', 'File',['class'=>'fw-bold mb-2']) !!}
                                                    {!! Form::file('file', ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-lg-2" style="float:right;margin-right:10px;">
                                                <div class="form-group">
                                                    {!! Form::submit("Save", ['class' => 'btn btn-dark mt-3  rounded-pill px-4' ]) !!}
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

                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="socialProfile">
                                <button class="accordion-button accordionbtn collapsed" type="button" data-bs-toggle="collapse"
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
                                                {!! Form::label('facebook', 'Facebook',['class'=>'fw-bold mb-2']) !!}
                                                {!! Form::text('facebook', $user->facebook, ['class' => 'form-control rounded-pill']) !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="form-group">
                                                {!! Form::label('twitter', 'Twitter',['class'=>'fw-bold mb-2']) !!}
                                                {!! Form::text('twitter', $user->twitter, ['class' => 'form-control rounded-pill']) !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="form-group">
                                                {!! Form::label('instagram', 'Instagram',['class'=>'fw-bold mb-2']) !!}
                                                {!! Form::text('instagram', $user->instagram, ['class' => 'form-control rounded-pill']) !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="form-group">
                                                {!! Form::label('tiktok', 'Tiktok',['class'=>'fw-bold mb-2']) !!}
                                                {!! Form::text('tiktok', $user->tiktok, ['class' => 'form-control rounded-pill']) !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="form-group">
                                                {!! Form::label('website', 'website',['class'=>'fw-bold mb-2']) !!}
                                                {!! Form::text('website', $user->website, ['class' => 'form-control rounded-pill']) !!}
                                            </div>
                                        </div>
                                        <div class="col-lg-2" style="float:right;margin-right:10px;">
                                            <div class="form-group">
                                                {!! Form::submit("Save", ['class' => 'btn btn-dark mt-3 rounded-pill px-4' ]) !!}
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

                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="relevantTags">
                                <button class="accordion-button accordionbtn collapsed" type="button" data-bs-toggle="collapse"
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
                    <ul class="nav nav-tabs profile-tabs d-flex gap-3 " id="myTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button id="tab1" class="btn btn-outline-danger rounded-pill nav-link active"
                                type="button" role="tab" aria-controls="content1" aria-selected="true"
                                data-bs-toggle="tab" data-bs-target="#content1">
                                My Itinerary List
                            </button>

                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn btn-link nav-link rounded-pill btn btn-outlie-light text-dark" id="tab2" data-bs-toggle="tab"
                                data-bs-target="#content2" type="button" role="tab" aria-controls="content2"
                                aria-selected="false"><i class="fa-regular fa-heart px-2"></i>Saved Itineraries</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabsContent">
                        <div class="tab-pane fade show active w-100 m-auto tab-content" id="content1" role="tabpanel" aria-labelledby="tab1">
                            {{-- {{ dd($itineraries) }} --}}
                            @forelse ( $itineraries as $itinerary )
                            {{-- {{ dd($itinerary) }} --}}
                                <div class="row mb-3">
                                    <div class="d-flex gap-3 align-items-center">
                                        @if (!empty($itinerary->seo_image))
                                            <img src="{{ asset('frontend/itineraries/'. $itinerary->seo_image) }}" alt="" class="col-3 w-120">
                                        @else
                                            <img src="{{ asset('frontend/images/weds.png') }}" alt="" class="col-3 w-120">
                                        @endif
                                        <div class="col-8">
                                            <h2 class="title">{{ $itinerary->title }}</h2>
                                            <p>{{ \Str::limit($itinerary->excerpt, 150); }}</p>
                                        </div>
                                        <div class="col-3 d-flex justify-content-end gap-2">
                                            <a href="" class=""><img src="{{ asset('frontend/images/edit-btn.png') }}"></a>
                                            <a href="{{ route('itinerary', ['id' => $itinerary->slug]) }}" class=""><img src="{{ asset('frontend/images/view-arrow.png') }}"></a>
                                        </div>
                                    </div>
                                </div>
                            @empty

                                <div class="text-center p-4">
                                    <img src="{{ asset('frontend/images/map.png') }}" alt="map Image" class="map-img mb-4">
                                    <h4>No Itineraries, yet</h4>
                                    <p>No itineraries in your list yet. Please add your <br> first itinerary to view in the list.</p>
                                    <a href="{{ route('additinerary') }}" class="btn btn-danger rounded-pill">+ Add Itinerary</a>
                                </div>

                            @endforelse
                            <!-- Content for Tab 1 -->

                        </div>
                        <div class="tab-pane fade w-100 m-auto tab-content" id="content2" role="tabpanel" aria-labelledby="tab2">
                            @forelse ( $user->favorites as $favorite )
                                @php
                                $itinerary = $favorite->itineraries;
                                @endphp

                                    <div class="row mb-3">
                                        <div class="d-flex gap-3 align-items-center">
                                            @if (!empty($itinerary->seo_image))
                                                <img src="{{ asset('frontend/itineraries/'. $itinerary->seo_image) }}" alt="" class="col-3 w-120">
                                            @else
                                                <img src="{{ asset('frontend/images/weds.png') }}" alt="" class="col-3 w-120">
                                            @endif

                                            <div class="col-8">
                                                <h2 class="title">{{ $itinerary->title }}</h2>
                                                <p>{{ \Str::limit($itinerary->excerpt, 150); }}</p>
                                            </div>
                                            <div class="col-3 d-flex justify-content-end gap-2">
                                                <a href="{{ route('itinerary', ['id' => $itinerary->slug]) }}" class=""><img src="{{ asset('frontend/images/view-arrow.png') }}"></a>
                                            </div>
                                        </div>
                                    </div>
                            @empty

                                <div class="text-center p-4">

                                    <img src="{{ asset('frontend/images/map.png') }}" alt="map Image" class="map-img mb-4">
                                    <h4 class="mb-3">No Saved Itineraries, yet</h4>
                                    <p>No saved itineraries in your list yet. Please browse <br> for more itinaries and add them to your list</p>
                                    <a href="{{ route('additinerary') }}" class="btn btn-info rounded-pill navyblubtn">+ Add Itinerary</a>
                                </div>

                            @endforelse

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection

