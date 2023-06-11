@extends('frontend.layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="form-section position-relative">
  <div class="container-fluid">
          <div class="row d-flex align-items-center">
              <div class="col-md-4 d-md-block d-none frame-img p-0">
                  <img src="{{ asset('frontend/images/Frame.png') }}" alt="frame image">
              </div>
              <div class="col-md-8 px-32">
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
                  {!! Form::open(['route' => 'register_custom', 'method' => 'POST', 'class' => 'ps-3 pe-5']) !!}

                  @csrf
                  <h2 class="member-h2 mb-3 col-8 col-sm-6 text-center text-md-start mx-auto col-md-12 my-32">Become a Member</h2>
                  <div class="row">
                          <div class="col-8  col-md-5 mx-auto mx-md-3  p-0 ">
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
                          <div class="col-8 col-md-5 mx-auto  p-0  ">
                              <div class="labe-section mx-0 w-100">
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
                      <div class="form-group text-center text-md-start">
                          {!! Form::submit("Become a Member", ['class' => 'btn btn-primary become-btn' ]) !!}
                          {!! Form::close() !!}
                      </div>

              </div>
          </div>
      </div>
  </div>
</div>

@endsection
