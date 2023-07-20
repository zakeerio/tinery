@extends('admin.layouts.app')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $pageTitle }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('admin.users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

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

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-warning">
                    <div class="card-header with-border">
                        <h3 class="card-title">{{ $subTitle }}</h3>
                        <div class="card-tools">
                            <a class="btn btn-warning" href="{{ route('admin.users.index') }}"><i
                                    class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! Form::model($user, ['method' => 'PATCH', 'files' => true,  'route' => ['admin.users.update', $user->id]]) !!}
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>First Name:</strong>
                                        {!! Form::text('name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>last Name:</strong>
                                        {!! Form::text('lastname', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Username:</strong>
                                        {!! Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Confirm Password:</strong>
                                        {!! Form::password('confirm_password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Facebook Link:</strong>
                                        {!! Form::text('facebook', null, ['placeholder' => 'Facebook Link', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Twitter Link:</strong>
                                        {!! Form::text('twitter', null, ['placeholder' => 'Twitter Link', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Instagram Link:</strong>
                                        {!! Form::text('instagram', null, ['placeholder' => 'Instagram Link', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Tiktok Link:</strong>
                                        {!! Form::text('tiktok', null, ['placeholder' => 'Tiktok Link', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Website Link:</strong>
                                        {!! Form::text('website', null, ['placeholder' => 'Website Link', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Profile Picture:</strong>
                                        {!! Form::file('file', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Tags:</strong>
                                        {!! Form::text('tags', null, ['placeholder' => 'Tags', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Bio:</strong>
                                        {!! Form::textarea('bio', null, ['placeholder' => 'Bio', 'class' => 'form-control','rows'=>'5']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        {{-- {!! Form::checkbox('featured', null, [ 'class' => 'form-check-input', 'id' => 'featured']) !!} --}}
                                        <input type="checkbox" name="featured" {{ ($user->featured && $user->featured == 'true') ? "checked='checked'" : '' }} id="featured" value="{{ ($user->featured) ? $user->featured : '' }}"  class="" >

                                        <label class="form-check-label" for="featured">
                                            <strong>Featured</strong>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                    <button type="submit" class="btn btn-success">SAVE</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
