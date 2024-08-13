<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
class CategoryController extends Controller
{
    public function listCategories(){
        $listCategories = Category::get();
        return view('admin.categories.list-categories')->with([
            'listCategories'=>$listCategories,
        ]);
    }
    public function addCategory(){
        return redirect()->back();
    }
    public function addPostCategory(CategoryRequest $request){
        Category::create(['name'=> $request->name]);
        return redirect()->back()->with([
            'message' => 'Thêm danh mục thành công'
        ]);
    }

    public function updateCategory($id){
        $category = Category::find($id);
        $listCategories = Category::get();
        return view('admin.categories.update-category')->with([
            'listCategories'=>$listCategories,
             'category'=> $category
        ]);
    }

    public function updatePostCategory(CategoryRequest $request,$id){
        // dd($id);
        Category::where('id', $id)->update(['name'=> $request->name]);
        return redirect()->back()->with([
            'message' => 'Sửa danh mục thành công'
        ]);
    }

    public function deleteCategory(Request $request){
        Category::find($request->idCategory)->delete();
        return redirect()->back()->with([
            'message' => 'Xoá danh mục thành công'
        ]);
    }
}
