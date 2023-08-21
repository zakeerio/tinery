<!-- Navbar -->
<header>
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="container px-md-5 px-3">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ config('settings.site_logo') }}"
                    alt="Company Logo"></a>
            {{--
                <a class="navbar-brand" href="{{ url('/')}}"><img src="{{ asset('frontend/images/LOGO.png') }}" alt="Company Logo"></a>
                --}}
            <div class="d-flex gap-3">
                @if (Auth::guard('user')->user())
                    <div class="d-md-none">
                        <a class="nav-link " href="{{ url('/profile') }}">
                            @if (Auth::guard('user')->user()->profile != '')
                                <img src="{{ asset('frontend/profile_pictures/' . Auth::guard('user')->user()->profile) }}"
                                    alt="Profile Image" class=" rounded-circle w-40 ">
                            @else
                                <img src="{{ asset('frontend/images/profile-img.png') }}" alt="Profile Image"
                                    class=" rounded-circle w-40">
                            @endif
                        </a>
                    </div>
                @endif

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""><img src="{{ asset('frontend/images/menu.svg') }}" alt=""></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="ms-auto navbar-nav align-items-center gap-3 gap-xl-0">
                    <li class="nav-item">
                        <a class="nav-link text-clr " href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-clr" href="{{ route('itineraries') }}">Discover</a>
                    </li>
                    {{-- check user loggedin --}}

                    @if (Auth::guard('user')->user())
                        <div class="profile-item   d-flex justify-content-between gap-2 align-items-center">
                            <li class="nav-item">
                                <a class="nav-link d-none d-md-block " href="{{ url('/profile') }}">
                                    @if (Auth::guard('user')->user()->profile != '')
                                        <img src="{{ asset('frontend/profile_pictures/' . Auth::guard('user')->user()->profile) }}"
                                            alt="Profile Image" class=" rounded-circle w-40">
                                    @else
                                        <img src="{{ asset('frontend/images/profile-img.png') }}" alt="Profile Image"
                                            class=" rounded-circle w-40">
                                    @endif
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-danger fs-16-300 text-white  rounded-pill px-4"
                                    href="{{ url('/create-itinerary') }}">+ Add Itinerary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('logout') }}"><img
                                        src="{{ asset('frontend/images/logout.png') }}" alt=" logout link"></a>
                            </li>
                        </div>
                    @else
                        <!-- Button trigger modal -->
                        <li class="nav-item"><button type="button"
                                class="btn btn-outline-secondary rounded-pill become-member px-lg-5 px-xl-4  save-bt1 efect-none"
                                data-bs-toggle="modal" data-bs-target="#userregistration"> Become a Member</button></li>
                        <!-- Button trigger modal -->
                        <li class="nav-item"><a href="javascript:;" class="nav-link text-clr" data-bs-toggle="modal"
                                data-bs-target="#userlogin">Login</a></li>
                    @endif

                </ul>

            </div>
        </div>
    </nav>
</header>

