@extends('frontend.layouts.app')

@section('content')

<div class="form-section position-relative">
    <div class="container-fluid">

        <div class="row d-flex align-items-center">
            <div class="col-md-5 d-md-block d-none frame-img p-0">
                <img src="{{ asset('frontend/images/Frame.png') }}" alt="frame image">
            </div>
            <div class="col-md-7">
                <div class="loginform">
                    {!! Form::open(['route' => 'login_new', 'method' => 'POST', 'class' => 'p-5']) !!}
                    @csrf
                    <h2 class="member-h2"> Member Login</h2>
                    <div class="row">
                        <div class="col-12 col-lg-6">
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
                    <div class="form-group mb-2">
                        {!! Form::submit("Login", ['class' => 'btn btn-light become-btn' ]) !!}
                    </div>
                    <div class="d-flex gap-2">
                        <a href="javascript:void(0)"  data-role="clicktoforgotloginpage">Forgot Password?</a> <div class="vr"></div>
                        <a href="{{ route('register') }}" >Register</a>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="forgotpasswordform" style="display:none;">
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
                    <div class="form-group mb-2 mt-2">
                        {!! Form::submit("Submit", ['class' => 'btn btn-light become-btn' ]) !!}
                    </div>
                    <a href="javascript:void(0)" data-role="clicktologinpage">Login?</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
