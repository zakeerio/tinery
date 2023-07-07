<?php

namespace App\Http\Controllers\Admin;

use App\Imports\ItineraryLocationsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ItineraryLocations;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ItineraryLocationsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle("Locations","Locations List");
        $locations = ItineraryLocations::get();
        return view('admin.locations.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle("Locations","Create Locations");
        return view('admin.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'address_street' => 'required|max:255',
            'address_street_line1' => 'required|max:255',
            'address_city' => 'required|max:255',
            'address_state' => 'required|max:255',
            'address_zipcode' => 'max:255',
            'address_country' => 'required|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
        ];

        $messages = [
            'address_street.required' => 'The address street field is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $data = $request->input();

            $array = new ItineraryLocations;
            $array->address_street = $data['address_street'];
            $array->address_street_line1 = $data['address_street_line1'];
            $array->address_city = $data['address_city'];
            $array->address_state = $data['address_state'];
            $array->address_zipcode = $data['address_zipcode'];
            $array->address_country = $data['address_country'];
            $array->latitude = $data['latitude'];
            $array->longitude = $data['longitude'];
            $array->save();
        }
        // Logic for storing the data goes here...

        return $this->responseRedirect('admin.itinerarylocation.index', 'Location Created successfully', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItineraryLocations  $itineraryLocations
     * @return \Illuminate\Http\Response
     */
    public function show(ItineraryLocations $itineraryLocations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItineraryLocations  $itineraryLocations
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->setPageTitle("Locations","Locations Update");
        $locations = ItineraryLocations::find($id);
        return view('admin.locations.edit',compact('locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItineraryLocations  $itineraryLocations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'address_street' => 'required|max:255',
            'address_street_line1' => 'required|max:255',
            'address_city' => 'required|max:255',
            'address_state' => 'required|max:255',
            'address_zipcode' => 'required|max:255',
            'address_country' => 'required|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
        ];

        $messages = [
            'address_street.required' => 'The address street field is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $data = $request->input();

            $array = ItineraryLocations::find($id);
            $array->address_street = $data['address_street'];
            $array->address_street_line1 = $data['address_street_line1'];
            $array->address_city = $data['address_city'];
            $array->address_state = $data['address_state'];
            $array->address_zipcode = $data['address_zipcode'];
            $array->address_country = $data['address_country'];
            $array->latitude = $data['latitude'];
            $array->longitude = $data['longitude'];
            $array->save();
        }
        // Logic for storing the data goes here...

        return $this->responseRedirect('admin.itinerarylocation.index', 'Location Updated successfully', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItineraryLocations  $itineraryLocations
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locations = ItineraryLocations::find($id)->delete();
        return $this->responseRedirect('admin.itinerarylocation.index', 'Location deleted successfully', 'success');
    }

    public function uploadexcel()
    {
        $this->setPageTitle("Locations","Create Locations");
        return view('admin.locations.uploadexcel');
    }

    public function uploadexceldb(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx,xls|max:2048' // Validate file type and size
        ]);
    
        if ($validator->fails()) {
            return $this->responseRedirect('admin.itinerarylocation.uploadexcel', 'Error in File Format', 'error');
        }

        $file = $request->file('file');

        Excel::import(new ItineraryLocationsImport, $file);

        return $this->responseRedirect('admin.itinerarylocation.uploadexcel', 'File Uploaded Successfully', 'success');
    }
}
