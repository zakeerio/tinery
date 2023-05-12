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
                        <li class="breadcrumb-item active">Itineraries Categories</li>
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
                        <h3 class="card-title">Itineraries Categories Management</h3>
                    </div>
                    <div class="card-body table-responsive no-padding">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Actions</th>
                                                <th>Title</th>
                                            </tr>
                                            @if(!empty($itinerariescategories))
                                            @foreach($itinerariescategories as $row)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('admin.itineraries.edit', ['id' => $row->id])}}" class="badge bg-info">Edit</a>
                                                    <a href="{{ url('/admin/itineraries/destroy/'.$row->id)}}" class="badge bg-danger">Delete</a>
                                                </td>
                                                <td>{{ $row->category}}</td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                {!! Form::open(['route' => 'admin.itinerariescategories.store', 'method' => 'POST']) !!}
                                    <div class="form-group">
                                    @csrf
                                    {!! Form::label('title', 'Title') !!}
                                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                    {!! Form::label('slug', 'Slug') !!}
                                    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                                    </div>
                                {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
