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
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Categories Management</h3>
                    </div>
                    <div class="card-body table-responsive no-padding">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Title</th>
                                                <th>Actions</th>
                                            </tr>
                                            @if(!empty($categories))
                                            @foreach($categories as $row)
                                            <tr>
                                                <td>
                                                    {{$row->name}}
                                                </td>
                                                <td class="d-flex">
                                                    <a href="{{ route('admin.categories.edit', $row->id)}}" class="btn btn-info" title="Edit Category"><i class="fa fa-edit"></i></a> &nbsp;
                                                    <form action="{{ route('admin.categories.destroy', $row->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" title="Delete Category"><i class="fa fa-trash"></i></button>
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
            <div class="col-5">
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



                <div class="card">
                    @if(!empty($single_category))

                        <div class="card-header justify-content-right">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-success">Add New</a>
                        </div>

                        <div class="card-header">
                            <h3 class="card-title">Update</h3>
                        </div>
                        <div class="card-body table-responsive no-padding">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                    {!! Form::model($single_category, ['route' => ['admin.categories.update', $single_category->id], 'method' => 'PUT']) !!}
                                        <div class="form-group">
                                        @csrf
                                        {!! Form::label('name', 'Category Name') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                        </div>
                                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                    {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card-header">
                            <h3 class="card-title">Add New</h3>
                        </div>
                        <div class="card-body table-responsive no-padding">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">
                                    {!! Form::open(['route' => 'admin.categories.store', 'method' => 'POST']) !!}
                                        <div class="form-group">
                                        @csrf
                                        {!! Form::label('name', 'Category Name') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                        </div>
                                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                    {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
