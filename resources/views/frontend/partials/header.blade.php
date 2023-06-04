
<!-- Navbar -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/')}}"><img src="{{ asset('frontend/images/LOGO.png') }}" alt="Company Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="ms-auto navbar-nav align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-clr" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-clr" href="{{ route('itineraries') }}">Discover</a>
                    </li>
                    {{-- check user loggedin --}}

                    @if(Auth::guard('user')->user())
                        <div class="profile-item d-flex justify-content-between align-items-center">
                            <li class="nav-item">
                                <a class="nav-link " href="{{ url('/profile')}}">
                                    @if(Auth::guard('user')->user()->profile != '')
                                    <img src="{{ asset('frontend/profile_pictures/'.Auth::guard('user')->user()->profile) }}" width="100%" height="50px" alt="Profile Image" class=" rounded-circle" >
                                    @else
                                    <img src="{{ asset('frontend/profile_pictures/avatar.png') }}" width="100%" height="40px" alt="Profile Image" class=" rounded-circle">
                                    @endif
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-danger  rounded-pill px-4" href="{{url('/create-itinerary')}}">+ Add Itinerary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('logout') }}"><img src="{{ asset('frontend/images/logout.png') }}" alt=" logout link"></a>
                            </li>
                        </div>
                    @else
                    <!-- Button trigger modal -->
                        <li class="nav-item"><button type="button" class="btn btn-outline-secondary rounded-pill px-4 efect-none" data-bs-toggle="modal" data-bs-target="#userregistration"> Become a Member</button></li>
                         <!-- Button trigger modal -->
                        <li class="nav-item"><a href="javascript:;" class="nav-link text-clr" data-bs-toggle="modal" data-bs-target="#userlogin">Login</a></li>
                    @endif

                </ul>

            </div>
        </div>
    </nav>
</header>

