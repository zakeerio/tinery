<aside class="control-sidebar control-sidebar-dark" style="bottom: 27px; top: 0px; height: 1020px; display: block;">
    <!-- Control sidebar content goes here -->
    <div class="p-3 control-sidebar-content os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition os-host-overflow os-host-overflow-y"
        style="height: 1020px;">
        <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
        </div>
        <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
        </div>
        <div class="os-content-glue" style="margin: -16px; width: 249px; height: 1019px;"></div>
        <div class="">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                <div class="os-content" style="padding: 16px; height: 100%; width: 100%;">
                    <h5>Customize AdminLTE</h5>
                    <hr class="mb-2">
                    <div class="mb-4"><input type="checkbox" value="dark-mode" name="ctrl_dark_mode" {{config('settings.ctrl_dark_mode') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="body" data-class="dark-mode"><span>Dark Mode</span></div>
                    <h6>Header Options</h6>
                    <div class="mb-1"><input type="checkbox" value="layout-navbar-fixed" name="ctrl_nav_fixed" {{config('settings.ctrl_nav_fixed') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="body" data-class="layout-navbar-fixed"><span>Fixed</span></div>
                    {{-- <div class="mb-1"><input type="checkbox" value="1" class="mr-1 control-setting-field"><span>Dropdown Legacy Offset</span>
                    </div> --}}
                    <div class="mb-4"><input type="checkbox" value="border-bottom-0" name="ctrl_nav_noborder" {{config('settings.ctrl_nav_noborder') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="nav_variant" data-class="border-bottom-0"><span>No border</span></div>
                    <h6>Sidebar Options</h6>
                    <div class="mb-1"><input type="checkbox" value="sidebar-collapse" name="ctrl_nav_collapsed" {{config('settings.ctrl_nav_collapsed') != null ? 'checked':''}}  class="mr-1 control-setting-field" data-target_id="body" data-class="sidebar-collapse"><span>Collapsed</span></div>
                    <div class="mb-1"><input type="checkbox" value="layout-fixed" name="ctrl_nav_sidefixed" {{config('settings.ctrl_nav_sidefixed') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="body" data-class="layout-fixed"><span>Fixed</span>
                    </div>
                    <div class="mb-1"><input type="checkbox" value="sidebar-mini" name="ctrl_nav_sidemini" {{config('settings.ctrl_nav_sidemini') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="body" data-class="sidebar-mini"><span>Sidebar Mini</span></div>
                    <div class="mb-1"><input type="checkbox" value="sidebar-mini-md" name="ctrl_nav_sidemini-md" {{config('settings.ctrl_nav_sidemini-md') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="body" data-class="sidebar-mini-md"><span>Sidebar Mini MD</span></div>
                    <div class="mb-1"><input type="checkbox" value="sidebar-mini-xs" name="ctrl_nav_sidemini-xs" {{config('settings.ctrl_nav_sidemini-xs') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="body" data-class="sidebar-mini-xs"><span>Sidebar Mini XS</span></div>
                    <div class="mb-1"><input type="checkbox" value="nav-flat" name="ctrl_nav_flat" {{config('settings.ctrl_nav_flat') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="main_nav_ul" data-class="nav-flat"><span>Nav Flat Style</span></div>
                    <div class="mb-1"><input type="checkbox" value="nav-legacy" name="ctrl_nav_legacy" {{config('settings.ctrl_nav_legacy') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="main_nav_ul" data-class="nav-legacy"><span>Nav Legacy Style</span></div>
                    <div class="mb-1"><input type="checkbox" value="nav-compact" name="ctrl_nav_compact" {{config('settings.ctrl_nav_compact') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="main_nav_ul" data-class="nav-compact"><span>Nav Compact</span></div>
                    <div class="mb-1"><input type="checkbox" value="nav-child-indent" name="ctrl_nav_child_indent" {{config('settings.ctrl_nav_child_indent') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="main_nav_ul" data-class="nav-child-indent"><span>Nav Child Indent</span></div>
                    <div class="mb-1"><input type="checkbox" value="nav-collapse-hide-child" name="ctrl_nav_collapse_hide_child" {{config('settings.ctrl_nav_collapse_hide_child') != null ? 'checked':''}} class="mr-1 control-setting-field"  data-target_id="main_nav_ul" data-class="nav-collapse-hide-child"><span>Nav Child Hide on Collapse</span></div>
                    <div class="mb-4"><input type="checkbox" value="sidebar-no-expand" name="ctrl_nav_disable_expand" {{config('settings.ctrl_nav_disable_expand') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="main-aside" data-class="sidebar-no-expand"><span>Disable Hover Auto-Expand</span></div>
                    <h6>Footer Options</h6>
                    <div class="mb-4"><input type="checkbox" value="layout-footer-fixed" name="ctrl_fixed_footer" {{config('settings.ctrl_fixed_footer') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="body" data-class="layout-footer-fixed"><span>Fixed</span></div>
                    <h6>Small Text Options</h6>
                    <div class="mb-1"><input type="checkbox" value="text-sm" name="ctrl_body_text_sm" {{config('settings.ctrl_body_text_sm') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="body" data-class="text-sm"><span>Body</span></div>
                    <div class="mb-1"><input type="checkbox" value="text-sm" name="ctrl_nav_text_sm" {{config('settings.ctrl_nav_text_sm') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="nav_variant" data-class="text-sm"><span>Navbar</span></div>
                    <div class="mb-1"><input type="checkbox" value="text-sm" name="ctrl_brand_text_sm" {{config('settings.ctrl_brand_text_sm') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="brand-logo" data-class="text-sm"><span>Brand</span></div>
                    <div class="mb-1"><input type="checkbox" value="text-sm" name="ctrl_sidebar_text_sm" {{config('settings.ctrl_sidebar_text_sm') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="main-aside" data-class="text-sm"><span>Sidebar Nav</span></div>
                    <div class="mb-4"><input type="checkbox" value="text-sm" name="ctrl_footer_text_sm" {{config('settings.ctrl_footer_text_sm') != null ? 'checked':''}} class="mr-1 control-setting-field" data-target_id="main-footer" data-class="text-sm"><span>Footer</span></div>
                    <h6>Navbar Variants</h6>
                    <div class="d-flex"><select name="ctrl_navbar_variant" class="custom-select mb-3 text-light border-0 bg-white control-setting-field" data-target_id="nav_variant" data-old_class="{{config('settings.ctrl_navbar_variant')}}" data-class="{{config('settings.ctrl_navbar_variant')}}">
                            <option class="bg-primary" value="navbar-dark navbar-primary" {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-dark navbar-primary") == 0 ? 'selected="selected"':''}}>Primary</option>
                            <option class="bg-secondary" value="navbar-dark navbar-secondary"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-dark navbar-secondary") == 0 ? 'selected="selected"':''}}>Secondary</option>
                            <option class="bg-info" value="navbar-dark navbar-info"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-dark navbar-info") == 0 ? 'selected="selected"':''}}>Info</option>
                            <option class="bg-success" value="navbar-dark navbar-success"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-dark navbar-succes") == 0 ? 'selected="selected"':''}}>Success</option>
                            <option class="bg-danger" value="navbar-dark navbar-danger"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-dark navbar-danger") == 0 ? 'selected="selected"':''}}>Danger</option>
                            <option class="bg-indigo" value="navbar-dark navbar-indigo"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-dark navbar-indigo") == 0 ? 'selected="selected"':''}}>Indigo</option>
                            <option class="bg-purple" value="navbar-dark navbar-purple"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-dark navbar-purple") == 0 ? 'selected="selected"':''}}>Purple</option>
                            <option class="bg-pink" value="navbar-dark navbar-pink"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-dark navbar-pink") == 0 ? 'selected="selected"':''}}>Pink</option>
                            <option class="bg-navy" value="navbar-dark navbar-navy"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-dark navbar-navy") == 0 ? 'selected="selected"':''}}>Navy</option>
                            <option class="bg-lightblue" value="navbar-dark navbar-lightblue"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-dark navbar-lightblue") == 0 ? 'selected="selected"':''}}>Lightblue</option>
                            <option class="bg-teal" value="navbar-dark navbar-teal"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-dark navbar-teal") == 0 ? 'selected="selected"':''}}>Teal</option>
                            <option class="bg-cyan" value="navbar-dark navbar-cyan"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-dark navbar-cyan") == 0 ? 'selected="selected"':''}}>Cyan</option>
                            <option class="bg-dark" value="navbar-dark"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-dark") == 0 ? 'selected="selected"':''}}>Dark</option>
                            <option class="bg-gray-dark" value="navbar-dark navbar-gray-dark"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-dark navbar-gray-dark") == 0 ? 'selected="selected"':''}}>Gray dark</option>
                            <option class="bg-gray" value="navbar-dark navbar-gray"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-dark navbar-gray") == 0 ? 'selected="selected"':''}}>Gray</option>
                            <option class="bg-light" value="navbar-light"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-light") == 0 ? 'selected="selected"':''}}>Light</option>
                            <option class="bg-warning" value="navbar-light navbar-warning"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-light navbar-warning") == 0 ? 'selected="selected"':''}}>Warning</option>
                            <option class="bg-white" value="navbar-white navbar-light"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-white navbar-light") == 0 ? 'selected="selected"':''}}>White</option>
                            <option class="bg-orange" value="navbar-light navbar-orange"  {{strcmp(config('settings.ctrl_navbar_variant'), "navbar-light navbar-orange") == 0 ? 'selected="selected"':''}}>Orange</option>
                        </select></div>
                    <h6>Accent Color Variants</h6>
                    <div class="d-flex"></div><select name="ctrl_navbar_accent" class="custom-select mb-3 border-0 control-setting-field" data-target_id="body" data-old_class="{{config('settings.ctrl_navbar_accent')}}" data-class="{{config('settings.ctrl_navbar_accent')}}">
                        <option value="" {{config('settings.ctrl_navbar_accent') == null ? 'selected="selected"':''}}>None Selected</option>
                        <option class="bg-primary" value="accent-primary" {{config('settings.ctrl_navbar_accent') == 'accent-primary' ? 'selected="selected"':''}}>Primary</option>
                        <option class="bg-warning" value="accent-warning" {{config('settings.ctrl_navbar_accent') == 'accent-warning' ? 'selected="selected"':''}}>Warning</option>
                        <option class="bg-info" value="accent-info" {{config('settings.ctrl_navbar_accent') == 'accent-info' ? 'selected="selected"':''}}>Info</option>
                        <option class="bg-danger" value="accent-danger" {{config('settings.ctrl_navbar_accent') == 'accent-danger' ? 'selected="selected"':''}}>Danger</option>
                        <option class="bg-success" value="accent-success" {{config('settings.ctrl_navbar_accent') == 'accent-success' ? 'selected="selected"':''}}>Success</option>
                        <option class="bg-indigo" value="accent-indigo" {{config('settings.ctrl_navbar_accent') == 'accent-indigo' ? 'selected="selected"':''}}>Indigo</option>
                        <option class="bg-lightblue" value="accent-lightblue" {{config('settings.ctrl_navbar_accent') == 'accent-lightblue' ? 'selected="selected"':''}}>Lightblue</option>
                        <option class="bg-navy" value="accent-navy" {{config('settings.ctrl_navbar_accent') == 'accent-navy' ? 'selected="selected"':''}}>Navy</option>
                        <option class="bg-purple" value="accent-purple" {{config('settings.ctrl_navbar_accent') == 'accent-purple' ? 'selected="selected"':''}}>Purple</option>
                        <option class="bg-fuchsia" value="accent-fuchsia" {{config('settings.ctrl_navbar_accent') == 'accent-fuchsia' ? 'selected="selected"':''}}>Fuchsia</option>
                        <option class="bg-pink" value="accent-pink" {{config('settings.ctrl_navbar_accent') == 'accent-pink' ? 'selected="selected"':''}}>Pink</option>
                        <option class="bg-maroon" value="accent-maroon" {{config('settings.ctrl_navbar_accent') == 'accent-maroon' ? 'selected="selected"':''}}>Maroon</option>
                        <option class="bg-orange" value="accent-orange" {{config('settings.ctrl_navbar_accent') == 'accent-orange' ? 'selected="selected"':''}}>Orange</option>
                        <option class="bg-lime" value="accent-lime" {{config('settings.ctrl_navbar_accent') == 'accent-lime' ? 'selected="selected"':''}}>Lime</option>
                        <option class="bg-teal" value="accent-teal" {{config('settings.ctrl_navbar_accent') == 'accent-teal' ? 'selected="selected"':''}}>Teal</option>
                        <option class="bg-olive" value="accent-olive" {{config('settings.ctrl_navbar_accent') == 'accent-olive' ? 'selected="selected"':''}}>Olive</option>
                    </select>
                    <h6>Dark Sidebar Variants</h6>
                    <div class="d-flex"></div><select name="ctrl_sidebar_theme" class="custom-select mb-3 text-light border-0 bg-primary control-setting-field" data-target_id="main-aside" data-old_class="{{config('settings.ctrl_sidebar_theme')}}" data-class="{{config('settings.ctrl_sidebar_theme')}}">
                        <option value="" {{config('settings.ctrl_sidebar_theme') == null ? 'selected="selected"':''}}>None Selected</option>
                        <option class="bg-primary" value="sidebar-dark-primary" {{config('settings.ctrl_sidebar_theme') == 'sidebar-dark-primary' ? 'selected="selected"':''}}>Primary</option>
                        <option class="bg-warning" value="sidebar-dark-warning" {{config('settings.ctrl_sidebar_theme') == 'sidebar-dark-warning' ? 'selected="selected"':''}}>Warning</option>
                        <option class="bg-info" value="sidebar-dark-info" {{config('settings.ctrl_sidebar_theme') == 'sidebar-dark-info' ? 'selected="selected"':''}}>Info</option>
                        <option class="bg-danger" value="sidebar-dark-danger" {{config('settings.ctrl_sidebar_theme') == 'sidebar-dark-danger' ? 'selected="selected"':''}}>Danger</option>
                        <option class="bg-success" value="sidebar-dark-success" {{config('settings.ctrl_sidebar_theme') == 'sidebar-dark-success' ? 'selected="selected"':''}}>Success</option>
                        <option class="bg-indigo" value="sidebar-dark-indigo" {{config('settings.ctrl_sidebar_theme') == 'sidebar-dark-indigo' ? 'selected="selected"':''}}>Indigo</option>
                        <option class="bg-lightblue" value="sidebar-dark-lightblue" {{config('settings.ctrl_sidebar_theme') == 'sidebar-dark-lightblue' ? 'selected="selected"':''}}>Lightblue</option>
                        <option class="bg-navy" value="sidebar-dark-navy" {{config('settings.ctrl_sidebar_theme') == 'sidebar-dark-navy' ? 'selected="selected"':''}}>Navy</option>
                        <option class="bg-purple" value="sidebar-dark-purple" {{config('settings.ctrl_sidebar_theme') == 'sidebar-dark-purple' ? 'selected="selected"':''}}>Purple</option>
                        <option class="bg-fuchsia" value="sidebar-dark-fuchsia" {{config('settings.ctrl_sidebar_theme') == 'sidebar-dark-fuchsia' ? 'selected="selected"':''}}>Fuchsia</option>
                        <option class="bg-pink" value="sidebar-dark-pink" {{config('settings.ctrl_sidebar_theme') == 'sidebar-dark-pink' ? 'selected="selected"':''}}>Pink</option>
                        <option class="bg-maroon" value="sidebar-dark-maroon" {{config('settings.ctrl_sidebar_theme') == 'sidebar-dark-maroon' ? 'selected="selected"':''}}>Maroon</option>
                        <option class="bg-orange" value="sidebar-dark-orange" {{config('settings.ctrl_sidebar_theme') == 'sidebar-dark-orange' ? 'selected="selected"':''}}>Orange</option>
                        <option class="bg-lime" value="sidebar-dark-lime" {{config('settings.ctrl_sidebar_theme') == 'sidebar-dark-lime' ? 'selected="selected"':''}}>Lime</option>
                        <option class="bg-teal" value="sidebar-dark-teal" {{config('settings.ctrl_sidebar_theme') == 'sidebar-dark-teal' ? 'selected="selected"':''}}>Teal</option>
                        <option class="bg-olive" value="sidebar-dark-olive" {{config('settings.ctrl_sidebar_theme') == 'sidebar-dark-olive' ? 'selected="selected"':''}}>Olive</option>
                    </select>
                    <h6>Light Sidebar Variants</h6>
                    <div class="d-flex"></div><select name="ctrl_sidebar_theme" class="custom-select mb-3 border-0 control-setting-field" data-target_id="main-aside" data-old_class="{{config('settings.ctrl_sidebar_theme')}}" data-class="{{config('settings.ctrl_sidebar_theme')}}">
                        <option value="" {{config('settings.ctrl_sidebar_theme') == null ? 'selected="selected"':''}}>None Selected</option>
                        <option class="bg-primary" value="sidebar-light-primary" {{config('settings.ctrl_sidebar_theme') == 'sidebar-light-primary' ? 'selected="selected"':''}}>Primary</option>
                        <option class="bg-warning" value="sidebar-light-warning" {{config('settings.ctrl_sidebar_theme') == 'sidebar-light-warning' ? 'selected="selected"':''}}>Warning</option>
                        <option class="bg-info" value="sidebar-light-info" {{config('settings.ctrl_sidebar_theme') == 'sidebar-light-info' ? 'selected="selected"':''}}>Info</option>
                        <option class="bg-danger" value="sidebar-light-danger" {{config('settings.ctrl_sidebar_theme') == 'sidebar-light-danger' ? 'selected="selected"':''}}>Danger</option>
                        <option class="bg-success" value="sidebar-light-success" {{config('settings.ctrl_sidebar_theme') == 'sidebar-light-success' ? 'selected="selected"':''}}>Success</option>
                        <option class="bg-indigo" value="sidebar-light-indigo" {{config('settings.ctrl_sidebar_theme') == 'sidebar-light-indigo' ? 'selected="selected"':''}}>Indigo</option>
                        <option class="bg-lightblue" value="sidebar-light-lightblue" {{config('settings.ctrl_sidebar_theme') == 'sidebar-light-lightblue' ? 'selected="selected"':''}}>Lightblue</option>
                        <option class="bg-navy" value="sidebar-light-navy" {{config('settings.ctrl_sidebar_theme') == 'sidebar-light-navy' ? 'selected="selected"':''}}>Navy</option>
                        <option class="bg-purple" value="sidebar-light-purple" {{config('settings.ctrl_sidebar_theme') == 'sidebar-light-purple' ? 'selected="selected"':''}}>Purple</option>
                        <option class="bg-fuchsia" value="sidebar-light-fuchsia" {{config('settings.ctrl_sidebar_theme') == 'sidebar-light-fuchsia' ? 'selected="selected"':''}}>Fuchsia</option>
                        <option class="bg-pink" value="sidebar-light-pink" {{config('settings.ctrl_sidebar_theme') == 'sidebar-light-pink' ? 'selected="selected"':''}}>Pink</option>
                        <option class="bg-maroon" value="sidebar-light-maroon" {{config('settings.ctrl_sidebar_theme') == 'sidebar-light-maroon' ? 'selected="selected"':''}}>Maroon</option>
                        <option class="bg-orange" value="sidebar-light-orange" {{config('settings.ctrl_sidebar_theme') == 'sidebar-light-orange' ? 'selected="selected"':''}}>Orange</option>
                        <option class="bg-lime" value="sidebar-light-lime" {{config('settings.ctrl_sidebar_theme') == 'sidebar-light-lime' ? 'selected="selected"':''}}>Lime</option>
                        <option class="bg-teal" value="sidebar-light-teal" {{config('settings.ctrl_sidebar_theme') == 'sidebar-light-teal' ? 'selected="selected"':''}}>Teal</option>
                        <option class="bg-olive" value="sidebar-light-olive" {{config('settings.ctrl_sidebar_theme') == 'sidebar-light-olive' ? 'selected="selected"':''}}>Olive</option>
                    </select>
                    <h6>Brand Logo Variants</h6>
                    <div class="d-flex"></div><select name="ctrl_brand_logo_varient" class="custom-select mb-3 border-0 control-setting-field" data-target_id="brand-logo" data-old_class="{{config('settings.ctrl_brand_logo_varient')}}" data-class="{{config('settings.ctrl_brand_logo_varient')}}">
                        <option value="" {{config('settings.ctrl_brand_logo_varient')== null ? 'selected="selected"':''}}>None Selected</option>
                        <option class="bg-primary" value="navbar-primary" {{config('settings.ctrl_brand_logo_varient') =="navbar-primary" ? 'selected="selected"':'' }}>Primary</option>
                        <option class="bg-secondary" value="navbar-secondary" {{config('settings.ctrl_brand_logo_varient') =="navbar-secondary" ? 'selected="selected"':'' }}>Secondary</option>
                        <option class="bg-info" value="navbar-info" {{config('settings.ctrl_brand_logo_varient') =="navbar-info" ? 'selected="selected"':'' }}">Info</option>
                        <option class="bg-success" value="navbar-success" {{config('settings.ctrl_brand_logo_varient') =="navbar-success" ? 'selected="selected"':'' }}>Success</option>
                        <option class="bg-danger" value="navbar-danger" {{config('settings.ctrl_brand_logo_varient') =="navbar-danger" ? 'selected="selected"':'' }}>Danger</option>
                        <option class="bg-indigo" value="navbar-indigo" {{config('settings.ctrl_brand_logo_varient') =="navbar-indigo" ? 'selected="selected"':'' }}>Indigo</option>
                        <option class="bg-purple" value="navbar-purple" {{config('settings.ctrl_brand_logo_varient') =="navbar-purple" ? 'selected="selected"':'' }}>Purple</option>
                        <option class="bg-pink" value="navbar-pink" {{config('settings.ctrl_brand_logo_varient') =="navbar-pink" ? 'selected="selected"':'' }}>Pink</option>
                        <option class="bg-navy" value="navbar-navy" {{config('settings.ctrl_brand_logo_varient') =="navbar-navy" ? 'selected="selected"':'' }}>Navy</option>
                        <option class="bg-lightblue" value="navbar-lightblue" {{config('settings.ctrl_brand_logo_varient') =="navbar-lightblue" ? 'selected="selected"':'' }}">Lightblue</option>
                        <option class="bg-teal" value="navbar-teal" {{config('settings.ctrl_brand_logo_varient') =="navbar-teal" ? 'selected="selected"':'' }}>Teal</option>
                        <option class="bg-cyan" value="navbar-cyan" {{config('settings.ctrl_brand_logo_varient') =="navbar-cyan" ? 'selected="selected"':'' }}>Cyan</option>
                        <option class="bg-dark" value="navbar-dark" {{config('settings.ctrl_brand_logo_varient') =="navbar-dark" ? 'selected="selected"':'' }}>Dark</option>
                        <option class="bg-gray-dark" value="navbar-gray-dark" {{config('settings.ctrl_brand_logo_varient') == "navbar-gray-dar" ? 'selected="selected"':'' }}">Gray dark</option>
                        <option class="bg-gray" value="navbar-gray" {{config('settings.ctrl_brand_logo_varient') =="navbar-gray" ? 'selected="selected"':'' }}>Gray</option>
                        <option class="bg-light" value="navbar-light" {{config('settings.ctrl_brand_logo_varient') =="navbar-light" ? 'selected="selected"':'' }}>Light</option>
                        <option class="bg-warning" value="navbar-warning" {{config('settings.ctrl_brand_logo_varient') =="navbar-warning" ? 'selected="selected"':'' }}>Warning</option>
                        <option class="bg-white" value="navbar-white" {{config('settings.ctrl_brand_logo_varient') =="navbar-white" ? 'selected="selected"':'' }}>White</option>
                        <option class="bg-orange" value="navbar-orange" {{config('settings.ctrl_brand_logo_varient') =="navbar-orange" ? 'selected="selected"':'' }}>Orange</option><a href="#">clear</a>
                    </select>
                    <h6>Sidebar Elevation</h6>
                    <div class="d-flex"></div><select name="ctrl_sidebar_elevation" class="custom-select mb-3 border-0 control-setting-field" data-target_id="main-aside" data-old_class="{{config('settings.ctrl_sidebar_elevation')}}" data-class="{{config('settings.ctrl_sidebar_elevation')}}">
                        <option value="elevation-0" {{config('settings.ctrl_sidebar_elevation')== 'elevation-0' ? 'selected="selected"':''}}>0</option>
                        <option value="elevation-1" {{config('settings.ctrl_sidebar_elevation')== 'elevation-1' ? 'selected="selected"':''}}>1</option>
                        <option value="elevation-2" {{config('settings.ctrl_sidebar_elevation')== 'elevation-2' ? 'selected="selected"':''}}>2</option>
                        <option value="elevation-3" {{config('settings.ctrl_sidebar_elevation')== 'elevation-3' ? 'selected="selected"':''}}>3</option>
                        <option value="elevation-4" {{config('settings.ctrl_sidebar_elevation')== 'elevation-4' ? 'selected="selected"':''}}>4</option>
                        <option value="elevation-5" {{config('settings.ctrl_sidebar_elevation')== 'elevation-5' ? 'selected="selected"':''}}>5</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="transform: translate(0px); width: 100%;"></div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="transform: translate(0px); height: 78.9474%;"></div>
            </div>
        </div>
        <div class="os-scrollbar-corner"></div>
    </div>
</aside>
