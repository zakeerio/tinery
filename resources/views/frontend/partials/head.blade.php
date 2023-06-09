<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>@yield('title', config('settings.site_name')) | {{ config('settings.site_name') }}</title>
<meta name="keywords" content="@yield('meta_keywords', config('settings.meta_keywords') )">
<meta name="description" content="@yield('meta_description', config('settings.meta_description') )">
<link rel="canonical" href="{{url()->current()}}"/>
<link rel="shortcut icon" href="{{ config('settings.site_icon') }}">

<meta property="og:site_name" content="{{ config('settings.site_name') }}">
<meta property="og:title" content="@yield('title', config('settings.site_name'))">
<meta property="og:description" content="@yield('meta_description', config('settings.meta_description') )">
<meta property="og:type" content="website">
<meta property="og:locale" content="en">
<meta property="og:url" content="{{ env('APP_URL') }}">
<meta property="og:image" content="@yield('seo_image', asset('frontend/images/LOGO.png') )">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="@yield('meta_description', config('settings.meta_description') )">

{{-- <meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@stefanbauerme">
<meta name="twitter:creator" content="@stefanbauerme">
<meta name="twitter:title" content="@yield('title', config('settings.site_name'))">
<meta name="twitter:image" content="{{ asset('img/twitter_summary_card.png') }}"> --}}


<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

{{-- FONTS --}}
{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback"> --}}

{{-- PLUGINS --}}
{{-- <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}"> --}}


{{-- STYLES --}}
{{-- <link rel="stylesheet" href="{{ asset('css/admin/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/style.css') }}"> --}}

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
{{-- <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.min.css') }}"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Include Slick CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

<!-- Include Slick theme CSS (optional) -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

<link rel="stylesheet" href="{{ asset('frontend/css/mytinnery.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

{{-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

