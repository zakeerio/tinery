<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle("Categories","Categories List");
        $categories = Categories::get();
        return view('admin.itineraries.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle("Categories","Create Category");
        return view('admin.categories.create');
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
            
            $array = new Categories;
            $array->name = $data['name'];

            $array->save();
        }
        // Logic for storing the data goes here...

        return redirect()->route('admin.categories.index')->with('success', 'Post created successfully.');
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
        $this->setPageTitle("Categories","Edit Category");
        $categories = Categories::get();
        $single_category = Categories::find($id);
        return view('admin.itineraries.categories',compact('single_category','categories'));
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
            
            $array = Categories::find($id);
            $array->name = $data['name'];

            $array->save();
        }
        // Logic for storing the data goes here...

        return redirect()->route('admin.categories.index')->with('success', 'Post Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id)->delete();

        if(!$category){
			return $this->responseRedirectBack('Error occurred while deleting category', 'error', true, true);
		}
		return $this->responseRedirect('admin.categories.index', 'Category has been deleted successfully', 'success');
    }
}
