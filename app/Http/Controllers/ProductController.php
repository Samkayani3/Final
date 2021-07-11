<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
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




class ProductController extends Controller
{
    public function addProduct(){
    
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option selected disabled> Select </option>";
        foreach($categories as $category){
            $categories_dropdown .= "<option value='".$category->id."'>" .$category->name . "</option>";
            $sub_categories = Category::where(['parent_id'=>$category->id])->get();
            foreach($sub_categories as $sub_category){
                $categories_dropdown .= "<option value= ' " .$sub_category->id . " ' >&nbsp;--&nbsp;".$sub_category->name."</option>";

            }
        }
        return view('vendor.Product.addProduct')->with(compact('categories_dropdown','categories'));
    }

    public function storeProduct(Request $request){
        $product = new Product();
        $product->user_id = Auth::user()->id;
        $product->category_id =$request->input('category_id');
        $product->product_name =$request->input('name');
        $product->price =$request->input('price');
        $product->product_code =$request->input('product_code');
        $product->stock =$request->input('stock');
        $product->charges =$request->input('charges');
        $product->description =$request->input('descip');

        if($img_file=$request->file('image')){
        $img_extension=$img_file->getClientOriginalExtension();
        $img_filename= time() . '.' . $img_extension;
        $img_file->move('uploads/product/',$img_filename);
        $product->image=$img_filename;
        }
        if($video_file=$request->file('video')){
            $video_name=$video_file->getClientOriginalName();
            $video_filename= time() . '.' . $video_name;
            $video_file->move('uploads/product/',$video_filename);

           $product->video =$video_filename;
        }

        $product->save();
        return redirect('/vendor/view-products')->with('msg','Product Added Successfully');
    }

    public function viewProduct(){
        $userId = Auth::user()->id;
        $products = Product::where(['user_id'=>$userId])->orderBy('id',"DESC")->simplePaginate(4);
        //$products = json_decode(json_encode($products));
        foreach($products as $product){
            $category_name = Category::where(['id'=>$product->category_id])->first();
            $product->category_name = $category_name->name;
            
        }
        //echo "<pre>"; print_r($products); die;
        return view('vendor.Product.viewProducts')->with(compact('products'));
    }

    public function editProduct($id){
       $products = Product::where(['id'=>$id])->first();

       $categories = Category::where(['parent_id'=>0])->get();
       $categories_dropdown = "<option selected disabled> Select </option>";
       foreach($categories as $category){
           if($category->id == $products->category_id){
               $selected = "selected";
           }
           else {
               $selected ="";
           }
           $categories_dropdown .= "<option value='".$category->id."' ".$selected.">" .$category->name . "</option>";
           $sub_categories = Category::where(['parent_id'=>$category->id])->get();
           foreach($sub_categories as $sub_category){
            if($sub_category->id == $products->category_id){
                $selected = "selected";
            }
            else {
                $selected ="";
            }   
            $categories_dropdown .= "<option value= ' " .$sub_category->id . " ' ".$selected." >&nbsp;--&nbsp;".$sub_category->name."</option>";

           }
       }

       return view('vendor.Product.editProduct')->with(compact('products','categories_dropdown','categories'));

    }

    public function updateProduct(Request $request,$id){
       $product= Product::find($id);
           $product->product_name=$request->input('name');
           $product->category_id=$request->input('category_id');
           $product->product_code=$request->input('product_code');
           $product->stock=$request->input('stock');
           $product->description=$request->input('descip');
           $product->price=$request->input('price');
    
           if($img_file=$request->file('image')){
           $img_extension=$img_file->getClientOriginalExtension();
           $img_filename= time() . '.' . $img_extension;
           $img_file->move('uploads/product/',$img_filename);
           $product->image=$img_filename;
           }
            $product->update();
        return redirect('/vendor/view-products')->with('msg','Product Updated Successfully');

    }

    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        return redirect('/vendor/view-products')->with('msg','Product Deleted Successfully');
    }




    //Customer or Frontend Function
    
    public function productDetails($url){
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        $categoryDetails = Category::where(['url'=>$url])->first();
        
        if($categoryDetails->parent_id == 0)
        {
        $subCategories = Category::where(['parent_id'=>$categoryDetails->id])->get();

        foreach($subCategories as $subCat){
            $cat_ids[] = $subCat->id; 
}

        $productAll = Product::whereIn('category_id',$cat_ids)->get();

        }
        else {
            $productAll = Product::where(['category_id'=>$categoryDetails->id])->get();
        }
        
        return view('vendor.Product.productList')->with(compact('categoryDetails','productAll','categories'));
        
    }

    //Single Product Details
    public function product($id){

        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        

        $productDetails = Product::where('id',$id)->first();

        return view('frontend.productDetails')->with(compact('productDetails','categories'));
    }
