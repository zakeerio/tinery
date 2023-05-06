<!DOCTYPE html>
<html>

<head>
    @include('admin.partials.head')
    @yield('custom_styles')
</head>

<body id="body" class="hold-transition {{config('settings.ctrl_dark_mode')}} {{config('settings.ctrl_nav_fixed')}} {{config('settings.ctrl_nav_collapsed')}} {{config('settings.ctrl_nav_sidefixed')}} {{config('settings.ctrl_nav_sidemini')}} {{config('settings.ctrl_nav_sidemini-md')}} {{config('settings.ctrl_nav_sidemini-xs')}} {{config('settings.ctrl_fixed_footer')}} {{config('settings.ctrl_body_text_sm')}} {{config('settings.ctrl_navbar_accent')}}">
    <div class="wrapper">

        @include('admin.partials.header')
        @include('admin.partials.aside')

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('admin.partials.footer')
    </div>
    @include('admin.partials.scripts')
    @yield('custom_scripts')
    <script>
        $(document).ready(function(){
            $(".control-setting-field").on("change",function(e){
                updateThemeSettings("{{route('admin.settings.themesetting')}}", e, "{{ csrf_token() }}")
            });
        });
    </script>
</body>

</html>
