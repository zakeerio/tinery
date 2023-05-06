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
                        <li class="breadcrumb-item active"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create Role</h3>

                        <div class="card-tools">
                            <a class="btn btn-success" href="{{ route('admin.roles.index') }}"><i
                                    class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
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
                    <div class="card-body table-responsive no-padding">
                        {!! Form::open(['route' => 'admin.roles.store', 'method' => 'POST']) !!}
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                @php
                                    $permissionslist = permissionFormater($permission);
                                @endphp

                                @foreach ($permissionslist as $key => $permissionItems)
                                    <div class=" col-sm-12 col-md-2">
                                        <div class="card card-success card-outline collapsed-card">
                                            <div class="card-header">
                                                <h3 class="card-title text-uppercase">{{ $key }}</h3>

                                                <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                            <div class="permission-body">
                                                @foreach ($permissionItems as $item)
                                                    @php $item = explode('-', $item); @endphp
                                                    <p class="text-capitalize mb-0">
                                                        <span>{{ $item[0] }}</span>
                                                        <a href="#">
                                                            <label>{{ Form::checkbox('permission[]', $item[1], false, ['class' => 'name']) }}</label>
                                                        </a>
                                                    </p>
                                                @endforeach
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-success">CREATE</button>
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