@if (!Auth::guard('user')->user())
    <!-- Login Moda -->
    <div class="modal fade" id="userlogin" tabindex="-1" role="dialog" aria-labelledby="userloginLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">

                    <div class="form-section position-relative">
                        <div class="bg-dark position-absolute position-close-bt rounded-circle"><button type="button"
                                class="btn-close btn-close-white p-3" data-bs-dismiss="modal"
                                aria-label="Close"></button> </div>
                        <div class="container-fluid">

                            <div class="row d-flex align-items-center">

                                <div class="col-lg-6 col-md-4 d-md-block d-none frame-img p-0">

                                    <img src="{{ asset('frontend/images/Frame.png') }}" alt="frame image">
                                </div>
                                <div class="col-lg-6 col-md-8 px-32 my-5 mb-md-5 mt-md-0 my-lg-0">
                                    <div class="row">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <strong>Whoops!</strong> There were some problems with your
                                                input.<br><br>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <div id="loginform">
                                        {!! Form::open(['route' => 'login_new', 'method' => 'POST', 'class' => 'text-center text-md-start']) !!}
                                        @csrf
                                        <h2 class="member-h2 my-32"> Member Login</h2>
                                        <div class="row">
                                            <div class="col-10 col-sm-8 mx-auto mx-md-0">

                                                <div class="labe-section">
                                                    <div class="did-floating-label-content mb-4">
                                                        {!! Form::email('email', old('email') ? old('email') : null, [
                                                            'placeholder' => 'Email address',
                                                            'class' => 'form-control w-100 rounded-pill did-floating-input ps-3 loginemail',
                                                            'required' => 'required',
                                                        ]) !!}
                                                        {!! Form::label('email', 'Enter your email', ['class' => 'did-floating-label fs-20-300']) !!}
                                                        <span class="invalid-feedback-login text-danger" role="alert"
                                                            id="loginemailError"></span>
                                                        <span class="invalid-feedback-login text-success" role="alert"
                                                            id="loginemailSuccess"></span>
                                                    </div>
                                                    <div class="did-floating-label-content mb-4">
                                                        {!! Form::password('password', [
                                                            'placeholder' => 'Enter your password',
                                                            'class' => 'form-control w-100 rounded-pill did-floating-input ps-3 loginpassword',
                                                            'required' => 'required',
                                                            'id' => 'login-password',
                                                        ]) !!}
                                                        {!! Form::label('password', 'Enter your password', ['class' => 'did-floating-label']) !!}
                                                        <span toggle="#login-password"
                                                            class=" position-absolute pass-icon1 fa fa-fw fa-eye field-icon toggle-password fs-16-300"></span>
                                                        <span class="invalid-feedback-login text-danger"
                                                            role="alert" id="loginpassError"></span>
                                                        <span class="invalid-feedback-login text-success"
                                                            role="alert" id="loginpassSuccess"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            {!! Form::submit('Login', ['class' => ' become-btn']) !!}
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
                                                        {!! Form::email('email', old('email') ? old('email') : null, [
                                                            'placeholder' => 'Email address',
                                                            'class' => 'form-control w-100 rounded-pill did-floating-input p-3 forgotpasswordemail',
                                                            'required' => 'required',
                                                        ]) !!}
                                                        {!! Form::label('email', 'Enter your email', ['class' => 'did-floating-label']) !!}
                                                    </div>
                                                    <div class="did-floating-label-content mb-4">
                                                        {!! Form::password('password', [
                                                            'placeholder' => 'Enter your New password',
                                                            'class' => 'form-control w-100 rounded-pill did-floating-input p-3 ',
                                                            'required' => 'required',
                                                        ]) !!}
                                                        {!! Form::label('password', 'Enter your New password', ['class' => 'did-floating-label']) !!}
                                                    </div>
                                                    <div class="alert alert-success forgotpasswordalertsuccess"
                                                        style="display:none;">
                                                        Code Sent Successfully
                                                    </div>
                                                    <div class="did-floating-label-content mb-4">
                                                        {!! Form::number('verify_code', null, [
                                                            'placeholder' => 'Enter your 4 Digit Code',
                                                            'class' => 'form-control w-100 rounded-pill did-floating-input p-3 ',
                                                            'required' => 'required',
                                                        ]) !!}
                                                        {!! Form::label('password', 'Enter your 4 Digit Code', ['class' => 'did-floating-label']) !!}
                                                    </div>
                                                    <a href="javascript:void(0)"
                                                        data-role="sendforgotpasswordcode">Send Code</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-2 mt-2">
                                            {!! Form::submit('Submit', ['class' => 'btn btn-light become-btn']) !!}
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
    <div class="modal fade" id="userregistration" tabindex="-1" aria-labelledby="userregistrationLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="form-section position-relative">
                        <div class="bg-dark position-absolute position-close-bt rounded-circle"><button type="button"
                                class="btn-close btn-close-white p-3" data-bs-dismiss="modal"
                                aria-label="Close"></button> </div>
                        <div class="container-fluid">
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-6 col-md-4  d-md-block d-none frame-img p-0">
                                    <img src="{{ asset('frontend/images/Frame.png') }}" alt="frame image">
                                </div>
                                <div class="col-lg-6 col-md-8 px-32 my-5 my-md-0">
                                    <div class="row">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <strong>Whoops!</strong> There were some problems with your
                                                input.<br><br>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    {!! Form::open(['route' => 'register_custom', 'method' => 'POST', 'id' => 'signupForm']) !!}

                                    @csrf
                                    <h2
                                        class="member-h2 mb-3 col-8 col-sm-6 text-center text-md-start mx-auto col-md-12 my-32">
                                        Become a Member</h2>
                                    <div class="row ">
                                        <div class="col-11 col-sm-8  col-md-5 mx-auto mx-md-3 p-0 regalertdangerdiv"
                                            style="display:none">
                                            <div class="alert alert-danger regalertdanger">
                                            </div>
                                        </div>
                                        <div class=" mx-auto   p-0 ">
                                            <div class="justify-content-center labe-section row w-100">
                                                <div class="col-md-6 col-sm-8 col-10 did-floating-label-content">
                                                    {{-- <input type="text" name="firstname" class="form-control w-100 rounded-pill did-floating-input p-3" id="firstname" placeholder="Enter your name" required>
                                                            <label for="firstname">Enter Your name</label> --}}
                                                    {!! Form::text('firstname', old('firstname') ? old('firstname') : null, [
                                                        'placeholder' => 'Enter your first name',
                                                        'class' => 'form-control w-100 rounded-pill did-floating-input  ps-3 regfirstname',
                                                    ]) !!}
                                                    {!! Form::label('firstname', 'Enter your first name', ['class' => 'did-floating-label ms-2']) !!}
                                                    <span class="invalid-feedback-registeration text-danger"
                                                        role="alert" id="regnameError"></span>
                                                </div>
                                                <div class="col-md-6 col-sm-8 col-10 did-floating-label-content">
                                                    {!! Form::text('lastname', old('lastname') ? old('lastname') : null, [
                                                        'placeholder' => 'Enter your last name',
                                                        'class' => 'form-control w-100 rounded-pill did-floating-input  ps-3 reglastname',
                                                    ]) !!}
                                                    {!! Form::label('lastname', 'Enter your last name', ['class' => 'did-floating-label ms-2']) !!}
                                                    <span class="invalid-feedback-registeration text-danger"
                                                        role="alert" id="reglastnameError"></span>
                                                    {{-- <input type="text" class="form-control w-100 rounded-pill did-floating-input p-3" id="lastname" placeholder="Enter your name" required>
                                                            <label for="lastname">Last Name</label> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mx-auto  p-0 ">
                                            <div class="justify-content-center labe-section row w-100">
                                                <div class="col-md-6 col-sm-8 col-10 did-floating-label-content">
                                                    {!! Form::email('email', old('email') ? old('email') : null, [
                                                        'placeholder' => 'Enter your email',
                                                        'class' => 'form-control w-100 rounded-pill did-floating-input  ps-3 regemail',
                                                    ]) !!}
                                                    {!! Form::label('email', 'Enter your email', ['class' => 'did-floating-label ms-2']) !!}
                                                    <span class="invalid-feedback-registeration text-danger"
                                                        role="alert" id="regemailError"></span>
                                                    <span class="invalid-feedback-registeration text-success"
                                                        role="alert" id="regemailSuccess"></span>
                                                    {{-- <input type="email" name="email" class="form-control w-100 rounded-pill did-floating-input p-3" id="email" placeholder="Enter your email" required>
                                                            <label for="email">Email</label> --}}
                                                </div>
                                                <div class="col-md-6 col-sm-8 col-10 did-floating-label-content">
                                                    {!! Form::text('username', old('username') ? old('username') : null, [
                                                        'placeholder' => 'Enter your username',
                                                        'class' => 'form-control w-100 rounded-pill did-floating-input  ps-3 regusername',
                                                    ]) !!}
                                                    {!! Form::label('username', 'Enter your username', ['class' => 'did-floating-label ms-2']) !!}
                                                    <span class="invalid-feedback-registeration text-danger"
                                                        role="alert" id="regusernameError"></span>
                                                    <span class="invalid-feedback-registeration text-success"
                                                        role="alert" id="regusernameSuccess"></span>
                                                    {{-- <input type="text" name="username" class="form-control w-100 rounded-pill did-floating-input p-3" id="Username" placeholder="Username" required>
                                                    <label for="Username">Username</label> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mx-auto  p-0 ">
                                            <div class="justify-content-center labe-section row w-100">
                                                <div
                                                    class="col-md-6 col-sm-8 col-10 did-floating-label-content position-relative">
                                                    {{-- {!! Form::password($name, [$options]) !!} --}}
                                                    {!! Form::password('password', [
                                                        'placeholder' => 'Enter your password',
                                                        'class' => 'form-control w-100 rounded-pill did-floating-input  ps-3 regpassword',
                                                        'id' => 'password',
                                                    ]) !!}
                                                    {!! Form::label('password', 'Enter your password', ['class' => 'did-floating-label ms-2']) !!}
                                                    <span toggle="#password"
                                                        class=" position-absolute pass-icon fa fa-fw fa-eye field-icon toggle-password fs-16-300"></span>
                                                    <span class="invalid-feedback-registeration text-danger"
                                                        role="alert" id="regpassError"></span>
                                                    {{-- <input type="password" name="password" class="form-control w-100 rounded-pill did-floating-input p-3" id="password" placeholder="Enter your password" required>
                                                            <label for="password">Password</label> --}}
                                                </div>
                                                <div class="col-md-6 col-sm-8 col-10 did-floating-label-content">
                                                    {!! Form::password('confirm_password', [
                                                        'placeholder' => 'Confirm your password',
                                                        'class' => 'form-control w-100 rounded-pill did-floating-input  ps-3 regconfirm_password ',
                                                        'id' => 'c-password',
                                                    ]) !!}
                                                    {!! Form::label('confirm_password', 'Confirm your password', ['class' => 'did-floating-label ms-2']) !!}
                                                    <span toggle="#c-password"
                                                        class=" position-absolute pass-icon fa fa-fw fa-eye field-icon toggle-password fs-16-300"></span>
                                                    <span class="invalid-feedback-registeration text-danger"
                                                        role="alert" id="regconpassError"></span>
                                                    {{-- <input type="password" name="confirm_password" class="form-control w-100 rounded-pill did-floating-input p-3" id="confirm_password" placeholder="Enter your confirm password" required>
                                                        <label for="confirm_password">Confirm Password</label> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center text-md-start">
                                        {!! Form::submit('Become a Member', ['class' => ' become-btn  ']) !!}
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

    <!-- done page  Modal -->
    <div class="modal fade" id="done-page" tabindex="-1" role="dialog" aria-labelledby="userloginLabel"
        aria-hidden="false">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="form-section h-100  position-relative">
                        <div class="bg-dark position-absolute position-close-bt rounded-circle"><button type="button"
                                class="btn-close btn-close-white p-3" data-bs-dismiss="modal"
                                aria-label="Close"></button> </div>
                        <div class="row justify-content-center h-100 w-100 align-content-center">
                            <div class="col-8 text-center">
                                <img class="border-0 img-thumbnail" src="frontend/images/done-tick.svg" alt="">
                                <h2 class="travel mb-4">Welcome To Tinery</h2>
                                <a href="{{ route('profile') }}"
                                    class="btn btn-secondary rounded-pill save-bt1">Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<!-- /.navbar -->
