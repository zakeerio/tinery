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
                        <li class="breadcrumb-item active">Home Settings</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    @include('admin.partials.flash')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Genral Settings</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0" style="display: block;">
                        <form action="{{ route('admin.homesettings.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$array->id}}">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="site_title" class="form-label">Site Title</label>
                                            <input type="text" name="site_title" id="site_title"
                                                value="{{ $array->site_title}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="banner_title" class="form-label">Banner Title</label>
                                            <input type="text" name="banner_title" id="banner_title"
                                                value="{{ $array->banner_title}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="banner_description" class="form-label">Banner Description</label>
                                            <input type="text" name="banner_description" id="banner_description"
                                                value="{{ $array->banner_description}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="summernote" class="form-label">About Us</label>
                                            <textarea name="about_us" id="summernote" cols="30" rows="10">{{ $array->about_us}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 pt-3">
                                        <p class="text-right"><input type="submit" value="UPDATE" class="btn btn-info"></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Logo Settings</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0" style="display: block;">
                        <form action="{{ route('admin.homesettings.updatepictures') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$array->id}}" name="id">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="form-label">Logo</label>
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="settings-uploads">
                                                    <img src="{{asset('frontend/img/'.$array->logo)}}" id="setting_logo">
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="from-group">
                                                    <input type="file" name="logo" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="logo" class="form-label">Icon</label>
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="settings-uploads">
                                                    <img src="{{asset('frontend/img/'.$array->icon)}}" id="setting_icon">
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="from-group">
                                                    <input type="file" name="icon" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 pt-3">
                                        <p class="text-right"><input type="submit" value="UPDATE" class="btn btn-success">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('custom_scripts')
    <script>
        // $("div#logodropzone").dropzone({ url: "/file/post" });
        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-logo').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'logo_label';
                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-icon').addEventListener('click', (event) => {
                event.preventDefault();
                inputId = 'icon_label';
                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        // input
        let inputId = '';

        // set file link
        function fmSetLink($url) {
            $('#' + inputId).val($url);
            var imgTagId = $('#' + inputId).data("imgid");
            previewImage(imgTagId, $url);
        }

        function previewImage(id, source) {
            $("#" + id).attr("src", source);
        }
    </script>
@endsection
