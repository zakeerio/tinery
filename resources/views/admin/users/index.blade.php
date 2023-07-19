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
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                        <h3 class="card-title">{{$subTitle}}</h3>

                        <div class="card-tools">
                            @can('adminuser-create')
                                <a class="btn btn-success" href="{{ route('admin.users.create') }}">CREATE USER</a>
                            @endcan
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Featured</th>
                                    <th><i class="fa fa-bolt text-danger"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ($user->featured) ? "Featured" : "" }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @can('adminuser-show')
                                            <a class="btn btn-info" href="{{ route('admin.users.show', $user->id) }}"><i class="fa fa-eye"></i></a>
                                            @endcan
                                            @can('adminuser-edit')
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.users.edit', $user->id) }}"><i
                                                    class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('adminuser-destroy')
                                            <a class="btn btn-danger user-delete-btn" href="#"
                                                data-formid="{{ 'user-deleteform' . $user->id }}"><i
                                                    class="fa fa-trash"></i></a>
                                            @endcan
                                            {!! Form::open(['id' => 'user-deleteform' . $user->id, 'method' => 'DELETE', 'route' => ['admin.users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_scripts')
    <script>
        $(document).ready(function() {
            $(".user-delete-btn").on('click', function(e) {
                deleteConfirm(e);
            });
        });
    </script>
@endsection
