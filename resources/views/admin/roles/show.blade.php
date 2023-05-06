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
                        <li class="breadcrumb-item active"><a href="{{route('admin.roles.index')}}">Roles</a></li>
                        <li class="breadcrumb-item active">Show</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Role Details</h3>

                        <div class="card-tools">
                            <a class="btn btn-info" href="{{ route('admin.roles.index') }}"><i
                                    class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="card-body table-responsive no-padding">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {{ $role->name }}
                                    </div>
                                </div>
                                @php
                                    $permissionslist = permissionFormater($rolePermissions);
                                @endphp
                                @foreach ($permissionslist as $key => $permissionItems)
                                    <div class="permission-card col-sm-12 col-md-2">
                                        <div class="permission-title">
                                            <h4 class="text-uppercase">{{ $key }}</h4>
                                        </div>
                                        <div class="permission-body">
                                            @foreach ($permissionItems as $item)
                                                @php $item = explode('-', $item); @endphp
                                                <p class="text-capitalize text-center">
                                                    <span class="badge badge-dark">{{ $item[0] }}</span>
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
