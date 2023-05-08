<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Itineraries extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth:admin');
        \View::share('nav', 'dashboard');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->setPageTitle("Itineraries","Itineraries List");
        $itineraries = $this->itineraries->getAll();
        return view('admin.Itineraries.index',compact('itineraries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('test');

        //
        $this->setPageTitle("Itineraries","Itineraries List");
        return view('admin.Itineraries.create',compact('itineraries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required',
            'categories' => 'required',
            'tags' => 'required',
            'address_street' => 'nullable|string|max:255',
            'address_street_line1' => 'nullable|string|max:255',
            'address_city' => 'nullable|string|max:255',
            'address_state' => 'nullable|string|max:255',
            'address_zipcode' => 'nullable|string|max:255',
            'address_country' => 'nullable|string|max:255',
            'latitude' => 'nullable|string|max:255',
            'longitude' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'additional_info' => 'nullable|string',
            'featured' => 'nullable|in:0,1',
            'visibility' => 'required|in:public,private',
            'status' => 'required|in:published,draft',
        ];

        $messages = [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title field cannot be longer than 255 characters.',
            'description.required' => 'The description field is required.',
            'author.required' => 'The author field is required.',
            'categories.required' => 'The categories field is required.',
            'tags.required' => 'The tags field is required.',
            'visibility.required' => 'The visibility field is required.',
            'visibility.in' => 'The visibility field must be either "public" or "private".',
            'status.required' => 'The status field is required.',
            'status.in' => 'The status field must be either "published" or "draft".',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Logic for storing the data goes here...

        return redirect()->route('admin.Itineraries.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
