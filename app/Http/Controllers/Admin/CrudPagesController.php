<?php

namespace App\Http\Controllers\Admin;

use App\Models\CrudPages;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class CrudPagesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle("Pages","Pages List");
        $pages = CrudPages::get();
        return view('admin.crud_pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle("Pages","Create Page");
        return view('admin.crud_pages.create');
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
            'slug' => 'required|unique:crud_pages',
        ];

        $messages = [
            'title.required' => 'The title field is required.',
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

            $array = new CrudPages;
            $array->title = $data['title'];
            $array->slug = $data['slug'];
            $array->description = $data['description'];

            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $input['image'] = time().'.'.$image->getClientOriginalExtension();

                $destinationPath = public_path('/frontend/img');
                $image->move($destinationPath, $input['image']);

                $array->file = $input['image'];
            }

            $array->save();
        }

        return $this->responseRedirect('admin.crudpages.index', 'Page Created successfully.', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CrudPages  $crudPages
     * @return \Illuminate\Http\Response
     */
    public function show(CrudPages $crudPages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CrudPages  $crudPages
     * @return \Illuminate\Http\Response
     */
    public function edit($crudPages)
    {
        $this->setPageTitle("Pages","Edit Page");
        $array = CrudPages::find($crudPages);
        return view('admin.crud_pages.edit',compact('array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CrudPages  $crudPages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $crudPages)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
        ];

        $messages = [
            'title.required' => 'The title field is required.',
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

            $array = CrudPages::find($crudPages);
            $array->title = $data['title'];
            $array->description = $data['description'];

            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $input['image'] = time().'.'.$image->getClientOriginalExtension();

                $destinationPath = public_path('/frontend/img');
                $image->move($destinationPath, $input['image']);

                $array->file = $input['image'];
            }

            $array->save();
        }

        return $this->responseRedirect('admin.crudpages.index', 'Page Created successfully.', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CrudPages  $crudPages
     * @return \Illuminate\Http\Response
     */
    public function destroy($crudPages)
    {
        $itinerary = CrudPages::findOrFail($crudPages);
        $itinerary->delete();

        return $this->responseRedirect('admin.crudpages.index', 'Page deleted successfully', 'success');
    }
}
