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
                        <li class="breadcrumb-item active">Settings</li>
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
                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="site_name" class="form-label">App Name</label>
                                            <input type="text" name="site_name" id="site_name"
                                                value="{{ config('settings.site_name') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="primary_email" class="form-label">Primary Email</label>
                                            <input type="text" name="primary_email" id="primary_email"
                                                value="{{ config('settings.primary_email') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="secondry_email" class="form-label">Secondry Email</label>
                                            <input type="text" name="secondry_email" id="secondry_email"
                                                value="{{ config('settings.secondry_email') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="primary_phone" class="form-label">Primary Phone</label>
                                            <input type="text" name="primary_phone" id="primary_phone"
                                                value="{{ config('settings.primary_phone') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="secondry_phone" class="form-label">Secondry Phone</label>
                                            <input type="text" name="secondry_phone" id="secondry_phone"
                                                value="{{ config('settings.secondry_phone') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="primary_phone" class="form-label">Address</label>
                                            <textarea name="address" id="address" rows="2"
                                                class="form-control">{{ config('settings.address') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="meta_description" class="form-label">Meta Description</label>
                                            <textarea name="meta_description" id="meta_description" rows="2"
                                                class="form-control">{{ config('settings.meta_description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="meta_keywords" class="form-label">SEO Keywords</label>
                                            <textarea name="meta_keywords" id="meta_keywords" rows="2"
                                                class="form-control">{{ config('settings.meta_keywords') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="facebook" class="form-label">Facebook</label>
                                            <input type="text" name="facebook" id="facebook"
                                                value="{{ config('settings.facebook') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="twitter" class="form-label">Twitter</label>
                                            <input type="text" name="twitter" id="twitter"
                                                value="{{ config('settings.twitter') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="instagram" class="form-label">Instagram</label>
                                            <input type="text" name="instagram" id="instagram"
                                                value="{{ config('settings.instagram') }}" class="form-control">
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
                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="form-label">Logo</label>
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="settings-uploads">
                                                    <img src="{{config('settings.site_logo')}}" id="setting_logo">
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="input-group">
                                                    <input type="text" id="logo_label" data-imgid="setting_logo"
                                                        class="form-control" name="site_logo" aria-label="Image"
                                                        aria-describedby="button-image">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" type="button"
                                                            id="button-logo">Select</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="logo" class="form-label">Icon</label>
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="settings-uploads">
                                                    <img src="{{config('settings.site_icon')}}" id="setting_icon">
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="input-group">
                                                    <input type="text" id="icon_label" data-imgid="setting_icon"
                                                        class="form-control" name="site_icon" aria-label="Image"
                                                        aria-describedby="button-image">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" type="button"
                                                            id="button-icon">Select</button>
                                                    </div>
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
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Home Page Settings</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0" style="display: block;">
                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="banner_title" class="form-label">Banner Title</label>
                                            <input type="text" name="banner_title" id="banner_title"
                                                value="{{ config('settings.banner_title') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="banner_description" class="form-label">Banner Description</label>
                                            <input type="text" name="banner_description" id="banner_description"
                                                value="{{ config('settings.banner_description') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="summernote" class="form-label">About Us</label>
                                                <textarea name="about_us" id="summernote" cols="30" rows="10">{{ config('settings.about_us') }}</textarea>
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
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Home Page Social Scripts</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0" style="display: block;">
                        <form action="{{ route('admin.settings.update') }}" method="POST">
                            @csrf
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="summernote" class="form-label">Instagram Script</label>
                                            <textarea name="social_instagram" class="form-control" cols="30" rows="5">{{ config('settings.social_instagram') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="summernote" class="form-label">Tiktok Script</label>
                                            <textarea name="social_tiktok" class="form-control" cols="30" rows="5">{{ config('settings.social_tiktok') }}</textarea>
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
