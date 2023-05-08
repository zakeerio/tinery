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
                        <li class="breadcrumb-item active">
                            <a href="{{ route('admin.itineraries.index') }}">Itineraries</a>
                        </li>
                        <li class="breadcrumb-item active">Create</li>
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
                <div class="card card-success">
                    <div class="card-header">
                        {{-- <h3 class="card-title">{{ $subTitle }}</h3> --}}
                        <div class="card-tools">
                            <a class="btn btn-success" href="{{ route('admin.itineraries.index') }}">
                                <i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- {!! Form::open(['route' => 'admin.itineraries.store', 'method' => 'POST']) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-success">CREATE</button>
                            </div>
                        </div>
                        {!! Form::close() !!} --}}

                        {!! Form::open(['route' => 'admin.itineraries.store', 'method' => 'POST']) !!}
                        <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('slug', 'Slug') !!}
                        {!! Form::text('slug', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'required', 'rows' => 5]) !!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('excerpt', 'Excerpt') !!}
                        {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'required', 'rows' => 3]) !!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('seo_title', 'SEO Title') !!}
                        {!! Form::text('seo_title', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('seo_description', 'SEO Description') !!}
                        {!! Form::textarea('seo_description', null, ['class' => 'form-control', 'rows' => 3]) !!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('seo_image', 'SEO Image') !!}
                        {!! Form::file('seo_image', ['class' => 'form-control-file']) !!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('author', 'Author') !!}
                        {!! Form::text('author', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('categories', 'Categories') !!}
                        @php
                            $categories = ['category1'=> 'category1', 'category2' => 'category2' ];
                            $tags = ['tag1'=> 'tag1', 'tag2' => 'tag2' ];

                        @endphp
                        {!! Form::select('categories', $categories, null, ['class' => 'form-control', 'multiple' => true]) !!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('tags', 'Tags') !!}
                        {!! Form::select('tags', $tags, null, ['class' => 'form-control', 'multiple' => true]) !!}
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('address_street', 'Street') !!}
                            {!! Form::text('address_street', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('address_street_line1', 'Street Line 1') !!}
                            {!! Form::text('address_street_line1', null, ['class' => 'form-control']) !!}
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('address_city', 'City') !!}
                            {!! Form::text('address_city', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('address_state', 'State') !!}
                            {!! Form::text('address_state', null, ['class' => 'form-control']) !!}
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('address_zipcode', 'Zipcode', null,  ['class' => 'form-control']) !!}
                            {!! Form::text('address_zipcode', null, ['class' => 'form-control']) !!}

                        </div>
                        <div class="form-group col-md-6">
                        {!! Form::label('address_country', 'Country') !!}
                        {!! Form::text('address_country', null, ['class' => 'form-control']) !!}
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                        {!! Form::label('latitude', 'Latitude') !!}
                        {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                        {!! Form::label('longitude', 'Longitude') !!}
                        {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
                        </div>
                        </div>
                        <div class="form-group">
                        {!! Form::label('phone', 'Phone') !!}
                        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('website', 'Website') !!}
                        {!! Form::text('website', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('additional_info', 'Additional Info') !!}
                        {!! Form::textarea('additional_info', null, ['class' => 'form-control', 'rows' => 5]) !!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('featured', 'Featured') !!}
                        {!! Form::select('featured', ['1' => 'Yes', '0' => 'No'], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                        {!! Form::label('visibility', 'Visibility') !!}
                        {!! Form::select('visibility', ['public' => 'Public', 'private' => 'Private'], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                        {!! Form::label('status', 'Status') !!}
                        {!! Form::select('status', ['published' => 'Published', 'draft' => 'Draft'], null, ['class' => 'form-control']) !!}
                        </div>
                        </div>
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
