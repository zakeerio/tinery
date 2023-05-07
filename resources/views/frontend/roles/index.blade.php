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
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>    

@include('admin.partials.flash')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $subTitle }}</h3>

                        <div class="card-tools">
                            @can('role-create')
                                <a class="btn btn-success" href="{{ route('admin.roles.create') }}"> CREATE ROLE</a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th><i class="fa fa-bolt"></i></th>
                                </tr>
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                @can('role-edit')
                                                    <a class="btn btn-info"
                                                        href="{{ route('admin.roles.show', $role->id) }}"><i
                                                            class="fa fa-eye"></i></a>
                                                @endcan
                                                @can('role-edit')
                                                    <a class="btn btn-primary"
                                                        href="{{ route('admin.roles.edit', $role->id) }}"><i
                                                            class="fa fa-edit"></i></a>
                                                @endcan

                                                @can('role-destroy')
                                                    <a class="btn btn-danger role-delete-btn" href="#"
                                                        data-formid="{{ 'role-deleteform' . $role->id }}"><i
                                                            class="fa fa-trash"></i></a>
                                                    {!! Form::open(['id' => 'role-deleteform' . $role->id, 'method' => 'DELETE', 'route' => ['admin.roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_scripts')
    <script>
        $(document).ready(function() {
            $(".role-delete-btn").on('click', function(e) {
                deleteConfirm(e);
            });
        });
    </script>
@endsection
