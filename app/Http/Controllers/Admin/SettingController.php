<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Setting;

class SettingController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->setPageTitle("Settings","System Settings");
        return view('admin.settings.index');
    }


    public function update(Request $request)
    {
        $params = $request->except('_token');
        if(count($params)>0){
            foreach($params as $key=>$value){
                $setting = Setting::set($key,$value);
            }
            return $this->responseRedirect('admin.settings.index', 'Settings has been updated successfully', 'success');
        }
    }

    public function themeSetting(Request $request)
    {
        $setting = Setting::set($request->key,$request->value);
        if($setting){
            echo json_encode(['success'=>'true','key'=>$request->key,'value'=>$request->value]);
            return;
        }
        echo json_encode(['error'=>'true','key'=>$request->key,'value'=>$request->value]);
    }

    
}
