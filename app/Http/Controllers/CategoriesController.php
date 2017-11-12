<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoriesController extends Controller
{
    public function getCategoryIndex(){
        $categories=Category::all();
         return view('admin.blog.categories',compact('categories'));
    }

   public function createCategory(Request $request){
       $this->validate($request,[
           'name'=>'required'
       ]);

       $category = new Category();
       $category->name =$request->name;
       $category->save();

       return redirect()->route('admin.blog.category');
   }


   public function editCategory($category_id){
       $category = Category::find($category_id);
       return view('admin.blog.edit_category',compact('category'));
   }

   public function updateCategory(Request $request ,$category_id ){
       $this->validate($request,[
          'name'=>'required'
       ]);

       $category= Category::find($category_id);
       $category->name = $request->name;
       $category->update();
       return redirect()->route('admin.blog.category');
   }

   public function deleteCategory($category_id){
       $category = Category::find($category_id);
       $category->delete();
       return redirect()->route('admin.blog.category')->with(['success'=>'Delete Successfully']);
   }
}
