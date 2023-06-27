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
                        <li class="breadcrumb-item active">Locations</li>
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
                            <div class="col-lg-7">
                                <h3 class="card-title">Location Management</h3>
                            </div>
                            <div class="col-lg-3">
                                @can('permission-create')
                                    <a class="btn btn-success" href="{{ url('/admin/itinerarylocation/uploadexcel') }}">Upload Locations using Excel File</a>
                                @endcan
                            </div>
                            <div class="col-lg-2">
                                @can('permission-create')
                                    <a class="btn btn-success" href="{{ url('/admin/itinerarylocation/create') }}">Create Location</a>
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
                                                <th>Sr#</th>
                                                <th>Street</th>
                                                <th>Street Line 1</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>Zipcode</th>
                                                <th>Country</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Actions</th>
                                            </tr>
                                            @if(!empty($locations))
                                            @php
                                                $count=1;
                                            @endphp
                                            @foreach($locations as $row)
                                            <tr>
                                                <td>{{$count}}</td>
                                                <td>{{$row->address_street}}</td>
                                                <td>{{$row->address_street_line1}}</td>
                                                <td>{{$row->address_city}}</td>
                                                <td>{{$row->address_state}}</td>
                                                <td>{{$row->address_zipcode}}</td>
                                                <td>{{$row->address_country}}</td>
                                                <td>{{$row->latitude}}</td>
                                                <td>{{$row->longitude}}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('admin.itinerarylocation.edit', $row->id)}}" class="btn btn-info" title="Edit Tag"><i class="fa fa-edit"></i></a> &nbsp;
                                                    <form action="{{ route('admin.itinerarylocation.destroy', $row->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"  title="Delete Tag"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>

                                            @php
                                                $count++;
                                            @endphp
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
