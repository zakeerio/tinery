<?php

namespace App\Repositories;
use App\Models\Category;
// use Spatie\Permission\Models\Role;

class CategoryRepository implements CategoryInterface{

    protected $category = null;

    public function __construct(Category $admin){
        $this->category = $admin;
    }

    public function getAll($order = 'id', $sort = 'desc', $columns = ['*'])
    {
        return $this->category->all($columns,$order,$sort);
    }

    public function store($params){
        $category = $this->category->create($params);
        return $category;
    }

    public function update($params,$id){
        $category = $this->findCategoryById($id);
        $category->update($params);
        return $category;
    }

    public function destroy($id){
        $category = $this->findCategoryById($id);
        $category->delete();
        return $category;
    }

    public function findCategoryById($id)
    {
        return $this->category->findOrFail($id);
    }
}
