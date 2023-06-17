<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class HomeSettingController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle("Home Settings","Home Settings");
        $array = HomeSetting::find(1);
        return view('admin.settings.homesetting',compact('array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatepictures(Request $request)
    {
        if ($request->hasfile('logo'))
        {
            $logo = $request->file('logo');
            $input['logo'] = time().'1.'.$logo->getClientOriginalExtension();

            $destinationPath = public_path('/frontend/img');
            $logo->move($destinationPath, $input['logo']);

            $array = HomeSetting::find($request->id);
            $array->logo = $input['logo'];
            $array->save();

        }

        if ($request->hasfile('icon'))
        {
            $icon = $request->file('icon');
            $input['icon'] = time().'2.'.$icon->getClientOriginalExtension();

            $destinationPath = public_path('/frontend/img');
            $icon->move($destinationPath, $input['icon']);

            $array = HomeSetting::find($request->id);
            $array->icon = $input['icon'];
            $array->save();
        }

        return $this->responseRedirect('admin.homesettings.index', 'Updated successfully.', 'success');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array = HomeSetting::find($request->id);
        $array->site_title = $request->site_title;
        $array->banner_title = $request->banner_title;
        $array->banner_description = $request->banner_description;
        $array->about_us = $request->about_us;
        $array->save();

        return $this->responseRedirect('admin.homesettings.index', 'Updated successfully.', 'success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeSetting  $homeSetting
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSetting $homeSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeSetting  $homeSetting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeSetting  $homeSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       echo $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeSetting  $homeSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