@if(!Auth::guard('user')->user())
    <!-- Login Moda -->
    <div class="modal fade" id="userlogin" tabindex="-1" role="dialog" aria-labelledby="userloginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-body">



                    <div class="form-section position-relative">
                        <button type="button" class="btn-close position-absolute position-close-bt " data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="container-fluid">

                            <div class="row d-flex align-items-center">
                                <div class="col-lg-5 frame-img">
                                    <img src="{{ asset('frontend/images/Frame.png') }}" alt="frame image">
                                </div>
                                <div class="col-lg-7">
                                    <div id="loginform">
                                        {!! Form::open(['route' => 'login_new', 'method' => 'POST', 'class' => 'p-5']) !!}
                                        @csrf
                                        <h2 class="member-h2"> Member Login</h2>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="labe-section w-100">
                                                    <div class="did-floating-label-content mb-4">
                                                        {!! Form::email('email', (old('email')) ? old('email') : null, [ 'placeholder' => "Email address", 'class' => 'form-control w-100 rounded-pill did-floating-input p-3 ', 'required' => 'required']) !!}
                                                        {!! Form::label('email', 'Enter your email', ['class' => 'did-floating-label']) !!}
                                                    </div>
                                                    <div class="did-floating-label-content mb-4">
                                                        {!! Form::password('password', [ 'placeholder' => "Enter your password", 'class' => 'form-control w-100 rounded-pill did-floating-input p-3 ', 'required' => 'required']) !!}
                                                        {!! Form::label('password', 'Enter your password', ['class' => 'did-floating-label']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::submit("Login", ['class' => 'btn btn-light become-btn' ]) !!}
                                        </div>
                                        <a href="javascript:void(0)" data-role="clicktoforgot">Forgot Password?</a>
                                        {!! Form::close() !!}
                                    </div>
                                    <div id="forgotpasswordform" style="display:none;">
                                        {!! Form::open(['route' => 'forgotpassworddb', 'method' => 'POST', 'class' => 'p-5']) !!}
                                        @csrf
                                        <h2 class="member-h2"> Forgot Password</h2>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="labe-section w-100">
                                                    <div class="did-floating-label-content mb-4">
                                                        {!! Form::email('email', (old('email')) ? old('email') : null, [ 'placeholder' => "Email address", 'class' => 'form-control w-100 rounded-pill did-floating-input p-3 forgotpasswordemail', 'required' => 'required']) !!}
                                                        {!! Form::label('email', 'Enter your email', ['class' => 'did-floating-label']) !!}
                                                    </div>
                                                    <div class="did-floating-label-content mb-4">
                                                        {!! Form::password('password', [ 'placeholder' => "Enter your New password", 'class' => 'form-control w-100 rounded-pill did-floating-input p-3 ', 'required' => 'required']) !!}
                                                        {!! Form::label('password', 'Enter your New password', ['class' => 'did-floating-label']) !!}
                                                    </div>
                                                    <div class="alert alert-success forgotpasswordalertsuccess" style="display:none;">
                                                        Code Sent Successfully
                                                    </div>
                                                    <div class="did-floating-label-content mb-4">
                                                        {!! Form::number('verify_code', null, [ 'placeholder' => "Enter your 4 Digit Code", 'class' => 'form-control w-100 rounded-pill did-floating-input p-3 ', 'required' => 'required']) !!}
                                                        {!! Form::label('password', 'Enter your 4 Digit Code', ['class' => 'did-floating-label']) !!}
                                                    </div>
                                                    <a href="javascript:void(0)" data-role="sendforgotpasswordcode">Send Code</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::submit("Submit", ['class' => 'btn btn-light become-btn' ]) !!}
                                        </div>
                                        <a href="javascript:void(0)" data-role="clicktologin">Login?</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Signup Model -->
    <div class="modal fade" id="userregistration" tabindex="-1" aria-labelledby="userregistrationLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <div class="form-section position-relative">
                      <button type="button" class="btn-close position-absolute position-close-bt " data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="container-fluid">
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-5 frame-img">
                                    <img src="{{ asset('frontend/images/Frame.png') }}" alt="frame image">
                                </div>
                                <div class="col-lg-7">
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
                                    {!! Form::open(['route' => 'register_custom', 'method' => 'POST', 'class' => 'p-5']) !!}

                                    @csrf
                                    <h2 class="member-h2">Become a Member</h2>
                                    <div class="row">
                                            <div class="col-lg-6">
                                                <div class="labe-section w-100">

                                                    <div class="did-floating-label-content mb-4">
                                                        {{-- <input type="text" name="firstname" class="form-control w-100 rounded-pill did-floating-input p-3" id="firstname" placeholder="Enter your name" required>
                                                            <label for="firstname">Enter Your name</label> --}}

                                                            {!! Form::text('firstname',  (old('firstname')) ? old('firstname') : null, [ 'placeholder' => "Enter your name", 'class' => 'form-control w-100 rounded-pill did-floating-input p-3', 'required' => 'required']) !!}
                                                            {!! Form::label('firstname', 'Enter your name', ['class' => 'did-floating-label']) !!}


                                                        </div>
                                                        <div class="did-floating-label-content mb-4">
                                                            {!! Form::email('email',  (old('email')) ? old('email') : null, [ 'placeholder' => "Enter your email", 'class' => 'form-control w-100 rounded-pill did-floating-input p-3', 'required' => 'required']) !!}
                                                            {!! Form::label('email', 'Enter your email', ['class' => 'did-floating-label']) !!}

                                                            {{-- <input type="email" name="email" class="form-control w-100 rounded-pill did-floating-input p-3" id="email" placeholder="Enter your email" required>
                                                                <label for="email">Email</label> --}}
                                                    </div>
                                                    <div class="did-floating-label-content mb-4">
                                                        {{-- {!! Form::password($name, [$options]) !!} --}}
                                                        {!! Form::password('password', ['placeholder' => "Enter your password", 'class' => 'form-control w-100 rounded-pill did-floating-input p-3', 'required' => 'required']) !!}
                                                        {!! Form::label('password', 'Enter your password', ['class' => 'did-floating-label']) !!}

                                                        {{-- <input type="password" name="password" class="form-control w-100 rounded-pill did-floating-input p-3" id="password" placeholder="Enter your password" required>
                                                            <label for="password">Password</label> --}}
                                                        </div>

                                                    </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="labe-section w-100 mx-5">
                                                    <div class="did-floating-label-content mb-4">
                                                        {!! Form::text('lastname',  (old('lastname')) ? old('lastname') : null, [ 'placeholder' => "Enter your lastname", 'class' => 'form-control w-100 rounded-pill did-floating-input p-3', 'required' => 'required']) !!}
                                                        {!! Form::label('lastname', 'Enter your lastname', ['class' => 'did-floating-label']) !!}
                                                        {{-- <input type="text" class="form-control w-100 rounded-pill did-floating-input p-3" id="lastname" placeholder="Enter your name" required>
                                                        <label for="lastname">Last Name</label> --}}
                                                    </div>
                                                    <div class="did-floating-label-content mb-4">
                                                        {!! Form::text('username',  (old('username')) ? old('username') : null, [ 'placeholder' => "Enter your Username", 'class' => 'form-control w-100 rounded-pill did-floating-input p-3', 'required' => 'required']) !!}
                                                        {!! Form::label('username', 'Enter your Username', ['class' => 'did-floating-label']) !!}

                                                        {{-- <input type="text" name="username" class="form-control w-100 rounded-pill did-floating-input p-3" id="Username" placeholder="Username" required>
                                                        <label for="Username">Username</label> --}}
                                                    </div>
                                                    <div class="did-floating-label-content mb-4">
                                                        {!! Form::password('confirm_password', [ 'placeholder' => "Confirm Password", 'class' => 'form-control w-100 rounded-pill did-floating-input p-3 ', 'required' => 'required']) !!}
                                                        {!! Form::label('confirm_password', 'Confirm Password', ['class' => 'did-floating-label']) !!}

                                                        {{-- <input type="password" name="confirm_password" class="form-control w-100 rounded-pill did-floating-input p-3" id="confirm_password" placeholder="Enter your confirm password" required>
                                                        <label for="confirm_password">Confirm Password</label> --}}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::submit("Become a Member", ['class' => 'btn btn-primary become-btn' ]) !!}
                                            {!! Form::close() !!}
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
<!-- /.navbar -->
