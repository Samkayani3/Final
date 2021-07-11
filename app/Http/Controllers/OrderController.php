<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;
use Auth;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Input;
use Image;
use File;
Use Alert;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Session;
use laravel\helpers;
use App\Order;
use App\Order_Products;

class OrderController extends Controller
{
    public function viewOrders(){
        $userId = Auth::user()->id;
    
         $orders = Order::with('orders')->OrderBy('id','DESC')->get();
       
        //$products = Product::where('user_id',$userId)->get();
        //$orders = json_decode(json_encode($orders ));
        //echo "<pre>"; print_r($orders); die; 
        //$orders = Order::with('orders')->where('user_id',$userId)->OrderBy('id','DESC')->get();
    
        return view('vendor.Orders.viewOrders')->with(compact('orders'));
    }
    public function OrderDetails($order_id){
        $userId = Auth::user()->id;
        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        return view('vendor.Orders.orderDetails')->with(compact('orderDetails'));
    }

    public function getData(){
        return Order::all();
    }
}
