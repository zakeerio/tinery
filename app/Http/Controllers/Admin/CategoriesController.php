<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Categories;

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
            'category' => 'required|max:255',
        ];

        $messages = [
            'category.required' => 'The category field is required.',
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
            $array->category = $data['category'];

            $array->save();
        }
        // Logic for storing the data goes here...

        return redirect()->route('admin.Itineraries.categories')->with('success', 'Post created successfully.');
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
        $permission = Categories::find($id);
        return view('admin.categoriess.edit',compact('category'));
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
        $category = Categories::delete($id);

        if(!$category){
			return $this->responseRedirectBack('Error occurred while deleting category', 'error', true, true);
		}
		return $this->responseRedirect('admin.categories.index', 'Category has been deleted successfully', 'success');
    }
}
