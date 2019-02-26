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
            return redirect('/admin/view-categories')->with('success-message','The category had been created successfully');
        }
        return view('admin.categories.add_category');
    }

    public function viewCategory(){
        $category = Category::all();
        return view('admin.categories.view_category', compact('category'));
    }
}
