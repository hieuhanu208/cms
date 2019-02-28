<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $req){
        if ($req->isMethod('post')) {
            $category = new Category;
            $category->name = $req->category_name;
            $category->description= $req->description;
            $category->url= $req->url;
            $category->save();
            return redirect('/admin/view-categories')->with('errors','The category has been created');
        }
        return view('admin.categories.add_category');
    }

    public function viewCategory(){
        $category = Category::all();
        return view('admin.categories.view_category', compact('category'));
    }
    public function editCategory(Request $rq, $id=null){
        if ($rq->isMethod('post')) {
            $data = $rq->all();
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['description'],'url'=>$data['url']]);
            return redirect('/admin/view-categories');
        }

        $categoryDetails = Category::where(['id'=>$id])->first();
        return view('admin.categories.edit_category',compact('categoryDetails'));

    }
}
