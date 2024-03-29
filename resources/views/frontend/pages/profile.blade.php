@extends('frontend.layouts.app')

@section('content')
    @php
        $usercheck = isset($isloggedin) ? $isloggedin : false;
    @endphp
    <section class="profile-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 ">
                    <div class="row">

                        <div class="col-md-4 border-card  ">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="d-flex align-items-center profile-gap ">
                                        <div class="position-relative">
                                            <form action="" method="post " enctype="multipart/form-data">
                                                @if ($user->profile != '')
                                                    <img src="{{ asset('frontend/profile_pictures/' . $user->profile) }}" alt="Profile Image" class="profile-img rounded-circle">
                                                @else
                                                    <img src="{{ asset('frontend/images/profile-default-pic.svg') }}"
                                                        alt="Profile Image" class="profile-img rounded-circle">
                                                @endif
                                                @if (Auth::guard('user')->user() && $usercheck)
                                                    <form action="{{ route('profilepictureupdate') }}" method="POST"
                                                        id="formprofilepictrueupdate" enctype="multipart/form-data">
                                                        <label for="profileimg"
                                                            class="position-absolute bottom-0 end-0 position-absolute p-up ">
                                                            <i class="fa-solid fs-4 fa-circle-plus"></i>
                                                        </label>
                                                        <div class="d-none"><input type="file" name="file"
                                                                id="profileimg">
                                                        </div>
                                                    </form>
                                                @endif
                                            </form>
                                        </div>
                                        <div class="">
                                            <div class="card-body">
                                                <h5 class="card-title card-title-profile    d-none d-lg-flex">Hi,
                                                    {{ $user->name }} {{ $user->lastname }}!</h5>

                                                @if (!$usercheck)
                                                    <div class="d-flex  socail-imgaes mt-2 d-none d-lg-flex">
                                                        @if (!empty($user->facebook))
                                                            <a href="{{ $user->facebook }}"><img
                                                                    src="{{ asset('frontend/images/fb.svg') }}"
                                                                    alt=""></a>
                                                        @endif
                                                        @if (!empty($user->twitter))
                                                            <a href="{{ $user->twitter }}"><img
                                                                    src="{{ asset('frontend/images/tw.svg') }}"
                                                                    alt=""></a>
                                                        @endif
                                                        @if (!empty($user->instagram))
                                                            <a href="{{ $user->instagram }}"><img
                                                                    src="{{ asset('frontend/images/insta.svg') }}"
                                                                    alt=""></a>
                                                        @endif
                                                        @if (!empty($user->tiktok))
                                                            <a href="{{ $user->tiktok }}"><img class=" socail-imgaes"
                                                                    src="{{ asset('frontend/images/tiktok.svg') }}"
                                                                    alt=""></a>
                                                        @endif
                                                        @if (!empty($user->website))
                                                            <a href="{{ $user->website }}"><img
                                                                    src="{{ asset('frontend/images/Link.svg') }}"
                                                                    alt=""></a>
                                                        @endif
                                                    </div>

                                                    <div class=" d-none d-lg-flex content_view">
                                                        <h3>Content Views</h3>
                                                        <p>62</p>
                                                    </div>
                                                @endif
                                                @if (Auth::guard('user')->user() && $usercheck)
                                                    <div class=" d-none d-lg-flex">
                                                        <p class="card-text">{{ $user->bio }}</p>
                                                    </div>
                                                @endif
                                            </div>

                                        </div>

                                        <div class=" d-md-none">
                                            <h5 class="card-title card-title-profile mt-2 d-lg-none">Hi,
                                                {{ $user->name }}
                                                {{ $user->lastname }}!</h5>
                                            @if (!$usercheck)
                                                <div class="d-flex socail-imgaes mt-2 d-lg-none">
                                                    @if (!empty($user->facebook))
                                                        <a href="{{ $user->facebook }}"><img
                                                                src="{{ asset('frontend/images/fb.svg') }}"
                                                                alt=""></a>
                                                    @endif
                                                    @if (!empty($user->twitter))
                                                        <a href="{{ $user->twitter }}"><img
                                                                src="{{ asset('frontend/images/tw.svg') }}"
                                                                alt=""></a>
                                                    @endif
                                                    @if (!empty($user->instagram))
                                                        <a href="{{ $user->instagram }}"><img
                                                                src="{{ asset('frontend/images/insta.svg') }}"
                                                                alt=""></a>
                                                    @endif
                                                    @if (!empty($user->tiktok))
                                                        <a href="{{ $user->tiktok }}"><img class=" socail-imgaes"
                                                                src="{{ asset('frontend/images/tiktok.svg') }}"
                                                                alt=""></a>
                                                    @endif
                                                    @if (!empty($user->website))
                                                        <a href="{{ $user->website }}"><img
                                                                src="{{ asset('frontend/images/Link.svg') }}"
                                                                alt=""></a>
                                                    @endif
                                                </div>

                                                <div class=" d-flex d-lg-none content_view">
                                                    <h3>Content Views</h3>
                                                    <p>62</p>
                                                </div>
                                            @endif
                                            @if (Auth::guard('user')->user() && $usercheck)
                                                <div class="mt-lg-4 mt-1">
                                                    <p class="card-text">{{ $user->bio }}</p>
                                                </div>
                                            @endif


                                        </div>
                                    </div>

                                    <div class=" d-none d-md-block">
                                        <h5 class="card-title card-title-profile mt-2 d-lg-none">Hi, {{ $user->name }}
                                            {{ $user->lastname }}!</h5>
                                        @if (!$usercheck)
                                            <div class="d-flex  socail-imgaes mt-2 d-lg-none">
                                                @if (!empty($user->facebook))
                                                    <a href="{{ $user->facebook }}"><img
                                                            src="{{ asset('frontend/images/fb.svg') }}" alt=""></a>
                                                @endif
                                                @if (!empty($user->twitter))
                                                    <a href="{{ $user->twitter }}"><img
                                                            src="{{ asset('frontend/images/tw.svg') }}" alt=""></a>
                                                @endif
                                                @if (!empty($user->instagram))
                                                    <a href="{{ $user->instagram }}"><img
                                                            src="{{ asset('frontend/images/insta.svg') }}"
                                                            alt=""></a>
                                                @endif
                                                @if (!empty($user->tiktok))
                                                    <a href="{{ $user->tiktok }}"><img class=" socail-imgaes"
                                                            src="{{ asset('frontend/images/tiktok.svg') }}"
                                                            alt=""></a>
                                                @endif
                                                @if (!empty($user->website))
                                                    <a href="{{ $user->website }}"><img
                                                            src="{{ asset('frontend/images/Link.svg') }}"
                                                            alt=""></a>
                                                @endif
                                            </div>

                                            <div class=" d-flex d-lg-none content_view">
                                                <h3>Content Views</h3>
                                                <p>62</p>
                                            </div>
                                        @endif
                                        @if (Auth::guard('user')->user() && $usercheck)
                                            <div class="mt-lg-4 mt-1 d-lg-none">
                                                <p class="card-text">{{ $user->bio }}</p>
                                            </div>
                                        @endif

                                    </div>

                                    <div class="accordion " id="accordionExample">
                                        @if (Auth::guard('user')->user() && $usercheck)
                                            <div class="accordion-item border-0 border-bottom ">
                                                <h2 class="accordion-header" id="adminBio">
                                                    <button
                                                        class="accordion-button accordionbtn px-1 border-bottom collapsed"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseAdminBio" aria-expanded="true"
                                                        aria-controls="collapseAdminBio">
                                                        <span class="fs-18-600 text-black">Admin</span>
                                                    </button>
                                                </h2>
                                                <div id="collapseAdminBio" class="accordion-collapse collapse"
                                                    aria-labelledby="adminBio" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body p-1">
                                                        <!-- Admin profile content -->

                                                        <div class="row">
                                                            @if (count($errors) > 0)
                                                                <div class="alert alert-danger">
                                                                    <strong>Whoops!</strong> There were some problems with
                                                                    your
                                                                    input.<br><br>
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
                                                                <input type="hidden" name="id"
                                                                    value="{{ $user->id }}">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        {!! Form::label('username', 'Username', ['class' => 'fw-bold required my-1']) !!}
                                                                        {!! Form::text('username', $user->username, ['class' => 'form-control rounded-pill mb-1']) !!}
                                                                    </div>
                                                                    <small class="small-tiny-color">Your Tinery URL:
                                                                        {{ route('username', ['username' => $user->username]) }}</small>
                                                                </div>
                                                                <div class="col-lg-12 mt-4">
                                                                    <b>Change Password</b>
                                                                    <div class="form-group mt-4">
                                                                        {!! Form::label('old_password', 'Old password', ['class' => 'fw-bold mb-1']) !!}
                                                                        {!! Form::password('old_password', ['class' => 'form-control rounded-pill mb-3']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        {!! Form::label('new_password', 'New password', ['class' => 'fw-bold mb-1']) !!}
                                                                        {!! Form::password('new_password', ['class' => 'form-control rounded-pill mb-3']) !!}
                                                                    </div>
                                                                    <small class="small-tiny-color">Minimum 6
                                                                        characters</small>
                                                                </div>
                                                                <div class="col-lg-12 mt-3">
                                                                    <div class="form-group">
                                                                        {!! Form::label('email', 'Email Address', ['class' => 'fw-bold required mb-2']) !!}
                                                                        {!! Form::email('email', $user->email, ['class' => 'form-control rounded-pill']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="float-end">
                                                                    <div class="form-group">
                                                                        {!! Form::submit('Save', ['class' => 'btn btn-dark mt-3 rounded-pill px-4 save-bt']) !!}
                                                                    </div>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            @else
                                                                {!! Form::label('email', 'Email Address', ['class' => 'fw-bold']) !!}
                                                                <div class="form-text"> {{ $user->email }}</div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border-0 border-bottom ">
                                                <h2 class="accordion-header" id="bioHeading">
                                                    <button
                                                        class="accordion-button accordionbtn px-1 border-bottom collapsed"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseBio" aria-expanded="false"
                                                        aria-controls="collapseBio">
                                                        <span class="fs-18-600">Bio</span>
                                                    </button>
                                                </h2>
                                                <div id="collapseBio" class="accordion-collapse collapse"
                                                    aria-labelledby="bioHeading" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body p-1">
                                                        <!-- Admin bio content -->

                                                        <div class="row">
                                                            @if ($usercheck)
                                                                {!! Form::open(['route' => 'bioupdate', 'method' => 'POST', 'files' => true]) !!}
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $user->id }}">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        {!! Form::label('bio', 'Bio', ['class' => 'fw-bold required mb-2']) !!}
                                                                        {!! Form::textarea('bio', $user->bio, ['class' => 'form-control', 'rows' => '5']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-3">
                                                                    <div class="form-group">
                                                                        {!! Form::label('file', 'File', ['class' => 'fw-bold mb-2']) !!}
                                                                        {!! Form::file('file', ['class' => 'form-control rounded-pill']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="float-end">
                                                                    <div class="form-group">
                                                                        {!! Form::submit('Save', ['class' => 'btn btn-dark mt-3  rounded-pill px-4 save-bt']) !!}
                                                                    </div>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            @else
                                                                {!! Form::label('bio', 'Bio', ['class' => 'fw-bold']) !!}
                                                                <div class="form-text">{{ $user->bio }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border-0 border-bottom">
                                                <h2 class="accordion-header" id="socialProfile">
                                                    <button
                                                        class="accordion-button accordionbtn px-1 border-bottom collapsed"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseSocialProfile" aria-expanded="false"
                                                        aria-controls="collapseSocialProfile">
                                                        <span class="fs-18-600">Social Profile</span>
                                                    </button>
                                                </h2>
                                                <div id="collapseSocialProfile" class="accordion-collapse collapse"
                                                    aria-labelledby="socialProfile" data-bs-parent="#accordionExample">
                                                    <div class="p-1">
                                                        <!-- Social profile content -->
                                                        <div class="row">
                                                            @if ($usercheck)
                                                                {!! Form::open(['route' => 'socialprofileupdate', 'method' => 'POST']) !!}
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $user->id }}">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        {!! Form::label('facebook', 'Facebook', ['class' => 'fw-bold mb-2']) !!}
                                                                        {!! Form::text('facebook', $user->facebook, [
                                                                            'class' => 'form-control rounded-pill',
                                                                            'placeholder' => 'https:/www.facebook.com/example',
                                                                        ]) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-3">
                                                                    <div class="form-group">
                                                                        {!! Form::label('twitter', 'Twitter', ['class' => 'fw-bold mb-2']) !!}
                                                                        {!! Form::text('twitter', $user->twitter, [
                                                                            'class' => 'form-control rounded-pill',
                                                                            'placeholder' => 'https:/www.twitter.com/example',
                                                                        ]) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-3">
                                                                    <div class="form-group">
                                                                        {!! Form::label('instagram', 'Instagram', ['class' => 'fw-bold mb-2']) !!}
                                                                        {!! Form::text('instagram', $user->instagram, [
                                                                            'class' => 'form-control rounded-pill',
                                                                            'placeholder' => 'https:/www.instagram.com/example',
                                                                        ]) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-3">
                                                                    <div class="form-group">
                                                                        {!! Form::label('tiktok', 'Tiktok', ['class' => 'fw-bold mb-2']) !!}
                                                                        {!! Form::text('tiktok', $user->tiktok, [
                                                                            'class' => 'form-control rounded-pill',
                                                                            'placeholder' => 'https:/www.tiktok.com/example',
                                                                        ]) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-3">
                                                                    <div class="form-group">
                                                                        {!! Form::label('website', 'website', ['class' => 'fw-bold mb-2']) !!}
                                                                        {!! Form::text('website', $user->website, [
                                                                            'class' => 'form-control rounded-pill',
                                                                            'placeholder' => 'https:/www.website.com/example',
                                                                        ]) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="float-end">
                                                                    <div class="form-group">
                                                                        {!! Form::submit('Save', ['class' => 'btn btn-dark mt-3 rounded-pill px-4 save-bt']) !!}
                                                                    </div>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item border-0 border-bottom">
                                                <h2 class="accordion-header" id="relevant_Tags">
                                                    <button
                                                        class="accordion-button accordionbtn px-1 border-bottom collapsed"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseRelevantTags" aria-expanded="false"
                                                        aria-controls="collapseRelevantTags">
                                                        <span class="fs-18-600">Relevant Tags</span>
                                                    </button>
                                                </h2>
                                                <div id="collapseRelevantTags" class="accordion-collapse collapse"
                                                    aria-labelledby="relevant_Tags" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body p-1">
                                                        <!-- Relevant tags content -->
                                                        <div class="row">
                                                            <input type="hidden" name="id"
                                                                value="{{ $user->id }}">
                                                            <div class="col-lg-12">
                                                                <small class="small-tiny-color ">Relevant tags will
                                                                    auto-populate here based on the tags used in your
                                                                    itineraries.</small>
                                                                <div class="tags d-flex flex-wrap mt-3 mb-2 gap-1">
                                                                    @if ($singletag)
                                                                        @foreach ($singletag as $singletagitem)
                                                                            @if ($singletagitem)
                                                                                <a href="{{ url('/tags/' . $singletagitem->slug) }}"
                                                                                    class="mb-1"><button
                                                                                        class="foodie text-nowrap">{{ $singletagitem->name }}
                                                                                    </button> </a>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="mt-lg-4 mt-3 ">
                                                <p class="card-text">{{ $user->bio }}</p>
                                            </div>
                                            <div class="line-x-32"></div>
                                            <div class="relevant-pt ">
                                                <h2 id="relevantTags" class="mb-3">
                                                    <span class="fs-18-600">Relevant Tags</span>
                                                </h2>
                                                <div>
                                                    <div class=" p-0">
                                                        <!-- Relevant tags content -->
                                                        <div class="row">
                                                            <input type="hidden" name="id"
                                                                value="{{ $user->id }}">
                                                            <div class="col-lg-12">
                                                                <div class="tags d-flex flex-wrap ">
                                                                    @if ($singletag)
                                                                        @foreach ($singletag as $singletagitem)
                                                                            @if ($singletagitem)
                                                                                <a
                                                                                    href="{{ url('/tags/' . $singletagitem->slug) }}">
                                                                                    <button
                                                                                        class="foodie text-nowrap">{{ $singletagitem->name }}
                                                                                    </button>
                                                                                </a>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-8 myitinerylist">
                            @if (!Auth::guard('user')->user())
                                <div class="line-x-m"></div>
                            @endif
                            <div class="row justify-content-center ">
                                <div class="col-lg-11">
                                    <div class=" d-flex justify-content-between align-items-center  my-lg-0 my-c ">
                                        @if (Auth::guard('user')->user() && $usercheck)
                                            <ul class="nav nav-tabs profile-tabs d-flex" id="myTabs" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button id="tab1" class=" nav-link active btn-dark-r1  py-2 "
                                                        type="button" role="tab" aria-controls="content1"
                                                        aria-selected="true" data-bs-toggle="tab"
                                                        data-bs-target="#content1"> My Itinerary List </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="btn-dark-r1  py-2 nav-link" id="tab2"
                                                        data-bs-toggle="tab" data-bs-target="#content2" type="button"
                                                        role="tab" aria-controls="content2" aria-selected="false"><i
                                                            class="fa-regular fa-heart pe-2"></i>Saved Itineraries</button>
                                                </li>
                                            </ul>
                                            <ul class="nav nav-tabs d-none d-md-block ">
                                                <li class="nav-item " role="presentation">
                                                    <a class="btn btn-danger rounded-pill px-4 px-md-3 py-2 text-nowrap fs-16-300 text-white add-itinerary "
                                                        href="{{ url('/create-itinerary') }}">+ Add Itinerary</a>
                                                </li>
                                            </ul>
                                        @else
                                            <h3 class="my_itinery_list">My Itinerary List</h3>
                                        @endif
                                    </div>

                                    <div class="tab-content" id="myTabsContent">
                                        <div class="tab-pane fade show active w-100 m-auto tab-content" id="content1"
                                            role="tabpanel" aria-labelledby="tab1">
                                            {{-- {{ dd($itineraries) }} --}}
                                            @forelse ($itineraries as $itinerary)
                                                <div class="row mb-4 itineraryItem">
                                                    <div class="d-flex gap-3 justify-content-between ">
                                                        <div class=" d-flex w-100   gap-3">
                                                            @if (!empty($itinerary->seo_image))
                                                                <img src="{{ asset('frontend/itineraries/' . $itinerary->seo_image) }}"
                                                                    alt="" class="col-3 w-120i px-0">
                                                            @else
                                                                <img src="{{ asset('frontend/images/annie-spratt.jpg') }}"
                                                                    alt="" class="col-3 w-120i px-0">
                                                            @endif
                                                            <div class="w-100 my-auto">
                                                                <h2 class="title title1">{{ $itinerary->title }} &nbsp;
                                                                </h2>
                                                                <div class="d-flex w-100 justify-content-between  gap-2">
                                                                    <p class="fs-16-300 mb-0 line-set">
                                                                        {{ \Str::limit($itinerary->description, 150) }}</p>
                                                                    <div class=" d-flex  gap-2 align-items-center ">
                                                                        @if ($usercheck)
                                                                            <a href="{{ url('/edit-itinerary/' . $itinerary->id) }}"
                                                                                class="">
                                                                                <img src="{{ asset('frontend/images/edit-btn.png') }}"
                                                                                    class="add-size-img">
                                                                            </a>
                                                                            <a href="javascript:;"
                                                                                data-id="{{ $itinerary->id }}"
                                                                                data-href="{{ url('/delete-itinerary/' . $itinerary->id) }}"
                                                                                class="add-size-img align-items-center border d-flex justify-content-center rounded-pill text-decoration-none deleteItinerary">
                                                                                <i class="fa fa-trash icons-color"></i>
                                                                            </a>
                                                                        @endif
                                                                        <a href="{{ route('itinerary', ['slug' => $itinerary->slug]) }}"
                                                                            class="">
                                                                            <img src="{{ asset('frontend/images/view-arrow.svg') }}"
                                                                                class="add-size-img">
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty

                                                <div class="text-center p-4">
                                                    <img src="{{ asset('frontend/images/map.png') }}" alt="map Image"
                                                        class="map-img mb-4">
                                                    <h4 class="font-20">No Itineraries, yet</h4>
                                                    <p class="font-300-16">No itineraries in your list yet. Please add your
                                                        <br>
                                                        first itinerary to view in the list.
                                                    </p>
                                                    <a href="{{ url('/create-itinerary') }}"
                                                        class="btn btn-danger rounded-pill">+ Add Itinerary</a>
                                                </div>
                                            @endforelse
                                            <!-- Content for Tab 1 -->

                                        </div>
                                        <div class="tab-pane fade w-100 m-auto tab-content" id="content2"
                                            role="tabpanel" aria-labelledby="tab2">
                                            @forelse ($user->favorites as $favorite)
                                                @php
                                                    $itinerary = $favorite->itineraries;
                                                @endphp

                                                <div class="row mb-4">
                                                    <div class="d-flex gap-3 justify-content-between ">
                                                        @if (!empty($itinerary->seo_image))
                                                            <div class="col-3 w-120i position-relative">
                                                                <img src="{{ asset('frontend/itineraries/' . $itinerary->seo_image) }}"
                                                                    alt="" class="w-120i">
                                                                <img src="frontend/images/heart-red.svg" alt=""
                                                                    class=" position-absolute heart-position heart-size-red">
                                                            </div>
                                                        @else
                                                            <img src="{{ asset('frontend/images/annie-spratt.jpg') }}"
                                                                alt="" class="col-3 w-120i">
                                                        @endif

                                                        <div class="col-8 my-auto">
                                                            <h2 class="title title1">{{ $itinerary->title }}</h2>
                                                            <p class="fs-16-300 mb-0 line-set">
                                                                {{ \Str::limit($itinerary->description, 150) }}</p>
                                                        </div>
                                                        <div class="col-3 d-flex align-items-center  gap-2">
                                                            <a href="{{ route('itinerary', ['slug' => $itinerary->slug]) }}"
                                                                class="">
                                                                <img
                                                                    src="{{ asset('frontend/images/view-arrow.svg') }}"class="add-size-img">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty

                                                <div class="text-center p-4">
                                                    <img src="{{ asset('frontend/images/map.png') }}" alt="map Image"
                                                        class="map-img mb-5">
                                                    <h4 class="mb-4 fw-bold">No Saved Itineraries, yet</h4>
                                                    <p>No saved itineraries in your list yet. Please browse <br> for more
                                                        itinaries and add them to your list</p>
                                                    <a href="{{ route('itineraries') }}"
                                                        class="btn btn-dark rounded-pill navyblubtn mt-3 px-4">Browse
                                                        Itinaries</a>
                                                </div>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($itineraries->count() > 0)
                                @if (Auth::guard('user')->user())
                                    <ul class="nav nav-tabs  d-md-none float-end ">
                                        <li class="nav-item " role="presentation">
                                            <a class="btn bg-transparent " href="{{ url('/create-itinerary') }}">
                                                <img src="{{ asset('frontend/images/button-add.svg') }}" class="w-h-52p">
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            @endif
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
