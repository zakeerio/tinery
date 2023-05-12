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
                                                    <a href="{{ route('admin.itineraries.edit', ['id' => $row->id])}}" class="btn bg-info">Edit</a>
                                                    <form action="{{ route('admin.itineraries.destroy', ['itinerary' => $row->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                                <td>{{ $row->category}}</td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                {!! Form::open(['route' => 'admin.categories.store', 'method' => 'POST']) !!}
                                    <div class="form-group">
                                    @csrf
                                    {!! Form::label('title', 'Title') !!}
                                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
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
