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
                        <li class="breadcrumb-item active"><a
                                href="{{ route('admin.crudpages.index') }}">Pages</a>
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
                        <h3 class="card-title">{{ $subTitle }}</h3>
                        <div class="card-tools">
                            <a class="btn btn-success" href="{{ route('admin.crudpages.index') }}">
                                <i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.crudpages.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Title:</strong>
                                    {!! Form::text('title', null, ['placeholder' => 'Write Title', 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <strong>Slug:</strong>
                                    @php
                                        $arr[] = array(''=>'Select Slug',''=>'Home','term-of-use'=>'Term of use','privacy-policy'=>'Privacy Policy','contact'=>'Contact')
                                    @endphp
                                    {!! Form::select('slug', $arr, null, ['class' => 'form-control select2']) !!}
                                </div>
                                <div class="form-group">
                                    <strong>Image:</strong>
                                    {!! Form::file('image',  ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <strong>SEO Description:</strong>
                                    {!! Form::text('seo_description', null, ['placeholder' => 'Write SEO Description', 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <strong>SEO Keywords:</strong>
                                    {!! Form::text('seo_keywords', null, ['placeholder' => 'Write Keywords seperate by commac (,) after each word', 'class' => 'form-control']) !!}
                                    <small>Enter comma (,) to seperate each keywords</small>
                                </div>
                                <div class="form-group">
                                    <strong>Description:</strong>
                                    {!! Form::textarea('description', null, ['placeholder' => 'Name', 'class' => 'form-control','id'=>'summernote']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-success">CREATE PAGE</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
