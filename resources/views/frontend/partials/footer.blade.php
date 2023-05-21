<footer class="footer py-4 ">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-2 ">
                <img src="{{ asset("frontend/images/LOGO.png") }}" alt="Logo" class="img-fluid tiny-logo">
            </div>
            <div class="col-lg-2 col-sm-6">
                <ul class="d-flex flex-column gap-3 list-unstyled">
                    <li><a href="#">Share an Itinerary</a></li>
                    <li><a href="#" class="gap-2">Discover</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-sm-6 px-2">
                <ul class="d-flex flex-column gap-3 list-unstyled">
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#" class="gap-2">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-lg-6">
                <h5>Let's stay in touch</h5>
                <p>We are working to make things better. You can get notified subscribing below</p>
                <form>
                    <div class="footer-field d-flex align-items-center">
                        <div class="form-group w-100">
                            <input type="email" class="form-control rounded-pill px-3"
                                placeholder="Enter your email">
                        </div>
                        <button type="submit" class="btn btn-dark join rounded-pill px-4 mx-2">Submit</button>
                    </div>
                </form>
            </div>
            <div class="footer-bar mt-5">
                <div class="media-links">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#"><img src="{{ asset("frontend/images/facebook.png") }}" alt="Facebook"></a>
                        </li>
                        <li class="list-inline-item"><a href="#"><img src="{{ asset("frontend/images/twitter.png") }}" alt="Twitter"></a>
                        </li>
                        <li class="list-inline-item"><a href="#"><img src="{{ asset("frontend/images/instagram.png") }}" alt="Instagram"></a></li>
                    </ul>
                </div>
                <div class="media-p">
                    <p>{{ date('Y') }} Tinery, Inc. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

{{-- Signup Model --}}
<div class="modal fade" id="userregistration" tabindex="-1" aria-labelledby="userregistrationLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-scrollable modal-fullscreen" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
<<<<<<< HEAD

=======
>>>>>>> bc5055ac1c33d7fbd333bd4a6290691631963c3b
        <div class="modal-body">
            <div class="form-section ">

                <div class="container-fluid">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-5 frame-img">
                            <img src="{{ asset('frontend/images/Frame.png') }}" alt="frame image">
                        </div>
                        <div class="col-lg-7">
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
                                                {!! Form::text('confirm_password', (old('confirm_password')) ? old('confirm_password') : null, [ 'placeholder' => "Confirm Password", 'class' => 'form-control w-100 rounded-pill did-floating-input p-3 ', 'required' => 'required']) !!}
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
{{-- Login Modal  --}}
<<<<<<< HEAD
<div class="modal fade" id="userlogin" tabindex="-1" role="dialog" aria-labelledby="userloginLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-fullscreen" role="document">
    <div class="modal-content">
        <div class="modal-body">

            <div class="form-section mt-5">
                <div class="container-fluid">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-5 frame-img">
                            <img src="{{ asset('frontend/images/Frame.png') }}" alt="frame image">
                        </div>
                        <div class="col-lg-7">
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
                                    {!! Form::close() !!}
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
            {{-- <div class="form-section ">
=======
<div class="modal fade modal-dialog-scrollable modal-fullscreen" id="userlogin" tabindex="-1" role="dialog" aria-labelledby="userloginLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <div class="form-section ">
>>>>>>> bc5055ac1c33d7fbd333bd4a6290691631963c3b
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-12">
                            <form action="{{ route('login_new')}}" method="POST">
                            @csrf
                                <h2 class="mb-3">Member Login</h2>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="labe-section">
                                            <div class="did-floating-label-content mb-4">
                                                <input type="email" class="form-control rounded-pill " name="email" id="email"
                                                    placeholder="Enter your email" required>
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="did-floating-label-content mb-4">
                                                <input type="password" class="form-control rounded-pill" name="password" id="password"
                                                    placeholder="Enter your password" required>
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary become-btn"> Login </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
  </div>
</div>
