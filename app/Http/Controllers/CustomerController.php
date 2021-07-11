<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Input;
use Image;
use File;

class CustomerController extends Controller
{
    public function index(){
    
        $products = Product::simplePaginate(9);

        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
    
        return view('frontend.home')->with(compact('products','categories'));
    }
}
