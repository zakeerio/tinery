<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{

    protected $settings = [
        [
			'key'		=>	'site_name',
			'value'		=>	'CM System'
		],
        [
			'key'		=>	'primary_email',
			'value'		=>	''
		],
        [
			'key'		=>	'secondry_email',
			'value'		=>	''
		],
        [
			'key'		=>	'primary_phone',
			'value'		=>	''
		],
        [
			'key'		=>	'secondry_phone',
			'value'		=>	''
		],
        [
			'key'		=>	'address',
			'value'		=>	''
		],
        [
			'key'		=>	'site_logo',
			'value'		=>	''
		],
        [
			'key'		=>	'site_icon',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_dark_mode',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_nav_fixed',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_nav_noborder',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_nav_collapsed',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_nav_sidefixed',
			'value'		=>	'layout-fixed'
		],
        [
			'key'		=>	'ctrl_nav_sidemini',
			'value'		=>	'sidebar-mini'
		],
        [
			'key'		=>	'ctrl_nav_sidemini-md',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_nav_sidemini-xs',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_nav_flat',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_nav_legacy',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_nav_compact',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_nav_child_indent',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_nav_collapse_hide_child',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_nav_disable_expand',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_fixed_footer',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_body_text_sm',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_nav_text_sm',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_brand_text_sm',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_sidebar_text_sm',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_footer_text_sm',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_navbar_variant',
			'value'		=>	'navbar-white navbar-light'
		],
        [
			'key'		=>	'ctrl_navbar_accent',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_sidebar_theme',
			'value'		=>	'sidebar-dark-primary'
		],
        [
			'key'		=>	'ctrl_brand_logo_varient',
			'value'		=>	''
		],
        [
			'key'		=>	'ctrl_sidebar_elevation',
			'value'		=>	'elevation-4'
		],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $setting) {
            Setting::create($setting);
        }
    }
}
