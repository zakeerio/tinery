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
                        <li class="breadcrumb-item active">Crud Pages</li>
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
                        <div class="row">
                            <div class="col-lg-10">
                                <h3 class="card-title">Pages Management</h3>
                            </div>
                            <div class="col-lg-2">
                                @can('permission-create')
                                    <a class="btn btn-success" href="{{ url('/admin/crudpages/create') }}">Create Page</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive no-padding">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Slug</th>
                                                <th>Title</th>
                                                <th>Actions</th>
                                            </tr>
                                            @if(!empty($pages))
                                            @foreach($pages as $row)
                                            <tr>
                                                <td>{{$row->slug}}</td>
                                                <td>{{$row->title}}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('admin.crudpages.edit', $row->id)}}" class="btn btn-info" title="Edit Tag"><i class="fa fa-edit"></i></a> &nbsp;
                                                    <form action="{{ route('admin.crudpages.destroy', $row->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"  title="Delete Tag"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
