<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Itineraries;

class ItinerariesController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        \View::share('nav', 'dashboard');
        // dd("test");

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
        $itineraries = Itineraries::get();
        return view('admin.itineraries.index',compact('itineraries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle("Itineraries","Itineraries List");
        return view('admin.Itineraries.create');
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
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required',
            'categories' => 'required|array',
            'tags' => 'required|array',
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
        else{
            $data = $request->input();
            
            $array = new Itineraries;
            $array->title = $data['title'];
            $array->slug = $data['slug'];
            $array->description = $data['description'];
            $array->excerpt = $data['excerpt'];
            $array->seo_title = $data['seo_title'];
            $array->seo_description = $data['seo_description'];
            $array->seo_image = $data['seo_image'];
            $array->author = $data['author'];
            $array->categories = json_encode($data['categories']);
            $array->tags = json_encode($data['tags']);
            $array->address_street = $data['address_street'];
            $array->address_street_line1 = $data['address_street_line1'];
            $array->address_city = $data['address_city'];
            $array->address_state = $data['address_state'];
            $array->address_zipcode = $data['address_zipcode'];
            $array->address_country = $data['address_country'];
            $array->latitude = $data['latitude'];
            $array->longitude = $data['longitude'];
            $array->phone = $data['phone'];
            $array->website = $data['website'];
            $array->additional_info = $data['additional_info'];
            $array->featured = $data['featured'];
            $array->visibility = $data['visibility'];
            $array->status = $data['status'];

            $array->save();
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
    public function show()
    {
        //
        $this->setPageTitle("Itineraries","Itineraries List");
        $itineraries = Itineraries::get();
        return view('admin.itineraries.index',compact('itineraries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->setPageTitle("Itineraries","Itineraries Edit");
        $itineraries = Itineraries::find($id);
        return view('admin.itineraries.edit',compact('itineraries'));
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
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required',
            'categories' => 'required|array',
            'tags' => 'required|array',
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
        else{
            $data = $request->input();
            
            $array = Itineraries::find($id);
            $array->title = $data['title'];
            $array->slug = $data['slug'];
            $array->description = $data['description'];
            $array->excerpt = $data['excerpt'];
            $array->seo_title = $data['seo_title'];
            $array->seo_description = $data['seo_description'];
            $array->seo_image = $data['seo_image'];
            $array->author = $data['author'];
            $array->categories = json_encode($data['categories']);
            $array->tags = json_encode($data['tags']);
            $array->address_street = $data['address_street'];
            $array->address_street_line1 = $data['address_street_line1'];
            $array->address_city = $data['address_city'];
            $array->address_state = $data['address_state'];
            $array->address_zipcode = $data['address_zipcode'];
            $array->address_country = $data['address_country'];
            $array->latitude = $data['latitude'];
            $array->longitude = $data['longitude'];
            $array->phone = $data['phone'];
            $array->website = $data['website'];
            $array->additional_info = $data['additional_info'];
            $array->featured = $data['featured'];
            $array->visibility = $data['visibility'];
            $array->status = $data['status'];

            $array->save();
        }
        // Logic for storing the data goes here...

        return redirect('admin/itineraries/index')->with('success', 'Post Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Itineraries::find($id)->delete();
        return redirect('admin/itineraries/index')->with('success', 'Post Deleted successfully.');

    }
}
