<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Tags;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class TagsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle("Tags","Tags List");
        $tags = Tags::get();
        return view('admin.itineraries.tags',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|max:255',
        ];

        $messages = [
            'name.required' => 'The name field is required.',
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
            
            $array = new Tags;
            $array->name = $data['name'];
            $array->slug = Str::slug($data['name'], '-');
            $array->save();
        }
        // Logic for storing the data goes here...

        return redirect()->route('admin.tags.index')->with('success', 'Post created successfully.');
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
        $this->setPageTitle("Tags","Edit Tag");
        $tags = Tags::get();
        $single_tag = Tags::find($id);
        return view('admin.itineraries.tags',compact('single_tag','tags'));
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
            'name' => 'required|max:255',
        ];

        $messages = [
            'name.required' => 'The name field is required.',
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
            
            $array = Tags::find($id);
            $array->name = $data['name'];
            $array->slug = Str::slug($data['name'], '-');
            $array->save();
        }
        // Logic for storing the data goes here...

        return redirect()->route('admin.tags.index')->with('success', 'Post Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tags::find($id)->delete();

        if(!$tag){
			return $this->responseRedirectBack('Error occurred while deleting Tag', 'error', true, true);
		}
		return $this->responseRedirect('admin.tags.index', 'Tag has been deleted successfully', 'success');
    }
}
