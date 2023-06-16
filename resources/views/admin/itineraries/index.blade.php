@extends('admin.layouts.app')
@section('content')

    @include('admin.partials.flash')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1>{{ $pageTitle }}</h1> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Itinerarys</li>
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
                        <h3 class="card-title">Itineraries Management</h3>

                        <div class="card-tools">
                            @can('permission-create')
                                <a class="btn btn-success" href="{{ url('/admin/itineraries/createload') }}">Create Itenerary</a>
                            @endcan
                        </div>
                    </div>
                    @php
                        //$permissionslist = permissionFormater($permissions);
                    @endphp
                    <div class="card-body table-responsive no-padding">
                        <div class="container-fluid">
                            <div class="row">
                                {{-- @foreach ($permissionslist as $key => $permissionItems)
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
                                                                <a href="{{ route('admin.itineraries.edit', $item[1]) }}"><i
                                                                        class="fa fa-edit text-primary"></i></a>
                                                            @endcan
                                                            @can('permission-destroy')
                                                                <a href="#" class="permission_dlt_btn"
                                                                    data-formid="{{ 'permission-deleteform' . $item[1] }}""><i class="
                                                                    fa fa-trash text-danger"></i></a>
                                                            @endcan
                                                        </p>
                                                            {!! Form::open(['id' => 'permission-deleteform' . $item[1], 'method' => 'DELETE', 'route' => ['admin.itineraries.destroy', $item[1]], 'style' => 'display:inline']) !!}
                                                            {!! Form::close() !!}
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive no-padding">
                        <div class="container-fluid">
                            <div class="row">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Actions</th>
                                        <th>Title</th>
                                        {{-- <th>Slug</th> --}}
                                        {{-- <th>Description</th> --}}
                                        {{-- <th>Excerpt</th> --}}
                                        {{-- <th>SEO Title</th> --}}
                                        {{-- <th>SEO Description</th> --}}
                                        {{-- <th>SEO Image</th> --}}
                                        <th>Author</th>
                                        <th>Tags</th>
                                        {{-- <th>Street</th> --}}
                                        {{-- <th>Street Line 1</th> --}}
                                        {{-- <th>City</th> --}}
                                        {{-- <th>State</th> --}}
                                        {{-- <th>Zipcode</th> --}}
                                        {{-- <th>Country</th> --}}
                                        {{-- <th>Latitude</th> --}}
                                        {{-- <th>Longitude</th> --}}
                                        {{-- <th>Phone</th> --}}
                                        {{-- <th>Website</th> --}}
                                        {{-- <th>Additional Info</th> --}}
                                        <th>Featured</th>
                                        <th>Visibility</th>
                                        <th>Status</th>
                                    </tr>
                                    @if(!empty($itineraries))
                                    @foreach($itineraries as $row)
                                    <tr>
                                        <td class="d-flex ">
                                            <a href="{{ route('admin.itineraries.edit',['itinerary' => $row->id] )}}" class="btn btn-info"><i class="fa fa-edit"></i></a> &nbsp;

                                            <form action="{{ route('admin.itineraries.destroy', ['itinerary' => $row->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>

                                            {{-- <a href="{{ route('admin.itineraries.destroy', ['itinerary' => $row->id])}}" class="badge bg-danger">Delete</a> --}}
                                        </td>
                                        <td>{{ $row->title}}</td>
                                        {{-- <td>{{ $row->slug}}</td> --}}
                                        {{-- <td>{{ $row->description}}</td> --}}
                                        {{-- <td>{{ $row->excerpt}}</td> --}}
                                        {{-- <td>{{ $row->seo_title}}</td> --}}
                                        {{-- <td>{{ $row->seo_description}}</td> --}}
                                        {{-- <td>{{ $row->seo_image}}</td> --}}
                                        <td>{{ $row->user_id}}</td>

                                        <td>
                                            @if ($row->tags)
                                            {{ "Tag" }}

                                                {{-- @php
                                                    $tagsdata = $row->tags;
                                                @endphp
                                                @if ($tagsdata)

                                                    @foreach($tagsdata as $tagitem)

                                                    @php
                                                        $tag = \App\Models\Tags::find($tagitem);
                                                    @endphp
                                                    @if ($tag)
                                                        <span class="badge bg-primary">{{$tag->name}}</span>
                                                    @endif
                                                    @endforeach
                                                @endif --}}
                                            @endif

                                        </td>
                                        {{-- <td>{{ $row->address_street}}</td> --}}
                                        {{-- <td>{{ $row->address_street_line1}}</td> --}}
                                        {{-- <td>{{ $row->address_city}}</td> --}}
                                        {{-- <td>{{ $row->address_state}}</td> --}}
                                        {{-- <td>{{ $row->address_zipcode}}</td> --}}
                                        {{-- <td>{{ $row->address_country}}</td> --}}
                                        {{-- <td>{{ $row->latitude}}</td> --}}
                                        {{-- <td>{{ $row->longitude}}</td> --}}
                                        {{-- <td>{{ $row->phone}}</td> --}}
                                        {{-- <td>{{ $row->website}}</td> --}}
                                        {{-- <td>{{ $row->additional_info}}</td> --}}
                                        <td>{{ $row->featured}}</td>
                                        <td>{{ $row->visibility}}</td>
                                        <td>{{ $row->status}}</td>
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
