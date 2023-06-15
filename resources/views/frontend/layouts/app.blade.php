<!DOCTYPE html>
<html>

<head>
    @include('frontend.partials.head')
    @yield('custom_styles')
</head>

<body id="body" class="hold-transition {{config('settings.ctrl_dark_mode')}} {{config('settings.ctrl_nav_fixed')}} {{config('settings.ctrl_nav_collapsed')}} {{config('settings.ctrl_nav_sidefixed')}} {{config('settings.ctrl_nav_sidemini')}} {{config('settings.ctrl_nav_sidemini-md')}} {{config('settings.ctrl_nav_sidemini-xs')}} {{config('settings.ctrl_fixed_footer')}} {{config('settings.ctrl_body_text_sm')}} {{config('settings.ctrl_navbar_accent')}}">
    <div class="wrapper">

        @include('frontend.partials.header')
        {{-- @include('frontend.partials.aside') --}}

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('frontend.partials.footer')
    </div>
    @include('frontend.partials.scripts')
   
    @yield('custom_scripts')

</body>

</html>
