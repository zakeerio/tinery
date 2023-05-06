@extends('admin.layouts.app')
@section('content')

    @include('admin.partials.flash')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $pageTitle }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Permissions</li>
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
                        <h3 class="card-title">Permissions Management</h3>

                        <div class="card-tools">
                            @can('permission-create')
                                <a class="btn btn-success" href="{{ route('admin.permissions.create') }}">CREATE
                                    PERMISSION</a>
                            @endcan
                        </div>
                    </div>
                    @php
                        $permissionslist = permissionFormater($permissions);
                    @endphp
                    <div class="card-body table-responsive no-padding">
                        <div class="container-fluid">
                            <div class="row">
                                @foreach ($permissionslist as $key => $permissionItems)
                                    <div class="col-sm-12 col-md-3">
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
                                                        <p class="text-capitalize mb-1">
                                                            <span>{{ $item[0] }}</span>
                                                            @can('permission-edit')
                                                                <a href="{{ route('admin.permissions.edit', $item[1]) }}"><i
                                                                        class="fa fa-edit text-primary"></i></a>
                                                            @endcan
                                                            @can('permission-destroy')
                                                                <a href="#" class="permission_dlt_btn"
                                                                    data-formid="{{ 'permission-deleteform' . $item[1] }}""><i class="
                                                                    fa fa-trash text-danger"></i></a>
                                                            @endcan
                                                        </p>
                                                            {!! Form::open(['id' => 'permission-deleteform' . $item[1], 'method' => 'DELETE', 'route' => ['admin.permissions.destroy', $item[1]], 'style' => 'display:inline']) !!}
                                                            {!! Form::close() !!}
                                                    @endforeach
                                                </div>
                                            </div>
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
@section('custom_scripts')
    <script>
        $(document).ready(function() {
            $(".permission_dlt_btn").on('click', function(e) {
                deleteConfirm(e);
            });
        });
    </script>
@endsection
