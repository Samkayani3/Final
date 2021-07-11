<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(){
        $levels= Category::where(['parent_id'=>0])->get();
        return view('vendor.addCategory')->with(compact('levels'));
    }

    public function Categories(Request $request){
        
        $category = new Category();
        $category->name =$request->input('name');
        $category->parent_id =$request->input('parent_id');
        $category->url =$request->input('url');
        $category->description =$request->input('descip');
        $category->save();

        return redirect('/vendor/view-category')->with('msg','Category Added Successfully');
        


    }

    public function viewCategory(){
        $categories = Category::simplePaginate(4);
        return view('vendor.viewCategory')->with(compact('categories'));
    }

    public function editCategory($id){
        $categories = Category::where(['id'=>$id])->first();
        $levels= Category::where(['parent_id'=>0])->get();
        return view('vendor.editCategory')->with(compact('categories','levels'));
    }

    public function updatedCategory(Request $request, $id){
        // $category =Category::find($id);
        // $category->name =$request->input('name');
        // $category->url =$request->input('url');
        // $category->description =$request->input('descip');
        // $category->update();

        
        Category::where(['id'=>$id])->update([
            'name'=>$request['name'],
            'url'=>$request['url'],
            'description'=>$request['descip']
        ]);
        

        return redirect('/vendor/view-category')->with('msg','Category Updated Successfully');

        
    }

    public function deleteCategory($id){
       $category = Category::find($id);
       $category->delete();

       return redirect('/vendor/view-category')->with('msg','Category Deleted Successfully');

    }
}
