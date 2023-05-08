<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;

use Illuminate\Http\Request;

class Categories extends BaseController
{

    protected $category = null;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryInterface $category)
    {
        $this->middleware('auth:admin');
        $this->category = $category;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->setPageTitle("Categories","Categories List");
        $categories = $this->category->getAll();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        $this->setPageTitle("Categories","Edit Category");
        $permission = $this->category->findPermissionById($id);
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
        //
        $category = $this->category->destroy($id);

        if(!$category){
			return $this->responseRedirectBack('Error occurred while deleting category', 'error', true, true);
		}
		return $this->responseRedirect('admin.categories.index', 'Category has been deleted successfully', 'success');
    }
}