//Cart Function
    public function addtocart(Request $request){
        $data =$request->all();

        $session_id = Session::get('session_id');
        if(empty($session_id)){
        $session_id = Str::random(40); 
        Session::put('session_id',$session_id);
        }

        $countProducts =  DB::table('cart')
        ->where(['product_id'=>$data['product_id'],
        'product_name'=>$data['product_name'],
        'product_code'=>$data['product_code'],
        'session_id'=>$session_id
        ])->count();

        if($countProducts>0){
            return redirect()->back()->with('msg','Product already exists in Cart');
        }
        else{
        DB::table('cart')
        ->insert(['product_id'=>$data['product_id'],
        'product_name'=>$data['product_name'],
        'product_code'=>$data['product_code'],
        'price'=>$data['price'],
        'quantity'=>$data['quantity'],
        'user_email'=>Auth::user()->email,
        'session_id'=>$session_id
        ]);
        }
    

        return redirect('/cart')->with('msg','Product has been added in Cart');
    }

    public function cart(Request $request){
        $email = Auth::user()->email;
        $cart = DB::table('cart')->where(['user_email'=>$email])->get();
        foreach($cart as $key => $product){
            $productDetails = Product::where('id',$product->product_id)->first();
            $cart[$key]->image = $productDetails->image; 
        }
        
      //echo "<pre>"; print_r($cart); die;
        return view('frontend.cart')->with(compact('cart'));
    }

    public function deleteCartProduct($id){
        DB::table('cart')->where('id',$id)->delete();
        
        return redirect('/cart')->with('msg','Product has been removed from Cart');
    }

    public function updateCartQuantity($id, $quantity){

        DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
        return redirect()->back()->with('msg1','Cart has been updated Successfully');
    }
//Checkout Function
    public function checkout(){
        $email = Auth::user()->email;
        
        $cart = DB::table('cart')->where(['user_email'=>$email])->get();
        
        foreach($cart as $key => $product){
            $productDetails = Product::where('id',$product->product_id)->first();
            $cart[$key]->image = $productDetails->image;
           
        }
        
        return view('frontend.checkout')->with(compact('cart'));
    }
//Orders Function
    public function order(Request $request){
        $data =$request->all();
        $userId =Auth::user()->id;
        $user_email = Auth::user()->email;
        
        $order = new Order();
        $order->user_id =$userId;
        $order->customer_name = $request->name;
        $order->customer_email = $user_email;
        $order->customer_phone = $request->phone_no;
        $order->customer_address1 = $request->address1;
        $order->customer_address2 = $request->address2;
        $order->total_amount = $request->total_amount;
        $order->payment_method = $request->payment_method;
        
        $order->save();

        $order_id = DB::getPdo()->lastInsertId();
        $cartProducts = DB::table('cart')->where(['user_email'=>$user_email])->get();
        foreach($cartProducts as $pro){
            $cartPro = new Order_Products();
            $cartPro->order_id = $order_id;
            $cartPro->user_id = $userId;
            $cartPro->product_id = $pro->product_id;
            $cartPro->product_name = $pro->product_name;
            $cartPro->product_code = $pro->product_code;
            $cartPro->product_price = $pro->price;
            $cartPro->product_qty = $pro->quantity;
            $cartPro->save();

            $proStock = Product::where(['id'=>$pro->product_id])->first()->toArray();
            $newStock = $proStock['stock'] - $pro->quantity;
            Product::where(['id'=>$pro->product_id])->update(['stock'=>$newStock]);
        }

        Session::put('order_id',$order_id);
        Session::put('total_amount',$order->total_amount);
        if($request->payment_method == 'COD')
        {
            return redirect('/thanks');
        }
        else {
            $user_email =Auth::user()->email;
        DB::table('cart')->where(['user_email'=>$user_email])->delete();
            return redirect('/paypal');
        }

    }
    public function thanks(){
        $user_email =Auth::user()->email;
        DB::table('cart')->where(['user_email'=>$user_email])->delete();
        return view('frontend.thanks');
    }

    public function userOrders(){
        $userId = Auth::user()->id;
        $orders = Order::with('orders')->where('user_id',$userId)->OrderBy('id','DESC')->get();
        /*$orders = json_decode(json_encode($orders));
        echo "<pre>"; print_r($orders); die;*/
        return view('frontend.userOrders')->with(compact('orders'));
    }
   
    public function orderDetails($order_id){
        $userId = Auth::user()->id;
        $orderDetails = Order::with('orders')->where('id',$order_id)->first();
        /*$orderDetails = json_decode(json_encode($orderDetails));
        echo "<pre>"; print_r($orderDetails); die;*/
        return view('frontend.orderDetails')->with(compact('orderDetails'));
    }

    public function searchProducts(Request $request){
        $data = $request->all();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        $searchProduct = $data['productSerach'];
        $productAll = Product::where('product_name','like','%'.$searchProduct.'%')->orWhere
        ('product_code',$searchProduct)->get();

        return view('vendor.Product.productList')->with(compact('searchProduct','productAll','categories'));

    }

//Reports Function
public function reports(){
    $userId = Auth::user()->id;
    $products = Product::where(['user_id'=>$userId])->get();
    return view('vendor.Product.reports')->with(compact('products'));
}


//Dashboard
public function dashboard(){
    $userId = Auth::user()->id;
    $products = Product::where(['user_id'=>$userId])->count();
    return view('vendor.vendor_dashboard')->with(compact('products'));
}



public function paypal(Request $request)
{
   return view('frontend.paypal');
}





}
